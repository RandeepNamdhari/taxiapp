
<?php

    $booking=$response['data']['booking']??[];

    $booking_detail=$response['data']['booking']['booking_details'][0];

    //echo '<pre>';print_r($booking);die;

 ?>
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
                                    <h6 class="page-title">Edit Booking</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Booking Management</a></li>
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/bookings')?>">Bookings</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Booking</li>
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

                                            <input type="hidden" id="customerTypeId" value="<?=$booking['customer_type']??''?>" name="customer_type">

                                            



                                            <h6 class="p-2 bg-light">Customer Details:</h6>

                                            <div class="row mb-3">

                                                <label>Booking Customer Type</label>

                                                 <div class="d-flex justify-content-around w-75">

                                                    <div onclick="changeCustomerType(this,1)" class="col-md-4 p-2 text-center border rounded-5 border-light text-center <?=($booking['customer_type']==1)?'bg-warning':''?> customer-types" style="cursor:pointer;">

                                                  <span class="fs-5">Individual</span>
                                                </div>

                                                <div onclick="changeCustomerType(this,2)" class="col-md-4 p-2 text-center border rounded-5 border-light text-center customer-types <?=($booking['customer_type']==2)?'bg-warning':''?>" style="cursor:pointer;">

                                                    <span class="fs-5">Carporate</span>
                                                </div>

                                                

                                                </div>

                                            </div>

                                            <div class="row carporate <?=($booking['customer_type']==1)?'d-none':''?> mb-3">
                                            <div class="col-md-4 mb-6">
 <label>Select Company</label>
 <input  type="text" name="" onkeyup="showCompanies(this,'#companyList')" class="form-control" id="companySearchBox" placeholder="Choose Company" >
 <div id="companyList" class="" style="border:1px solid lightgray;border-top:none;">



     
 </div>

 <?php if(isset($booking['company_id']) && $booking['company_id'] && $booking['customer_type']==2):

        $company['id']=$booking['company_id'];
        $company['company_name']=$booking['company_name'];
        $company['abn_number']=$booking['abn_number'];
        $company['acn_number']=$booking['acn_number'];




        ?>

 <?=view('admin/partials/single_company',['company'=>(object)$company])?>

<?php endif;?>
 <input type="hidden" value="<?=$booking['company_id']??''?>" name="company" id="companyId">

 </div>   

     <div class="col-md-4 mb-6">
 <label>Select Employee</label>
 <input  type="text" name="" onkeyup="showEmployees(this,'#employeeList')" class="form-control" id="employeeSearchBox" placeholder="Choose Employee" >
 <div id="employeeList" class="" style="border:1px solid lightgray;border-top:none;">

     <?php if(isset($booking['user_id']) && $booking['user_id'] && $booking['customer_type']==2):

        $employee['id']=$booking['employee_id'];
        $employee['first_name']=$booking['first_name'];
        $employee['phone']=$booking['phone'];
        $employee['email']=$booking['email'];




        ?>

 <?=view('admin/partials/single_employee',['employee'=>(object)$employee])?>

<?php endif;?>

     
 </div>
 <input type="hidden" value="<?=$booking['employee_id']??''?>" name="employee" id="employeeId">

 </div>   

                                            </div>


                                            <div class="row individual <?=($booking['customer_type']==2)? 'd-none':''?>" id="">


                                                 <div class="col-md-4 mb-3">
 <label> Email</label>
 <input  type="text" name="email" value="<?=$booking['email']??''?>" class="form-control" id="userEmail" placeholder="Email"   autocomplete="no-autofill" >
 <input type="hidden" value="<?=$booking['user_id']??''?>" name="user_id" id="userId">
 </div>
 <div class="col-md-6 mb-3">
 <label>Phone Number</label>
 <input  type="text" id="userPhone" onkeyup="checkIfUserExist(this)" value="<?=$booking['phone']??''?>" name="phone" class="form-control" placeholder="Phone Number" >
 </div>
                                            </div>
                                           

                                            <div class="row individual <?=($booking['customer_type']==2)? 'd-none':''?>" id="moreDetails">

 <div class="col-md-4">                                               
 <div class="col-md-12 mb-3">
 <label> First Name</label>
 <input  type="text" value="<?=$booking['first_name']??''?>" name="first_name" id="userFirstName" class="form-control" placeholder="First Name">
 </div>
 <div class="col-md-12 mb-3">
 <label>Last Name</label>
 <input  type="text" value="<?=$booking['last_name']??''?>" id="userLastName" name="last_name" class="form-control" placeholder="Last Name">
 </div>
