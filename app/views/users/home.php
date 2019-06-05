<head>
    <style>
        html, body {
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: auto;" class="container-fluid">

    <div class="row">
        <div class="d-none d-md-block col-md-2 col-lg-2 col-xl-2" style="height: auto; background-color: #272e38;">
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
                    <div class="col mt-3">
                        <h1 class="display-4 greeting text-center"><?php echo $_SESSION['user_data']->firstname;?></h1>
                    </div>
                </div>
                <hr>
                <div class="row">  
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                        <div class="list-group">
                            <?php foreach ($data['allClasses'] as $classes): ?>
                                <a href="<?php echo URLROOT . '/classes/show/' . $classes->id ;?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $classes->classname; ?></h5>
                                    </div>
                                    <p class="mb-1"><?php echo $classes->classdescription; ?></p>
                                </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                        <div class="list-group">
                            <?php foreach ($data['allStudents'] as $students): ?>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $students->firstname . ', ' . $students->lastname; ?></h5>
                                    </div>
                                    <p class="mb-1"><?php echo 'Birthday: ' . $students->birthdate . '<br>Student #: ' . $students->studentnumber; ?></p>
                                </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                        <div class="list-group">
                            <?php foreach ($data['loginDates'] as $dates): ?>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $dates->country . ', ' . $dates->continent; ?></h5>
                                    </div>
                                    <p class="mb-1">
                                        <?php 
                                            echo $dates->city .', ' . $dates->region . '<br>Lon: ' . $dates->longitude . ' Lat: ' . $dates->latitude . '<br>IP: ' . $dates->ip . '<br>Time: ' . $dates->time; 
                                        ?>
                                    </p>
                                </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    $(document).ready(() => {
        var theHours = new Date().getHours();
        var theMessage;
        var morning = ('Good Morning');
        var afternoon = ('Good Afternoon');
        var evening = ('Good Evening');
        var night = ('Good Night');

        if (theHours >= 0 && theHours < 12) {
            theMessage = morning;
        }

        if (theHours >= 12 && theHours < 18) {
            theMessage = afternoon;
        }

        if (theHours >= 18 && theHours < 21) {
            theMessage = evening;
        }

        if (theHours >= 21 && theHours <= 24) {
            theMessage = night;
        }

        $(".greeting").prepend(theMessage + ", ");
    });
</script>