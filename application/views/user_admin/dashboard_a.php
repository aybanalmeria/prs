<!-- edit content start here-->

<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
					<!-- Content Row 1 -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Patients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">10,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Consultations</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-notes-medical fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">eKonsulta Pending</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Content Row 2 -->
          <!-- DataTales Example -->
					<div class="card shadow mb-4">

							<div class="card-header py-3 d-flex justify-content-between">
								<h5 class="m-0 font-weight-bold text-primary">Patient List</h5>
								<a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ANPModal">
										<i class="fas fa-plus fa-sm text-white-50"></i> Add New Patient
								</a>
							</div>

							<div class="card-body">
									<div class="table-responsive">
									<?php if (!empty($patients)): ?>
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
													<thead>
															<tr>
																	<th>Name</th>
																	<th>Sex</th>
																	<th>Birthdate</th>
																	<th>Address</th>
																	<th>Action</th>
															</tr>
													</thead>
													<tbody id="patientTableBody">
														<?php foreach ($patients as $patient): ?>
														<tr>
																
																<td><?= $patient['last_name'] . ', ' . 
																				$patient['first_name'] . ' ' . 
																			 ($patient['middle_name'] ? $patient['middle_name'] . ' ' : '') . 
																			 ($patient['suffix'] ? $patient['suffix'] : ''); ?></td>

																<td><?= $patient['sex']; ?></td>
																<td><?= $patient['birth_date']; ?></td>
																<td><?= $patient['barangay']. ', ' .$patient['city']. ', ' .$patient['province'] ; ?></td>
																<td>
																		<a href="#" class="btn btn-sm btn-primary viewPatientBtn" data-id="<?= $patient['id']; ?>"data-toggle="modal" data-target="#VPModal">View</a>
																		<a href="#" class="btn btn-sm btn-warning editPatientBtn" data-id="<?= $patient['id']; ?>"data-toggle="modal" data-target="#EPModal">Edit</a>
																		<a href="#" class="btn btn-sm btn-danger deletePatientBtn" data-id="<?= $patient['id']; ?>"> Delete </a>
																</td>
														</tr>
														<?php endforeach; ?>
												</tbody>
											</table>
											<?php else: ?>
											<p>No patients found.</p>
											<?php endif; ?>
									</div>
							</div>
					</div>




</div> <!-- /.container-fluid -->


<!-- end of content-->
</div>


