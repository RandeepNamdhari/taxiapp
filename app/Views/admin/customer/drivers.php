    <?php

  $drivers=$response['data']['drivers']??[];


   ?>
                                            <div class="tab-pane p-3 active" id="drivers" role="tabpanel">
                                               <div class="row">

                                                    <?php

                                                    foreach($drivers as $driver):

                                                    $media=$driver->getDefaultMedia();


                                                     ?>

                                                    <div class="col-md-6 col-lg-6 col-xl-6 m-2 p-0 h-50 " style="width: 48%;">
        
                                <!-- Simple card -->
                                <div class="card mb-0 border border-success rounded-5 driver-card" style="">
                                    <div class="d-flex">
                                      
                                    <?php if($media):?>

                                    <img class="card-img-top img-fluid w-50" style="height:163px;border-radius:25px 0 0 0;" src="<?=base_url($media['file_thumb_path'])?>" alt="Card image cap">

                                <?php else:?>
                                   

                                    <div class="card-img-top img-fluid w-50 text-center" style="height:163px;border-radius:25px 0px 0 0;font-size: 112px;"  alt="car image cap">

                                        <i class="fas fa-user"></i>

                                    </div>


                                     <?php endif;?>
                                     <div class="p-2 bg-light w-100" style="border-radius: 0 30px 0 0;">
                                        <div class="w-100 d-flex">
                                            <div class="w-25"><b>Name:</b></div>
                                            <div class=""><?=$driver->first_name??''?></div>

                                             </div>

                                              <div class="w-100 d-flex">
                                            <div class="w-25"><b>Phone:</b></div>
                                            <div class=""><?=$driver->phone??''?></div>
                                        </div>

                                              <div class="w-100 d-flex">
                                            <div class="w-25"><b>Email:</b></div>
                                            <div class=""><?=$driver->email??''?></div>
                                        </div>

                                          <div class="w-100 d-flex">
                                            <div class="w-25"><b>Licence No:</b></div>
                                            <div class=""><?=$driver->licence_number??''?></div>
                                        </div>

                                          <div class="w-100 d-flex">
                                            <div class="w-25"><b>Licence Expiry:</b></div>
                                            <div class=""><?=($driver->licence_expiry!='0000-00-00')?$driver->licence_expiry:''?></div>
                                        </div>




                                       
                                     </div>
                                 </div>

                                    

                                     <div class="d-flex justify-content-between p-2 position-relative" style="">

                                         <div>
                                            <input class="form-check form-switch" onchange="changeStatus(<?=$driver->id?>)" type="checkbox" id="switch<?=$driver->id?>" switch="bool" <?php if($driver->status)echo 'checked';?>>
                                            <label class="form-label  full-switch" for="switch<?=$driver->id?>" data-on-label="Active" data-off-label="InActive"></label>

                                        </div> 
                                        <div>
                                           <a href="<?=base_url('admin/customers/'.($customer->id??'').'/drivers/'.($driver->id??'').'/edit')?>" class="fs-5 text-info"><i class="fas fa-edit"></i></a>


                                    

                                          <a href="javascript:void(0)" onclick="deleteDriver(this,<?=$driver->id??''?>)" class="fs-5 text-danger"><i class="fas fa-trash"></i></a>
                                    </div>  

                                    </div>

                                    

                                </div>
        
                            </div>

                        <?php endforeach;?>


                            <div class="col-md-6 col-lg-6 col-xl-3 m-2 p-0 h-50 " style="width: 23%;">
        
                                <!-- Simple card -->
                                <div class="card mb-0 border border-success rounded-5 vehicle-card">
                                      
                                    
                                    <div class="card-img-top img-fluid w-100 text-center" style="height:150px;border-radius:25px 25px 0 0;font-size: 112px;" alt="car image cap">

                                        <i class="fas fa-user"></i>

                                    </div>

                                     
                                     <div class="text-center" style="">
                                        <a href="<?=base_url('admin/customers/'.($customer->id??'').'/drivers/create')?>" class="btn btn-outline-warning">Add New Driver</a>
                                     </div>

                                    

                                    

                                </div>
        
                            </div>

                                                </div>
                                                
                                            </div>