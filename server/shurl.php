<?php

function shurl_add($url) {
  $url = trim($_POST['url'], '/');

  preg_match("/^(.*:\/+)(.*)/i", $url, $match);
  $protocol = $match[1];
  $url = $match[2];

  if(!($protocol && preg_match("/^https?/i", $protocol))) {
    sendJson(array('error' => 'unaccepted protocol'));
    die();
  }

  if(!preg_match("/^([a-z0-9\-]+\.)+[a-z0-9\-]+/i", $url, $match)) {
    sendJson(array('error' => 'invalid host name'));
    die();
  }

  $host = $match[0];
  # check the DNS for the host to exists
  if(gethostbyname($host) == $host) {
    sendJson(array('error' => 'host does not exist'));
    die();
  }

  $url = $protocol.$url;
  try {
    global $dbpath;
    $db = new SQLite3($dbpath);
  } catch (Exception $e) {
    serverError();
    die();
  }
  $query = $db->prepare('SELECT * FROM urls WHERE URL=:url;');
  $query->bindValue(':url', $url, SQLITE3_TEXT);
  $url;
  $shurl = $query->execute()->fetchArray()[0];

  if(!$shurl) {
    $query = $db->prepare('INSERT INTO urls (URL) VALUES (:url);');
    $query->bindValue(':url', SQLite3::escapeString($url), SQLITE3_TEXT);
    $result = $query->execute();
    if($result) {
      $shurl = $db->lastInsertRowid();
    } else {
      serverError();
      die();
    }
  }
  sendJson(array('original_url' => stripslashes($url), 'short_url'=> $shurl));
  $db->close();
}

function shurl_get_redirect($url) {

  $id = $GLOBALS['REQ_PARAMS']['id'];
  global $dbpath;
  if($id) {
    try {
      $db = new SQLite3($dbpath);
    } catch (Exception $e) {
      serverError();
      die();
    }
    $query = $db->prepare(
      "SELECT URL
      FROM urls
      WHERE URL_ID = :n;"
    );
    $query->bindValue(':n', $id, SQLITE3_INTEGER);
    $url = $query->execute()->fetchArray()[0];
    $db->close();
    if($url) {
      // redirect
      header('Location: '.$url);
      die();
    }
  }
  sendJson(array('error' => 'no short url found.'));
}
?>
