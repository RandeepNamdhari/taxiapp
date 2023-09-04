
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
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                         <li class="breadcrumb-item"><a href="#">User Management</a></li>
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
                                        <thead>
                                            <th>Members</th>
                                            <th>Role</th>
                                            <th class="text-center">Action</th>



                                        </thead>
                                        <tbody>
                                            <?php if(isset($response['data']['roles']) && count($response['data']['roles'])):

                                            foreach($response['data']['roles'] as $role):

                                             ?>
                                            <tr>
                                                <?php if(isset($role['users']) && count($role['users'])):?>
                                                <td style="width: 60%;">
                                                    <div class="d-flex team-members">

                                                         <?php foreach($role['users'] as $ind => $user):?>
                                                     <!--    <div>
                                                    <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-sm zIndex0" alt="">
                                                </div> -->

                                                     <div class="avatar-sm zIndex0 <?php if($ind >0)echo 'role-member';?>">
                                                        <span class="avatar-title rounded-circle bg-primary text-white font-size-14">
                                                            C
                                                        </span>
                                                    </div>
                                                <?php endforeach;
                                            endif;?>
                                                     <div class="avatar-sm zIndex1 role-member" onclick="__showUserModal(this,'<?=$role['id']?>')">
                                                        <span class="avatar-title rounded-circle bg-dark text-white font-size-14">
                                                            +
                                                        </span>
                                                    </div>
                                                </div>

                                                </td>
                                        
                                                <td>
                                                    <div>
                                                        <a href="javascript: void(0);" class="badge bg-primary-subtle text-primary text-primary font-size-13"><?=$role['name']?></a>
                                                    </div>
                                                </td>

                                                  <td class="text-center">
                                                           <a href="<?=base_url('admin/edit/'.$role['id'].'/role')?>" class="fs-5 text-muted">
                                                                   <i class="fas fa-edit"></i> </a>

                                                            <a href="javascript:void(0)" class="fs-5 text-danger" onclick="deleteRole(<?=$role['id']?>,this);">
                                                                   <i class="fas fa-trash-alt"></i> </a>

                                                                  
                                                    
                                                </td>
                                            </tr>

                                            <?php

                                        endforeach;

                                             endif;?>
                                       
                                         
                                          
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end card -->



                    </div> <!-- container-fluid -->
                </div>


                 <?= view('admin/partials/user-modal') ?>




                <?= $this->endSection() ?>


                <?=$this->section('page-script')?>

                <script type="text/javascript">

                    function deleteRole(role_id,selector)
                    {
                        if(role_id){

                             var url="<?=base_url();?>"+"admin/delete/"+role_id+"/role";

                             var data={"id":role_id}

                            __askThenDelete(url,data,function(response)
                            {
                               response.then(function(data)
                               {
                                   if(data.status)
                                   {
                                      $(selector).closest('tr').remove();
                                   }
                               })
                            })
                        }
                    }

                </script>

                <?=$this->endSection();?>