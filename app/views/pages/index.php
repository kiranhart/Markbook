<head>
    <style>
        body, html {
            background-image: url(<?php echo URLROOT . '/images/pages/eberhard-gloss.jpg';?>);
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="margin-top: 11%; height: 100vh"class="container-fluid text-center text-white">
    <div class="row">
        <div class="col">
            <h1 class="display-1">Markbook</h1>
            <p class="lead">A simple way to grade assignments</p>
            <a href="<?php echo URLROOT . '/users/register';?>" class="btn btn-lg btn-success rounded-0 mt-5">Sign up</a>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>