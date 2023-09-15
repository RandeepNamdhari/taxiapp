  <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link <?=$activeTab=='profile'?'active':''?>"  href="<?=base_url('admin/customers/'.($customer->id??'').'/view')?>" role="tab" aria-selected="true">
                                                    <span class="d-none d-md-block fs-3"><i class="fas fa-user-alt"></i>&nbsp;Profile</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                </a>
                                            </li>
                                           
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link <?=$activeTab=='vehicles'?'active':''?>" href="<?=base_url('admin/customers/'.($customer->id??'').'/vehicles/view')?>" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-none d-md-block fs-3"><i class="fas fa-car-side"></i>&nbsp;Vehicles</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link <?=$activeTab=='drivers'?'active':''?>" data-bs-toggle="tab" href="#drivers" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-none d-md-block fs-3"><i class="fas fa-users-cog"></i>&nbsp;Drivers</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li>
                                        </ul>