<head>
    <style>
        html, body {
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh;" class="container-fluid">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        <?php echo $class->classname; ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $class->classcode; ?></h5>
                                        <p class="card-text"><?php echo $class->classdescription; ?></p>
                                        <a href="<?php echo URLROOT . '/classes/show/' . $class->id; ?>" class="btn btn-outline-success">View More</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- <table class="table table-bordered table-striped">
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
                        </table> -->
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
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script></script>