<?php
function whoami($params) {

    $lang = "unknown";
    $sw = "unknown";

    // Match the first lang-code before ';'
    preg_match('/([\w-]+),?.*;/', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $match);
    if(isset($match[1])) $lang = $match[1];

    // Match the first string between parentheses, it is the OS related part
    preg_match('/\(([^\)]*)\)/', $_SERVER['HTTP_USER_AGENT'], $match);
    if(isset($match[1])) $sw = $match[1];

    $data = array(
      "ipaddress" => get_client_ip(),
      "language" => $lang,
      "software" => $sw
    );

    sendJson($data);
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>
