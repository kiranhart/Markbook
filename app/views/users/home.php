<head>
    <style>
        html, body {
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: auto;" class="container-fluid">

    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                            <?php foreach ($data['allAssignments'] as $assignments): ?>
                                <a href="<?php echo URLROOT . '/classes/show/' . $assignments->classid; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $assignments->name; ?></h5>
                                    </div>
                                    <p class="mb-1"><?php echo $assignments->description; ?></p>
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