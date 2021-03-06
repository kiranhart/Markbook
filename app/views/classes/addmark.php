<head>
    <style>
        html, body {
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh;" class="container-fluid">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
									<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<label for="knowledgemarks">Knowledge (<?php echo $data['assignmentData']->knowledge; ?>): <sup>*</sup></label>
										<input type="number" min="0" max="<?php echo $data['assignmentData']->knowledge; ?>" step="0.01" name="knowledgemarks" id="knowledgemarks" class="form-control" value="<?php echo $data['knowledgemarks']; ?>">
									</div>
									<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<label for="thinkingmarks">Thinking (<?php echo $data['assignmentData']->thinking; ?>): <sup>*</sup></label>
										<input type="number" min="0" max="<?php echo $data['assignmentData']->thinking; ?>" step="0.01" name="thinkingmarks" id="thinkingmarks" class="form-control" value="<?php echo $data['thinkingmarks']; ?>">
									</div>
									<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<label for="applicationmarks">Application (<?php echo $data['assignmentData']->application; ?>): <sup>*</sup></label>
										<input type="number" min="0" max="<?php echo $data['assignmentData']->application; ?>" step="0.01" name="applicationmarks" id="applicationmarks" class="form-control" value="<?php echo $data['applicationmarks']; ?>">
									</div>
									<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<label for="communicationmarks">Communication (<?php echo $data['assignmentData']->communication; ?>): <sup>*</sup></label>
										<input type="number" min="0" max="<?php echo $data['assignmentData']->communication; ?>" step="0.01" name="communicationmarks" id="communicationmarks" class="form-control" value="<?php echo $data['communicationmarks']; ?>">
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
           
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>


</script>