<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container" style="margin-top: 100px;">
    <h2 class="text-center"><?php echo $data['studentData']->firstname . ' ' . $data['studentData']->lastname; ?></h2>
    <p class="lead text-center">Viewing the following student in <?php echo $data['classData']->classname . ' (' . $data['classData']->classcode . ')'; ?></p>
    <hr>
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
                                        <td>Score</td>
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
                                            <td>0</td>
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
                                <td>Score</td>
                                <td>Total Marks</td>
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
                                            <td><?php echo $result->totalmarks;?></td>
                                            <td><?php echo $assignment->marks; ?></td>
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
                        <table class="table table-bordered table-striped">
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
                                
                                $allAssignments = $data['allAssignments'];
                                $allResults = $data['assignmentResults'];
                          
                               
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
