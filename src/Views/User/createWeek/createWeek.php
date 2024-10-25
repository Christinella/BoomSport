<?php
include_once __DIR__ . "/../../Includes/navbar.php";
?>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Choisissez votre Programme</h1>
    <form action="<?= HOME_URL . 'createWeek' ?>" method="POST">
        <div class="form-group">
            <label for="days">Choisissez un jour:</label>
            <select id="days" name="days" class="form-control" required>
                <option value="">Sélectionner un jour</option>
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
                <option value="Vendredi">Vendredi</option>
                <option value="Samedi">Samedi</option>
                <option value="Dimanche">Dimanche</option>
            </select>
        </div>
        <div id="selectedDay" class="mt-3"></div>
        <div class="form-group">
            <label for="program">Choisissez un programme:</label>
            <select id="program" name="program" class="form-control" required>
               
                <?php
                if (!empty($programs)): ?>
                <?php foreach ($programs as $program): ?>
                    <option value="<?= htmlspecialchars($program['ID_Program']) ?>">
                        <?= htmlspecialchars($program['name']) ?> 
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">Aucun programme disponible</option>
            <?php endif; ?>
            </select>
        </div>
     
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
</body>