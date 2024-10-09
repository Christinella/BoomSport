<div class="row">
        <?php if (!empty($sports)): ?>
            <?php foreach ($sports as $sport): ?>
                
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?php echo htmlspecialchars($sport['name']); ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                            
                                <li class="list-group-item">Image : <img src="<?php echo $sport['image'];?>" alt="<?php echo htmlspecialchars($sport['name']);?>" class="img-fluid"></li>
                                <li class="list-group-item">Description : <?php echo htmlspecialchars($sport['description']); ?></li>
                            </ul>
                           
</form>


</div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    
        <?php endif; ?>
    </div>