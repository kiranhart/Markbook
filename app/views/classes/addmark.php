<head>
    <style>
        html, body {
            overflow-y: hidden;
        }
    </style>
</head>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div style="width: 100%; height: 100vh;" class="container-fluid">

    <div class="row">
        <div class="d-none d-md-block col-md-2 col-lg-2 col-xl-2" style="height: 100vh; background-color: #272e38;">
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
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
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
											<select name="marks" class="custom-select" id="marks" value="<?php echo $data['marks']; ?>">
												<?php for ($i = 0; $i <= $data['assignmentData']->marks; $i++) : ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
											<span class="invalid-feedback"><?php echo $data['marks_err']; ?></span>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="knowledgemarks">Knowledge: <sup>*</sup></label>
										<select name="knowledgemarks" class="custom-select" id="knowledgemarks" value="<?php echo $data['knowledgemarks']; ?>">
											<?php for ($i = 0; $i <= $data['assignmentData']->knowledge; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
									</div>
									<div class="col">
										<label for="thinkingmarks">Thinking: <sup>*</sup></label>
										<select name="thinkingmarks" class="custom-select" id="thinkingmarks" value="<?php echo $data['thinkingmarks']; ?>">
											<?php for ($i = 0; $i <= $data['assignmentData']->thinking; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
									</div>
									<div class="col">
										<label for="applicationmarks">Application: <sup>*</sup></label>
										<select name="applicationmarks" class="custom-select" id="applicationmarks" value="<?php echo $data['applicationmarks']; ?>">
											<?php for ($i = 0; $i <= $data['assignmentData']->application; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
									</div>
									<div class="col">
										<label for="communicationmarks">Communication: <sup>*</sup></label>
										<select name="communicationmarks" class="custom-select" id="communicationmarks" value="<?php echo $data['communicationmarks']; ?>">
											<?php for ($i = 0; $i <= $data['assignmentData']->communication; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
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
	var slider = document.getElementById("markslider");
	var output = document.getElementById("marklabel");

	output.innerHTML = slider.value;

	slider.oninput = function() {
		output.innerHTML = "Marks: " + this.value;
	}

</script>