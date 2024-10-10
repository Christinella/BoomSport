<?php
include_once __DIR__ . "/../../Includes/navbar.php";
?>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <h2 class="text-center my-4">Ajouter un nouveau programme</h2>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_GET['error']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_GET['success']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= HOME_URL . 'admin/addprogram' ?>" method="post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du programme</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image du programme (URL)</label>
                        <input type="text" id="image" name="image" class="form-control" required>
                    </div>

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
                
                <div class="text-center my-4">
                    <a href="<?= HOME_URL . 'admin/allprograms' ?>" class="btn btn-secondary">Retourner</a>
                </div>
            </div>
        </div>
    </div>
</body>
