<?php

include_once __DIR__ . "/../../Includes/navbar.php";


?>

<body>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tous les Programmes</h1>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_GET['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_GET['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
    <div class="container my-5">
        <?php if (isset($program)): ?>
            <h2 class="text-center mb-4">Modifier le Program</h2>
            <form action="<?= HOME_URL . 'admin/editprogram?ID_Program=' .$program->getID_Program() ?>" method="post" class="bg-light p-4 rounded shadow-sm">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du programme</label>
                    <input type="text" id="name" name="name" class="form-control" required value="<?= htmlspecialchars($program->getName()) ?>">
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Image du programme (URL)</label>
                    <input type="text" id="image" name="image" class="form-control" required value="<?= htmlspecialchars($program->getImage()) ?>">
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

                <button type="submit" class="btn btn-primary w-20">Enregistrer</button>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center mt-4">Sport non trouvé ou erreur lors du chargement.</div>
        <?php endif; ?>
    </div>
</body>