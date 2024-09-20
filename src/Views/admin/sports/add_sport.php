<?php

include_once __DIR__ . "/../../Includes/navbarAdmin.php";
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center my-4">Ajouter un nouveau sport</h2>
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                <?php endif; ?>
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
                <?php endif; ?>
                <form action="<?= HOME_URL . 'admin/addsport' ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du sport</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image du sport</label>
                        <input type="text" id="image" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Ajouter le sport</button>
                </form>
            </div>
        </div>
    </div>
    <a href="<?= HOME_URL . 'admin/allsports' ?>">Retourner</a>