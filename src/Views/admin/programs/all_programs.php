<?php

include_once __DIR__ . "/../../Includes/navbar.php";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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

    <div class="row">
        <?php if (!empty($programs)): ?>
            <?php foreach ($programs as $program): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <img src="<?php echo $program['image']; ?>" alt="<?php echo htmlspecialchars($program['name']); ?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($program['name']); ?></h5>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="<?php echo HOME_URL . 'admin/editsport/' . $program['ID_Program']; ?>" class="btn btn-primary">Modifier</a>
                                
                                <form action="<?php echo HOME_URL . 'admin/allprograms/delete'; ?>" method="post" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce programme ?');">
                                <input type="hidden" name="ID_Program" value="<?php echo htmlspecialchars($program['ID_Program']); ?>" >    
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center">Aucun programme trouvé</div>
            </div>
        <?php endif; ?>
    </div>

    <div class="text-center my-4">
        <a href="<?= HOME_URL . 'admin/addprogram' ?>" class="btn btn-success">Créer un nouveau programme</a>
    </div>
</main>

