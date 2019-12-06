<?php

ini_set("display_errors", 1);
ini_set("display_starup_error", 1);
error_reporting(E_ALL);

require_once ('../vendor/autoload.php');

session_start();

$dotenv = Dotenv\Dotenv::create(__DIR__ . "/..");
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv("DB_HOST"),
    'database'  => getenv("DB_NAME"),
    'username'  => getenv("DB_USER"),
    'password'  => getenv("DB_PASS"),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

use Aura\Router\RouterContainer;
$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();


$map->post('index', '/', [
  "controller" => "App\Controller\indexController",
  "action" => "indexAction"
]);
$map->post('addjob', 'PHP/job/add', [
  "controller" => "App\Controller\jobController",
  "action" => "getAddJobAction(request)"
]);
$map->post('addproject', 'PHP/project/add', [
  "controller" => "App\Controller\projectController",
  "action" => "getAddProjectAction(request)"
]);
$map->get('addUsers', '/PHP/users/add', [
  'controller' =>'App\Controller\UsersController',
  'action' => 'getAddUserAction'
]);
$map->post('saveUsers', '/PHP/users/add', [
  'controller' =>'App\Controller\UsersController',
  'action' => 'getAddUserAction'
]);
$map->get('loginform', '/PHP/login', [
  'controller' =>'App\Controller\AuthController',
  'action' => 'getLogin'
]);
$map->get('logoutform', '/PHP/logout', [
  'controller' =>'App\Controller\AuthController',
  'action' => 'getLogOut'
]);
$map->post('auth', 'PHP/auth', [
  'controller' =>'App\Controller\AuthController',
  'action' => 'postLogin'
]);
$map->post('admin', 'PHP/admin', [
  'controller' =>'App\Controller\AdminController',
  'action' => 'getIndex',
  "auth" => true
]);



$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

function ImprimirTrabajos($jobs)
{

echo '<li class="work-position">
<h5>'   . $jobs->title. ' </h5>
<p> ' .  $jobs->description . ' </p>
<p> ' . $jobs->getDurationAsString($jobs->months)  .  '
<br> </p>
<strong>Achievements:</strong>
<ul>
<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
</ul>
</li> ';
};

if (!$route){
  echo "no route";
}
else{
  $handlerdata = $route->handler;
  $controllerName = $handlerdata["controller"];
  $actionName = $handlerdata["action"];

  $needsAuth = $handlerdata["auth"] ? $handlerdata["auth"] : false;
  $sessionId = !$_SESSION["userId"];

  if($needsAuth && $sessionId){
    echo"protected route";
    die;
    $controllerName = 'App\Controllers\AuthController';
    $actionName= 'getLogin';
    $_SESSION['mensaje']= 'Ruta protegida debe ingresar su usuario y contraseña';
  }
  

  $controller = new $controllerName;
  $response = $controller->$actionName($request);



  foreach($response->getHeaders() as $values){
      foreach ($values as $value) {
        header( sprintf("%s: %s", $name, $value ), false );
        // code...
      }
  }
  http_response_code($response->getStatusCode() );

  echo $response->getBody();
}




//$route = $_GET["route"] ?? "/"; operador ternario de forma corta igual al de abajo
//$route = isset($_GET['route']) ? $_GET['route'] : '/';

//switch ($route){
  //case "addjob":
  //require "../addjob.php";
  //break;
  //case "addproject":
  //require "../addproject.php";
  //break;
 //case "/":
  //require "../index.php";
 //break;
//}
