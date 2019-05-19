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
			<h4>Assignments</h4>
			<?php if ($data['assignmentCount'] < 1) :?>
				<p class="lead">This class doesn't have any assignments.</p>
				<p class="lead"><a href="<?php echo URLROOT . '/assignment/add'; ?>">Create one now!</a></p>
				
			<?php else : ?>
				<p class="lead">Assignment Count: <?php echo $data['assignmentCount']; ?></p>
			<?php endif; ?>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col text-center">
			<h4>Students</h4>
			<?php if ($data['studentCount'] < 1) :?>
				<p class="lead">This class doesn't have any students.</p>
				<p class="lead"><a href="<?php echo URLROOT . '/student/add'; ?>">Add one now</a></p>
				
			<?php else : ?>
				<p class="lead">Student Count: <?php echo $data['studentCount']; ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>