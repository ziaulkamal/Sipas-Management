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
		<?php $this->load->view('partials/alerts');?>

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
								data-page-size="7">
								<thead class="table-light">
									<tr>
										<th class="fs-6">NO</th>
										<th class="fs-6">NOMOR SURAT</th>
										<th class="fs-6">JUDUL SURAT</th>
										<th class="fs-6">TANGGAL SURAT</th>
										<th class="fs-6">KETERANGAN SURAT</th>
										<th class="fs-6">OPSI</th>
									</tr>
								</thead>
								<tbody>
								<tbody>
									<?php $i = 1; $db = 0;?>
									<?php foreach ($surat as $srt) { ?>
										<?php if ($this->session->userdata('id_level') == 3 || $this->session->userdata('id_level') == 1) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $srt->nomor_surat; ?></td>
										<td><?= $srt->judul_surat; ?></td>
										<td><?= $srt->tanggal_surat; ?></td>
										<td><?= $srt->keterangan_surat; ?></td>
										<td>
											<?php if ($this->session->userdata('id_level') == 3 || $this->session->userdata('id_level') == 1) { ?>
											<a href="<?= base_url('surat/accept_surat/2/').$srt->unique_tiket ?>" class="badge label-table bg-success">Diterima</a>
											<?php }?>
											<a href="#" id="" class="badge label-table bg-danger buttonTolak">Ditolak</a>
											<a href="<?= base_url('cetak_pdf/' . $srt->id_surat); ?>" class="badge label-table bg-dark" target="_blank">Download Surat</a>
											<a href="<?= base_url('cetak/' . $srt->id_disposisi); ?>" class="badge label-table bg-blue">Download Lembar Disposisi</a>
											<a href="<?= base_url('disposisi_pimpinan/' . $srt->id_disposisi); ?>" class="badge label-table bg-warning">Lihat Disposisi</a>
										</td>
									</tr>
										<?php } ?>
									<?php } ?>
								</tbody>
								</tbody>

							</table>
						</div> <!-- end table-responsive-->
					</div>
				</div> <!-- end card -->
			</div>
		</div>


	</div> <!-- container -->

</div>