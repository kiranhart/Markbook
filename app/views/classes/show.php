<head>
    <style>
        html, body {
        }

    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh; " class="container-fluid">

    <div class="row">

		<!-- CARD DISPLAY -->
        <div id="content" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-md-none">
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
								
								<?php foreach ($data['allStudents'] as $student) : ?>
									<div class="card col-12">
										<div class="card-body">
											<h4 class="card-title"><?php echo $student->firstname . ', ' . $student->lastname; ?></h4>
											<div class="card-subtitle mb-2 text-muted"><?php echo 'Student #: '. $student->studentnumber . '<br>Birthdate: ' . $student->birthdate . '<br>Email: ' . $student->email; ?></div>
											<a href="<?php echo URLROOT . '/classes/student/' . $data['classData']->id . '/' . $student->id; ?>" class="card-link btn btn-info">View</a>
											<a href="<?php echo URLROOT . '/classes/removestudent/'. $data['classData']->id;?>" class="card-link btn btn-danger">Delete</a>						
										</div>
									</div>
								<?php endforeach; ?>
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


								<?php foreach ($data['allAssignments'] as $assignments) : ?>
									<div class="card col-12">
										<div class="card-body">
											<h4 class="card-title"><?php echo $assignments->name; ?></h4>
											<div class="card-subtitle mb-2 text-muted"><?php echo 'Knowledge: ' . $assignments->knowledge . '<br>Thinking: ' . $assignments->thinking . '<br>Application: ' . $assignments->application . '<br>Communication: ' . $assignments->communication; ?></div>
											<div class="card-text"><?php echo $assignments->description; ?></div>
										</div>
									</div>
								<?php endforeach; ?>
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

		<!-- LIST DISPLAY -->

        <div id="content" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none d-md-block">
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