<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">	
	<div class="row">
		<div class="col md-6-mx-auto">
			<div class="card card-body bg-ligh mt-5">
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
								<label for="assignmentmarks">Marks: <sup>*</sup></label>
								<input type="number" name="assignmentmarks" class="form-control <?php echo (!empty($data['assignmentmarks_err'])) ? 'is-invalid' : ''; ?>" min="1" value="<?php echo $data['assignmentmarks']; ?>">
								<span class="invalid-feedback"><?php echo $data['assignmentmarks_err']; ?></span>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="assignmentweight">Weight: <sup>*</sup></label>
								<input type="number" name="assignmentweight" class="form-control <?php echo (!empty($data['assignmentweight_err'])) ? 'is-invalid' : ''; ?>" min="1" value="<?php echo $data['assignmentweight']; ?>">
								<span class="invalid-feedback"><?php echo $data['assignmentweight_err']; ?></span>
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
						<select name="class" id="class" class="custom-select">
                            <?php foreach($data['classes'] as $theClass) :?>
                                <option value="<?php echo $theClass->id; ?>"><?php echo $theClass->classcode . ' ' . $theClass->classname; ?></option>
                            <?php endforeach; ?>
                        </select>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>