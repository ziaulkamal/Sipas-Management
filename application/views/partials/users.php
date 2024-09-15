                            <li class="dropdown">
                                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?= base_url('public/') ?>images/users/man.jpg" alt="user-image" class="rounded-circle">
                                    <span class="ms-1 d-none d-md-inline-block">Masuk Sebagai <?php switch ($this->session->userdata('level')) {
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
                                        case '5':
                                            echo "Pembinaan";
                                            break;
                                        case '6':
                                            echo "Intelijen";
                                            break;
                                        case '7':
                                            echo "Asisten Tindak Pidana Umum";
                                            break;
                                        case '8':
                                            echo "Asisten Tindak Pidana Khusus";
                                            break;
                                        case '9':
                                            echo "Asisten Perdata dan Tata Usaha";
                                            break;
                                        case '10':
                                            echo "Asisten Pidana Militer";
                                            break;
                                        case '11':
                                            echo "Asisten Pengawasan";
                                            break;
                                        case '12':
                                            echo "Koordinator";
                                            break;
                                        
  
                                    } ?>
                                     <i class="mdi mdi-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">


                                    <!-- item-->
                                    <a href="<?= base_url('logout')?>" class="dropdown-item notify-item text-danger">
                                        <i class="fe-log-out"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </li>