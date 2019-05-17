<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if ($data['classCount'] < 1) : ?>
    <div class="container text-center">
        <br><br>
        <h2 class="align-middle">No Classes Found</h2>  
        <p class="lead">You currently do not have any classes created, if you wish you can create one now.</p>

        <hr>
        <br>

        <div class="row">
            <div class="col">    
                <a role="button" href="<?php echo URLROOT . '/classes/add'; ?>" class="btn btn-primary">Create Class</a>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="container text-center">
        <br><br>
        <h2 class="align-middle">Listing your classes</h2>
        <p class="lead">To view class data, click on one of the cards</p>

        <hr>
        <br>

        <div class="row">
            <?php foreach ($data['allClasses'] as $class) : ?>
                <div class="card border-primary mx-1 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card-header"><?php echo $class->classname; ?></div>
                    <div class="card-body">
                        <h4 class="card-title">Class Code: <?php echo $class->classcode; ?></h4>
                        <p class="card-text"><?php echo $class->classdescription; ?></p>
                    </div>
                    <div class="card-footer">
                        <a role="button" href="<?php echo URLROOT . '/classes/view/' . $class->id; ?>" class="btn btn-primary">View class</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>