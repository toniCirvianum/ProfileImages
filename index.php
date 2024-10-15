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



// echo "<pre>";
// print_R($_SESSION);
// echo "</pre>";



// spl_autoload_register(function($classe) {
//     str_replace('\\','/',$classe);
//     $classe=$classe.".php";
//     require_once($classe);
// });



$myRouter = new Router();
$myRouter->run();
