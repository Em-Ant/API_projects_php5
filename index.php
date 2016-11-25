<?php
$title = "php5 APIs|Index";
$view_code = $_GET['v'];
$base_url = ($_SERVER['HTTPS'] ? 'https' : 'http').
  '://'.$_SERVER['HTTP_HOST'].
  str_replace('/index.php', '', $_SERVER['PHP_SELF']);
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
    if($view_code) echo " | <a href=\"$base_url\">index &lt;&lt;</a>";
?>
    </p>
  </div>
</body>
</html>
