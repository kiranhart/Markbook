<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col md-6-mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center"><?php echo $data['classData']->classname; ?></h2>
                <p class="text-center lead">Select a student to add to class</p>
                <form action="<?php echo URLROOT . '/classes/addstudent'; ?>" method="post">
                    
                    <!-- First / Last Name Input -->

                    <div class="form-group">
                        <label for="student">Student<sup>*</sup></label>
                        <select name="student" id="student" class="custom-select">
                            <?php foreach($data['allStudents'] as $student) :?>
                                <option value="<?php echo $student->id; ?>"><?php echo $student->firstname . ' ' . $student->lastname; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>