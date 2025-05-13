<?php
class AIWrapper {
    private $ingredients = [];
    private $response = '';

    public function __construct() {
        if (!defined('API_KEY')) {
           require_once __DIR__ . '/../config/config.php';
        }
    }

    public function processInput($ingredients) {
        if (empty($ingredients)) {
            throw new Exception('Er zijn geen ingrediënten opgegeven.');
        }

        $this->ingredients = $ingredients;
        // Later hier API aanroepen
        return true;
        
    }

    public function getResponse() {
        // Voorlopig een standaard bericht teruggeven
        $ingredients = implode(', ', $this->ingredients);
        $this->response = "Recept met $ingredientsList wordt verwerkt";
        return $this->response;
    }
}
