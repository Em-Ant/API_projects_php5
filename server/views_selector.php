<?php
function render_view($params) {

  $title = "php5 APIs|Index";
  $view_code = isset($params['view']) ? $params['view'] : "";
  $sub_path = preg_replace('/\/index.php.*/', '', $_SERVER['PHP_SELF']);
  $base_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http').
    '://'.$_SERVER['HTTP_HOST'].$sub_path;
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
    case "" :
      $view = 'views/project_index.php';
      break;
    default :
      http_response_code (404);
      $view = 'views/not_found.php';
  }

?>

<!DOCTYPE html>

<html>
<head>
  <title><?=$title?></title>
  <link rel="shortcut icon" href="<?=$sub_path?>/public/favicon.ico" type="image/x-icon"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <link href="<?=$sub_path?>/public/style.css" rel="stylesheet" type="text/css">
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
