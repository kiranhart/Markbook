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
                <div style="max-width: 360px" class="card bg-primary text-white my-2 mx-auto col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card-header"><?php echo $class->classname; ?></div>
                    <div class="card-body">
                        <p class="card-text"><strong>Class Code: </strong><?php echo $class->classcode; ?></p>
                        <p class="card-text"><?php echo $class->classdescription; ?></p>
                    </div>
                    <div class="card-footer">
                        <a role="button" href="<?php echo URLROOT . '/classes/show/' . $class->id; ?>" class="btn btn-success">View class</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <hr>
        <br>

        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT . '/classes/add'; ?>" class="btn btn-primary">Create Class</a>
            </div>
        </div>

    </div>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>