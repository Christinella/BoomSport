<?php
include_once __DIR__ . '/Includes/navbar.php';
include_once __DIR__ . '/Includes/header.php';
?>
<div class="row justify-content-center">
    <?php if (!empty($sports)): ?>
        <?php foreach ($sports as $sport): ?>
            <div class="col-12 col-sm-6 col-md-4 mb-4 d-flex justify-content-center">
                <div class="card small-card shadow-sm">
                    <div class="card-header text-center">
                        <h4 class="my-0 font-weight-normal"><?php echo htmlspecialchars($sport['name']); ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <a href="<?= HOME_URL . 'program?ID_Sport=' . $sport['ID_Sport'] ?>">
                                <li class="list-group-item text-center">
                                    <img src="<?php echo htmlspecialchars($sport['image']); ?>" alt="<?php echo htmlspecialchars($sport['name']); ?>" class="img-fluid">
                                </li>
                            </a>
                            <li class="list-group-item text-center">
                                <?php echo htmlspecialchars($sport['description']); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun sport n'a été trouvé.</p>
    <?php endif; ?>
</div>
<?php include_once __DIR__ . "/Includes/footer.php"; ?>