<?php

class Router
{
  private $_routes = array();
  private $_path = '';

  function __construct($path=NULL) {
    if(!isset($path))
      $path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "";
    $this->_path = '/'.trim($path, '/')."/";
  }

  public function route($method, $route, $handler) {
      array_push($this->_routes, array(
        'method' => $method,
        'route' => $route,
        'handler' => $handler
      )
    );
  }

  public function run() {
    $params = array();
    foreach ($this->_routes as $r) {
      extract($r);
      if ($method == $_SERVER['REQUEST_METHOD'] || $method == "ALL") {
        if(is_null($route)){
          $handler();
          continue;
        }
        $m = $this->matchHelper($route, $params);
        if($m) {
          return $handler($params);
        }
      }
    }
    #TODO handle not matching routes
  }

  private function matchHelper($route, &$params) {
    preg_match_all("/\{(.+)\}/", $route, $params_keys);
    $params_keys = $params_keys[1];
    $r = "/".str_replace("/", "\/", $route)."\/?$/";
    $route_regex = preg_replace("/\{.+\}/", "([^\/]+)", $r );
    $m = preg_match($route_regex, $this->_path, $params_values);
    if($m) {
      $match = array_splice($params_values,0, 1)[0];
      $params = array_combine($params_keys, $params_values);
    }
    return $m;
  }
}
?>