</div>



 <div class="col-md-8 mb-3">
 <label> Address</label>
 <textarea  rows="5" type="text" name="address" class="form-control" placeholder="Address" id="userAddress"><?=$booking['address']??''?></textarea>
 </div>
</div>


  <h6 class="p-2 bg-light">Booking Details:</h6>
                                           

                                            <div class="row">

                                                <input type="hidden" name="booking_detail_id" value="<?=$booking_detail['id']??''?>">


             <div class="col-md-6 mb-6">
 <label>From Where</label>
 <input  type="text" name="from_location" value="<?=$booking_detail['from_location']??''?>" id="locationInput" class="form-control" placeholder="Location From" >
 </div>    

      <div class="col-md-6 mb-6">
 <label>To Where</label>
 <input  type="text" value="<?=$booking_detail['to_location']??''?>" name="to_location" class="form-control" placeholder="Location To" >
 </div>     
 <div class="row mt-2">     

 <div class="col-md-4 mb-6">
 <label>Select Vehicle</label>
 <input  type="text" name="" onkeyup="showVehicles(this,'#vehicleListByAjax')" class="form-control" id="vehicleSearchBox" placeholder="Choose Vehicle" >
 <div id="vehicleListByAjax" class="" style="border:1px solid lightgray;border-top:none;">

     
 </div>
  <?php if(isset($booking_detail['vehicle']) && $booking_detail['vehicle']):?>

 <?=view('admin/partials/single_vehicle',['vehicle'=>$booking_detail['vehicle']])?>

<?php endif;?>
 <input type="hidden" value="<?=$booking_detail['vehicle_id']??''?>" name="vehicle" id="vehicleId">

 </div>      

  <div class="col-md-4 mb-6">
 <label>Select Driver</label>
 <input  type="text" name="" onkeyup="showDrivers(this,'#driverListByAjax')" class="form-control" id="driverSearchBox" placeholder="Choose Driver" >
 <div id="driverListByAjax" class="" style="border:1px solid lightgray;border-top:none;">   
 </div>
 <?php if(isset($booking_detail['driver']) && $booking_detail['driver']):?>

 <?=view('admin/partials/single_driver',['driver'=>$booking_detail['driver']])?>

<?php endif;?>

 <input type="hidden" value="<?=$booking_detail['driver_id']??''?>" name="driver" id="driverId">

 </div>     

   <div class="col-md-4 mb-6">
 <label>Pick Up Date & Time</label>
 <input  type="datetime-local" value="<?=$booking_detail['pickup_time']??''?>" name="pickup_time" class="form-control" placeholder="set pickup time" >
 
 </div> 


</div>

<div class="row">
    <div class="col-md-4 mb-6">

    <label> Tax</label>
 <select class="form-select" name="tax"  >
 <option value="">Select Tax Type</option>
<?php if(isset($response['data']['taxes']) && count($response['data']['taxes'])):
      foreach($response['data']['taxes'] as $tax):

        $sel='';

        if(isset($booking['tax_type_id']) && $booking['tax_type_id'] == $tax['id']):
            $sel='selected';
        endif;

       ?>

        <option <?=$sel;?> value="<?=$tax['id']?>"><?=$tax['name'];?></option>

      <?php endforeach;
            endif; ?>
  </select>
