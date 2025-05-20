<?php
class AIWrapper {
    private $apiKey;
    private $apiUrl = 'https://api.openai.com/v1/chat/completions';
    private $response = '';

    public function __construct() {
        if (!defined('API_KEY')) {
            require_once __DIR__ . '/../config/config.php';
        }
        $this->apiKey = API_KEY;
    }

    public function processInput($ingredients) {
        if (empty($ingredients)) {
            throw new Exception('No ingredients provided.');
        }

        // Format ingredients into a proper prompt
        $ingredientsList = implode(', ', $ingredients);
        $prompt = "Maak een recept met de volgende ingrediënten: {$ingredientsList}. Geef het recept in het Nederlands met een titel, ingrediëntenlijst, en stapsgewijze instructies.";

        // Initialize cURL session
        $ch = curl_init($this->apiUrl);

        // Prepare the request data
        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'Je bent een ervaren chef-kok die recepten maakt in het Nederlands.'],
                ['role' => 'user', 'content' => $prompt]
            ],
            'temperature' => 0.7
        ];

        // Set cURL options
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey
            ]
        ]);

        // Execute the request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            throw new Exception('API request failed: ' . curl_error($ch));
        }

        // Get HTTP status code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode !== 200) {
            throw new Exception('API request failed with status code: ' . $httpCode);
        }

        // Close cURL session
        curl_close($ch);

        // Parse the response
        $result = json_decode($response, true);
        
        if (isset($result['choices'][0]['message']['content'])) {
            $this->response = $result['choices'][0]['message']['content'];
        } else {
            throw new Exception('Invalid API response format');
        }

        return true;
    }

    public function getResponse() {
        return $this->response;
    }
}
