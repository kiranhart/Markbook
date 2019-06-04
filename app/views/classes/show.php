<head>
    <style>
        html, body {
        }

    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh; " class="container-fluid">

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
        <div id="content" class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
			<div class="container" style="margin-top: 100px;">
				<h2 class="text-center"><?php echo $data['classData']->classname; ?></h2>
				<p class="lead text-center"><?php echo $data['classData']->classdescription; ?></p>
				<hr>
				<br>
				<div class="row">
					<div class="col text-center">
						<h4>Class Code</h4>
						<p class="lead"><?php echo $data['classData']->classcode; ?></p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col text-center">
						<h4>Students</h4>
						<?php if ($data['studentCount'] < 1) :?>
							<p class="lead">This class doesn't have any students.</p>
							<p class="lead"><a href="<?php echo URLROOT . '/classes/addstudent/' . $data['classData']->id; ?>">Add one now</a></p>
						<?php else : ?>
							<br>
							<div class="row">
								<table class="table table-bordered table-striped text-center">
									<thead class="thead-dark">
										<tr>
											<td>First Name</td>
											<td>Last Name</td>
											<td>Birthday</td>
											<td>Email</td>
											<td>More</td>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data['allStudents'] as $student) : ?>
										<tr>
											<td><?php echo $student->firstname; ?></td>
											<td><?php echo $student->lastname; ?></td>
											<td><?php echo $student->birthdate; ?></td>
											<td><?php echo $student->email; ?></td>
											<td>
												<div class="row">
													<div class="col ">
														<a href="<?php echo URLROOT . '/classes/removestudent/'. $data['classData']->id;?>" class="btn btn-danger">Delete</a>
													</div>
													<div class="col">
														<a href="<?php echo URLROOT . '/classes/student/' . $data['classData']->id . '/' . $student->id; ?>" class="btn btn-info">View</a>
													</div>
												</div>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<hr>
							<div class="row">
								<div class="col text-center">
									<p class="center-text"><a href="<?php echo URLROOT . '/classes/addstudent/' . $data['classData']->id; ?>">Add another student</a></p>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col text-center">
						<h4>Assignments</h4>
						<?php if ($data['assignmentCount'] < 1) :?>
							<p class="lead">This class doesn't have any assignments.</p>
							<p class="lead"><a href="<?php echo URLROOT . '/assignments/add'; ?>">Create one now!</a></p>
							
						<?php else : ?>
							<br>
							<div class="row">
								<table class="table table-bordered table-striped text-center">
									<thead class="thead-dark">
										<tr>
											<td>Name</td>
											<td>Description</td>
											<td>Marks</td>
											<td>K</td>
											<td>T</td>
											<td>A</td>
											<td>C</td>
											<td>Weight</td>
											<td>Final</td>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data['allAssignments'] as $assignments) : ?>
										<tr>
											<td><?php echo $assignments->name; ?></td>
											<td><?php echo $assignments->description; ?></td>
											<td><?php echo $assignments->marks; ?></td>
											<td><?php echo $assignments->knowledge; ?></td>
											<td><?php echo $assignments->thinking; ?></td>
											<td><?php echo $assignments->application; ?></td>
											<td><?php echo $assignments->communication; ?></td>
											<td><?php echo $assignments->weight; ?></td>
											<td><?php echo ($assignments->isfinal == 1) ? '<i class="text-success material-icons text-center" style="display: inline-block; vertical-align: middle;">check</i>' : '<i class="text-danger material-icons" style="display: inline-block; vertical-align: middle;">close</i>'; ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<hr>
							<div class="row">
								<div class="col text-center">
									<p class="center-text"><a href="<?php echo URLROOT . '/assignments/add'; ?>">Add another assignment</a></p>
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