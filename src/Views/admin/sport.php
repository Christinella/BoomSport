<?php

include_once __DIR__ . "/../Includes/navbarAdmin.php";
?>
<body>
<form action="ajouter_sport.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Nom du sport</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image du sport</label>
        <input type="file" id="image" name="image" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" id="description" name="description" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter le sport</button>
</form>


