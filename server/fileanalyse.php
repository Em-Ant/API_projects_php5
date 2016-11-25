<?php
function fileanalyse() {
  if($_FILES['userfile']) {
    sendJson(array(
      'name' => $_FILES['userfile']['name'],
      'type' => $_FILES['userfile']['type'],
      'size' => $_FILES['userfile']['size']
    ));
  } else {
    serverError();
  }
}
?>
