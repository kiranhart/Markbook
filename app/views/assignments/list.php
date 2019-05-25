<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if ($data['assignmentCount'] < 1) : ?>
    <div class="container text-center">
        <br><br>
        <h2 class="align-middle">No Assignments Found</h2>  
        <p class="lead">You currently do not have any assignments created under your account.</p>

        <hr>
        <br>

        <div class="row">
            <div class="col">    
                <a role="button" href="<?php echo URLROOT . '/assignments/add'; ?>" class="btn btn-primary">Create Assignment</a>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="container text-center">
        <br><br>
        <h2 class="align-middle">Listing Assignments</h2>

        <hr>
        <br>
        <div class="row">
            <table id="assignmenttListTable" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Marks</td>
                        <td>Weight</td>
                        <td>More</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['allAssignments'] as $assignment) : ?>
                    <tr>
                        <td><?php echo $assignment->name; ?></td>
                        <td><?php echo $assignment->description; ?></td>
                        <td><?php echo $assignment->marks; ?></td>
                        <td><?php echo $assignment->weight; ?></td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo URLROOT . '/classes/show/'. $assignment->classid;?>" class="btn btn-info">View Class</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <hr>
        <br>

        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT . '/assignments/add'; ?>" class="btn btn-info">Create Assignment</a>
            </div>
        </div>

        <br>
    </div>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    
</script>