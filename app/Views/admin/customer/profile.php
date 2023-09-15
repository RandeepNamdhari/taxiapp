
                                            <div class="tab-pane p-3 active show pt-3" id="profile" role="tabpanel">

                                                <div class="row">

                                                    <div class="col-md-6">
                                                     
                                                   <div class="d-flex" style="align-items:center;">
                                                       <h5 class="d-inline-block w-75">Customer Information</h5>

                                                       <div class="w-25 text-end" >

                                                       <a href="<?=base_url('admin/customers/'.($customer->id??'').'/edit')?>" class="fs-4 text-primary text-end">
                                                                   <i class="fas fa-edit"></i> </a>
                                                               </div>
                                                   </div>
                                                        <hr class="mt-1" style="border:1px solid;border-radius: 25px;">


            <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Full Name:</strong><span class="d-inline-block w-75"> <?=($customer->first_name??'').' '.($customer->middle_name??'').' '.($customer->last_name??'')?><span></p>

                  <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Company:</strong><span class="d-inline-block w-75"> <?=$customer->company_name??''?><span></p>

                 <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Email:</strong><span class="d-inline-block w-75"> <?=$customer->email??''?><span></p>

                     <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">phone:</strong><span class="d-inline-block w-75"> <?=$customer->phone??''?><span></p>

                         <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Date Of Birth:</strong><span class="d-inline-block w-75"> <?=$customer->date_of_birth??''?><span></p>

                    <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Address:</strong><span class="d-inline-block w-75"> <?=$customer->address??''?><span></p>

                        <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Suburb:</strong><span class="d-inline-block w-75"> <?=$customer->suburb??''?><span></p>

                             <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">State:</strong><span class="d-inline-block w-75"> <?=$customer->state??''?><span></p>

                                 <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Post Code:</strong><span class="d-inline-block w-75"> <?=$customer->post_code??''?><span></p>
         
                                                </div>

                                                <div class="col-md-5">
                                               
                                                     
                                                   <div class="d-flex" style="align-items:center;">
                                                       <h5 class="d-inline-block w-75 pb-1">Licence Information</h5>

                                                       <div class="w-25 text-end" >
<!-- 
                                                       <a href="<?=base_url('admin/customers/'.($customer->user_id??'').'/edit')?>" class="fs-4 text-primary text-end">
                                                                   <i class="fas fa-edit"></i> </a> -->
                                                               </div>
                                                   </div>
                                                     <hr class="mt-1" style="border:1px solid;border-radius: 25px;">

                                                     <div class="row">

                                                        <div class="col-md-12">



                                                         
                                        <div class="mb-5">

                                            <p><strong  class="w-50 d-inline-block" style="vertical-align: top;">Licence Number:</strong><span class="d-inline-block w-50"> <?=$customer->licence_number??''?><span></p>

                                                <p><strong  class="w-50 d-inline-block" style="vertical-align: top;">Licence Expiry:</strong><span class="d-inline-block w-50"> <?=$customer->licence_expiry??''?><span></p>


                                            <form action="#" style="display:<?php if($licence_front)echo 'none';?>;" class="custom-dropzone" id="licence_front">
                                                <div class="fallback">
                                                    <input name="licence_front" type="file">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <h5>Drop your licence front image here.</h5>
                                                </div>
                                            </form><!-- end form -->

                                            <?php if($licence_front):



                                                echo '<div><img class="mh-207" src="'.base_url($licence_front).'" width="100%"><button class="btn btn-dark licence-change-button" onclick="showUploadArea(this)" class="text-secondary text-end"><i class="fas fa-edit"></i></button><button class="btn btn-dark licence-view-button" onclick="OpenImageModel(this,\''.base_url($licence_front).'\')" class="text-secondary text-end"><i class="fas fa-external-link-alt"></i></button></div>';


                                              endif;?>

                                          
                                        </div>

                                                        </div>

                                                        <div class="col-md-12">

                                                                 <div class="mb-5">
                                            <form action="#" style="display:<?php if($licence_back)echo 'none';?>;" class="custom-dropzone" id="licence_back">
                                                <div class="fallback">
                                                    <input name="licence_back" type="file">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <h5>Drop your licence back image here.</h5>
                                                </div>
                                            </form><!-- end form -->
                                             <?php if($licence_back):



                                                   echo '<div><img class="mh-207" src="'.base_url($licence_back).'" width="100%"><button class="btn btn-dark licence-change-button" onclick="showUploadArea(this)" class="text-secondary text-end"><i class="fas fa-edit"></i></button><button class="btn btn-dark licence-view-button" onclick="OpenImageModel(this,\''.base_url($licence_back).'\')" class="text-secondary text-end"><i class="fas fa-external-link-alt"></i></button></div>';


                                              endif;?>
                                        </div>

                                                        </div>

                                                         

                                                     </div>
                                                </div>
                                               
                                            </div>
                                        </div>