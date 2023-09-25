 <a href="javascript:void(0)" class="text-reset notification-item" >
                                        <div class="d-flex border border-rounder border-success mt-1 selectedVehicle" onclick="selectVehicle(this,<?=$vehicle->id?>)" style="align-items: center;">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="">
                                                  <?php $media=$vehicle->getDefaultMedia();

                                                  if(isset($media['file_thumb_path'])):

                                                  ?>

                                                   <img class=" w-100" style="height:78px;width: 100%;min-width: 121px;" src="<?=base_url($media['file_thumb_path'])?>" alt="car">

                                               <?php else:?>

                                                <div class=" w-100 bg-light text-center" style="height:78px;width: 100%;min-width: 121px;font-size:56px" ><i class="fas fa-car-side"></i></div>



                                              <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="d-block w-100">Model:&nbsp;&nbsp;<b><?=($vehicle->model)?></b></span>

                                                <span class="">Make:&nbsp;&nbsp;<b><?=ucwords($vehicle->make)?></b></span>
                                                
                                            </div>

                                             <div class="d-flex w-25" style="pointer-events: all;">
                                               
                                            </div>
                                        </div>
                                    </a>


