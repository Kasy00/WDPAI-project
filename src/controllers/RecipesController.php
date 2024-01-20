<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class RecipesController extends AppController{
    public function handleRecipes(){
        $data = json_decode(file_get_contents("php://input"), true);
        $ingredients = $data['ingredients'];

        $recipes = $this->callSpoonacularApi($ingredients);

        header('Content-type: application/json');
        echo json_encode($recipes);
    }

    private function callSpoonacularApi($ingredients){
        $apiKey = '43a9675a98214cf99e2f931732573d7a';
        $url = 'https://api.spoonacular.com/recipes/findByIngredients?apiKey='.$apiKey.'&ingredients='.implode(',', $ingredients).'&number=5&ranking=1';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        if ($response === false){
            die(curl_error($curl));
        }
        
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($statusCode != 200){
            die("Error: call failed: ".$statusCode." - ".$response);
        }

        curl_close($curl);

        return json_decode($response, true);
    }
}