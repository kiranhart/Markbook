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

            <table class="table table-bordered table-striped table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <td>Name</td>
                        <td>Code</td>
                        <td>Desc</td>
                        <td>View</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['allClasses'] as $class) : ?>
                        <tr>
                            <td><?php echo $class->classname; ?></td>
                            <td><?php echo $class->classcode; ?></td>
                            <td><?php echo $class->classdescription; ?></td>
                            <td><a role="button" href="<?php echo URLROOT . '/classes/show/' . $class->id; ?>" class="btn btn-info">More</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
<script></script>