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


                                            foreach($response['data']['vehicle']->media['vehicle'] as $file):?>

                                                <div class="col-md-3"><img src="<?=base_url($file['file_thumb_path'])?>" width="100%"></div>

                                            <?php endforeach; endif;?>


                                    </div>
                                      <!-- end form -->
                                  </div>
                              </div>
                          </div>