<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>AI Recept Generator</title>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="container p-5 my-4" style="max-width: 600px;">
        <div class="page-title">
            <i class="fas fa-utensils"></i>
            <h1>AI Recept Generator</h1>
        </div>
        <p class="text-center text-muted mb-4">Voer hieronder je ingrediënten in en ontvang een recept!</p>

        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="ingredients" class="form-label">
                    <i class="fas fa-list-ul me-2"></i>Ingrediënten (Gescheiden door komma's):
                </label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-carrot"></i>
                    </span>
                    <textarea id="ingredients" class="form-control" name="ingredients" rows="4" required 
                        placeholder="bijv. ui, knoflook, tomaat, pasta"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-magic me-2"></i>Genereer Recept
            </button>
        </form>

        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-info mt-4">
                <i class="fas fa-info-circle me-2"></i>
                <?php echo htmlspecialchars($_GET['message']) ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="./js/particles.js"></script>
</body>
</html>