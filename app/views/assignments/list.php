<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if ($data['assignmentCount'] < 1) : ?>
    <div class="container text-center">
        <br><br>
        <h2 class="align-middle">No Assignments Found</h2>  
        <p class="lead">You currently do not have any assignments under this class.</p>

        <hr>
        <br>

        <div class="row">
            <div class="col">    
                <a role="button" href="<?php echo URLROOT . '/assignments/add'; ?>" class="btn btn-primary">Create Assignment</a>
            </div>
        </div>
    </div>
<?php else : ?>

<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>

</script>