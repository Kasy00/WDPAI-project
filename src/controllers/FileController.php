<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class FileController extends AppController{
    public function addAvatar(){
        $this->render('profile');
    }
}