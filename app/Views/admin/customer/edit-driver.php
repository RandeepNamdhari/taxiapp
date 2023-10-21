   
 <?php 

 $driver=$response['data']['driver'];

 $profit=[];

 if(isset($driver->profit) && count($driver->profit)):



foreach($driver->profit as $row):

$profit[$row['type']]=$row;

endforeach;



 // echo '<pre>';print_r($profit);die;


 endif;


 ?>
                 <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Edit Driver</h4>
                                        <small class="card-title-desc ">Please enter the driver details correctly and check the details before submit.</small>
               <form class="mt-3" id="driverForm" enctype="multipart/form-data" method="POST">

                                            <div class="row">
 <div class="col-md-4 mb-3">
 <label> First Name</label>
 <input  type="text" name="first_name" value="<?=$driver->first_name?>" class="form-control" placeholder="First Name">
 </div>
 <div class="col-md-4 mb-3">
 <label>Middle Name</label>
 <input  type="text" name="middle_name" value="<?=$driver->middle_name?>" class="form-control" placeholder="Middle Name">
 </div>
 <div class="col-md-4 mb-3">
 <label>Last Name</label>
 <input type="text" name="last_name" class="form-control" value="<?=$driver->last_name?>" placeholder="Last Name" >
 </div>

 <div class="col-md-4 mb-3">
 <label> Email</label>
 <input  type="text" name="email" value="<?=$driver->email?>" class="form-control" placeholder="Email"  autocomplete="no-autofill" >
 </div>
 <div class="col-md-4 mb-3">
 <label>Phone Number</label>
 <input  type="text" name="phone" value="<?=$driver->phone?>" class="form-control" placeholder="Phone Number" >
 </div>

  <div class="col-md-4  mb-3">
 <label> Suburb</label>
 <input  type="text" name="suburb" class="form-control" value="<?=$driver->suburb?>" placeholder="Suburb" >
 </div>

 <div class="col-md-8 mb-3">
 <label> Address</label>
 <textarea  rows="5" type="text" name="address" class="form-control" placeholder="Address"><?=$driver->address?></textarea>
 </div>

 <div class="col-md-4 mb-3">
    <div class="row">

        <div class="col-md-12 mb-3">
 <label> State</label>
 <select class="form-select" name="state"  >
 <option value="">Select State</option>
<?php if(isset($response['data']['states']) && count($response['data']['states'])):
      foreach($response['data']['states'] as $state):
        $sel='';

        if($driver->state_id==$state['id']):
            $sel='selected';
        endif;

       ?>

        <option value="<?=$state['id']?>" <?=$sel?>><?=$state['code'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 

 <div class="col-md-12 mb-3">
 <label> Post Code</label>
 <input  type="text" name="post_code" value="<?=$driver->post_code?>" class="form-control" placeholder="Post Code" >
 </div>
</div>
</div>
 <div class="col-md-4 mb-3">
 <label>Date of Birth</label>
 <input  type="date" name="date_of_birth" value="<?=$driver->date_of_birth?>" class="form-control" >
 </div>
 
 <div class="col-md-4 mb-3">
 <label> Licence No</label>
 <input type="text" name="licence_number" value="<?=$driver->licence_number?>" class="form-control" placeholder="Licence No">
 </div>
 <div class="col-md-4 mb-3">
 <label> Licence Expiry</label>
 <input type="date" name="licence_expiry" class="form-control 
 " placeholder="Licence Expiry" value="<?=$driver->licence_expiry?>">
 </div>



  <div class="col-md-3 mb-3">
 <label> Booking Margin</label>
 <select class="form-select" onchange="changeAmountOfType(this)" name="profit[booking][commission_type_id]"  >
 <option value="">Select Margin Type</option>
<?php if(isset($response['data']['commission_types']) && count($response['data']['commission_types'])):
      foreach($response['data']['commission_types'] as $type):

        $bsel='';

      if(isset($profit['booking']) && $profit['booking']['commission_type_id']==$type['id']):
       $bsel='selected';
       endif; 

        ?>

        <option <?=$bsel?> data-amount="<?=$type['amount']?>" value="<?=$type['id']?>"><?=$type['name'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-3 mb-3">
 <label> Booking Margin Amount</label>
 <input type="text" name="profit[booking][amount]" class="form-control 
 " placeholder="Enter amount or percentage" value="<?=$profit['booking']['amount']??''?>">
 </div>


  <div class="col-md-3 mb-3">
 <label> Addon Margin</label>
 <select class="form-select" onchange="changeAmountOfType(this)" name="profit[add_on][commission_type_id]"  >
 <option value="">Select Margin Type</option>
<?php if(isset($response['data']['commission_types']) && count($response['data']['commission_types'])):
      foreach($response['data']['commission_types'] as $type): 
           $asel='';

      if(isset($profit['add_on']) && $profit['add_on']['commission_type_id']==$type['id']):
       $asel='selected';
       endif; 
       ?>

        <option <?=$asel?> data-amount="<?=$type['amount']?>" value="<?=$type['id']?>"><?=$type['name'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-3 mb-3">
 <label> Addon Margin Amount</label>
 <input type="text" name="profit[add_on][amount]" class="form-control 
 " placeholder="Enter amount or percentage" value="<?=$profit['add_on']['amount']??''?>">
 </div>

 <div class="col-md-3 mb-3">
 <label> Cancellation Margin</label>
 <select class="form-select" onchange="changeAmountOfType(this)" name="profit[cancellation][commission_type_id]"  >
 <option value="">Select Margin Type</option>
<?php if(isset($response['data']['commission_types']) && count($response['data']['commission_types'])):
      foreach($response['data']['commission_types'] as $type): 

         $csel='';

      if(isset($profit['cancellation']) && $profit['cancellation']['commission_type_id']==$type['id']):
       $csel='selected';
       endif; 

        ?>

        <option <?=$csel?> data-amount="<?=$type['amount']?>" value="<?=$type['id']?>"><?=$type['name'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-3 mb-3">
 <label> Cancellation Margin Amount</label>
 <input type="text" name="profit[cancellation][amount]" class="form-control 
 " placeholder="Enter amount or percentage" value="<?=$profit['cancellation']['amount']??''?>">
 </div>
<?php $media=$driver->getDefaultMedia();

   if(isset($media['file_thumb_path'])): ?>


  <div class="col-md-3 mb-3">

  <label for="formFile" class="form-label">Old Driver Picture</label>
 <img style="width:100%" src="<?=base_url($media['file_thumb_path'])?>"/>

                                            </div>

                                        <?php endif;?>



 <div class="col-md-3 mb-3">

  <label for="formFile" class="form-label">Driver Picture</label>
  <input class="form-control" name="driver_picture"  type="file" id="formFile">

                                            </div>




 <div class="col-md-12 mt-5 d-flex justify-content-end">
    <label>&nbsp;</label>
  <button class="btn btn-primary form-control serverSaveButton w-25" type="submit">Update</button>
  <div class="text-center serverLoader d-none w-25">
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