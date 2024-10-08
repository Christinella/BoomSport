
<?php

include_once __DIR__ . "/../../Includes/navbarUser.php";
?>
<div class="container mt-5">
    <div class="row week-planner justify-content-center">
        <?php 
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        foreach ($jours as $jour): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                <div class="day">
                    <h2><?= $jour ?></h2>
                    <button class="add-button" data-day="<?= $jour ?>">+</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div id="modal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Fais ton jour <span id="modal-day"></span></h2>
        <form id="activity-form">
            <div class="mb-3">
                <label for="ID_sport" class="form-label">Sélectionner un sport</label>
                <select id="ID_sport" name="ID_sport" class="form-control" required>
                    <option value="">Sélectionner un sport</option>
                    <?php foreach ($sports as $sport): ?>
                        <option value="<?= $sport['ID_Sport'] ?>"><?= htmlspecialchars($sport['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <label for="ID_program" class="form-label">Sélectionner un programme</label>
                <select id="ID_program" name="ID_program" class="form-control" required>
                    <option value="">Sélectionner un programme</option>
                    <?php foreach ($programs as $program): ?>
                                <option value="<?= $program['ID_Program'] ?>"><?= htmlspecialchars($program['name']) ?></option>
                            <?php endforeach; ?>
                </select>

            <div class="mb-3">
            <label for="ID_Exercise" class="form-label">Sélectionner un exercise</label>
                <select id="ID_Exercise" name="ID_Exercise" class="form-control" required>
                    <option value="">Sélectionner un exercise</option>
                    <?php foreach ( $exercises as $exercise): ?>
                        <option value="<?= $exercise['ID_Exercise'] ?>"><?= htmlspecialchars($exercise['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" id="day" name="day" value="">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
</div>
