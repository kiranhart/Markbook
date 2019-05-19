<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col md-6-mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center">Create Student</h2>
                <p class="text-center lead">Enter student information below</p>
                <form action="<?php echo URLROOT . '/students/add'; ?>" method="post">
                    
                    <!-- First / Last Name Input -->

                    <div class="form-group">
                        <label for="firstname">First Name: <sup>*</sup></label>
                        <input type="text" name="firstname" class="form-control <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
                        <span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name: <sup>*</sup></label>
                        <input type="text" name="lastname" class="form-control <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
                        <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Birthday: <sup>*</sup></label>
                        <input type="date" name="birthdate" class="form-control <?php echo (!empty($data['birthdate_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['birthdate_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>

                    <!-- Confirm Buttons -->
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Create" style="width: 50%; margin: 0 auto;" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
