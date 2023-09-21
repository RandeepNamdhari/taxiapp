<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>



<?=$this->endSection()?>

<?= $this->section('content') ?>

  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Create Booking</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Booking Management</a></li>
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/customers')?>">Bookings</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create New Booking</li>
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                         <a href="<?=base_url('admin/bookings')?>"  class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left "></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                       <div class="row">

                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Booking Details</h4>
                                        <small class="card-title-desc ">Please enter the  details correctly and check the details before submit.</small>

                                        <form class="mt-3" id="bookingForm">

                                            



                                            <h6 class="p-2 bg-light">Customer Details:</h6>

                                            <div class="row">
                                                 <div class="col-md-4 mb-3">
 <label> Email</label>
 <input  type="text" name="email" class="form-control" placeholder="Email"  onfocusout ="checkIfUserExist(this)" autocomplete="no-autofill" >
 <input type="hidden" name="user_id" id="userId">
 </div>
 <div class="col-md-4 mb-3">
 <label>Phone Number</label>
 <input  type="text" id="userPhone" name="phone" class="form-control" placeholder="Phone Number" >
 </div>
                                            </div>
                                           

                                            <div class="row d-none" id="moreDetails">
 <div class="col-md-6 mb-3">
 <label> First Name</label>
 <input  type="text" name="first_name" id="userFirstName" class="form-control" placeholder="First Name">
 </div>
 <div class="col-md-6 mb-3">
 <label>Last Name</label>
 <input  type="text" id="userLastName" name="last_name" class="form-control" placeholder="Last Name">
 </div>



 <div class="col-md-8 mb-3">
 <label> Address</label>
 <textarea  rows="5" type="text" name="address" class="form-control" placeholder="Address" id="userAddress"></textarea>
 </div>
</div>


  <h6 class="p-2 bg-light">Booking Details:</h6>
                                           

                                            <div class="row">


             <div class="col-md-6 mb-6">
 <label>From Where</label>
 <input  type="text" name="from_location" class="form-control" placeholder="Location From" >
 </div>    

      <div class="col-md-6 mb-6">
 <label>To Where</label>
 <input  type="text" name="to_location" class="form-control" placeholder="Location To" >
 </div>     
 <div class="row mt-2">     

 <div class="col-md-4 mb-6">
 <label>Select Vehicle</label>
 <input  type="text" name="" onkeyup="showVehicles(this,'#vehicleListByAjax')" class="form-control" id="vehicleSearchBox" placeholder="Choose Vehicle" >
 <div id="vehicleListByAjax" class="" style="border:1px solid lightgray;border-top:none;">

     
 </div>
 <input type="hidden" value="" name="vehicle" id="vehicleId">

 </div>      

  <div class="col-md-4 mb-6">
 <label>Select Driver</label>
 <input  type="text" name="" onkeyup="showDrivers(this,'#driverListByAjax')" class="form-control" id="driverSearchBox" placeholder="Choose Driver" >
 <div id="driverListByAjax" class="" style="border:1px solid lightgray;border-top:none;">

     
 </div>
 <input type="hidden" value="" name="driver" id="driverId">

 </div>     

   <div class="col-md-4 mb-6">
 <label>Pick Up Date & Time</label>
 <input  type="datetime-local" name="pickup_time" class="form-control" placeholder="set pickup time" >
 
 </div> 


</div>



 <div class="col-md-4 mb-3">
    <label>&nbsp;</label>
  <button class="btn btn-primary form-control serverSaveButton" type="submit">Save</button>
  <div class="text-center serverLoader d-none">
  <div class="spinner-border text-primary m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div></div>
 </div>

 </div>

                                        </form>
                                      <!-- end form -->
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>

                       </div>





                        </div>
                    </div>





                <?= $this->endSection() ?>

                <?=$this->section('page-script')?>


                <script type="text/javascript">
                    
                     document.getElementById("bookingForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('bookingForm');
   let url='<?=base_url('admin/bookings/store')?>'
  // console.log(data);return false;
   submitNormalForm('bookingForm',url,data);
});

                     function showVehicles(selector,placeholder){

                        let search=$(selector).val();

                        let url='<?=base_url('admin/vehicles/search/list')?>';

                        let data={'search':search};

                      let response=__postRequest(url,data,null);

                    response.then(function(data)
                    {
                        if(data.status)
                        {
                            $(placeholder).html(data.content);
                        }
                    })

                     }


                     function selectVehicle(selector,vehicle_id)
                     {
                        $('.selectedVehicle').remove();
                        $('#vehicleId').val(vehicle_id);

                        var vehicle=$(selector).clone();
                        vehicle.attr('onclick','')
                        vehicle.addClass('border border-rounder border-success mt-1 selectedVehicle')
                        $('#vehicleListByAjax').after(vehicle);


                        $('#vehicleListByAjax').html('');                

                        $('#vehicleSearchBox').val('');
                     }





                 function showDrivers(selector,placeholder){

                        let search=$(selector).val();

                        let url='<?=base_url('admin/drivers/search/list')?>';

                        let data={'search':search};

                      let response=__postRequest(url,data,null);

                    response.then(function(data)
                    {
                        if(data.status)
                        {
                            $(placeholder).html(data.content);
                        }
                    })

                     }


                     function selectDriver(selector,driver_id)
                     {
                        $('.selectedDriver').remove();
                        $('#driverId').val(driver_id);

                        var driver=$(selector).clone();
                        driver.attr('onclick','')
                        driver.addClass('border border-rounder border-success mt-1 p-2 selectedDriver')
                        $('#driverListByAjax').after(driver);


                        $('#driverListByAjax').html('');                

                        $('#driverSearchBox').val('');
                     }


                     function checkIfUserExist(selector)
                     {
                        let email=$('#userEmail').val();
                        let phone=$('#userPhone').val();
                        let user_id=$('#userId').val();
                        $('#userId').val('');

                        if(!user_id && (!email || !phone)){

                         let search=$(selector).val();

                        let url='<?=base_url('admin/users/check/user')?>';

                        let data={'search':search};

                      let response=__postRequest(url,data,null);

                    response.then(function(data)
                    {
                        if(data.status)
                        {
                            let user=data.user;
                           if(user)
                           {
                                $('#userFirstName').val(user.first_name);
                                $('#userLastName').val(user.last_name);
                                $('#userAddress').val(user.address);
                                $('#userPhone').val(user.phone);
                                $('#userAddress').val(user.address);
                                $('#userId').val(user.id);

                          //   if(!$('#moreDetails').hasClass('d-none'))

                             $('#moreDetails').removeClass('d-none');





                           }
                           else
                           {
                             $('#moreDetails').removeClass('d-none');
                           }
                        }
                    })
                }

                     }




        
                </script>

               
      

                <?=$this->endSection()?>