 <?php if(count($drivers)):
    foreach($drivers as $driver):?>
 <a href="javascript:void(0)" class="text-reset notification-item" >
                                        <div class="d-flex" onclick="selectDriver(this,<?=$driver->id?>)" style="align-items: center;">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="">
                                                  <?php $media=$driver->getDefaultMedia();

                                                  if(isset($media['file_thumb_path'])):

                                                  ?>

                                                   <img class=" w-100 border-2 rounded-5 border-success" style="height:78px;width: 100%;min-width: 80px;" src="<?=base_url($media['file_thumb_path'])?>" alt="driver">

                                               <?php else:?>

                                                <div class=" w-100 bg-light text-center border rounded-5" style="height:78px;width: 100%;min-width: 80px;font-size:56px" ><i class="fas fa-user"></i></div>



                                              <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="d-block w-100">Name:&nbsp;&nbsp;<b><?=ucwords($driver->first_name)?></b></span>

                                                <span class="d-block w-100">Email:&nbsp;&nbsp;<b><?=($driver->email)?></b></span>

                                                <span class="d-block w-100">Phone:&nbsp;&nbsp;<b><?=($driver->phone)?></b></span>
                                                
                                            </div>

                                             <div class="d-flex w-25" style="pointer-events: all;">
                                               
                                            </div>
                                        </div>
                                    </a>

                                    <?php
                                     endforeach;

                                endif;
                                    ?>

