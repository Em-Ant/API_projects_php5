<?php
function render_view() {
  $title = "php5 APIs|Index";
  $view_code = isset($GLOBALS['REQ_PARAMS']) ? $GLOBALS['REQ_PARAMS']['view'] : "";
  $base_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http').
    '://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
  switch ($view_code) {
    case "timestamp" :
      $ms_url = 'api/timestamp';
      $view = 'views/timestamp.php';
      $title = 'Timestamp microservice';
      break;
    case "whoami" :
      $ms_url = 'api/whoami';
      $view = 'views/whoami.php';
      $title = 'Request headers parser';
      break;
    case "shurl" :
      $ms_url = 'api/shurl';
      $view = 'views/shurl.php';
      $title = 'URL Shortener';
      break;
    case "quotes" :
      $ms_url = 'api/quotes';
      $view = 'views/quotes.php';
      $title = 'Random Quotes';
      break;
    case "fileanalyse" :
      $ms_url = 'api/fileanalyse';
      $view = 'views/fileanalyse.php';
      $title = 'File Analyser';
      break;
    case "imgsearch" :
      $ms_url = 'api/imgsearch';
      $view = 'views/imgsearch.php';
      $title = 'Image Search';
      break;
    default :
      $view = 'views/project_index.php';
  }

?>

<!DOCTYPE html>

<html>
<head>
  <title><?=$title?></title>
  <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <link href="public/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
  include $view;
?>
  <div class="footer">
    <p>
      by <a href="http://www.emant.altervista.org">em-ant</a> |
      <a href="https://github.com/Em-Ant">github</a> |
      <a href="http://codepen.io/Em-Ant/">codepen</a> |
      <a href="http://www.freecodecamp.com/em-ant">freeCodeCamp</a>
<?php
    if($view_code) echo " | <a href=\"$base_url\">&lt;&lt; index</a>";
?>
    </p>
  </div>
</body>
</html>
<?php
}
?>
