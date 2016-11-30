<?php
function timestamp($params) {

  $date_string = $params['date'];
  if(preg_match("/^\d+$/", $date_string))
    $date_string = '@'.$date_string;
  $date = date_create($date_string, new DateTimeZone('UTC'));
  if($date) {
    $data = array(
      'unix' => date_timestamp_get($date),
      'natural' => date_format($date, 'F, j Y')
    );
  } else {
    $data = array(
      'unix' => Null,
      'natural' => Null
    );
  }

  sendJson($data);
}
?>
