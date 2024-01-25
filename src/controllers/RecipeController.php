<?php
session_start();
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class RecipeController extends AppController{
    private $messages = [];

    public function add_favorite(){
        if (!isset($_SESSION["id"])) {
            return $this->render('profile', ['messages' => ['User session not set.']]);
        }
        try{
            if ($this->isPost()) {
                $data = json_decode(file_get_contents("php://input"), true);

                $userId = $data['userId'];
                $recipeId = $data['recipeId'];
    
                $userRepository = new UserRepository();
                $userRepository->addFavorite($userId, $recipeId);
    
                $response = ['success' => true];
                if (json_last_error() === JSON_ERROR_NONE) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'JSON encoding error: ' . json_last_error_msg()]);
                }
                
                exit();
            }
        }   catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function get_favorites(){
        if (!isset($_SESSION["id"])) {
            return $this->render('profile', ['messages' => ['User session not set.']]);
        }

        try{
            if ($this->isPost()) {
                $data = json_decode(file_get_contents("php://input"), true);
                $userId = $data['userId'];
    
                $userRepository = new UserRepository();
                $favorites = $userRepository->getFavorites($userId);
    
                if (json_last_error() === JSON_ERROR_NONE) {
                    header('Content-Type: application/json');
                    echo json_encode(['favorites' => $favorites]);
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'JSON encoding error: ' . json_last_error_msg()]);
                }
                exit();
            }
        }   catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
        }
    }
}    
?>