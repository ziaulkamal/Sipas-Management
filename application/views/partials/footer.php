<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div>
					<script>
						document.write(new Date().getFullYear())
					</script> © SIPAS
				</div>
			</div>
			<!-- <div class="col-md-6">
                                <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div> -->
		</div>
	</div>
</footer>

</div>

</div>
<script src="<?= base_url('public/') ?>js/vendor.min.js"></script>
<script src="<?= base_url('public/') ?>js/app.min.js"></script>
<!-- Sweet Alerts js -->
<script src="<?= base_url('public/') ?>libs/sweetalert2/sweetalert2.all.min.js"></script>
<?php $this->load->view('partials/sweetalert-button');?>
<?php $this->load->view('partials/button');?>
<?php $this->load->view('partials/checkbox');?>
<?php
            if (isset($table)) { ?>
<!-- third party js -->
<script src="<?= base_url('public/') ?>libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url('public/') ?>libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= base_url('public/') ?>libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url('public/') ?>libs/pdfmake/build/vfs_fonts.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="<?= base_url('public/') ?>js/pages/datatables.init.js"></script>



<?php }
        ?>

</body>

</html>