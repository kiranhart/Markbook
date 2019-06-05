<head>
    <style>
        html, body {
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh;" class="container-fluid">

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
            <div id="data" class="container" style="margin-top: 100px;">
                <h2 class="text-center"><?php echo $data['studentData']->firstname . ' ' . $data['studentData']->lastname; ?></h2>
                <p class="lead text-center">Viewing the following student in <?php echo $data['classData']->classname . ' (' . $data['classData']->classcode . ')'; ?></p>
                <p id="report" class="lead text-center"><a href="#" class="btn btn-sm btn-success">Create Report</a></p>
                <?php 
                //echo URLROOT . '/classes/studentreport/' . $data['classData']->id . '/' . $data['studentData']->id;
                ?>
                <hr>
                <?php  
                    if ($data['assignmentResultCount'] > 0) {

                        // Variables for mark calculation system
                        $knowledgeWorth = $data['classData']->knowledge;
                        $thinkingWorth = $data['classData']->thinking;
                        $applicationWorth = $data['classData']->application;
                        $communicationWorth = $data['classData']->communication;
            
                        $knowledgeTotalMarks = 0;
                        $knowledgeGainMarks = 0;

                        $thinkingTotalMarks = 0;
                        $thinkingGainMarks = 0;

                        $applicationTotalMarks = 0;
                        $applicationGainMarks = 0;

                        $communicationTotalMarks = 0;
                        $communicationGainMarks = 0;

                        //EXAM CALCULATIONS

                        $knowledgeTotalMarksExam = 0;
                        $knowledgeGainMarksExam = 0;

                        $thinkingTotalMarksExam = 0;
                        $thinkingGainMarksExam = 0;

                        $applicationTotalMarksExam = 0;
                        $applicationGainMarksExam = 0;

                        $communicationTotalMarksExam = 0;
                        $communicationGainMarksExam = 0;

                        //EXAM AVERAGE

                        $knowledgeAverage = 0;
                        $thinkingAverage = 0;
                        $applicationAverage = 0;
                        $communicationAverage = 0;

                        $knowledgeAverageExam = 0;
                        $thinkingAverageExam = 0;
                        $applicationAverageExam = 0;
                        $communicationAverageExam = 0;

                        foreach ($data['allAssignments'] as $assignment) {
                            foreach ($data['assignmentResults'] as $result) {
                                if ($assignment->id == $result->assignmentid) {

                                    //Calculation for KTAC
                                    
                                    //Add KTAC total marks
                                    for ($i = 0; $i < $assignment->weight; $i++) {
                                        if ($assignment->isfinal == 0) {
                                            $knowledgeTotalMarks += $assignment->knowledge;
                                            $thinkingTotalMarks += $assignment->thinking;
                                            $applicationTotalMarks += $assignment->application;
                                            $communicationTotalMarks += $assignment->communication;

                                            //Add KTAC gained marks
                                            $knowledgeGainMarks += $result->knowledge;
                                            $thinkingGainMarks += $result->thinking;
                                            $applicationGainMarks += $result->application;
                                            $communicationGainMarks += $result->communication;
                                        } else {
                                            $knowledgeTotalMarksExam += $assignment->knowledge;
                                            $thinkingTotalMarksExam += $assignment->thinking;
                                            $applicationTotalMarksExam += $assignment->application;
                                            $communicationTotalMarksExam += $assignment->communication;

                                            //Add KTAC gained marks
                                            $knowledgeGainMarksExam += $result->knowledge;
                                            $thinkingGainMarksExam += $result->thinking;
                                            $applicationGainMarksExam += $result->application;
                                            $communicationGainMarksExam += $result->communication;
                                        }
                                    }
                                }
                            }
                        }

                        //Term / Exam / Final Marks
                        $termMark = 0;
                        $examMark = 0;
                        $finalMark = 0;

                        //Calculate the term marks
                        
                        if ($knowledgeTotalMarks != 0) {
                            $knowledgeAverage = number_format($knowledgeGainMarks / $knowledgeTotalMarks, 2, '.', '') * $knowledgeWorth;
                        }

                        if ($thinkingTotalMarks != 0) {
                            $thinkingAverage = number_format($thinkingGainMarks / $thinkingTotalMarks, 2, '.', '') * $thinkingWorth;
                        }

                        if ($applicationTotalMarks != 0) {
                            $applicationAverage = number_format($applicationGainMarks / $applicationTotalMarks, 2, '.', '') * $applicationWorth;
                        }

                        if ($communicationTotalMarks != 0) {
                            $communicationAverage = number_format($communicationGainMarks / $communicationTotalMarks, 2, '.', '') * $communicationWorth;
                        }

                        //////////////////////////////////

                        if ($knowledgeTotalMarksExam != 0) {
                            $knowledgeAverageExam = number_format($knowledgeGainMarksExam / $knowledgeTotalMarksExam, 2, '.', '') * $knowledgeWorth;
                        }

                        if ($thinkingTotalMarksExam != 0) {
                            $thinkingAverageExam = number_format($thinkingGainMarksExam / $thinkingTotalMarksExam, 2, '.', '') * $thinkingWorth;
                        }

                        if ($applicationTotalMarksExam != 0) {
                            $applicationAverageExam = number_format($applicationGainMarksExam / $applicationTotalMarksExam, 2, '.', '') * $applicationWorth;
                        }

                        if ($communicationTotalMarksExam != 0) {
                            $communicationAverageExam = number_format($communicationGainMarksExam / $communicationTotalMarksExam, 2, '.', '') * $communicationWorth;
                        }


                        $termMark = $knowledgeAverage + $thinkingAverage + $applicationAverage + $communicationAverage;
                        $examMark = $knowledgeAverageExam + $thinkingAverageExam + $applicationAverageExam + $communicationAverageExam;
                        $finalMark = ($examMark == 0) ? $termMark : number_format(($termMark * $data['classData']->termmark / 100) + ($examMark * $data['classData']->finalmark / 100), 2, '.', '');
                    }
                ?>
            
                <?php if ($data['assignmentResultCount'] > 0) : ?>
                    <div class="row">
                        <div class="col">
                            <!-- Average -->
                            <h4 class="text-center">Term Mark:</h4>
                            <p class="lead text-center"><?php echo $termMark;?>%</p>
                        </div>
                        <div class="col">
                            <h4 class="text-center">Exam Mark:</h4>
                            <p class="lead text-center"><?php echo $examMark;?>%</p>
                        </div>
                        <div class="col">
                            <h4 class="text-center">Final Mark:</h4>
                            <p class="lead text-center"><?php echo $finalMark;?>%</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h4 class="text-center">Knowledge Average:</h4>
                            <p class="lead text-center"><?php echo ($knowledgeAverage / $knowledgeWorth) * 100; ?>%</p>
                        </div>
                        <div class="col">
                            <h4 class="text-center">Thinking Average:</h4>
                            <p class="lead text-center"><?php echo ($thinkingAverage / $thinkingWorth) * 100; ?>%</p>
                        </div>
                        <div class="col">
                            <h4 class="text-center">Application Average:</h4>
                            <p class="lead text-center"><?php echo ($applicationAverage / $applicationWorth) * 100; ?>%</p>
                        </div>
                        <div class="col">
                            <h4 class="text-center">Comm Average:</h4>
                            <p class="lead text-center"><?php echo ($communicationAverage / $communicationWorth) * 100; ?>%</p>
                        </div>
                    </div>                    
                    <hr>
                <?php endif; ?>
                <br>
                <div class="row">
                    <div class="col text-center">
                        
                        <?php if ($data['assignmentResultCount'] < 1) : ?>
                            <h4>No Results</h4>
                            <p class="lead ">This student doesn't have any assignment marks.</p>  
                            <div class="col md-6-mx-auto">
                                <form action="<?php echo URLROOT . 'classes/student/' . $data['classData']->id . '/' . $data['studentData']->id; ?>" method="post">
                                    <div class="form-group">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <td>Name</td>
                                                    <td>Description</td>
                                                    <td>K</td>
                                                    <td>T</td>
                                                    <td>A</td>
                                                    <td>C</td>
                                                    <td>Weight</td>
                                                    <td>More</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data['allAssignments'] as $assignment) : ?>
                                                    <tr>
                                                        <td><?php echo $assignment->name; ?></td>
                                                        <td><?php echo $assignment->description; ?></td>
                                                        <td><?php echo $assignment->knowledge; ?></td>
                                                        <td><?php echo $assignment->thinking; ?></td>
                                                        <td><?php echo $assignment->application; ?></td>
                                                        <td><?php echo $assignment->communication; ?></td>
                                                        <td><?php echo $assignment->weight; ?></td>
                                                        <td><a href="<?php echo URLROOT . '/classes/addmark/' . $data['classData']->id . '/' . $data['studentData']->id . '/' . $assignment->id; ?>" class="btn btn-info">Add Marks</a></td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        <?php else : ?>
                            <br>
                            <h4>Assignment Results</h4>
                            <p class="lead">Listing marked assignments</p>
                            <div class="row">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <td>Name</td>
                                            <td>Description</td>
                                            <td>K</td>
                                            <td>T</td>
                                            <td>A</td>
                                            <td>C</td>
                                            <td>More</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['allAssignments'] as $assignment) : ?>
                                            <?php foreach($data['assignmentResults'] as $result) : ?>
                                                <?php if ($assignment->id == $result->assignmentid) : ?>
                                                    <tr>
                                                        <td><?php echo $assignment->name; ?></td>
                                                        <td><?php echo $assignment->description; ?></td>
                                                        <td><?php echo $result->knowledge . '/' . $assignment->knowledge; ?></td>
                                                        <td><?php echo $result->thinking . '/' . $assignment->thinking; ?></td>
                                                        <td><?php echo $result->application . '/' . $assignment->application; ?></td>
                                                        <td><?php echo $result->communication . '/' . $assignment->communication; ?></td>
                                                        <td><a href="<?php echo URLROOT . '/classes/addmark/' . $data['classData']->id . '/' . $data['studentData']->id . '/' . $assignment->id; ?>" class="btn btn-info">Edit</a></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach;?>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <br>
                            <h4>Unmarked Assignments</h4>
                            <p class="lead">Listing assignments that are missing marks.</p>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-bordered table-striped table-responsive">
                                        <thead class="thead-dark">
                                            <tr>
                                                <td>Name</td>
                                                <td>Description</td>
                                                <td>Score</td>
                                                <td>Total Marks</td>
                                                <td>Weight</td>
                                                <td>More</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $assignments = array();
                                            $results = array();
            
                                            foreach ($data['allAssignments'] as $aa) {
                                                array_push($assignments, $aa->id);
                                            }
            
                                            foreach ($data['assignmentResults'] as $rr) {
                                                array_push($results, $rr->id);
                                            }
                                            ?>
            
                                            <?php foreach($data['allAssignments'] as $aa) : ?>
                                                <?php if (in_array($aa->id, array_diff($assignments, $results))) : ?>
                                                    <tr>
                                                        <td><?php echo $aa->name; ?></td>
                                                        <td><?php echo $aa->description; ?></td>
                                                        <td>0</td>
                                                        <td><?php echo $assignment->marks; ?></td>
                                                        <td><?php echo $assignment->weight; ?></td>
                                                        <td><a href="<?php echo URLROOT . '/classes/addmark/' . $data['classData']->id . '/' . $data['studentData']->id . '/' . $aa->id; ?>" class="btn btn-info">Add Marks</a></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>

    var doc = new jsPDF('p', 'pt', 'letter');

    $("#report").click(() => {
        
        html2canvas(document.body, {
            onrendered: function(canvas) {
                var img = canvas.toDataURL('image/png');
                var doc = new jsPDF("portrait", "mm", "a4");
                doc.addImage(img, "JPEG", 20, 20);
                doc.save("test.pdf");
            }
        });

    });
</script>
