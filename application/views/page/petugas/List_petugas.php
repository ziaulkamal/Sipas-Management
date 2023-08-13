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
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<div class="table-responsive">
							<table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
								data-page-size="7">
								<thead>
									<tr>
										<th>No</th>
										<th data-toggle="true">Nama</th>
										<th>Username</th>
										<th data-hide="phone, tablet">Level Akses</th>
										<th data-hide="phone, tablet">Terdaftar</th>
										<th data-hide="phone, tablet">Aksi</th>
									</tr>
								</thead>
								<tbody>
                                    <?php 

                                    $no = 1;
                                    foreach ($data as $petugas) {
                                    ?>
									<tr>
										<td class="fw-bolder"><?= $no++ ?></td>
										<td class="fw-bolder"><?= $petugas->nama ?></td>
										<td class="fw-bolder"><?= $petugas->user ?></td>
										<td class="fw-bolder"><?= $petugas->level ?></td>
										<td class="fw-bolder"><?= $petugas->regisDate ?></td>
										<td>
											<a href="<?= base_url('update_petugas/' . $petugas->idAuth)?>"><span class="badge label-table bg-success">Edit</span></a>
											<a href="<?= base_url('delete/' . $petugas->idAuth)?>" class="badge label-table bg-danger tombol-hapus">Hapus</a>
										</td>
									</tr>
                                    <?php } ?>
								</tbody>
								<tfoot>
									<tr class="active">
										<td colspan="5">
											<div class="text-end">
												<ul
													class="pagination pagination-rounded justify-content-end footable-pagination mb-0">
												</ul>
											</div>
										</td>
									</tr>
								</tfoot>
							</table>
						</div> <!-- end .table-responsive-->
					</div>
				</div> <!-- end card -->
			</div> <!-- end col -->
		</div>


	</div> <!-- container -->

</div>