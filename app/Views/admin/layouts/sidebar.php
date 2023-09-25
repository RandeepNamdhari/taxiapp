   
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

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->