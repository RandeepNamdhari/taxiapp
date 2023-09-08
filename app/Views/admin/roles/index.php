
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
                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/create/role')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-plus-circle"></i>&nbsp;Create Role
                                            </a>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                          <div class="card">
                            <div class="p-4 pb-0 d-flex">
                                <h5 class="card-title mb-0 w-75">Roles and Members</h5>
                               
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
                                             
                                                <td style="width: 60%;">

                                                    <div  class="d-flex team-members vertical-scroll-bar membersTD__<?=$role['id']?>" style="overflow: scroll;max-width:300px;">
                                                           <?php if(isset($role['users']) && count($role['users'])):?>

                                                         <?php

                                                    

                                                          foreach($role['users'] as $ind => $user):?>
                                                     <!--    <div>
                                                    <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-sm zIndex0" alt="">
                                                </div> -->

                                                     <div data-toggle="tooltip" data-placement="top" title="<?=ucwords($user['username'])?>" class="avatar-sm zIndex0 role-member"  onclick="showDeleteIcon(this)">
                                                       
                                                        <span class="avatar-title rounded-circle text-white font-size-14" style="background:<?=randomColor($user['username'])?>;">
                                                        <?=  strtoupper(mb_substr($user['username'], 0, 1));?>
                                                        </span>
                                                         <span onclick="detachUser(this,<?=$user['id'];?>,<?=$role['id']?>)" class="remove-icon-user removeUserIcon">X</span>
                                                    </div>
                                                <?php endforeach;
                                               
                                            endif;
                                        ?>
                                                     <div class="avatar-sm zIndex1 role-member" onclick="__showUserModal(this,'<?=$role['id']?>','user_roles')">
                                                        <span class="avatar-title rounded-circle bg-dark text-white font-size-14" style="cursor: pointer;">
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

                <script type="text/javascript" src="<?=base_url('admin/assets/js/usermodal.js')?>"></script>

                <script type="text/javascript">

                    function showDeleteIcon(selector)
                    {
                       // $(selector).find('.removeUserIcon').css('visibility','visible')
                    }



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

                    function detachUser(selector,id,role_id)
                    {
                        if(role_id && id){

                             var url="<?=base_url();?>"+"admin/detach/user_role";

                             var data={"model_id":role_id,'user_id':id}

                            __askThenDelete(url,data,function(response)
                            {
                               response.then(function(data)
                               {
                                   if(data.status)
                                   {
                                      $(selector).parents('div').eq(0).remove();
                                   }
                               })
                            })
                        }
                    }

                function attachSuccess(data,selector)
                {
                    console.log(data);
                   if(data.status && data.data.content)
                   {
                         $('.membersTD__'+data.data.model_id).prepend(data.data.content);

                         $(selector).parents('a').eq(0).remove();

        ;


                         __showMessage(data.message,data.type);
                   }
                }

                </script>

                <?=$this->endSection();?>