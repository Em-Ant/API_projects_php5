<?php
/*
function router($routeMap, $path) {

  if(!$path)
    $path = explode('/', trim($_SERVER['PATH_INFO'], '/'));

  $method = $_SERVER['REQUEST_METHOD'];
  $route = $path[0];
  $key = "{$method}:{$route}";
  $f = $routeMap[$key];
  if($f) {
    if(is_array($f)){
      $fn = $f[0];
      $f[0] = array_slice($path, 1);
      call_user_func_array($fn, $f);
    } else {
      $f(array_slice($path, 1));

    }
    return false;
  } else if($_SERVER['REQUEST_METHOD'] != 'OPTIONS' && $routeMap['NOT_FOUND']) {
    $routeMap['NOT_FOUND']();
    return false;
  }
  return true;
}

function exec_middleware($middleware) {
  foreach ($middleware as $m) {
    $m();
  }
}*/

function sendJson($data) {
  header('Content-Type: text/javascript; charset=utf8');
  if(isset($_GET['callback'])) {
    echo $_GET['callback'].'('.json_encode( $data).');';
  } else {
    header('Content-type: application/json');
    echo json_encode( $data );
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
  $contentType = $_SERVER['CONTENT_TYPE'];
  if($contentType == 'application/json') {
    $raw_body = file_get_contents('php://input');
    $GLOBALS['REQ_BODY_JSON'] = json_decode($raw_body, true);
  }
}

?>
