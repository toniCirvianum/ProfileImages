<?php
use App\Router;

if (!isset($_SESSION)) {
    session_start();
    $_SESSION['message_view']=null;


}

require_once('vendor/autoload.php');
require_once('App/credentials.php');

require_once('App/Router.php');
require_once('App/Core/Controller.php');
require_once('App/Model/Orm.php');
require_once('App/Model/User.php');
require_once('App/config.php');


$myRouter = new Router();
$myRouter->run();
