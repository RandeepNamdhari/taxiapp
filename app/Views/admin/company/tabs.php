  <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link <?=$activeTab=='profile'?'active':''?>"  href="<?=base_url('admin/companies/'.($company->id??'').'/view')?>" role="tab" aria-selected="true">
                                                    <span class="d-none d-md-block fs-3"><i class="fas fa-user-alt"></i>&nbsp;Profile</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                </a>
                                            </li>

                                             <li class="nav-item" role="presentation">
                                                <a class="nav-link <?=$activeTab=='employees'?'active':''?>"  href="<?=base_url('admin/companies/'.($company->id??'').'/employees/view')?>" role="tab" aria-selected="true">
                                                    <span class="d-none d-md-block fs-3"><i class="fas fa-hospital-user"></i>&nbsp;Employees</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                </a>
                                            </li>
                                           
                                         
                                        </ul>