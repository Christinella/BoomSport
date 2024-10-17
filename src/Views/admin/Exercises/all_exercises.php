<?php

include_once __DIR__ . "/../../Includes/navbar.php";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tous les Exercices</h1>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>
    </div>
  

</div>

    <div class="row">
        <?php if (!empty($exercices)):?>
            <?php foreach ($exercices as $exercise): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?php echo htmlspecialchars($exercise['name']); ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                            
                                <li class="list-group-item">Image : <img src="<?php echo $exercise['image'];?>" alt="<?php echo htmlspecialchars($exercise['name']);?>" class="img-fluid"></li>
                                <li class="list-group-item">Description : <?php echo htmlspecialchars($exercise['description']); ?></li>
                                <li class="list-group-item">Serie : <?php echo htmlspecialchars($exercise['serie']); ?></li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="<?php echo HOME_URL . 'admin/editsport' . $exercise['ID_Program']; ?>" class="btn btn-primary">Modifier</a>
                                <form action="<?php echo HOME_URL . 'admin/allexercises/delete'; ?>" method="post" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette exercice ?');">
                                <input type="hidden" name="ID_Exercise" value="<?php echo htmlspecialchars($exercise['ID_Exercise']); ?>" >    
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun exercice trouvé</p>
        <?php endif; ?>
    </div>

    <a href="<?= HOME_URL . 'admin/addexercise' ?>" class="btn btn-primary">Créer un nouveau exercice</a>
</main>
