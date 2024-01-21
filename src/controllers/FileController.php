<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class FileController extends AppController{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_FILES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function addAvatar(){
        if (!isset($_SESSION["email"])) {
            return $this->render('profile', ['messages' => ['User session not set.']]);
        }

        $userRepository = new UserRepository();
        $userEmail = $_SESSION["email"];
        

        if ($this->isPost() && is_uploaded_file($_FILES['profile-picture']['tmp_name']) && $this->validate($_FILES['profile-picture'])) {
            $targetPath = dirname(__DIR__) . self::UPLOAD_DIRECTORY . uniqid() . $_FILES['profile-picture']['name'];
            move_uploaded_file($_FILES['profile-picture']['tmp_name'], $targetPath);

            $_SESSION['avatar_path'] = $_FILES['profile-picture']['name'];
            $userRepository->updateUserAvatar($userEmail, $_FILES['profile-picture']['name']);
            return $this->render('profile', ['messages' => ['Avatar has been successfully updated!']]);
        }

        return $this->render('profile', ['messages' => ['Error in data receiving']]);
    }

    private function validate(array $file): bool{
        if ($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_FILES)){
            $this->messages[] = 'File type is not supported.';
            return false;
        }

        return true;
    }
}