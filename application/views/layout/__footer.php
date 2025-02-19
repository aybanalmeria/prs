      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
		  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. Copyright &copy; Your Website <?php echo date("Y"); ?></p>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?php echo base_url('login/logout'); ?>">Logout</a>
				</div>
			</div>
			</div>
		</div>

	    <!-- Add New Patient Modal-->
		<!-- Large Modal -->
		<div class="modal fade" id="ANPModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl" role="document">
						<div class="modal-content">
							<div class="modal-header">
									<h5 class="modal-title" id="largeModalLabel">Add New Patient</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
									</button>
							</div>
							<div class="modal-body">
								<form id="addPatientForm" method="post">
								<div class="row">
								<!-- Personal Information Column -->
								<div class="col-md-6">
									<h5 class="text-primary font-weight-bold">Personal Information</h5>
									
									<div class="form-group">
										<label for="lastName">Last Name</label>
										<input type="text" class="form-control <?= form_error('last_name') ? 'is-invalid' : '' ?>" id="lastName" name="last_name" placeholder="Enter last name" value="<?= set_value('last_name'); ?>">
										<div class="invalid-feedback"><?= form_error('last_name'); ?></div>
									</div>

									<div class="form-group">
										<label for="firstName">First Name</label>
										<input type="text" class="form-control <?= form_error('first_name') ? 'is-invalid' : '' ?>" id="firstName" name="first_name" placeholder="Enter first name" value="<?= set_value('first_name'); ?>">
										<div class="invalid-feedback"><?= form_error('first_name'); ?></div>
									</div>

									<div class="form-group">
										<label for="middleName">Middle Name</label>
										<input type="text" class="form-control <?= form_error('middle_name') ? 'is-invalid' : '' ?>" id="middleName" name="middle_name" placeholder="Enter middle name" value="<?= set_value('middle_name'); ?>">
										<div class="invalid-feedback"><?= form_error('middle_name'); ?></div>
									</div>

									<div class="form-group">
										<label for="suffix">Suffix</label>
										<select class="form-control" id="suffix" name="suffix">
											<option value="">None</option>
											<option value="Jr." <?= set_select('suffix', 'Jr.'); ?>>Jr.</option>
											<option value="Sr." <?= set_select('suffix', 'Sr.'); ?>>Sr.</option>
											<option value="II" <?= set_select('suffix', 'II'); ?>>II</option>
											<option value="III" <?= set_select('suffix', 'III'); ?>>III</option>
											<option value="IV" <?= set_select('suffix', 'IV'); ?>>IV</option>
										</select>
									</div>

									<div class="form-group">
										<label>Sex</label>
											<div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="sex" id="male" value="Male" <?= set_radio('sex', 'Male'); ?>>
													<label class="form-check-label" for="male">Male</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="sex" id="female" value="Female" <?= set_radio('sex', 'Female'); ?>>
													<label class="form-check-label" for="female">Female</label>
												</div>
											</div>
										<div class="invalid-feedback d-block"><?= form_error('sex'); ?>
									</div>

									</div>
									<div class="form-group">
										<label for="birthDate">Birth Date</label>
										<input type="date" class="form-control <?= form_error('birth_date') ? 'is-invalid' : '' ?>" id="birthDate" name="birth_date" value="<?= set_value('birth_date'); ?>">
										<div class="invalid-feedback"><?= form_error('birth_date'); ?></div>
									</div>
								</div>

								<!-- Address and Contact Info Column -->
								<div class="col-md-6">
									<h5 class="text-primary font-weight-bold">Address and Contact Info</h5>
									<div class="form-group">
										<label for="region">Region</label>
										<select class="form-control" id="region" name="region">
											<option value="">Select Region</option>
											<option value="Region VIII" <?= set_select('region', 'Region VIII'); ?>>Region VIII</option>
										</select>
										<div class="invalid-feedback"><?= form_error('region'); ?></div>
									</div>
									<div class="form-group">
										<label for="province">Province</label>
										<select class="form-control" id="province" name="province">
											<option value="">Select Province</option>
											<option value="Leyte" <?= set_select('province', 'Leyte'); ?>>Leyte</option>
											<option value="Southern Leyte" <?= set_select('province', 'Southern Leyte'); ?>>Southern Leyte</option>
											<option value="Northern Samar" <?= set_select('province', 'Northern Samar'); ?>>Northern Samar</option>
											<option value="Eastern Samar" <?= set_select('province', 'Eastern Samar'); ?>>Eastern Samar</option>
										</select>
										<div class="invalid-feedback"><?= form_error('province'); ?></div>
									</div>
									<div class="form-group">
										<label for="city">City/Municipality</label>
										<select class="form-control" id="city" name="city">
											<option value="">Select City</option>
											<option value="Tacloban City" <?= set_select('province', 'Tacloban City'); ?>>Tacloban City</option>
										</select>
										<div class="invalid-feedback"><?= form_error('city'); ?></div>
									</div>
									<div class="form-group">
										<label for="barangay">Barangay</label>
										<select class="form-control" id="barangay" name="barangay">
											<option value="">Select Barangay</option>
											<option value="Brgy 1" <?= set_select('barangay', 'Brgy 1'); ?>>Brgy 1</option>
											<option value="Brgy 2" <?= set_select('barangay', 'Brgy 2'); ?>>Brgy 2</option>
											<option value="Brgy 3" <?= set_select('barangay', 'Brgy 3'); ?>>Brgy 3</option>
											<option value="Brgy 4" <?= set_select('barangay', 'Brgy 4'); ?>>Brgy 4</option>
										</select>
										<div class="invalid-feedback"><?= form_error('barangay'); ?></div>
									</div>
									<div class="form-group">
										<label for="contactNumber">Contact Number</label>
										<input type="text" class="form-control <?= form_error('contact_number') ? 'is-invalid' : '' ?>" id="contactNumber" name="contact_number" placeholder="Enter contact number" value="<?= set_value('contact_number'); ?>">
										<div class="invalid-feedback"><?= form_error('contact_number'); ?></div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" id="savePatientBtn">Save</button> <!-- Change type to "button" -->
							</div>
								</form>
							</div>
						</div>
				</div>
		</div>

		<!-- Edit Patient Modal-->
		<!-- Large Modal -->
		<div class="modal fade" id="EPModal" tabindex="-1" aria-labelledby="largeModalLabel" role="dialog">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Patient</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="editPatientForm">
					<div class="row">
						<!-- Personal Information Column -->
						<div class="col-md-6">
							<h5 class="text-primary font-weight-bold">Personal Information</h5>
							<input type="hidden" id="editId" name="id">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" id="editLastName" name="last_name">
							</div>
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" id="editFirstName" name="first_name">
							</div>
							<div class="form-group">
								<label>Middle Name</label>
								<input type="text" class="form-control" id="editMiddleName" name="middle_name">
							</div>
							<div class="form-group">
								<label for="suffix">Suffix</label>
								<select class="form-control" id="editSuffix" name="suffix">
									<option value="">None</option>
									<option value="Jr.">Jr.</option>
									<option value="Sr.">Sr.</option>
									<option value="II">II</option>
									<option value="III">III</option>
									<option value="IV">IV</option>
								</select>
							</div>
							<div class="form-group">
								<label>Sex</label>
								<select class="form-control" id="editSex" name="sex">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<label>Birth Date</label>
								<input type="date" class="form-control" id="editBirthDate" name="birth_date">
							</div>
						</div>
						<!-- Address and Contact Info Column -->
						<div class="col-md-6">
							<h5 class="text-primary font-weight-bold">Address and Contact Info</h5>
							<div class="form-group">
								<label for="region">Region</label>
								<select class="form-control" id="editRegion" name="region">
									<option value="">Select Region</option>
									<option value="Region VIII">Region VIII</option>
								</select>
							</div>
							<div class="form-group">
								<label for="province">Province</label>
								<select class="form-control" id="editprovince" name="province">
									<option value="">Select Province</option>
									<option value="Leyte">Leyte</option>
									<option value="Southern Leyte">Southern Leyte</option>
									<option value="Northern Samar">Northern Samar</option>
									<option value="Eastern Samar">Eastern Samar</option>
								</select>
							</div>
							<div class="form-group">
									<label for="city">City/Municipality</label>
									<select class="form-control" id="editCity" name="city">
										<option value="">Select City</option>
										<option value="Tacloban City">Tacloban City</option>
									</select>
							</div>
							<div class="form-group">
								<label>Barangay</label>
								<select class="form-control" id="editBarangay" name="barangay">
								<option value="Brgy 1">Brgy 1</option>
								<option value="Brgy 2">Brgy 2</option>
								<option value="Brgy 3">Brgy 3</option>
								<option value="Brgy 3">Brgy 4</option>
								</select>
							</div>
							<div class="form-group">
								<label for="contactNumber">Contact Number</label>
								<input type="text" class="form-control" id="editcontactNumber" name="contact_number">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" id="savePatientBtn">Save</button> <!-- Change type to "button" -->
					</div>
				</form>
			</div>
			</div>
		</div>
		</div>

		<!-- View Patient Modal-->
		<!-- XLarge Modal -->

		<div class="modal fade" id="VPModal" tabindex="-1" aria-labelledby="largeModalLabel" role="dialog">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary text-white">
						<h5 class="modal-title">Patient Profile</h5>
						<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<!-- Profile Picture Section -->
							<div class="col-md-4 text-center">
							<img id="viewProfilePic" class="rounded-circle img-thumbnail profile-pic" src="assets/user.png" alt="Patient Photo">
								<h4 class="mt-3" id="viewFullName"></h4>
								<p class="text-muted" id="viewPatientID"></p>
							</div>

							<!-- Personal Information -->
							<div class="col-md-8">
								<h5 class="text-primary font-weight-bold">Personal Information</h5>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<p><strong>Sex:</strong> <span id="viewSex"></span></p>
										<p><strong>Birth Date:</strong> <span id="viewBirthDate"></span></p>
										<p><strong>Age:</strong> <span id="viewAge"></span></p>
									</div>
									<div class="col-md-6">
										<p><strong>Blood Type:</strong> <span id="viewBloodType"></span></p>
										<p><strong>Medical History:</strong> <span id="viewMedicalHistory"></span></p>
									</div>
								</div>
							</div>
						</div>

						<!-- Address & Contact Information -->
						<h5 class="text-primary font-weight-bold mt-4">Address & Contact Information</h5>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<p><strong>Region:</strong> <span id="viewRegion"></span></p>
								<p><strong>Province:</strong> <span id="viewProvince"></span></p>
								<p><strong>City/Municipality:</strong> <span id="viewCity"></span></p>
								<p><strong>Barangay:</strong> <span id="viewBarangay"></span></p>
							</div>
							<div class="col-md-6">
								<p><strong>Contact Number:</strong> <span id="viewContactNumber"></span></p>
								<p><strong>Email:</strong> <span id="viewEmail"></span></p>
								<p><strong>Emergency Contact:</strong> <span id="viewEmergencyContact"></span></p>
							</div>
						</div>

						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	



<script>
 var baseUrl = "<?php echo base_url(); ?>";
</script>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/js/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

	<!-- Page level plugins -->
	<script src="<?php echo base_url('assets/vendor/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/dataTables.bootstrap4.min.js'); ?>"></script>

	<!-- Page level custom scripts -->
	<script src="<?php echo base_url('assets/js/demo/datatables-demo.js'); ?>"></script>

	<!-- ajax -->
	<script src="<?php echo base_url('assets/js/ajax/patients.js'); ?>"></script>

	

</body>
</html>
