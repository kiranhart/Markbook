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
            <?php if ($data['studentCount'] < 1) : ?>
                <div class="container text-center">
                    <br><br>
                    <h2 class="align-middle">No Students Found</h2>  
                    <p class="lead">You currently do not have any students created under your account.</p>

                    <hr>
                    <br>

                    <div class="row">
                        <div class="col">    
                            <a role="button" href="<?php echo URLROOT . '/students/add'; ?>" class="btn btn-primary">Create Student</a>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="container text-center">
                    <br><br>
                    <h2 class="align-middle">Listing Students</h2>
                    <p class="lead">Click on a student row to edit.</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <a href="<?php echo URLROOT . '/students/add'; ?>" class="btn btn-info">Create Student</a>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <table id="studentListTable" class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Birthday</td>
                                    <td>Email</td>
                                    <td>Student #</td>
                                    <td>Edit</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['allStudents'] as $student) : ?>
                                <tr>
                                    <td><?php echo $student->firstname; ?></td>
                                    <td><?php echo $student->lastname; ?></td>
                                    <td><?php echo $student->birthdate; ?></td>
                                    <td><?php echo $student->email; ?></td>
                                    <td><?php echo $student->studentnumber; ?></td>
                                    <td>
                                        <div class="row">
                                            <!-- <div class="col">
                                                <a href="<?php echo URLROOT . '/students/show/'. $student->id;?>" class="btn btn-info">More</a>
                                            </div> -->
                                            <div class="col">
                                                <a href="<?php echo URLROOT . '/students/remove/'. $student->id;?>" class="btn btn-danger">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>