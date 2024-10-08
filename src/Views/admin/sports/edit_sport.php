<?php

include_once __DIR__ . "/../../Includes/navbarAdmin.php";


?>

<body>
<?php if (isset($sport)): ?>
    <form action="<?= HOME_URL . 'admin/editsport?name=' . urlencode($sport->getName()) ?>" method="post" enctype="multipart/form-data">
    
  
        <div class="mb-3">
            <label for="name" class="form-label">Nom du sport</label>
            <input type="text" id="name" name="name" class="form-control" required value="<?= htmlspecialchars($sport->getName()) ?>">

        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image du sport</label>
            <input type="text" id="image" name="image" class="form-control" required value="<?= htmlspecialchars($sport->getImage()) ?>">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" class="form-control" required value="<?= htmlspecialchars($sport->getDescription()) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Modifier le sport</button>
    </form>
<?php else: ?>
    <p>Sport non trouvé ou erreur lors du chargement.</p>
<?php endif; ?>

</body>


