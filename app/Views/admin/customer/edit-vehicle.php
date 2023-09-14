 <?php 

 $vehicle=$response['data']['vehicle'];

 //echo '<pre>';print_r($vehicle->regd_no);die;

 ?>
                 <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Edit Vehicle</h4>
                                        <small class="card-title-desc ">Please enter the vehicle details correctly and check the details before submit.</small>

                                        <form class="mt-3" id="vehicleForm">

                                            <div class="row">
 <div class="col-md-4 mb-3">
 <label> Regd No.</label>
 <input  type="text" name="regd_no" value="<?=$vehicle->regd_no??''?>" class="form-control" placeholder="Registration No.">
 </div>
 <div class="col-md-4 mb-3">
 <label>Make</label>
 <input  type="text" name="make" value="<?=$vehicle->make??''?>" class="form-control" placeholder="Manufacture">
 </div>
 <div class="col-md-4 mb-3">
 <label>Model</label>
 <input type="text" name="model" class="form-control" value="<?=$vehicle->model??''?>" placeholder="Model No." >
 </div>
 <div class="col-md-4 mb-3">
 <label>Year</label>
 <input type="text" name="year" class="form-control" value="<?=$vehicle->year??''?>" placeholder="Year">
 </div>

 <div class="col-md-4 mb-3">
 <label> Body Type</label>
 <select class="form-select" name="body_type"  >
 <option value="">Select Body Type</option>
<?php if(isset($response['data']['states']) && count($response['data']['states'])):
      foreach($response['data']['states'] as $state): ?>

        <option value="<?=$state['id']?>"><?=$state['code'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-4 mb-3">
 <label> Color</label>
 <input type="text" name="color" value="<?=$vehicle->color??''?>" class="form-control" placeholder="Color">
 </div>

  <div class="col-md-4 mb-3">
 <label>State</label>
 <select class="form-select" name="state"  >
 <option value="">Select State</option>
<?php if(isset($response['data']['states']) && count($response['data']['states'])):
      foreach($response['data']['states'] as $state): 

          $sel='';

        if(isset($vehicle->state_id) && $vehicle->state_id===$state['id']):
            $sel='selected';
        endif; ?>

        <option value="<?=$state['id']?>" <?=$sel?>><?=$state['code'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-4 mb-3">
 <label>Vin</label>
 <input type="text" name="vin" value="<?=$vehicle->vin??''?>" class="form-control 
 " placeholder="Vin">
 </div>
 <div class="col-md-4 mb-3">
 <label> Engine No.</label>
 <input type="text" name="engine_no" value="<?=$vehicle->engine_no??''?>" class="form-control" placeholder="Engine No.">
 </div>



 <div class="col-md-4 mb-3">
    <label>&nbsp;</label>
  <button class="btn btn-primary form-control serverSaveButton" type="submit">Update</button>
  <div class="text-center serverLoader d-none">
  <div class="spinner-border text-primary m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div></div>
 </div>

 </div>

                                        </form>
                                      <!-- end form -->
                                  </div>
                              </div>
                          </div>