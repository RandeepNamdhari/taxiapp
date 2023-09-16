                 <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Vehicle Gallery</h4>
                                        <small class="card-title-desc ">Please upload upto 10 images of your vehicle.</small>

                                        

                                        <div class="col-md-12 m-1" >

                                         <form action="#" class="custom-dropzone" id="vehicleImages">
                                                <div class="fallback">
                                                    <input name="vehicle_image" type="file" multiple="multiple">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <h5>Drop your vehicle images here.</h5>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="row mt-3" id="gallerDiv">

                                            <?php 
                                           // echo '<pre>';print_r($response['data']['vehicle']-);die;

                                            if(isset($response['data']['vehicle']->media['vehicle']) && count($response['data']['vehicle']->media['vehicle'])):


                                            foreach($response['data']['vehicle']->media['vehicle'] as $file):

                                                $allFiles[]=base_url($file['file_path']);

                                                ?>

                                                <div class="col-md-3 mb-3 image-card"><img src="<?=base_url($file['file_thumb_path'])?>" width="100%">

                                                    <div class="d-flex justify-content-between p-1" style="height:0;position: relative;top: -30px;">

                                                         <div>
                                            <input class="form-check form-switch statusInput" onchange="changeFileStatus(this,<?=$file['id']?>)" type="checkbox" id="switch<?=$file['id']?>" switch="warning" <?php if($file['is_default'])echo 'checked';?>>
                                            <label class="form-label  full-switch" for="switch<?=$file['id']?>" data-on-label="Default" data-off-label="None"></label>

                                        </div> <div>

                                                         <a href="javascript:void(0)" onclick="OpenImageModel(this,'<?=base_url($file['file_path'])?>')" class="fs-5 text-success"><i class="fas fa-eye"></i></a>

                                                           <a href="javascript:void(0)" onclick="deleteFile(this,<?=$file['id']??''?>)" class="fs-5 text-danger"><i class="fas fa-trash"></i></a>


                                                    </div>
                                                </div>

                                                </div>

                                            <?php endforeach; endif;?>


                                    </div>
                                      <!-- end form -->
                                  </div>
                              </div>
                          </div>