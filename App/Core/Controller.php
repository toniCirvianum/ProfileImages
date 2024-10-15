<?php



class Controller {
    protected function render($path,$params=[],$layout=""){
        //rennderitzar la vista
        ob_start();
        require_once(__DIR__ . "/../Views/" . $path . ".view.php");
        $params['content']=ob_get_clean();
        require_once(__DIR__ . "/../Views/layouts/" . $layout . ".layout.php");
        
    
    }
}

?>