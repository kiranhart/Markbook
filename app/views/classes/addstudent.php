<head>
    <style>
        html, body {
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
            <div class="container">
                <div class="row">
                    <div class="col md-6-mx-auto">
                        <div class="card card-body bg-light mt-5">
                            <h2 class="text-center"><?php echo $data['classData']->classname; ?></h2>
                            <p class="text-center lead">Select a student to add to class</p>
                            <form action="<?php echo URLROOT . '/classes/addstudent/' . $data['classData']->id; ?>" method="post">
                                
                                <!-- First / Last Name Input -->
            
                                <div class="form-group">
                                    <label for="student">Student<sup>*</sup></label>
                                    <select name="student" id="student" class="custom-select">
                                        <?php foreach($data['allStudents'] as $student) :?>
                                            <option value="<?php echo $student->id; ?>"><?php echo $student->firstname . ' ' . $student->lastname; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
            
                                <!-- Confirm Buttons -->
                                <div class="row">
                                    <div class="col">
                                        <input type="submit" value="Add" style="width: 50%; margin: 0 auto;" class="btn btn-success btn-block">
                                    </div>
                                </div>
            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>