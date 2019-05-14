<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="jumbotron center text-center">
        <h1 class="display-3">About Markbook</h1>
        <p class="lead">
        Markbook was designed to manage student grades in an easy to use way. With Markbook you can access your class 
        information anywhere in the world. Along with the web system, we offer a individual program which intergrates 
        with all of your existing information from the web-interface.
        </p>
        <p><a class="btn btn-lg btn-success" href="<?php echo URLROOT . '/users/login'; ?>" role="button">Login Now</a></p>
    </div>
    <div class="row marketing">
        <div class="col-lg-6">
            <h4>Version</h4>
            <p>Running v<?php echo VERSION; ?></p>
        </div>
        <div class="col-lg-6">
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>