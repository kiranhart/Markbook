<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="margin-top: 2%" class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center"><?php echo $data['assignmentData']->name; ?></h2>
            <p class="lead text-center"><?php echo $data['assignmentData']->description; ?></p>
        </div>
    </div>
    <hr>
    <div class="row">

        <form style="width: 100%" action="<?php echo URLROOT . '/classes/addmarks/' . $data['classData']->id . '/' . $data['assignmentData']->id; ?>" method="post">
            <div class="form-row">
                <?php foreach($data['fullStudents'] as $students) : ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-center"><h4><?php echo $students->firstname . ' ' . $students->lastname; ?></h4></div>
                                <hr>   
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <input type="text" class="form-control" value="<?php echo $students->id;?>" name="studentformid-<?php echo $students->id;?>" hidden="true">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="knowledgemarks-<?php echo $students->id;?>">Knowledge (<?php echo $data['assignmentData']->knowledge; ?>): <sup>*</sup></label>
                                    <input style="margin-bottom: 0;" type="number" min="0" max="<?php echo $data['assignmentData']->knowledge; ?>" step="0.01" name="knowledgemarks-<?php echo $students->id;?>" id="knowledgemarks" class="form-control" value="<?php echo $data['knowledgemarks']; ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="thinkingmarks-<?php echo $students->id;?>">Thinking (<?php echo $data['assignmentData']->thinking; ?>): <sup>*</sup></label>
                                    <input type="number" min="0" max="<?php echo $data['assignmentData']->thinking; ?>" step="0.01" name="thinkingmarks-<?php echo $students->id;?>" id="thinkingmarks" class="form-control" value="<?php echo $data['thinkingmarks']; ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="applicationmarks-<?php echo $students->id;?>">Application (<?php echo $data['assignmentData']->application; ?>): <sup>*</sup></label>
                                    <input type="number" min="0" max="<?php echo $data['assignmentData']->application; ?>" step="0.01" name="applicationmarks-<?php echo $students->id;?>" id="applicationmarks" class="form-control" value="<?php echo $data['applicationmarks']; ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="communicationmarks-<?php echo $students->id;?>">Communication (<?php echo $data['assignmentData']->communication; ?>): <sup>*</sup></label>
                                    <input type="number" min="0" max="<?php echo $data['assignmentData']->communication; ?>" step="0.01" name="communicationmarks-<?php echo $students->id;?>" id="communicationmarks" class="form-control" value="<?php echo $data['communicationmarks']; ?>">
                                </div> 
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <hr>
            <div class="form-row">
                <div class="col">
                    <input type="submit" value="Save" style="width: 25%; margin: 0 auto;" class="btn btn-success btn-block">
                </div>
            </div>
        </form>

        <!-- LIST ALL OF THE STUDENTS -->
        <!--<?php foreach($data['fullStudents'] as $students) : ?>

            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center"><h4><?php echo $students->firstname . ' ' . $students->lastname; ?></h4></div>
                        <hr>
                        <form action="<?php echo URLROOT . '/classes/addmarks/' . $data['classData']->id . '/' . $data['assignmentData']->id; ?>" method="post">
                            <div class="form-row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <input type="text" class="form-control" value="<?php echo $students->id;?>" name="studentformid" hidden="true">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="knowledgemarks">Knowledge (<?php echo $data['assignmentData']->knowledge; ?>): <sup>*</sup></label>
									<input style="margin-bottom: 0;" type="number" min="0" max="<?php echo $data['assignmentData']->knowledge; ?>" step="0.01" name="knowledgemarks" id="knowledgemarks" class="form-control" value="<?php echo $data['knowledgemarks']; ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="thinkingmarks">Thinking (<?php echo $data['assignmentData']->thinking; ?>): <sup>*</sup></label>
                                    <input type="number" min="0" max="<?php echo $data['assignmentData']->thinking; ?>" step="0.01" name="thinkingmarks" id="thinkingmarks" class="form-control" value="<?php echo $data['thinkingmarks']; ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="applicationmarks">Application (<?php echo $data['assignmentData']->application; ?>): <sup>*</sup></label>
                                    <input type="number" min="0" max="<?php echo $data['assignmentData']->application; ?>" step="0.01" name="applicationmarks" id="applicationmarks" class="form-control" value="<?php echo $data['applicationmarks']; ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12- col-lg-12 col-xl-12">
                                    <label for="communicationmarks">Communication (<?php echo $data['assignmentData']->communication; ?>): <sup>*</sup></label>
                                    <input type="number" min="0" max="<?php echo $data['assignmentData']->communication; ?>" step="0.01" name="communicationmarks" id="communicationmarks" class="form-control" value="<?php echo $data['communicationmarks']; ?>">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
								    <input type="submit" value="Save" style="width: 25%; margin: 0 auto;" class="btn btn-success btn-block">
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>-->
    </div>
    <br>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>