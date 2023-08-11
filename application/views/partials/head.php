
            <div class="content-page">

                <!-- ========== Topbar Start ========== -->
                <div class="navbar-custom">
                    <div class="topbar">
                        <div class="topbar-menu d-flex align-items-center gap-1">

                            <!-- Topbar Brand Logo -->
                            <div class="logo-box">
                                <!-- Brand Logo Light -->
                                <a href="index.html" class="logo-light">
                                    <img src="<?= base_url('public/') ?>images/logo-light.png" alt="logo" class="logo-lg">
                                    <img src="<?= base_url('public/') ?>images/logo-sm.png" alt="small logo" class="logo-sm">
                                </a>

                                <!-- Brand Logo Dark -->
                                <a href="index.html" class="logo-dark">
                                    <img src="<?= base_url('public/') ?>images/logo-dark.png" alt="dark logo" class="logo-lg">
                                    <img src="<?= base_url('public/') ?>images/logo-sm.png" alt="small logo" class="logo-sm">
                                </a>
                            </div>

                            <!-- Sidebar Menu Toggle Button -->
                            <button class="button-toggle-menu">
                                <i class="mdi mdi-menu"></i>
                            </button>

                        </div>

                        <ul class="topbar-menu d-flex align-items-center">


                            <?php $this->load->view('partials/notification'); ?>

                            <?php $this->load->view('partials/users'); ?>

                        </ul>
                    </div>
                </div>
             
                <div class="row">
                    <div class="col-lg-12 mt-2 mb-2">
                        <!-- alerts -->
                    </div>
                </div>