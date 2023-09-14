  <?php

  $vehicles=$response['data']['vehicles']??[];


   ?>

                                            <div class="tab-pane p-3 active" id="vehicles" role="tabpanel">

                                                <div class="row">

                                                    <?php

                                                    foreach($vehicles as $vehicle):

                                                    $media=$vehicle->getDefaultMedia();


                                                     ?>

                                                    <div class="col-md-6 col-lg-6 col-xl-3 m-2 p-0 h-50 " style="width: 23%;">
        
                                <!-- Simple card -->
                                <div class="card mb-0 border border-success rounded-5 vehicle-card">
                                      
                                    <?php if($media):?>

                                    <img class="card-img-top img-fluid w-100" style="height:150px;border-radius:25px 25px 0 0;" src="<?=base_url($media['file_thumb_path'])?>" alt="Card image cap">

                                <?php else:?>

                                    <div class="card-img-top img-fluid w-100 text-center" style="height:150px;border-radius:25px 25px 0 0;font-size: 112px;"  alt="car image cap">

                                        <i class="fas fa-car-side"></i>

                                    </div>

                                     <?php endif;?>

                                     <div class="w-100 bg-light px-2 d-flex justify-content-between fw-bold " style="align-items: end;"><small class="w-25">Model</small><div class="w-75" style="text-align:right;"><?=($vehicle->model)?></div></div>

                                     <div class="d-flex justify-content-between p-2 position-relative" style="">

                                         <div>
                                            <input class="form-check form-switch" onchange="changeStatus(1)" type="checkbox" id="switch1" switch="bool" checked="">
                                            <label class="form-label  full-switch" for="switch1" data-on-label="Active" data-off-label="InActive"></label>

                                        </div> 
                                        <div>
                                           <a href="<?=base_url('admin/customers/'.($customer->user_id??'').'/vehicles/'.($vehicle->id??'').'/edit')?>" class="fs-5 text-info"><i class="fas fa-edit"></i></a>


                                        
                                        <a href="<?=base_url('admin/customers/'.($customer->user_id??'').'/vehicles/'.($vehicle->id??'').'/gallery')?>" class="fs-5 text-warning"><i class="fas fa-images"></i></a>

                                          <a href="javascript:void(0)" onclick="deleteVehicle(this,<?=$vehicle->id??''?>)" class="fs-5 text-danger"><i class="fas fa-trash"></i></a>
                                    </div>  

                                    </div>

                                    

                                </div>
        
                            </div>

                        <?php endforeach;?>


                            <div class="col-md-6 col-lg-6 col-xl-3 m-2 p-0 h-50 " style="width: 23%;">
        
                                <!-- Simple card -->
                                <div class="card mb-0 border border-success rounded-5 vehicle-card">
                                      
                                    
                                    <div class="card-img-top img-fluid w-100 text-center" style="height:150px;border-radius:25px 25px 0 0;font-size: 112px;" alt="car image cap">

                                        <i class="fas fa-car-side"></i>

                                    </div>

                                     
                                     <div class="text-center" style="">
                                        <a href="<?=base_url('admin/customers/'.($customer->user_id??'').'/vehicles/create')?>" class="btn btn-outline-warning">Add New Vehicle</a>
                                     </div>

                                    

                                    

                                </div>
        
                            </div>

                                                </div>
                                                
                                            </div>