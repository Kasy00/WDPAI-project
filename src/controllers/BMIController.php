<?php
session_start();
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class BMIController extends AppController{
    private $messages = [];

    public function calculateBMI(){
        if (!isset($_SESSION["email"])) {
            return $this->render('profile', ['messages' => ['User session not set.']]);
        }

        $userRepository = new UserRepository();

        if($this->isPost()){
            $weight = $_POST["weight"];
            $height = $_POST["height"];
            $height = $height / 100;
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 2);
            $userID = $userRepository->getUserIdByEmail($_SESSION['email']);

            $userRepository->updateBMI($userID, $bmi);
            $_SESSION['bmi'] = $bmi;
            return $this->render('profile', ['messages' => ['BMI has been successfully updated!']]);
        }
        return $this->render('profile', ['messages' => ['Error in data receiving']]);
    }
}
?>