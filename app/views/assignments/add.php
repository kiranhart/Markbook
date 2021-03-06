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
						<div class="card card-body bg-light mt-5">
							<h2 class="text-center">Create Assignment</h2>
							<p class="text-center lead">Enter assignment information below.</p>
			
							<form action="<?php echo URLROOT . '/assignments/add'; ?>" method="post">
								<div class="form-group">
									<label for="assignmentname">Name: <sup>*</sup></label>
									<input type="text" name="assignmentname" class="form-control <?php echo (!empty($data['assignmentname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['assignmentname']; ?>">
									<span class="invalid-feedback"><?php echo $data['assignmentname_err']; ?></span>
								</div>
								<div class="form-group">
									<label for="assignmentdesc">Description: <sup>*</sup></label>
									<textarea name="assignmentdesc" rows="3" class="form-control <?php echo (!empty($data['assignmentdesc_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['assignmentdesc']; ?></textarea>
									<span class="invalid-feedback"><?php echo $data['assignmentdesc_err']; ?></span>
								</div>
								<div class="form-row">
									<div class="col">
										<div class="form-group">
											<label for="assignmentweight">Weight: <sup>*</sup></label>
											<input type="number" name="assignmentweight" class="form-control <?php echo (!empty($data['assignmentweight_err'])) ? 'is-invalid' : ''; ?>" min="1" value="<?php echo $data['assignmentweight']; ?>">
											<span class="invalid-feedback"><?php echo $data['assignmentweight_err']; ?></span>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-12 col-sm-12 col-md col-lg col-xl">
										<!-- Knowledge -->
										<div class="form-group">
											<label for="assignmentknowledge">Knowledge: <sup>*</sup></label>
											<input type="number" minlength="0" id="assignmentknowledge" name="assignmentknowledge" class="form-control <?php echo (!empty($data['assignmentknowledge_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['assignmentknowledge']; ?>">
											<span class="invalid-feedback"><?php echo $data['assignmentknowledge_err']; ?></span>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md col-lg col-xl">
										<!-- Thinking -->
										<div class="form-group">
											<label for="assignmentthinking">Thinking: <sup>*</sup></label>
											<input type="number" id="assignmentthinking" name="assignmentthinking" class="form-control <?php echo (!empty($data['assignmentthinking_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['assignmentthinking']; ?>">
											<span class="invalid-feedback"><?php echo $data['assignmentthinking_err']; ?></span>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md col-lg col-xl">
										<!-- Application -->
										<div class="form-group">
											<label for="assignmentapplication">Application: <sup>*</sup></label>
											<input type="number" id="assignmentapplication" name="assignmentapplication" class="form-control <?php echo (!empty($data['assignmentapplication_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['assignmentapplication']; ?>">
											<span class="invalid-feedback"><?php echo $data['assignmentapplication_err']; ?></span>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-md col-lg col-xl">
										<!-- Application -->
										<div class="form-group">
											<label for="acomm">Communication: <sup>*</sup></label>
											<input type="number" id="acomm" name="acomm" class="form-control <?php echo (!empty($data['acomm_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['acomm']; ?>">
											<span class="invalid-feedback"><?php echo $data['acomm_err']; ?></span>
										</div>
									</div>
									
								</div>
								<div class="form-row">
									<div class="col">
										<div class="form-group">
											<label for="assigneddate">Assigned Date: <sup>*</sup></label>
											<input type="date" name="assigneddate" class="form-control <?php echo (!empty($data['assigneddate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['assigneddate']; ?>">
											<span class="invalid-feedback"><?php echo $data['assigneddate_err']; ?></span>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="duedate">Due Date: <sup>*</sup></label>
											<input type="date" name="duedate" class="form-control <?php echo (!empty($data['duedate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['duedate']; ?>">
											<span class="invalid-feedback"><?php echo $data['duedate_err']; ?></span>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<select name="class" id="class" class="custom-select">
											<?php foreach($data['classes'] as $theClass) :?>
												<option value="<?php echo $theClass->id; ?>"><?php echo $theClass->classcode . ' ' . $theClass->classname; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col">
										<select name="isfinal" id="isfinal" class="custom-select">
											<option value="0">Term</option>
											<option value="1">Final</option>
										</select>
									</div>
								</div>
								<br>
								<div class="form-row">
									<div class="col">
										<input type="submit" value="Create" style="width: 25%; margin: 0 auto;" class="btn btn-success btn-block">
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
	// // $(document).ready(() => {
	// 	$('#assignmentknowledge').val(0);
	// 	$('#assignmentthinking').val(0);
	// 	$('#assignmentapplication').val(0);
	// 	$('#acomm').val(0);
	// 	$('#assignmentknowledge').prop('readonly', true);
	// 	$('#assignmentthinking').prop('readonly', true);
	// 	$('#assignmentapplication').prop('readonly', true);
	// 	$('#acomm').prop('readonly', true);

	// 	$("#usecategory").change(() => {
	// 		$('#assignmentmarks').prop('readonly', ($("#usecategory").val() == 1) ? true : false);
	// 		$('#assignmentknowledge').prop('readonly', ($("#usecategory").val() == 0) ? true : false);
	// 		$('#assignmentthinking').prop('readonly', ($("#usecategory").val() == 0) ? true : false);
	// 		$('#assignmentapplication').prop('readonly', ($("#usecategory").val() == 0) ? true : false);
	// 		$('#acomm').prop('readonly', ($("#usecategory").val() == 0) ? true : false);
	// 		if ($("#usecategory").val() == 0) {
	// 			$('#assignmentknowledge').val(0);
	// 			$('#assignmentthinking').val(0);
	// 			$('#assignmentapplication').val(0);
	// 			$('#acomm').val(0);
	// 		}
	// 	});

	// 	$("#assignmentknowledge").change(() => {
	// 		$('#assignmentmarks').val(parseInt($('#assignmentknowledge').val()) + parseInt($('#assignmentthinking').val()) + parseInt($('#assignmentapplication').val()) + parseInt($('#acomm').val()));
	// 	});

	// 	$("#assignmentthinking").change(() => {
	// 		$('#assignmentmarks').val(parseInt($('#assignmentknowledge').val()) + parseInt($('#assignmentthinking').val()) + parseInt($('#assignmentapplication').val()) + parseInt($('#acomm').val()));
	// 	});

	// 	$("#assignmentapplication").change(() => {
	// 		$('#assignmentmarks').val(parseInt($('#assignmentknowledge').val()) + parseInt($('#assignmentthinking').val()) + parseInt($('#assignmentapplication').val()) + parseInt($('#acomm').val()));
	// 	});

	// 	$("#acomm").change(() => {
	// 		$('#assignmentmarks').val(parseInt($('#assignmentknowledge').val()) + parseInt($('#assignmentthinking').val()) + parseInt($('#assignmentapplication').val()) + parseInt($('#acomm').val()));
	// 	});
	// // });
</script>