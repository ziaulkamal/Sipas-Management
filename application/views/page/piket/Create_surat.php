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
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-6">
                            <div>
                                <label for="project-priority" class="form-label">Diteruskan kepada :</label>
                                                        
                                <select class="form-control" data-toggle="select2" data-width="100%">
                                    <?php if ($this->session->userdata('id_level') == 3 || $this->session->userdata('id_level') == 1) { ?>
                                    <option default>--Pilih--</option>
                                    <option value="persuratan">Persuratan</option>
                                    <option value="pimpinan">Pimpinan</option>
                                    <option value="pembinaan">Pembinaan</option>
                                    <option value="koordinator">Koordinator</option>
                                    <option value="pengawasan">Asisten Pengawasan</option>
                                    <option value="kepala bagian tata usaha">Kepala Bagian Tata Usaha</option>
                                    <option value="wakil kepala kejaksaan tinggi">Wakil Kepala Kejaksaan Tinggi</option>
                                    <option value="asistentu">Asisten Perdata dan Tata Usaha Negara</option>
                                    <option value="intel">Asisten Intelijen</option>
                                    <option value="asisten pidana militer">Asisten Pidana Militer</option>
                                    <option value="asisten tindak pidana umum">Asisten Tindak Pidana Umum</option>
                                    <option value="asisten tindak pidana khusus">Asisten Tindak Pidana Khusus</option>
                                    <?php } elseif ($this->session->userdata('id_level') == 2 ) {?>
                                        <option default>--Pilih--</option>
                                        <option value="persuratan">Persuratan</option>
                                    <?php } elseif ($this->session->userdata('id_level') == 4 ) {?>
                                        <option default>--Pilih--</option>
                                        <option value="persuratan">Persuratan</option>
                                    <?php } ?>

                                
                                </select>

                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle me-1"></i> Kirim </button>
                            <button type="button" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x me-1"></i> Cancel</button>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
    
</div> <!-- container -->

</div>