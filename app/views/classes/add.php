<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col md-6-mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center">Create Class</h2>
                <p class="text-center lead">Enter class information below</p>
                <form action="<?php echo URLROOT . '/classes/add'; ?>" method="post">
                    
                    <!-- Class Name Input -->
                    <div class="form-group">
                        <label for="classname">Class Name: <sup>*</sup></label>
                        <input type="text" name="classname" class="form-control form-control-lg <?php echo (!empty($data['classname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classname']; ?>">
                        <span class="invalid-feedback"><?php echo $data['classname_err']; ?></span>
                    </div>

                    <!-- Class Code Input -->
                    <div class="form-group">
                        <label for="classcode">Class Code: <sup>*</sup></label>
                        <input type="text" name="classcode" class="form-control form-control-lg <?php echo (!empty($data['classcode_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classcode']; ?>">
                        <span class="invalid-feedback"><?php echo $data['classcode_err']; ?></span>
                    </div>

                    <!-- Class Description Input -->
                    <div class="form-group">
                        <label for="classdescription">Class Desc: <sup>*</sup></label>
                        <input type="text" name="classdescription" class="form-control form-control-lg <?php echo (!empty($data['classdescription_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classdescription']; ?>">
                        <span class="invalid-feedback"><?php echo $data['classdescription_err']; ?></span>
                    </div>

                    <!-- Confirm Buttons -->
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Create" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
