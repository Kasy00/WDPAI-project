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
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }

        $firstName = $_POST["first-name"];
        $lastName = $_POST["last-name"];
        $email = $_POST["email-sign"];
        $password = $_POST["password-sign"];
        $passwordRepeat = $_POST["password-repeat"];

        if($password != $passwordRepeat){
            return $this->render('login', ['messages' => ['Passwords are different!']]);
        }

        if($userRepository->getUser($email)){
            return $this->render('login', ['messages' => ['User with this email already exists']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $user = new User($email, $hashedPassword, $firstName, $lastName);
        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You have been succesfully registered!']]);
    }
    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        return $this->render('login', ["messages" => ['You have been succesfully loggged out!']]);
    }


}