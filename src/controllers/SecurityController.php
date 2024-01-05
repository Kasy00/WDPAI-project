<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    public function login(){
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User does not exist!']]);
        }

        if ($user->getEmail() !== $email){
            return $this->render('login', ['messages' => ['Incorrect login details!']]);
        }

        if ($user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Incorrect login details!']]);
        }

        session_start();

        $_SESSION["email"] = $user->getEmail();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
        return;
    }

    public function register(){
        //TODO
    }
    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        return $this->render('login', ["messages" => ['You have been succesfully loggged out!']]);
    }


}