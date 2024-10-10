<?php

include_once __DIR__ . "/../../Includes/navbar.php";


?>

<body>
    <div class="container my-5">
        <?php if (isset($sport)): ?>
            <h2 class="text-center mb-4">Modifier le Sport</h2>
            <form action="<?= HOME_URL . 'admin/editsport?name=' . urlencode($sport->getName()) ?>" method="post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du sport</label>
                    <input type="text" id="name" name="name" class="form-control" required value="<?= htmlspecialchars($sport->getName()) ?>">
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Image du sport (URL)</label>
                    <input type="text" id="image" name="image" class="form-control" required value="<?= htmlspecialchars($sport->getImage()) ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" required rows="4"><?= htmlspecialchars($sport->getDescription()) ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-20">Enregistrer</button>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center mt-4">Sport non trouvé ou erreur lors du chargement.</div>
        <?php endif; ?>
    </div>
</body>



