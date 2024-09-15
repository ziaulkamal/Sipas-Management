<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">

<head>
	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url('public/')?>images/programmer.ico">

	<!-- Theme Config Js -->
	<script src="<?= base_url('public/')?>js/head.js"></script>

	<!-- Bootstrap css -->
	<link href="<?= base_url('public/')?>css/bootstrap.min.css" rel="stylesheet" type="text/css" id="app-style" />

	<!-- App css -->
	<link href="<?= base_url('public/')?>css/app.min.css" rel="stylesheet" type="text/css" />

	<!-- Icons css -->
	<link href="<?= base_url('public/')?>css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg authentication-bg-pattern">

	<div class="account-pages mt-5 mb-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-4">
					<div class="card bg-pattern">
						<div class="card-body p-4">
							
                            <div class="text-center m-auto">
								<div class="auth-brand">
                                    <img src="<?= base_url('public/')?>images/thumbnail-auth.png" height="280" alt="user-image">
								</div>

								<!-- set flash data -->
								<?php $this->load->view('partials/alerts'); ?>
								<small class="text-danger"><?= validation_errors();?></small>

							</div>

							<form class="user" method="POST" action="<?= base_url($action) ?>"
								enctype="multipart/form-data">
								<div class="mb-3">
									<label class="form-label">Username</label>
									<input class="form-control" type="text" name="user" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Password</label>
									<div class="input-group input-group-merge">
										<input type="password" name="pass" class="form-control">
									</div>
								</div>
                                <div class="mb-3">
									<label class="form-label fw-bold">Pilih Level Akses</label>
									<select class="form-select" name="level" id="level" onchange="showSubOptions()">
										<option value="0">--Pilih--</option>
										<option value="5">Asisten Pembinaaan</option>
										<option value="6">Asisten Intelijen</option>
										<option value="7">Asisten Tindak Pidana Umum</option>
										<option value="8">Asisten Tindak Pidana Khusus</option>
										<option value="9">Asisten Perdata dan Tata Usaha</option>
										<option value="10">Asisten Pidana Militer</option>
										<option value="11">Asisten Pengawasan</option>
										<option value="12">Koordinator</option>
									</select>
								</div>
								<div class="text-center d-grid">
									<button class="btn btn-primary" type="submit"> Masuk </button>
								</div>
							</form>
						</div> <!-- end card-body -->
					</div>
					<!-- end card -->

					<!-- end row -->

				</div> <!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- end page -->

	<footer class="footer footer-alt">
		<div>
			<script>
				document.write(new Date().getFullYear())
			</script> © SIPAS
		</div>
	</footer>

	<!-- Authentication js -->
	<script src="<?= base_url('public/')?>js/pages/authentication.init.js"></script>

</body>

</html>