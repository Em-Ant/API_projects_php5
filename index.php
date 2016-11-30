<?php

require_once 'server/lib/router.php';
require_once 'server/lib/utils.php';

require_once 'server/whoami.php';
require_once 'server/timestamp.php';
require_once 'server/quotes.php';
require_once 'server/shurl.php';
require_once 'server/imgsearch.php';
require_once 'server/fileanalyse.php';
require_once 'server/views_selector.php';

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

$app->route('GET','/{view}', 'render_view');
$app->route('GET','/', 'render_view');


$app->run();

?>
