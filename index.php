<?php

require 'server/lib/router.php';

require 'server/whoami.php';
require 'server/timestamp.php';
require 'server/quotes.php';
require 'server/greetings.php';
require 'server/shurl.php';
require 'server/fileanalyse.php';
require 'server/views_selector.php';

$dbpath = 'db/data.db';
$app = new Router();

$app->route('ALL', NULL ,'enable_cors');
$app->route('ALL', NULL ,'parse_json_body');

$app->route('GET','/api/timestamp/{date}', 'timestamp');
$app->route('GET','/api/timestamp', 'timestamp');
$app->route('GET','/api/whoami', 'whoami');
$app->route('GET','/api/quotes', 'quotes');
$app->route('GET','/api/greeter', 'greetings');
$app->route('POST','/api/greeter', 'greetings');
$app->route('POST','/api/shurl/new', 'shurl_add');
$app->route('GET','/api/shurl/{id}', 'shurl_get_redirect');
$app->route('POST','/api/fileanalyse', 'fileanalyse');
$app->route('GET','/api/extensions', 'extensions');

$app->route('GET','/{view}', 'render_view');
$app->route('GET','/', 'render_view');

$app->run();

function extensions($path) {
	sendJson(get_loaded_extensions());
}

?>
