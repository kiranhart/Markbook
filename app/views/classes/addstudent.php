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