<?php
// Inclusief de AIWrapper klasse
require_once 'classes/AIWrapper.php';

// Controleer of het formulier is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ingredients'])) {
    try {
        $ingredientsInput = trim($_POST['ingredients']);
        if (empty($ingredientsInput)) {
            throw new Exception("Geen ingrediënten opgegeven");
        }
        $ingredients = array_map('trim', explode(',', $ingredientsInput));

        $wrapper = new AIWrapper();

        $wrapper->processInput($ingredients);

        $response = $wrapper->getResponse();
        header('Location: index.php?message=' . urlencode($response));
        exit;
    } catch (Exception $e) {
        header('Location: index.php?message=' . urlencode('Error: ' . $e->getMessage()));
        exit;
    }
}
?>