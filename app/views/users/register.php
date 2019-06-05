<head>
    <style>
        body {
            background-image: url(<?php echo URLROOT . '/images/pages/eberhard-gloss.jpg'; ?>);
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if (!isset($_SESSION['user_id'])) : ?>

<div style="margin-top: 10%;" class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mx-auto">
            <div style="border: none;" class="card shadow-lg">
                <div class="card-header text-white bg-dark">
                    <h1 class="text-center">Register</h1>
                </div>
                <div class="card-body container">
                    <form action="<?php echo URLROOT . '/users/register'; ?>" method="POST">
                        <!-- First Name -->
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="firstname">First Name: <sup>*</sup></label>
                                    <input type="text" name="firstname" class="single-line-input form-control <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Last Name -->
                                <div class="form-group">
                                    <label for="lastname">Last Name: <sup>*</sup></label>
                                    <input type="text" name="lastname" class="single-line-input form-control <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email: <sup>*</sup></label>
                                    <input type="email" name="email" class="single-line-input form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Birthdate -->
                                <div class="form-group">
                                    <label for="birthdate">Birthday: <sup>*</sup></label>
                                    <input type="date" name="birthdate" class="single-line-input form-control <?php echo (!empty($data['birthdate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['birthdate']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['birthdate_err']; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <!-- Prefix -->
                                <div class="form-group">
                                    <label for="prefix">Prefix: <sup>*</sup></label>
                                    <select name="prefix" id="prefix" class="custom-select single-line-input" value="<?php echo $data['prefix'] ?>">
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Mr">Mr</option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $data['prefix_err']; ?></span>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Sex -->
                                <div class="form-group">
                                    <label for="sex">Gender: <sup>*</sup></label>
                                    <select name="sex" id="sex" class="custom-select single-line-input" value="<?php echo $data['sex'] ?>">
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $data['sex_err']; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col">
                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password: <sup>*</sup></label>
                                    <input type="password" name="password" class="single-line-input form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Password Confirm -->
                                <div class="form-group">
                                    <label for="confirmpassword">Confirm Password: <sup>*</sup></label>
                                    <input type="password" name="confirmpassword" class="single-line-input form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                                </div>
                            </div>
                        </div>
                        <br>
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
    </div>
</div>
<?php else : ?>
    <?php redirect('users/home'); ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>