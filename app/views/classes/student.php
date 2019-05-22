<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container" style="margin-top: 100px;">
    <h2 class="text-center"><?php echo $data['studentData']->firstname . ' ' . $data['studentData']->lastname; ?></h2>
    <p class="lead text-center">Viewing the following student in <?php echo $data['classData']->classname . ' (' . $data['classData']->classcode . ')'; ?></p>
    <hr>
    <br>
    <div class="row">
        <div class="col text-center">
            <h4>Assignment Results</h4>
            
            <?php if ($data['assignmentResultCount'] < 1) : ?>
                <p class="lead ">This student doesn't have any assignment marks.</p>  
                <div class="col md-6-mx-auto">
                    <form action="<?php echo URLROOT . '/classes/addmark/' . $data['classData']->id .  '/' . $data['studentData']->id; ?>" method="post">
                        <div class="form-group">
                            <label for="assignment">Assignment</label>
                            <select name="assignment" id="assignment" class="custom-select">
                                <?php foreach($data['allAssignments'] as $assignment) : ?>
                                    <option value="<?php echo $assignment->id; ?>"><?php echo $assignment->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col">
                            <input type="submit" value="Add Mark" style="width: 25%; margin: 0 auto;" class="btn btn-success btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            <?php else : ?>
                <br>
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
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
