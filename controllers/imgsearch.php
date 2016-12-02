<?php
function search_images($params) {

  $env = read_env();
  $apikey = $env['ENV_GOOGLE_API_KEY'];
  $cx = $env['ENV_GOOGLE_SEARCH_ENGINE'];
  $keyword = $params['keyword'];

  $search_url = "https://www.googleapis.com/customsearch/v1".
    "?searchType=image&key=$apikey&cx=$cx&q=$keyword";

  try {
    global $dbpath;
    $db = new SQLite3($dbpath);
  } catch (Exception $e) {
    serverError();
    die();
  }

  if($_GET['offset']) $offset = (int) $_GET['offset'];
  if($offset) $search_url."&start=$offset";

  $query = json_decode(file_get_contents($search_url), true);
  $results = array();
  foreach($query['items'] as $item){
    $results[] = array(
      "url" => $item['link'],
      "snippet" => $item['snippet'],
      "thumbnail" => $item['image']['thumbnailLink'],
      "context" => $item['image']['contextLink']
    );
  }

  $query = $db->prepare('INSERT INTO img_queries (term) VALUES (:keyword);');
  $query->bindValue(':keyword', SQLite3::escapeString($keyword), SQLITE3_TEXT);
  $query->execute();

  // # remove old items
  // $db->query('DELETE FROM "img_queries" WHERE "time" <= datetime("now", "-10 days");');

  $db->close();

  sendJson($results);
};


function get_latest_searches() {
  try {
    global $dbpath;
    $db = new SQLite3($dbpath);
  } catch (Exception $e) {
    serverError();
    die();
  }

  $results = $db->query('SELECT "term", "time" FROM "img_queries" ORDER BY "time" DESC LIMIT 10');
  $out = array();
  while ($data = $results->fetchArray(SQLITE3_ASSOC)) {
    $out[] = $data;
  }
  sendJson($out);
};
?>
