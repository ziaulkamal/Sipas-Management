                            <!-- Notofication dropdown -->
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fe-bell font-22"></i>
                                    <span class="badge bg-danger rounded-circle noti-icon-badge"><?= $this->session->userdata('put')->num_rows() ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0" style="width:800px">
                                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="javascript:void(0);" id="pullNotifications" class="text-dark text-decoration-underline"> <small>Bersihkan Notifikasi</small> </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-1" style="max-height: 300px;" data-simplebar>

                                    <?php
 
                                    
                                    switch ($this->session->userdata('level')) {
                                        case '4':
                                            foreach ($this->session->userdata('put')->result() as $notif) {
                                            if ($notif->level == 4) { ?>
                                            <a href="<?= base_url('follow') ?>"
                                                class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                                    <div class="card-body">
                                                        <span class="float-end noti-close-btn text-muted"><i
                                                                class="mdi mdi-close"></i></span>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="notify-icon bg-primary">
                                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 text-truncate ms-2">
                                                                <span class="noti-item-title fw-semibold font-14"><?= $notif->keteranganLog ?> <small
                                                                        class="fw-normal text-muted ms-1"></small></span>
                                                                <small class="noti-item-subtitle text-muted"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php }}
                                            break;
                                        case '3':
                                            foreach ($this->session->userdata('put')->result() as $notif) {
                                            if ($notif->level == 3) { ?>
                                            <a href="<?= base_url('follow') ?>"
                                                class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                                    <div class="card-body">
                                                        <span class="float-end noti-close-btn text-muted"><i
                                                                class="mdi mdi-close"></i></span>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="notify-icon bg-primary">
                                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 text-truncate ms-2">
                                                                <h5 class="noti-item-title fw-semibold font-14"><?= $notif->keteranganLog ?> <small
                                                                        class="fw-normal text-muted ms-1"></small></h5>
                                                                <small class="noti-item-subtitle text-muted"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php }}
                                            break;
                                        
                                        case '2':
                                            foreach ($this->session->userdata('put')->result() as $notif) {
                                            if ($notif->level == 2) { ?>
                                            <a href="<?= base_url('follow') ?>"
                                                class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                                    <div class="card-body">
                                                        <span class="float-end noti-close-btn text-muted"><i
                                                                class="mdi mdi-close"></i></span>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="notify-icon bg-primary">
                                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 text-truncate ms-2">
                                                                <h5 class="noti-item-title fw-semibold font-14"><?= $notif->keteranganLog ?> <small
                                                                        class="fw-normal text-muted ms-1"></small></h5>
                                                                <small class="noti-item-subtitle text-muted"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php }}
                                            break;
                                        
                                        case '2':
                                            foreach ($this->session->userdata('put')->result() as $notif) {
                                            if ($notif->level == 1) { ?>
                                            <a href="<?= base_url('follow') ?>"
                                                class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                                    <div class="card-body">
                                                        <span class="float-end noti-close-btn text-muted"><i
                                                                class="mdi mdi-close"></i></span>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="notify-icon bg-primary">
                                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 text-truncate ms-2">
                                                                <h5 class="noti-item-title fw-semibold font-14"><?= $notif->keteranganLog ?> <small
                                                                        class="fw-normal text-muted ms-1"></small></h5>
                                                                <small class="noti-item-subtitle text-muted"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php }}
                                            break;
                                        
                                        default:
                                            # code...
                                            break;
                                    }
                                    
                                    
                        
                                     ?>
									


                                    </div>

                                </div>
                            </li>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fungsi untuk memperbarui tampilan notifikasi
        function updateNotifications() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= base_url('pull_notifications') ?>", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Hapus notifikasi yang ada di tampilan
                    var notifyContainer = document.querySelector('.dropdown-menu .simplebar-content');
                    while (notifyContainer.firstChild) {
                        notifyContainer.removeChild(notifyContainer.firstChild);
                    }

                    // Iterasi melalui data notifikasi yang ditarik dari server
                    data.forEach(function (notif) {
                        var notification = document.createElement('a');
                        notification.href = "#";
                        notification.className = "dropdown-item p-0 notify-item card unread-noti shadow-none mb-1";
                        // ... (kode elemen notifikasi) ...
                        
                        // Tambahkan notifikasi baru ke tampilan
                        notifyContainer.appendChild(notification);
                    });
                }
            };
            xhr.send();
        }

        // Panggil fungsi updateNotifications saat halaman dimuat
        // updateNotifications();

        // Panggil fungsi updateNotifications saat tombol ditekan
        var pullButton = document.getElementById("pullNotifications");
        pullButton.addEventListener("click", function () {
            updateNotifications();
             window.location.reload();
        });
    });
</script>
