<div class="content">

	<!-- Start Content-->
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<div class="page-title-right">
						<?php $this->load->view('partials/breadcrumb'); ?>
					</div>
					<h4 class="page-title"><?= $titlePage ?></h4>
				</div>
			</div>
		</div>

		<!-- set flash data -->
		<div class="row">
			<div class="col-xl-8">
				<?php $this->load->view('partials/alerts');?>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<form method="POST" action="<?= base_url('pro_daftar')?>" class="row g-3 needs-validation">
								<div class="col-md-6">
									<label class="form-label fw-bold">Nama</label>
									<input type="text" class="form-control" name="nama" id="nama">
									<div class="form-text text-danger"><?= form_error('nama'); ?></div>

								</div>
								<div class="col-md-6">
									<label class="form-label fw-bold">Username</label>
									<input type="text" class="form-control" name="username" id="username">
									<div class="form-text text-danger"><?= form_error('username'); ?></div>

								</div>
								<div class="col-md-6">
									<label class="form-label fw-bold">Password</label>
									<input type="text" class="form-control" name="password" id="password">
									<div class="form-text text-danger"><?= form_error('password'); ?></div>

								</div>
								<div class="col-md-6">
									<label class="form-label fw-bold">Level Akses</label>
									<select class="form-select" name="level_access" id="level_access">
										<option default>--Pilih--</option>
										<option value="admin">Admin</option>
										<option value="piket">Piket</option>
										<option value="persuratan">Persuratan</option>
										<option value="pimpinan">Pimpinan</option>
									</select>
								</div>
								<div class="col-12">
									<button class="btn btn-success" type="submit">Submit</button>
								</div>
							</form>
						</div>

					</div>
				</div> <!-- end card -->
			</div>
			<!-- end col -->
		</div>


	</div> <!-- container -->

</div>