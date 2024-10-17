<?php

include_once __DIR__ . "/../../Includes/navbar.php";

use src\Repositories\SportRepository;

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div id="message-container"></div> <!-- Div pour afficher les messages de succès ou d'erreur -->

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tous les Sports</h1>

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
        <?php if (!empty($sports)): ?>
            <?php foreach ($sports as $sport): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4" id="sport-card-<?php echo htmlspecialchars($sport['ID_Sport']); ?>">
                    <div class="card shadow-sm border-light">
                        <img src="<?php echo $sport['image'];?>" alt="<?php echo htmlspecialchars($sport['name']);?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($sport['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($sport['description']); ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="<?= HOME_URL . 'admin/editsport?ID_Sport=' .($sport['ID_Sport']) ?>" class="btn btn-primary">Modifier</a>
                                <form action="<?php echo HOME_URL . 'admin/allsports/delete'; ?>" method="post" class="d-inline">
                                    <input type="hidden" name="ID_Sport" value="<?php echo htmlspecialchars($sport['ID_Sport']); ?>">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center">Aucun sport trouvé.</div>
            </div>
        <?php endif; ?>
    </div>

    <div class="text-center my-4">
        <a href="<?= HOME_URL . 'admin/addsport' ?>" class="btn btn-success">Créer un Nouveau Sport</a>
    </div>

    
</main>
<?php

include_once __DIR__ . "/../../Includes/footer.php";

?>