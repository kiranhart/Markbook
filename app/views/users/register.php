<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center">Create An Account</h2>
            <p class="text-center">Please fill out this form to register for Markbook</p>
            <form action="<?php echo URLROOT . '/users/register'; ?>" method="POST">
                
                <!-- First Name -->
                <div class="form-group">
                    <label for="firstname">First Name: <sup>*</sup></label>
                    <input type="text" name="firstname" class="form-control form-control-lg <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
                    <span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label for="lastname">Last Name: <sup>*</sup></label>
                    <input type="text" name="lastname" class="form-control form-control-lg <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
                    <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
                </div>

                <!-- Prefix -->
                <div class="form-group">
                    <label for="prefix">Prefix: <sup>*</sup></label>
                    <input type="text" name="prefix" class="form-control form-control-lg <?php echo (!empty($data['prefix_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prefix']; ?>">
                    <span class="invalid-feedback"><?php echo $data['prefix_err']; ?></span>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>

                <!-- Sex -->
                <div class="form-group">
                    <label for="sex">Gender: <sup>*</sup></label>
                    <input type="text" name="sex" class="form-control form-control-lg <?php echo (!empty($data['sex_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['sex']; ?>">
                    <span class="invalid-feedback"><?php echo $data['sex_err']; ?></span>
                </div>

                <!-- Birthdate -->
                <div class="form-group">
                    <label for="birthdate">Birthday: <sup>*</sup></label>
                    <input type="text" name="birthdate" class="form-control form-control-lg <?php echo (!empty($data['birthdate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['birthdate']; ?>">
                    <span class="invalid-feedback"><?php echo $data['birthdate_err']; ?></span>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>

                <!-- Password Confirm -->
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirmpassword" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT . '/users/login'?>" class="btn btn-light btn-block">Have an account? Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>