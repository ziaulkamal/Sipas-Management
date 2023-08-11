
<?php
    if ($this->uri->segment(1) != NULL) {?>
<ol class="breadcrumb m-0">
	<li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
	<li class="breadcrumb-item active"><?= ucwords($this->uri->segment(1)) ?></li>
</ol>
<?php } ?>