</div>

   <div class="col-md-4 mb-6">

    <label> Fare Type</label>
 <select class="form-select" name="fares_type"  >
 <option value="">Select Fare Type</option>
<?php if(isset($response['data']['fare_types']) && count($response['data']['fare_types'])):
      foreach($response['data']['fare_types'] as $fare_type):
         $sel='';

        if(isset($booking['fares_type']) && $booking['fares_type'] == $fare_type['id']):
            $sel='selected';
        endif;

       ?>

        <option <?=$sel?> value="<?=$fare_type['id']?>"><?=$fare_type['name'].' '.system_setting('currency_icon').$fare_type['amount'].' '.'('.round($fare_type['min_range']).'km - '.round($fare_type['max_range']).'kms)';?></option>

      <?php endforeach;
            endif; ?>
  </select>
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
   let url='<?=base_url('admin/bookings/'.($booking['id']??'').'/update')?>'
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


                 function showCompanies(selector,placeholder){

                        let search=$(selector).val();

                        let url='<?=base_url('admin/companies/search/list')?>';

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


                     function selectCompany(selector,company_id)
                     {
                        $('.selectedCompany').remove();
                        $('#companyId').val(company_id);

                        var company=$(selector).clone();
                        company.attr('onclick','')
                        company.addClass('border border-rounder border-success mt-1 p-2 selectedCompany')
                        $('#companyList').after(company);


                        $('#companyList').html('');                

                        $('#companySearchBox').val('');
                     }

                     function showEmployees(selector,placeholder){

                        let company_id=$('#companyId').val();

                        if(company_id){

                        let search=$(selector).val();

                        let url='<?=base_url('admin/companies/')?>'+company_id+'/employees/search/list';

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
                else
                {
                     __showMessage('Please select company before searching employee.','warning')
                }

                     }


                     function selectEmployee(selector,employee_id)
                     {
                        $('.selectEmployee').remove();
                        $('#employeeId').val(employee_id);

                        var company=$(selector).clone();
                        company.attr('onclick','')
                        company.addClass('border border-rounder border-success mt-1 p-2 selectEmployee')
                        $('#employeeList').after(company);


                        $('#employeeList').html('');                

                        $('#employeeSearchBox').val('');
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
                             //   $('#userPhone').val(user.phone);
                                $('#userAddress').val(user.address);
                                $('#userId').val(user.id);
                                $('#userEmail').val(user.email);


                          //   if(!$('#moreDetails').hasClass('d-none'))

                           //  $('#moreDetails').removeClass('d-none');





                           }
                           else
                           {
                             $('#moreDetails').removeClass('d-none');
                           }
                        }
                    })
                }

                     }


                      function changeCustomerType(selector,type)
    {
       if(!$(selector).hasClass('bg-warning'))
       {
           $('.customer-types').removeClass('bg-warning');

           $(selector).addClass('bg-warning');


           if(type==2)
           {
               $('.carporate').removeClass('d-none');
             $('.individual').addClass('d-none');

           }
           else
           {
             $('.individual').removeClass('d-none');
               $('.carporate').addClass('d-none');

           }
       }
           $('#customerTypeId').val(type);

    }




        
                </script>



 

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnRDajZI2xL9eCWCozJ_I8Hyz3BNE7kLs&libraries=places"></script>
  <script>
    function initialize() {
      const input = document.getElementById('locationInput');
      const coordinatesOutput = document.getElementById('coordinates');
      const autocomplete = new google.maps.places.Autocomplete(input);

      autocomplete.addListener('place_changed', function() {
        const place = autocomplete.getPlace();

        if (!place.geometry) {
          alert('Place details not available for input: ' + place.name);
          return;
        }

        const location = place.geometry.location;
        const coordinates = `Latitude: ${location.lat()}, Longitude: ${location.lng()}`;
        coordinatesOutput.textContent = `Selected location: ${place.name}\n${coordinates}`;
      });
    }

    google.maps.event.addDomListener(window, 'load', initialize);



   
  </script>


               
      

                <?=$this->endSection()?>