           <div class="app-menu">

           	<!-- Brand Logo -->
           	<div class="logo-box">
           		<!-- Brand Logo Light -->
           		<a href="index.html" class="logo-light">
           			<img src="<?= base_url('public/') ?>images/logo-light.png" alt="logo" class="logo-lg">
           			<img src="<?= base_url('public/') ?>images/logo-sm.png" alt="small logo" class="logo-sm">
           		</a>

           		<!-- Brand Logo Dark -->
           		<a href="index.html" class="logo-dark">
           			<img src="<?= base_url('public/') ?>images/Artboard.png" alt="dark logo" class="logo-lg">
           			<img src="<?= base_url('public/') ?>images/programmer.png" alt="small logo" class="logo-sm">
           		</a>
           	</div>

           	<!-- menu-left -->
           	<div class="scrollbar">

           		<!--- Menu -->
           		<ul class="menu">

           			<li class="menu-item">
           				<a href="<?= base_url() ?>" class="menu-link">
           					<span class="menu-icon"><i class="fe-home"></i></span>
           					<span class="menu-text"> Dashboard </span>
           				</a>
           			</li>
           			<li class="menu-title">Panel Navigasi</li>
                    
           			<li class="menu-item">
           				<a href="#menuSurat" data-bs-toggle="collapse" class="menu-link">
           					<span class="menu-icon"><i data-feather="mail"></i></span>
           					<span class="menu-text"> Surat </span>
           					<span class="menu-arrow"></span>
           				</a>
           				<div class="collapse" id="menuSurat">
           					<ul class="sub-menu">
           						<li class="menu-item">
           							<a href="<?= base_url('piket/surat/add_document') ?>" class="menu-link">
           								<span class="menu-text">Masukan Permohonan</span>
           							</a>
           						</li>
           						<li class="menu-item">
           							<a href="<?= base_url('create_surat') ?>" class="menu-link">
           								<span class="menu-text">Buat Surat</span>
           							</a>
           						</li>
								   <?php if ($this->session->userdata('level') != 4) { ?>
           						<li class="menu-item">
           							<a href="<?= base_url('lembar_disposisi') ?>" class="menu-link">
           								<span class="menu-text">Buat Lembar Disposisi</span>
           							</a>
           						</li>
								<?php }?>
           						<li class="menu-item">
           							<a href="<?= base_url('list_surat') ?>" class="menu-link">
           								<span class="menu-text">Daftar Surat</span>
           							</a>
           						</li>
           						<li class="menu-item">
           							<a href="#" class="menu-link">
           								<span class="menu-text">Surat Selesai</span>
           							</a>
           						</li>
           					</ul>
           				</div>
           			</li>

					<?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3) { ?>
					<li class="menu-item">
           				<a href="<?= base_url('laporan') ?>" class="menu-link">
           					<span class="menu-icon"><i class="fe-book"></i></span>
           					<span class="menu-text"> Laporan </span>
           				</a>
           			</li>
					<?php } ?>
					<?php if ($this->session->userdata('level') == 1) { ?>
					   <li class="menu-item">
                            <a href="#menuCrm" data-bs-toggle="collapse" class="menu-link">
                                <span class="menu-icon"><i data-feather="users"></i></span>
                                <span class="menu-text"> Petugas </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuCrm">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="<?= base_url('daftar_petugas') ?>" class="menu-link">
                                            <span class="menu-text">Daftar Petugas</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="<?= base_url('list_petugas') ?>" class="menu-link">
                                            <span class="menu-text">List Petugas</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
           			<?php } ?>
           			<li class="menu-item">
           				<a href="<?= base_url('logout')?>" class="menu-link">
           					<span class="menu-icon"><i class="fe-log-out"></i></span>
           					<span class="menu-text"> Logout </span>
           				</a>
           			</li>
           		</ul>
           		<!--- End Menu -->
           		<div class="clearfix"></div>
           	</div>
           </div>