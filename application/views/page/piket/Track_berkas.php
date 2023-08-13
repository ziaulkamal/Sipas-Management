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
                    <!-- <h4 class="page-title"><?= $titlePage ?></h4> -->
				</div>
			</div>
		</div>
		<!-- end page title -->
		<!-- end page title -->

		<div class="row">


			<div class="col-lg-8 col-xl-8">
				<div class="card">
					<div class="card-body">
						<h5 class="mb-4 text-uppercase"><i class="mdi mdi-google-maps me-1"></i>
							<?= $titlePage ?></h5>

						<ul class="list-unstyled timeline-sm">
							<?php foreach ($data as $track) { ?>
							<li class="timeline-sm-item">
								<span class="timeline-sm-date"><?= $track->logDate ?></span>
								<h5 class="mt-0 mb-1"><?php switch ($track->level) {
									case '1':
										echo "Kajati";
										break;
									case '2':
										echo "Wakajati";
										break;
									case '3':
										echo "Persuratan";
										break;
									case '4':
										echo "Piket";
										break;
								}?></h5>
								<p><?= $track->keteranganLog ?></p>
							</li>
							<?php }?>
						</ul>

					</div>
				</div> <!-- end card-->

			</div> <!-- end col -->
		</div>
		<!-- end row-->

	</div> <!-- container -->

</div>