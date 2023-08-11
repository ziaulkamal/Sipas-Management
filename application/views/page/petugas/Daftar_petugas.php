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
							<form method="POST" action="<?= base_url($action)?>" class="row g-3 needs-validation">
								<div class="col-md-6">
									<label class="form-label fw-bold">Nama</label>
									<input type="text" class="form-control" name="nama" id="nama">
									<div class="form-text text-danger"><?= form_error('nama'); ?></div>

								</div>
								<div class="col-md-6">
									<label class="form-label fw-bold">Username</label>
									<input type="text" class="form-control" name="user" id="user">
									<div class="form-text text-danger"><?= form_error('user'); ?></div>

								</div>
								<div class="col-md-6">
									<label class="form-label fw-bold">Password</label>
									<input type="text" class="form-control" name="pass" id="pass">
									<div class="form-text text-danger"><?= form_error('pass'); ?></div>

								</div>
								<div class="col-md-6">
									<label class="form-label fw-bold">Level Akses</label>
									<select class="form-select" name="level" id="level" onchange="showSubOptions()">
										<option default>--Pilih--</option>
										<option value="1">Admin</option>
										<option value="2">Pimpinan</option>
										<option value="3">Persuratan</option>
										<option value="4">Piket</option>
									</select>
								</div>
								<div class="col-md-6" id="subOptions" style="display: none;">
									<label class="form-label fw-bold">Sub Level Akses</label>
									<select class="form-select" name="subLevel" id="subLevel">
										<option default>--Pilih--</option>
										<option value="kajati">Kajati</option>
										<option value="wakajati">Wakajati</option>
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

<script>
    function showSubOptions() {
        var levelSelect = document.getElementById("level");
        var subOptionsDiv = document.getElementById("subOptions");

        if (levelSelect.value === "2") {
            subOptionsDiv.style.display = "block";
        } else {
            subOptionsDiv.style.display = "none";
        }
    }
</script>