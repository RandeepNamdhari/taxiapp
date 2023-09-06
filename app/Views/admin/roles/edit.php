
   <?php 

   $moduleWithPermissions=$selectedPermissions=[];

   $role_id=$response['data']['role']['id']??0;

   if(isset($response['data']['permissions'])):


   foreach($response['data']['permissions'] as $permission):

   $module=strstr($permission['name'], '.', true);                                             

  $moduleWithPermissions[$module][]=$permission;



   endforeach;


endif;



   if(isset($response['data']['role']['permissions'])):

    $selectedPermissions=array_values(array_column($response['data']['role']['permissions'], 'permission_id'));

   endif;

 

                                                ?>

<?= $this->extend('admin/layouts/master') ?>

<?= $this->section('content') ?>

  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Roles</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/roles')?>">Roles</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                                    </ol>
                                </div>

                                  <div class="col-md-4">
                                    <div class="text-center">
                                     
                                          <a href="<?=base_url('admin/roles')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left "></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                        

                     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">

                                        <form id="roleForm">

                                        <h4 class="card-title bg-success text-light p-2">Edit Role And Set Permissions</h4>

                                        <div class="p-5">
                                     
                                        <div class="row mb-3">
                                            <label for="role_name" class="col-sm-2 col-form-label">Role Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Role Name" id="role_name" value="<?=$response['data']['role']['name']??''?>">
                                            </div>
                                        </div>
                                     
                                        <!-- end row -->
                                        <div class="row mt-5">
                                         
            <?php foreach($moduleWithPermissions as $module => $permissions): ?>
                                          
                                           <div class="col-md-6 col-lg-6 col-xl-4">
        
                                         <div class="card">

                                    <div class="card-body">

                                       <div class="d-flex">
                                        <span class="card-title d-block w-75"><b><?=ucwords($module);?></b></span>
                                        <input class="form-check form-switch w-25" onchange="selectAll('<?=$module?>',this)" type="checkbox" id="<?=$module;?>" switch="none">
                                            <label class="form-label" for="<?=$module;?>" data-on-label="All" data-off-label="None"></label>

                                    </div>

                                         <?php foreach($permissions as $kk=> $permission): 

                                            $checked='';

                                            if(in_array($permission['id'], $selectedPermissions)):
                                                $checked='checked';
                                            endif;

                                            ?>


                                          
                                         <div class="d-flex">
                                             
                                        <span class=" d-block w-75"><?=$permission['name'];?></span>

                                        <div class="w-25 d-flex justify-content-center">
  <input class="form-check w-50 mr-2 permissionsInput <?=$module?>" name="permissions[]"  value="<?=$permission['id'];?>" type="checkbox" <?=$checked?>>

                                    </div>
                                       
                                        

                                    </div>

                                    <?php endforeach;

                                    ?>

                                    </div>
                                  
                                </div>
        
                            </div>

                               <?php endforeach;
                              
                                    ?>

                                    <p id="permissions"></p>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12" style="text-align:right;">
                                            <button class="btn btn-primary w-25">Save</button>
                                        </div>
                                        </div>

                                    </div>
                                        <!-- end row -->
                                    </div><!-- end cardbody -->
                                </form>
                                </div><!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container-fluid -->
                </div>



                <?= $this->endSection() ?>


                <?=$this->section('page-script')?>

                <script type="text/javascript">

                    function selectAll(selector,currElement)
                    {
                        
                        if( $(currElement).prop('checked')){

                        $('input.'+selector).prop('checked',true);


                        }
                        else
                        {

                        $('input.'+selector).prop('checked',false);
                           
                        }
                    }




                     document.getElementById("roleForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   submitform();
});

            function submitform(){

                 
          
            var data={};

            data.permissions=[];

            data.role_name=$('#roleForm').find('#role_name').val();

            $.each($('#roleForm').find('.permissionsInput'),function()
                {
                    if($(this).prop('checked'))
                    data.permissions.push($(this).val());
                });

           
           
            var url="<?=base_url('admin/update/'.$role_id.'/role');?>";

               var response=__postRequest(url,data,__showMessage);

        response.then(function(data){

            $('.validation-error').remove();
            $('.alert-danger').remove();

           if(!data.status && data.errors)
          {
            Object.keys(data.errors).forEach(key => {

              
                     $('#roleForm').find('#'+key).after('<div class="validation-error">'+data.errors[key].replace('_',' ')+'</div>');
                 
              
              });
          }
         
        })


        }




                </script>



                <?=$this->endSection()?>