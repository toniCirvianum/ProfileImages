<?php




class defaultController extends Controller {
    public function index($values=null) {
        {

            if (!isset($_SESSION['user'])) {

                $params['title'] = 'Login';
                $this->render('user/login', $params, 'main');
            } else {
                $params['title'] = 'User view';
                $this->render('user/user', $params, 'main');
            }

            
    
    
        }
    }





}