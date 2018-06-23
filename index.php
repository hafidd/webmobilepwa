
<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
function getCurrentUri()
{
  $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
  $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
  if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
  $uri = '/' . trim($uri, '/');
  return $uri;
}
$base_url = getCurrentUri();
$r = array();
$routes = explode('/', $base_url);
foreach($routes as $route)
{
  if(trim($route) != '')
    array_push($r, $route);
}
if(empty($r)) $r[0] = '';

switch ($r[0]) {
  case '':
  include 'pages/home.php';
  break;

  case 'kategori':
  include 'pages/kategori.php';
  break;

  case 'produk':
  include 'pages/produk.php';
  break;

  case 'cart':
  include 'pages/cart.php';
  break;

  case 'offline':
  include 'pages/offlinepage.php';
  break;

  case '404':
  include 'pages/404page.php';
  break;

  default:
  include 'pages/404page.php';
  break;
}
