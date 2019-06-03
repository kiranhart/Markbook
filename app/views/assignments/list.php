<head>
    <style>
        html, body {
            overflow-y: hidden;
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh;" class="container-fluid">

    <div class="row">
        <div class="d-none d-md-block col-md-2 col-lg-2 col-xl-2" style="height: 100vh; background-color: #272e38;">
            <h4 class="text-center text-white mt-5"><?php echo $_SESSION['user_data']->prefix . '. ' . $_SESSION['user_data']->lastname; ?></h4>
            <hr style="color: white; background-color: white;">
            <br>
            <a href="<?php echo URLROOT . '/users/home'; ?>" style="display: inline-block; vertical-align: middle;" class="btn btn-info btn-block mb-2" type="submit"><i class="material-icons mr-2" style="display: inline-block; vertical-align: middle;">dashboard</i>Dashboard</a>
            <a href="<?php echo URLROOT . '/students/list'; ?>" style="display: inline-block; vertical-align: middle;" class="btn btn-danger btn-block mb-2" type="submit"><i class="material-icons mr-2" style="display: inline-block; vertical-align: middle;">people</i>Students</a>
            <a href="<?php echo URLROOT . '/classes/list'; ?>" style="display: inline-block; vertical-align: middle;" class="btn btn-success btn-block mb-2" type="submit"><i class="material-icons mr-2" style="display: inline-block; vertical-align: middle;">class</i>Classes</a>
            <a href="<?php echo URLROOT . '/assignments/list'; ?>" style="display: inline-block; vertical-align: middle;" class="btn btn-warning text-white btn-block mb-2" type="submit"><i class="material-icons mr-2" style="display: inline-block; vertical-align: middle;">assignment</i>Assignments</a>
            <br><br>
            <hr style="color: white; background-color: white;">
            <br>
            <h6 class="text-center text-white">Markbook Info</h6>
            <p class="lead text-center text-white">
                Version: <?php echo VERSION; ?>
            </p>
        </div>
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
            <?php if ($data['assignmentCount'] < 1) : ?>
                <div class="container text-center">
                    <br><br>
                    <h2 class="align-middle">No Assignments Found</h2>  
                    <p class="lead">You currently do not have any assignments created under your account.</p>
            
                    <hr>
                    <br>
            
                    <div class="row">
                        <div class="col">    
                            <a role="button" href="<?php echo URLROOT . '/assignments/add'; ?>" class="btn btn-primary">Create Assignment</a>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="container text-center">
                    <br><br>
                    <h2 class="align-middle">Listing Assignments</h2>
            
                    <hr>
                    <br>
                    <div class="row">
                        <table id="assignmenttListTable" class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td>Name</td>
                                    <!-- <td>Description</td> -->
                                    <td>Marks</td>
                                    <td>Weight</td>
                                    <td>Knowledge</td>
                                    <td>Thinking</td>
                                    <td>Application</td>
                                    <td>Communication</td>
                                    <td>More</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['allAssignments'] as $assignment) : ?>
                                <tr>
                                    <td><?php echo $assignment->name; ?></td>
                                    <!-- <td><?php echo $assignment->description; ?></td> -->
                                    <td><?php echo $assignment->marks; ?></td>
                                    <td><?php echo $assignment->weight; ?></td>
                                    <td><?php echo $assignment->knowledge; ?></td>
                                    <td><?php echo $assignment->thinking; ?></td>
                                    <td><?php echo $assignment->application; ?></td>
                                    <td><?php echo $assignment->communication; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="<?php echo URLROOT . '/classes/show/'. $assignment->classid;?>" class="btn btn-info">View Class</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            
                    <hr>
                    <br>
            
                    <div class="row">
                        <div class="col">
                            <a href="<?php echo URLROOT . '/assignments/add'; ?>" class="btn btn-info">Create Assignment</a>
                        </div>
                    </div>
            
                    <br>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    
</script>