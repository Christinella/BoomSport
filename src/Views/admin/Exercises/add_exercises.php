<?php
include_once __DIR__ . "/../../Includes/navbarAdmin.php";
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center my-4">Ajouter un nouveau exercice</h2>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
                <?php endif; ?>

                <form action="<?= HOME_URL . 'admin/addexercise' ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom de l'exercise</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image de l'exercise</label>
                        <input type="text" id="image" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="serie" class="form-label">Nombre de serie</label>
                        <input type="text" id="serie" name="serie" class="form-control" required>
                    </div>

                    <!-- Sport Selection Dropdown -->
                
                    <div class="mb-3">
                        <label for="ID_Program" class="form-label">Sélectionner un programme</label>
                        <select id="ID_Program" name="ID_Program" class="form-control" required>
                            <option value="">Sélectionner un programme</option>
                            <?php foreach ($programs as $program): ?>
                                <option value="<?= $program['ID_Program'] ?>"><?= htmlspecialchars($program['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                  

                    <button type="submit" class="btn btn-primary w-100">Ajouter un exercice</button>
                </form>
            </div>
        </div>
    </div>
    <a href="<?= HOME_URL . 'admin/allexercises' ?>">Retourner</a>
</body>