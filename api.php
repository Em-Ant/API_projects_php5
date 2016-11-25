<?php

require 'server/lib/router.php';

require 'server/whoami.php';
require 'server/timestamp.php';
require 'server/quotes.php';
require 'server/greetings.php';
require 'server/shurl.php';
require 'server/fileanalyse.php';

$dbpath = 'db/data.db';
$app = new Router();

$app->route('ALL', NULL ,'enable_cors');
$app->route('ALL', NULL ,'parse_json_body');

$app->route('GET','/timestamp/{date}', 'timestamp');
$app->route('GET','/timestamp', 'timestamp');
$app->route('GET','/whoami', 'whoami');
$app->route('GET','/quotes', 'quotes');
$app->route('GET','/greeter', 'greetings');
$app->route('POST','/greeter', 'greetings');
$app->route('POST','/shurl/new', 'shurl_add');
$app->route('GET','/shurl/{id}', 'shurl_get_redirect');
$app->route('POST','/fileanalyse', 'fileanalyse');

$app->route('GET','/extensions', 'extensions');

$app->run();

function extensions($path) {
	sendJson(get_loaded_extensions());
}

?>
