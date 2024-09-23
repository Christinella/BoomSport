<?php
include_once __DIR__ . "/../../Includes/navbarAdmin.php";
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center my-4">Ajouter un nouveau programme</h2>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
                <?php endif; ?>

                <form action="<?= HOME_URL . 'admin/addprogram' ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du programme</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image du programme</label>
                        <input type="text" id="image" name="image" class="form-control" required>
                    </div>

                    <!-- Sport Selection Dropdown -->
                    <div class="mb-3">
                        <label for="ID_sport" class="form-label">Sélectionner un sport</label>
                        <select id="ID_sport" name="ID_sport" class="form-control" required>
                            <option value="">Sélectionner un sport</option>
                            <?php foreach ($sports as $sport): ?>
                                <option value="<?= $sport['ID_Sport'] ?>"><?= htmlspecialchars($sport['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Ajouter le programme</button>
                </form>
            </div>
        </div>
    </div>
    <a href="<?= HOME_URL . 'admin/allprograms' ?>">Retourner</a>
</body>