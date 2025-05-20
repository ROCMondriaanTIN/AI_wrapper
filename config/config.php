<?php
// Configuratiebestand voor API-instellingen
if (!getenv('OPENAI_API_KEY')) {
    // Try to load from .env file if it exists
    if (file_exists(__DIR__ . '/../.env')) {
        $envFile = file_get_contents(__DIR__ . '/../.env');
        $lines = explode("\n", $envFile);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                putenv(trim($key) . '=' . trim($value));
            }
        }
    }
}

// Get API key from environment variable
$apiKey = getenv('OPENAI_API_KEY');
if (!$apiKey) {
    throw new Exception('OPENAI_API_KEY environment variable is not set');
}

define('API_KEY', $apiKey);
// define('OPENAI_API_KEY', 'sk-xxxxxxxxxxxxxxxxxxxxxxxx');
