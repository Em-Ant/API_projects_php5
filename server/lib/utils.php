<?php

function sendJson($data) {
  header('Content-Type: text/javascript; charset=utf8');
  if(isset($_GET['callback'])) {
    echo $_GET['callback'].'('.json_encode( $data).');';
  } else {
    header('Content-type: application/json');
    echo json_encode( $data, JSON_UNESCAPED_SLASHES );
  }
}

function notFound() {
    $data = array('error' => 'not found', 'status' => 404);
    http_response_code(404);
    sendJson($data);
}

function serverError() {
    $data = array('error' => 'server error', 'status' => 500);
    http_response_code(500);
    sendJson($data);
}

function enable_cors() {
  header('Access-Control-Allow-Origin:*');
  header('Access-Control-Allow-Headers:content-type,accept,origin');
  header('Access-Control-Allow-Methods:GET,POST,OPTIONS');
}

function parse_json_body() {
  if(isset($_SERVER['CONTENT_TYPE']) &&
    $_SERVER['CONTENT_TYPE'] == 'application/json') {
      $raw_body = file_get_contents('php://input');
      $GLOBALS['REQ_BODY_JSON'] = json_decode($raw_body, true);
    }
}

function read_env($file='.env') {
  $handle = @fopen($file, 'r');
  $vars = array();
  if($handle) {
    while(!feof($handle)) {
      $line = stream_get_line($handle, 10000, "\n");
      if(!$line || $line{0} == "#") continue;
      list($key, $val) = explode("=",$line);
      if(isset($key)) {
        $val = trim($val, "\"'");
        $vars["ENV_$key"] = $val;
      }
    }
    fclose($handle);
  }
  return $vars;
}
?>
