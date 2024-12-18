<?php 
include_once __DIR__ . '/Includes/navbar.php';
?>

<div class="container">
    <div class="row">
        <?php if (!empty($exercises)): ?>
            <?php foreach ($exercises as $exercise): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?php echo htmlspecialchars($exercise['name']); ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Image : 
                                    <img src="<?php echo $exercise['image']; ?>" 
                                         alt="<?php echo htmlspecialchars($exercise['name']); ?>" 
                                         class="img-fluid">
                                </li>
                                <li class="list-group-item">
                                    Description : <?php echo htmlspecialchars($exercise['description']); ?>
                                </li>
                                <li class="list-group-item">
                                    Serie : <?php echo htmlspecialchars($exercise['serie']); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>Aucun exercice trouvé</p>
            </div>
        <?php endif; ?>
    </div>
</div>
