<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="margin-top: 5%;" class="container">
    
    <!-- Statistics -->
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-4">
            <div class="card">
                <div class="card-body bg-primary text-white">
                    <div class="card-title"><h3>Total Users:</h3></div>
                    <div class="card-text">Found <?php echo $data['totalUsers']; ?> Users</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-4">
            <div class="card">
                <div class="card-body bg-success text-white">
                    <div class="card-title"><h3>Total Students:</h3></div>
                    <div class="card-text">Found <?php echo $data['totalStudents']; ?> students</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-4">
            <div class="card">
                <div class="card-body bg-info text-white">
                    <div class="card-title"><h3>Total Classes:</h3></div>
                    <div class="card-text">Found <?php echo $data['totalClasses']; ?> classes</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
            <div class="card">
                <div class="card-body bg-danger text-white">
                    <div class="card-title"><h3>Total Assignments:</h3></div>
                    <div class="card-text">Found <?php echo $data['totalAssignments']; ?> assignments</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
            <div class="card">
                <div class="card-body bg-dark text-white">
                    <div class="card-title"><h3>Assignment Reuslts:</h3></div>
                    <div class="card-text">Found <?php echo $data['totalAssignmentResults']; ?> marked assignments</div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Statistics -->
    <hr>

    <!-- User Search -->
    
    <!-- End User Search -->

    <hr>

    <!-- Coupons -->

    <!-- End Coupons -->


</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

