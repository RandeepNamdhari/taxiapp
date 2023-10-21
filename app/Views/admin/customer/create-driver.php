                 <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Add Driver</h4>
                                        <small class="card-title-desc ">Please enter the driver details correctly and check the details before submit.</small>
               <form class="mt-3" id="driverForm" enctype="multipart/form-data" method="POST">

                                            <div class="row">
 <div class="col-md-4 mb-3">
 <label> First Name</label>
 <input  type="text" name="first_name" class="form-control" placeholder="First Name">
 </div>
 <div class="col-md-4 mb-3">
 <label>Middle Name</label>
 <input  type="text" name="middle_name" class="form-control" placeholder="Middle Name">
 </div>
 <div class="col-md-4 mb-3">
 <label>Last Name</label>
 <input type="text" name="last_name" class="form-control" placeholder="Last Name" >
 </div>

 <div class="col-md-4 mb-3">
 <label> Email</label>
 <input  type="text" name="email" class="form-control" placeholder="Email"  autocomplete="no-autofill" >
 </div>
 <div class="col-md-4 mb-3">
 <label>Phone Number</label>
 <input  type="text" name="phone" class="form-control" placeholder="Phone Number" >
 </div>

  <div class="col-md-4  mb-3">
 <label> Suburb</label>
 <input  type="text" name="suburb" class="form-control" placeholder="Suburb" >
 </div>

 <div class="col-md-8 mb-3">
 <label> Address</label>
 <textarea  rows="5" type="text" name="address" class="form-control" placeholder="Address"></textarea>
 </div>

 <div class="col-md-4 mb-3">
    <div class="row">

        <div class="col-md-12 mb-3">
 <label> State</label>
 <select class="form-select" name="state"  >
 <option value="">Select State</option>
<?php if(isset($response['data']['states']) && count($response['data']['states'])):
      foreach($response['data']['states'] as $state): ?>

        <option value="<?=$state['id']?>"><?=$state['code'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 

 <div class="col-md-12 mb-3">
 <label> Post Code</label>
 <input  type="text" name="post_code" class="form-control" placeholder="Post Code" >
 </div>
</div>
</div>
 <div class="col-md-4 mb-3">
 <label>Date of Birth</label>
 <input  type="date" name="date_of_birth" class="form-control" >
 </div>
 
 <div class="col-md-4 mb-3">
 <label> Licence No</label>
 <input type="text" name="licence_number" class="form-control" placeholder="Licence No">
 </div>
 <div class="col-md-4 mb-3">
 <label> Licence Expiry</label>
 <input type="date" name="licence_expiry" class="form-control 
 " placeholder="Licence Expiry">
 </div>

  <div class="col-md-3 mb-3">
 <label> Booking Margin</label>
 <select class="form-select" onchange="changeAmountOfType(this)" name="profit[booking][commission_type_id]"  >
 <option value="">Select Margin Type</option>
<?php if(isset($response['data']['commission_types']) && count($response['data']['commission_types'])):
      foreach($response['data']['commission_types'] as $type): ?>

        <option data-amount="<?=$type['amount']?>" value="<?=$type['id']?>"><?=$type['name'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-3 mb-3">
 <label> Booking Margin Amount</label>
 <input type="text" name="profit[booking][amount]" class="form-control 
 " placeholder="Enter amount or percentage">
 </div>


  <div class="col-md-3 mb-3">
 <label> Addon Margin</label>
 <select class="form-select" onchange="changeAmountOfType(this)" name="profit[add_on][commission_type_id]"  >
 <option value="">Select Margin Type</option>
<?php if(isset($response['data']['commission_types']) && count($response['data']['commission_types'])):
      foreach($response['data']['commission_types'] as $type): ?>

        <option data-amount="<?=$type['amount']?>" value="<?=$type['id']?>"><?=$type['name'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-3 mb-3">
 <label> Addon Margin Amount</label>
 <input type="text" name="profit[add_on][amount]" class="form-control 
 " placeholder="Enter amount or percentage">
 </div>

 <div class="col-md-3 mb-3">
 <label> Cancellation Margin</label>
 <select class="form-select" onchange="changeAmountOfType(this)" name="profit[cancellation][commission_type_id]"  >
 <option value="">Select Margin Type</option>
<?php if(isset($response['data']['commission_types']) && count($response['data']['commission_types'])):
      foreach($response['data']['commission_types'] as $type): ?>

        <option data-amount="<?=$type['amount']?>" value="<?=$type['id']?>"><?=$type['name'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
 </div>
 <div class="col-md-3 mb-3">
 <label> Cancellation Margin Amount</label>
 <input type="text" name="profit[cancellation][amount]" class="form-control 
 " placeholder="Enter amount or percentage">
 </div>

 <div class="col-md-6 mb-3">

  <label for="formFile" class="form-label">Driver Picture</label>
  <input class="form-control" name="driver_picture" type="file" id="formFile">

                                            </div>




 <div class="col-md-12 mt-5 d-flex justify-content-end">
    <label>&nbsp;</label>
  <button class="btn btn-primary form-control serverSaveButton w-25" type="submit">Save</button>
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