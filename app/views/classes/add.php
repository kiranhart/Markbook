<head>
    <style>
        html, body {
            overflow-y: hidden;
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh;" class="container-fluid">

    <div class="row">
        <div class="d-none d-md-block col-md-2 col-lg-2 col-xl-2" style="height: 100vh; background-color: #272e38;">
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
                    <div class="col md-6-mx-auto">
                        <div class="card card-body bg-light mt-5">
                            <h2 class="text-center">Create Class</h2>
                            <p class="text-center lead">Enter class information below</p>
                            <form action="<?php echo URLROOT . '/classes/add'; ?>" method="post">
                                
                                <div class="form-row">
                                    <div class="col">
                                        <!-- Class Name Input -->
                                        <div class="form-group">
                                            <label for="classname">Class Name: <sup>*</sup></label>
                                            <input type="text" name="classname" class="form-control <?php echo (!empty($data['classname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classname']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classname_err']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- Class Code Input -->
                                        <div class="form-group">
                                            <label for="classcode">Class Code: <sup>*</sup></label>
                                            <input type="text" name="classcode" class="form-control <?php echo (!empty($data['classcode_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classcode']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classcode_err']; ?></span>
                                        </div>    
                                    </div>
                                </div>
            
                                <div class="form-row">
                                    <div class="col">
                                        <!-- Class Description Input -->
                                        <div class="form-group">
                                            <label for="classdescription">Class Desc: <sup>*</sup></label>
                                            <input type="text" name="classdescription" class="form-control <?php echo (!empty($data['classdescription_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classdescription']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classdescription_err']; ?></span>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="form-row">
                                    <div class="col-12 col-sm-12 col-md col-lg col-xl">
                                        <!-- Knowledge -->
                                        <div class="form-group">
                                            <label for="classknowledge">Knowledge: <sup>*</sup></label>
                                            <input type="number" min="0" name="classknowledge" class="form-control <?php echo (!empty($data['classknowledge_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classknowledge']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classknowledge_err']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md col-lg col-xl">
                                        <!-- Thinking -->
                                        <div class="form-group">
                                            <label for="classthinking">Thinking: <sup>*</sup></label>
                                            <input type="number" min="0" name="classthinking" class="form-control <?php echo (!empty($data['classthinking_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classthinking']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classthinking_err']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md col-lg col-xl">
                                        <!-- Application -->
                                        <div class="form-group">
                                            <label for="classapplication">Application: <sup>*</sup></label>
                                            <input type="number" min="0" name="classapplication" class="form-control <?php echo (!empty($data['classapplication_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classapplication']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classapplication_err']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md col-lg col-xl">
                                        <!-- Communication -->
                                        <div class="form-group">
                                            <label for="classcommunication">Communication: <sup>*</sup></label>
                                            <input type="number" min="0" name="classcommunication" class="form-control <?php echo (!empty($data['classcommunication_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classcommunication']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classcommunication_err']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-sm-12 col-md col-lg col-xl">
                                        <div class="form-group">
                                            <label for="classterm">Term %: <sup>*</sup></label>
                                            <input type="number" min="1" max="100" name="classterm" class="form-control <?php echo (!empty($data['classterm_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classterm']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classterm_err']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md col-lg col-xl">
                                        <div class="form-group">
                                            <label for="classfinal">Final %: <sup>*</sup></label>
                                            <input type="number" min="1" max="100" name="classfinal" class="form-control <?php echo (!empty($data['classfinal_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['classfinal']; ?>">
                                            <span class="invalid-feedback"><?php echo $data['classfinal_err']; ?></span>
                                        </div>
                                    </div>
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
            
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
