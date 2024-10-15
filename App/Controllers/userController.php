<?php

use Google\Service\Area120Tables\Workspace;

class userController extends Controller
{
    public function index($values = null)
    { {


            if (!isset($_SESSION['user'])) {

                $params['title'] = 'Login';
                $this->render('user/login', $params, 'main');
            } else {

                $params['title'] = 'User view';
                $this->render('user/user', $params, 'main');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']); //Esborrem variable user
        $params['title'] = 'Login';
        $this->render('user/login', $params, 'main'); //tornem al login
        // header('Location: /user/login');
    }

    public function login()

    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Recuperem les dades via post
            $username = $_POST['username'] ?? null;
            $password = $_POST['pass'] ?? null;
            //Instanciem un nou model per comprovar credencials
            $user = new User;
            if (is_null($user->login($username, $password))) {
                //Si son incorrectes cridem a la vista amb el missatge corresponet
                $_SESSION['message_view'] = "Credencials incorrectes!";
                $this->index();
            } else {
                //Si son corectes desem l'usuari logejat
                $_SESSION['user'] = $user->login($username, $password);
                //Inicialitzem la vista de l'aplicació
                $params['title'] = "UserView";
                $this->render('user/user', $params, 'main');
            }
        }
    }
    public function register()
    {
        $params['title'] = 'Register';
        $this->render('user/register', $params, 'main');
    }

    public function registerProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $username = isset($_POST['username']) ? $_POST['username'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;
            $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
            $file = isset($_FILES['img_profile']) ? $_FILES['img_profile'] : null;

            // echo "<pre>";
            // var_dump($file);
            // echo "</pre>";

            if (!is_null($name) && !is_null($username) && !is_null($password) && !is_null($mail) && !is_null($file)) {

                $userModel = new User;
                if ($this->imageTypeOk($file)) {
                    $type = $file['type'];
                    $extension = explode('/', $type); //recuperem l'extensio
                    $filename = $name . '.' . $extension[1];
                }
                $newUser =
                    [
                        'id' => $_SESSION['id_user']++,
                        'name' => $name,
                        'username' => $username,
                        'password' => $password,
                        'admin' => false,
                        'token' => "",
                        'verificat' => true,
                        'img_profile' => $filename
                    ];


                $userModel->create($newUser);

                echo "<pre>";
                print_R($_SESSION);
                echo "</pre>";
            }
        }
    }

    private function imageTypeOk($file)
    {
        $type = $file['type'];
        //comprovem el tipus de fitxer (jpg, jpeg o png)
        if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png') {
            $path = __DIR__ . '/../../Public/Assets/img'; //El path on es desa al server
            if (! is_dir($path)) {
                mkdir($path, 0777); //si el dir no existeix el creem
            }
            return true;
        }
        return false;
    }

    private function userVerified()
    {
        return true;
    }

    public function profileView()
    {
        $params['title'] = 'Profile';
        $params['user'] = $_SESSION['user'];
        $this->render('user/profile', $params, 'main');
    }

    public function callAuthgoogle()
    {
        $client = new Google\Client;
        //Posem crednecials de Google
        $client->setClientId(CLIENT_ID);
        $client->setClientSecret(CLIENT_SECRET);
        $client->setRedirectUri(REDIRECT_URI);


        if (!isset($_GET["code"])) {
            $client->addScope("email");
            $client->addScope("profile");
            $url = $client->createAuthUrl();
            // header("Location: " . $url);
            header("Refresh: 5 ; URL=" . $url);
            echo "<h1>Redirecting to Google</h1>";
            echo "<p>If you are not redirected, please <a href='$url'>click here</a></p>";
            exit();
        } else {
            echo "<h1>Successfully authenticated</h1>";
            $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
        
            $client->setAccessToken($token["access_token"]);
        
            $oauth = new Google\Service\Oauth2($client);
        
            $userinfo = $oauth->userinfo->get();
        
            foreach ($userinfo as $key => $value) {
                echo "<p>";
                echo $key . "=" . $value;
                echo "</p>";
            }
        }





    }

 
}
