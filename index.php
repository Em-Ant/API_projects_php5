<?php

require_once 'lib/router.php';
require_once 'lib/utils.php';

require_once 'controllers/whoami.php';
require_once 'controllers/timestamp.php';
require_once 'controllers/quotes.php';
require_once 'controllers/shurl.php';
require_once 'controllers/imgsearch.php';
require_once 'controllers/fileanalyse.php';
require_once 'controllers/indexHandler.php';

$dbpath = 'db/data.db';
$app = new Router();

$app->route('ALL', NULL ,'enable_cors');
$app->route('ALL', NULL ,'parse_json_body');

$app->route('GET','/api/timestamp/{date}', 'timestamp');
$app->route('GET','/api/timestamp', 'timestamp');
$app->route('GET','/api/whoami', 'whoami');
$app->route('GET','/api/quotes', 'quotes');
$app->route('POST','/api/shurl/new', 'shurl_add');
$app->route('GET','/api/shurl/{id}', 'shurl_get_redirect');
$app->route('GET','/api/imgsearch/latest', 'get_latest_searches');
$app->route('GET','/api/imgsearch/{keyword}', 'search_images');
$app->route('POST','/api/fileanalyse', 'fileanalyse');

$app->route('ALL', '/api', 'api_not_found');
$app->route('ALL', '/api/{unknown}', 'api_not_found');

$app->route('GET','/', 'render_view');
$app->route('GET','/{view}', 'render_view');

$app->run();

function api_not_found($params) {
  http_response_code(404);
  sendJson(array('error' => 'not found'));
}
?>
