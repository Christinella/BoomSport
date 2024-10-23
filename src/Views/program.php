<?php 
include_once __DIR__ . '/Includes/navbar.php';
?>

<div class="container">
    <div class="row">
        <?php if (!empty($programs)): ?>
            <?php foreach ($programs as $program): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?php echo htmlspecialchars($program['name']); ?></h4>
                        </div>
                        <div class="card-body">
                            <a href="<?= HOME_URL . 'exercice?ID_Program=' . $program['ID_Program'] ?>">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Image :
                                        <img src="<?php echo $program['image']; ?>" 
                                             alt="<?php echo htmlspecialchars($program['name']); ?>" 
                                             class="img-fluid">
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>Aucun programme trouvé</p>
            </div>
        <?php endif; ?>
    </div>
</div>
