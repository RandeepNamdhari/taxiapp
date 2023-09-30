   
<?php if(!(isset($currentRoute))):

         $currentRoute='';

     endif;

     ?>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>

                            <li class="<?php echo ($currentRoute=='admin-dashboard')?'mm-active':''?>">
                                <a href="index.html" class="waves-effect <?php echo ($currentRoute=='admin-dashboard')?'active':''?>">
                                    <i class="ti-home"></i>
                                      <!--   <span class="badge rounded-pill bg-primary float-end">1</span> -->
                                    <span>Dashboard</span>
                                </a>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-user"></i>
                                    <span>User Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <!-- <li><a href="javascript: void(0);">Users</a></li> -->
                                    <li class="<?php echo ($currentRoute=='admin-roles')?'mm-active':''?>"><a href="<?=base_url('admin/roles')?>">Roles</a></li>
                                     <li class="<?php echo ($currentRoute=='admin-customers')?'mm-active':''?>"><a href="<?=base_url('admin/customers')?>">Customers</a></li>

                                       <li class="<?php echo ($currentRoute=='admin-companies')?'mm-active':''?>"><a href="<?=base_url('admin/companies')?>">Companies</a></li>

                                  <!--   <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </li>



                            <!--Bookings-->



                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-user"></i>
                                    <span>Booking Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <!-- <li><a href="javascript: void(0);">Users</a></li> -->
                                    <li class="<?php echo ($currentRoute=='admin-bookings')?'mm-active':''?>"><a href="<?=base_url('admin/bookings')?>">Bookings</a></li>
                                  

                               
                                </ul>
                            </li>

                            <!--End Bookings -->

                            <!--services-->

                              <li class="<?php echo ($currentRoute=='admin-services')?'mm-active':''?>">
                                <a href="<?=base_url('admin/services')?>" class="waves-effect <?php echo ($currentRoute=='admin-services')?'active':''?>">
                                    <i class="ti-home"></i>
                                      <!--   <span class="badge rounded-pill bg-primary float-end">1</span> -->
                                    <span>Services</span>
                                </a>
                            </li>

                             <!--aboutus-->

                              <li class="<?php echo ($currentRoute=='admin-pages-about-us')?'mm-active':''?>">
                                <a href="<?=base_url('admin/pages/about-us')?>" class="waves-effect <?php echo ($currentRoute=='admin-pages-aboutus-static')?'active':''?>">
                                    <i class="fas fa-address-card"></i>
                                      <!--   <span class="badge rounded-pill bg-primary float-end">1</span> -->
                                    <span>About Us</span>
                                </a>
                            </li>

                            <!--Settings-->



                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-user"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <!-- <li><a href="javascript: void(0);">Users</a></li> -->
                                    <li class="<?php echo ($currentRoute=='admin-settings-states')?'mm-active':''?>"><a href="<?=base_url('admin/settings/states')?>">States</a></li>
                                     <li class="<?php echo ($currentRoute=='admin-settomgs-vechile-body-types')?'mm-active':''?>"><a href="<?=base_url('admin/settings/vehicle/bodytypes')?>">Vehicle Body Types</a></li>
                                     <li class="<?php echo ($currentRoute=='admin-settings-taxes')?'mm-active':''?>"><a href="<?=base_url('admin/settings/taxes')?>">Taxes</a></li>
                                      <li class="<?php echo ($currentRoute=='admin-settings-fare-types')?'mm-active':''?>"><a href="<?=base_url('admin/settings/fare/types')?>">Fare Types</a></li>

                               
                                </ul>
                            </li>

                            <!--End Settings -->

                            <!--Policies -->

                             <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-file-alt"></i>
                                    <span>Policies</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <!-- <li><a href="javascript: void(0);">Users</a></li> -->
                                      <li class="<?php echo ($currentRoute=='admin-pages-user-policy')?'mm-active':''?>"><a href="<?=base_url('admin/pages/user/policy')?>">User Policy</a></li>
                                    <li class="<?php echo ($currentRoute=='admin-pages-driver-policy')?'mm-active':''?>"><a href="<?=base_url('admin/pages/driver/policy')?>">Driver Policy</a></li>
                                   

                                      <li class="<?php echo ($currentRoute=='admin-pages-cancellation-policy')?'mm-active':''?>"><a href="<?=base_url('admin/pages/cancellation/policy')?>">Cancellation Policy</a></li>
                                  

                               
                                </ul>
                            </li>


                            <!--End Policies -->


                            <!--Term and Conditions -->

                             <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-file-alt"></i>
                                    <span>Terms & Condition</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <!-- <li><a href="javascript: void(0);">Users</a></li> -->
                                      <li class="<?php echo ($currentRoute=='admin-pages-user-terms')?'mm-active':''?>"><a href="<?=base_url('admin/pages/user/terms')?>">User Terms & Condition</a></li>
                                    <li class="<?php echo ($currentRoute=='admin-pages-driver-terms')?'mm-active':''?>"><a href="<?=base_url('admin/pages/driver/terms')?>">Driver Terms & Condtion</a></li>
                                   

                                     
                                  

                               
                                </ul>
                            </li>


                            <!--End Term and Conditions -->

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->