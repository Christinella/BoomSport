<?php

include_once __DIR__ . "/../../Includes/navbarAdmin.php";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tous les Programmes</h1>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>
    </div>
    <div class="text-center mb-4">
    <a href="<?= HOME_URL . 'admin' ?>" class="btn btn-secondary">Retour</a>
</div>

    <div class="row">
        <?php if (!empty($programs)): ?>
            <?php foreach ($programs as $program): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?php echo htmlspecialchars($program['name']); ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                            
                                <li class="list-group-item">Image : <img src="<?php echo $program['image'];?>" alt="<?php echo htmlspecialchars($program['name']);?>" class="img-fluid"></li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="<?php echo HOME_URL . 'admin/editsport' . $program['ID_Program']; ?>" class="btn btn-primary">Modifier</a>
                                <form action="<?php echo HOME_URL . 'admin/deletesport' . $program['ID_Program']; ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun programme trouvé</p>
        <?php endif; ?>
    </div>

    <a href="<?= HOME_URL . 'admin/addprogram' ?>" class="btn btn-primary">Créer un nouveau programme</a>
</main>