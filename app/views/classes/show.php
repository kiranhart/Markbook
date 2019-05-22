<?php require APPROOT . '/views/inc/header.php'; ?>

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
					<table class="table table-bordered table-striped">
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
									<a href="<?php echo URLROOT . '/classes/removestudent/'. $data['classData']->id;?>" class="btn btn-danger">Delete</a>
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
					<table class="table table-bordered table-striped">
						<thead class="thead-dark">
							<tr>
								<td>Name</td>
								<td>Description</td>
								<td>Marks</td>
								<td>Weight</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['allAssignments'] as $assignments) : ?>
							<tr>
								<td><?php echo $assignments->name; ?></td>
								<td><?php echo $assignments->description; ?></td>
								<td><?php echo $assignments->marks; ?></td>
								<td><?php echo $assignments->weight; ?></td>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>