<head>
    <style>
        body {
            background: linear-gradient(237deg, #041e54, #570558, #580505, #a19a3a);
            background-size: 800% 800%;

            -webkit-animation: GradAnimationOne 53s ease infinite;
            -moz-animation: GradAnimationOne 53s ease infinite;
            animation: GradAnimationOne 53s ease infinite;
        }

    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if (!isset($_SESSION['user_id'])) : ?>
<div style="margin-top: 10%;" class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mx-auto">
            <div style="border: none;" class="card shadow-lg">
                <div class="card-header text-white aqua-purple-gradient">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body container">
                    <br><br>
                    <form action="<?php echo URLROOT . '/users/login'; ?>" method="post">
                        <div class="form-group">
                            <label for="email" class="">Email: <sup>*</sup></label>
                            <input style="" type="email" name="email" class="single-line-input form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="">Password: <sup>*</sup></label>
                            <input type="password" name="password" class="single-line-input form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="<?php echo URLROOT . '/users/register'?>" class="btn btn-light btn-block">Need account? Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <?php redirect('users/home'); ?>
<?php endif;?>
<?php require APPROOT . '/views/inc/footer.php'; ?>