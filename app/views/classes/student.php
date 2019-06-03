<head>
    <style>
        html, body {
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
                        
                        // Variables for default weighing system
                        $divdedByAmount = 0;
                        $sumOfMarks = 0;
                        
                        //Variables for K T A C 
                        $kr_sum = 0;
                        $tr_sum = 0;
                        $ar_sum = 0;
                        $cr_sum = 0;
            
                        //Variables for K T A C  div amount
                        $kr_div = 0;
                        $tr_div = 0;
                        $ar_div = 0;
                        $cr_div = 0;
            
            
                        foreach ($data['allAssignments'] as $assignment) {
                            foreach ($data['assignmentResults'] as $result) {
                                if ($assignment->id == $result->assignmentid) {
                                    
                                    //Weighing
                                    $divdedByAmount += $assignment->weight;
                                    $sumOfMarks += (($result->totalmarks / $assignment->marks) * 100) * $assignment->weight;
                                    
                                    // K T A C
                                    $kr_sum += $result->knowledge;
                                    $tr_sum += $result->thinking;
                                    $ar_sum += $result->application;
                                    $cr_sum += $result->communication;
            
                                    $kr_div += $assignment->knowledge;
                                    $tr_div += $assignment->thinking;
                                    $ar_div += $assignment->application;
                                    $cr_div += $assignment->communication;
                                }
                            }
                        }
            
            
                    }
                ?>
            
                <?php if ($data['assignmentResultCount'] > 0) : ?>
                    <div class="row">
                        <div class="col">
                            <h4 class="text-center">Average: <?php echo number_format($sumOfMarks / $divdedByAmount, 2, '.', '') . '%';?></h4>
                        </div>
                        <div class="col">
                            <h4 class="text-center">K/T/A/C Average: 
                            <?php 
            
                            $ktacres = $kr_sum + $tr_sum + $ar_sum + $cr_sum;
                            $ktacdivs = $kr_div + $tr_div + $ar_div + $cr_div;
                            
                            echo number_format(($ktacres / $ktacdivs) * 100, 2, '.', '') . '%';
            
                            ?>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h5 class="text-center">Knowledge Avg: <br><br><?php echo number_format(($kr_sum / $kr_div) * 100, 2, '.', '') . '%'; ?></h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center">Thinking Avg: <br><br><?php echo number_format(($tr_sum / $tr_div) * 100, 2, '.', '') . '%'; ?></h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center">Application Avg: <br><br><?php echo number_format(($ar_sum / $ar_div) * 100, 2, '.', '') . '%'; ?></h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center">Communication Avg: <br><br><?php echo number_format(($cr_sum / $cr_div) * 100, 2, '.', '') . '%'; ?></h5>
                        </div>
                    </div>
                    <div class="row">
                    
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
                                                    <td>Total Marks</td>
                                                    <td>Weight</td>
                                                    <td>More</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data['allAssignments'] as $assignment) : ?>
                                                    <tr>
                                                        <td><?php echo $assignment->name; ?></td>
                                                        <td><?php echo $assignment->description; ?></td>
                                                        <td><?php echo $assignment->marks; ?></td>
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
                                            <td>Marks</td>
                                            <td>Weight</td>
                                            <td>Late</td>
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
                                                        <td><?php echo $result->totalmarks . '/' . $assignment->marks; ?></td>
                                                        <td><?php echo $assignment->weight; ?></td>
                                                        <td><?php echo ($result->late == 0) ? 'Not Late' : 'Late'; ?></td>
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
