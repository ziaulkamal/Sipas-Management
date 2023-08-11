    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span><?php echo $this->session->flashdata('success'); ?></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
 
    <?php if ($this->session->flashdata('message')): ?>
    <div class="alert alert-info" role="alert">
        <span><?php echo $this->session->flashdata('message'); ?></span>
    </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('check_select')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span><?php echo $this->session->flashdata('check_select'); ?></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>