<?php

function quotes($params) {
  try {
    $db = new SQLite3('db/data.db');
  } catch (Exception $e){
    serverError();
  }

  if(isset($_GET['cat'])) {
    $cat = ucfirst(strtolower($_GET['cat']));
    $query = $db->prepare(
      "SELECT COUNT(Quote_ID)
      FROM quotes1
      WHERE Quote_Category = :cat;"
    );
    $query->bindValue(':cat', $cat, SQLITE3_TEXT);
    $count = $query->execute()->fetchArray()[0];
    $val = rand(0, $count-1);
    $query = $db->prepare(
      "SELECT Name, Quote_Category, Quote
      FROM quotes1
      WHERE Quote_Category = :cat
      LIMIT 1 OFFSET $val;"
    );
    $query->bindValue(':cat', $cat, SQLITE3_TEXT);
    $results = $query->execute();
  } else {
    $count = $db->query('SELECT COUNT(*) FROM quotes1;');
    $count = $count->fetchArray()[0];
    $val = rand(1, $count);
    $results = $db->query(
      "SELECT Name, Quote_Category, Quote FROM quotes1 WHERE Quote_ID = $val;"
    );
  }

  $r = $results->fetchArray(SQLITE3_NUM);
  if(!$r) {
    $data = array('text' => null, 'author' => null, 'category' => null);
  } else {
    $author = explode(',', $r[0]);
    $data = array (
      'author' => trim("$author[1] $author[0]"),
      'category' => $r[1],
      'text' => $r[2]
    );
  }
  sendJson($data);

  $db->close();

}
?>
