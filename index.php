<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-primary d-flex align-items-center justify-content-center min-vh-100">
    <div class="container bg-white p-4 rounded shadow my-4" style="max-width: 600px;">
        <h1>AI Recpt Generator</h1>
        <p>Voer hieronder je ingrediënten in en ontvang een recept!</p>

        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="ingredients">Ingrediënten (Gescheiden voor kooma's):</label>
                <textarea id="ingredients" class="form-control mb-2" name="ingredients" rows="4" required placholder="bijv. uim knoflook, tomaat, pasta"></textarea>
            </div>
            <button type="submit">Genereer Recept</button>
        </form>

        <?php if (isset($_GET['message'])): ?>
            <div class="message">
                <?php echo htmlspecialchars($_GET['message']) ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>