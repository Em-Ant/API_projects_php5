<?php
function greetings($path) {

  $source = null;
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $source = $_GET;
  } else {
    $source = $_POST;
  }
  $name = $source['name'];

  if(!$name){
    if ($GLOBALS['REQ_BODY_JSON']['name']) {
      $name = $GLOBALS['REQ_BODY_JSON']['name'];
    } else {
      $name = "Guest";
    }
  }

  $data = array(
    'greeting' => "Hello, $name!"
  );

  sendJson($data);
}
?>
