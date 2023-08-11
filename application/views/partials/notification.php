                            <!-- Notofication dropdown -->
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fe-bell font-22"></i>
                                    <span class="badge bg-danger rounded-circle noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                                    <small>Clear All</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-1" style="max-height: 300px;" data-simplebar>

									<a href="<?= base_url('list_surat') ?>"
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
													<h5 class="noti-item-title fw-semibold font-14">Bagian Piket <small
															class="fw-normal text-muted ms-1"></small></h5>
													<small class="noti-item-subtitle text-muted"></small>
												</div>
											</div>
										</div>
									</a>


                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                        Lihat Semua
                                    </a>

                                </div>
                            </li>
