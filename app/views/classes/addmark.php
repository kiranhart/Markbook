<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">	
	<div class="row">
		<div class="col md-6-mx-auto">
			<div class="card card-body bg-ligh mt-5">
				<h2 class="text-center"><?php echo $data['assignmentData']->name; ?></h2>
				<p class="text-center lead">Adding marks for student: <?php echo $data['studentData']->firstname . ' ' . $data['studentData']->lastname; ?></p>

				<form action="<?php echo URLROOT . '/classes/addmark/' . $data['classData']->id . '/' . $data['studentData']->id . '/' . $data['assignmentData']->id; ?>" method="post">
					<div class="form-group">
						<label for="assignmentname">Name:</label>
						<input type="text" name="assignmentname" class="form-control" value="<?php echo $data['assignmentData']->name; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="assignmentdesc">Description:</label>
						<textarea name="assignmentdesc" rows="3" class="form-control" readonly><?php echo $data['assignmentData']->description; ?></textarea>
					</div>
					<div class="form-row">
						<div class="col">
							<div class="form-group">
								<label id="marklabel" for="marks">Marks:</label>
								<?php 
									echo '<input id="markslider" type="range" name="marks" class="form-control-range" min="0" max="' . $data['assignmentData']->marks . '" step="0.1" value="0">';
								?>
								<span class="invalid-feedback"><?php echo $data['marks_err']; ?></span>
							</div>
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col">
							<div class="form-group">
								<label for="assignmentweight">Weight:</label>
								<input type="text" name="assignmentweight" class="form-control" value="<?php echo $data['assignmentData']->weight; ?>" readonly>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="late">Late:</label>
								<select name="late" id="late" class="custom-select" value="<?php echo $data['late'] ?>">
									<option value="0">Not Late</option>
									<option value="1">Late</option>
								</select>
								<span class="invalid-feedback"><?php echo $data['late_err']; ?></span>
							</div>
						</div>
					</div>
					<br>
					<div class="form-row">
                        <div class="col">
                            <input type="submit" value="Save" style="width: 25%; margin: 0 auto;" class="btn btn-success btn-block">
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
	var slider = document.getElementById("markslider");
	var output = document.getElementById("marklabel");

	output.innerHTML = slider.value;

	slider.oninput = function() {
		output.innerHTML = "Marks: " + this.value;
	}

</script>