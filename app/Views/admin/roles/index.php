
<?= $this->extend('admin/layouts/master') ?>

<?= $this->section('content') ?>

  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Manage Roles</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <!-- <li class="breadcrumb-item"><a href="#">Extra Pages</a></li> -->
                                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                                    </ol>
                                </div>
                                <div class="col-md-4 d-none">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-cog me-2"></i> Settings
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                          <div class="card">
                            <div class="p-4 pb-0 d-flex">
                                <h5 class="card-title mb-0 w-75">Roles and Members</h5>
                                <div class="text-right w-25"><a href=<?=base_url('admin/create/role');?> class="btn btn-primary float-end">Create Role</a></div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50px;"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-sm" alt=""></td>
                                                <td>
                                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-reset">Daniel Canales</a></h5>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary text-primary font-size-13">Frontend</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-sm" alt=""></td>
                                                <td>
                                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-reset">Jennifer Walker</a></h5>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary text-primary font-size-13">UI / UX</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title rounded-circle bg-primary text-white font-size-14">
                                                            C
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-reset">Carl Mackay</a></h5>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary text-primary font-size-13">Backend</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-sm" alt=""></td>
                                                <td>
                                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-reset">Janice Cole</a></h5>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary text-primary font-size-13">Frontend</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title rounded-circle bg-primary text-white font-size-14">
                                                            T
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-reset">Tony Brafford</a></h5>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary text-primary font-size-13">Backend</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end card -->



                    </div> <!-- container-fluid -->
                </div>




                <?= $this->endSection() ?>