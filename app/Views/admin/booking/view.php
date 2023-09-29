
<?php

    $booking=$response['data']['booking']??[];

    $booking_detail=$response['data']['booking']['booking_details'][0];
    $addons=$response['data']['booking']['addons']??[];


    //echo '<pre>';print_r($booking);die;

 ?>
<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>

  <?=link_tag('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')?>

  <?=link_tag('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')?>

  <style type="text/css">

    table.dataTable tbody tr:hover {
      background-color: #f5f5f5; /* Change to your desired hover color */
    }
          
  </style>



<?=$this->endSection()?>

<?= $this->section('content') ?>


  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Booking Detail</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Booking Management</a></li>
                                        <li class="breadcrumb-item active"><a href="<?=base_url('admin/bookings')?>">Bookings</a></li>
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/bookings')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-back"></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                            <div class="row">

                                <div class="col-md-12">
                                    <div>

                                        <h4 class="bg-success text-light p-3">Booking Details</h4>

                                    </div>
                                    <div class="table-responsive">
                                            <table class="table mb-0">
                                               <thead>
  <tr>
    <th colspan="6">
        <p style="font-weight:800;font-size: large;">BOOKING ID: &nbsp;&nbsp; <?=$booking['booking_uid']??''?></p>
         <span  class="text-primary small">BOOKING DATETIME:&nbsp;<span class="text-dark"><?=$booking['booking_date'];?></span></span>
         <span>|</span>
          <span  class="text-primary small">ACCEPTED DATETIME:&nbsp;<span class="text-dark"><?=$booking['booking_date'];?></span></span>
          <span>|</span>
          <span  class="text-primary small">STARTED DATETIME:&nbsp;<span class="text-dark"><?=$booking['booking_date'];?></span></span>
          <span>|</span>
          <span  class="text-primary small">COMPLETED DATETIME:&nbsp;<span class="text-dark"><?=$booking['booking_date'];?></span></span>


    </th>
    
  </tr>
 
  <tr class="table-light">
    <th>User Name</th>
    <th>User Mobile</th>
    <th>Amount</th>
    <th>Payment Type</th>
    <th>Payment Status</th>
    <th>Trip Type</th>
  </tr>
</thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="border border-light"><?=$booking['first_name']??''?></td>
                                                         <td class=" border border-light"><?=$booking['user_phone']??''?></td>
                                                         <td class=" border border-light"><?=$booking['amount']??''?></td>
                                                         <td class="text-center border border-light"></td>
                                                         <td class="text-center border border-light">
                                                         </td>
                                                         <td class="text-center border border-light"></td>



                                                    </tr>


                                                   

                                                  <tr class="table-light">
                                <th>Vehicle</th>
                                <th colspan="2">Vehicle Type</th>
                                <th>Km</th>
                                <th colspan="2">Minutes</th>
                              </tr>

                              <tr>
                                  <td class="border border-light"><?=$booking_detail['vehicle']->model??''?></td>
                                  <td class=" border border-light"><?=$booking_detail['vehicle']->body_type_name??''?></td>
                                   <td colspan="2" class="text-center border border-light"><?=$booking['fares_min_range']??''?> km - <?=$booking['fares_max_range']??''?> kms</td>
                                   <td colspan="2" class="text-center border border-light"></td>
                              </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                </div>

  <!--booking Add on details -->
  

                                                                <div class="col-md-12 mt-3">
                                    <div class="mb-3">

                                        <h5 class="fw-bold">Addons</h5>

                                    </div>                                                                      
                                               


                                                 
                                    <div class="table-responsive">
                                            <table class="table mb-0">
                                               <thead>


  <tr class="table-light">
    <th>Service Name</th>
    <th>Note</th>
    <th>Amount</th>
    <th>Action <a href="javascript:void(0)" onclick="showAddons(<?=$booking['id']?>)"><i class="fas fa-plus-circle text-primary"></i></a></th>
   
  </tr>
</thead>
                                                <tbody class="addonsBody">
                                                    <?php
                                                    if(count($addons)):
                                                     foreach($addons as $addon):?>
                                                    <tr>
                                                        <td><?=$addon['name']?></td>
                                                        <td><?=$addon['note']?></td>
                                                        <td><?=$addon['amount']?></td>
                                                        <td><a href="javascript:void(0)" onclick="removeAddon(this,<?=$addon['id']?>)"><i class="fas fa-minus-circle text-danger"></i></a></td>
                                                    </tr>
                                                <?php endforeach;
                                            endif;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                            


                                                           <!--end -->




                                <div class="col-md-12 mt-3">
                                    <div class="mb-3">

                                        <h5 class="fw-bold">Location Details</h5>

                                    </div>
                                    <div class="table-responsive">
                                            <table class="table mb-0">
                                               <thead>


  <tr class="table-light">
    <th>From Address</th>
    <th>To Address</th>
   
  </tr>
</thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="border border-light"><?=$booking_detail['from_location']??''?></td>
                                                         <td><?=$booking_detail['to_location']??''?></td>
                                                       
                                                </tbody>
                                            </table>

                                        </div>
                                </div>


                                <!--Driver Detail -->



                                <div class="col-md-12 mt-3">
                                    <div class="mb-2 d-flex justify-content-between">

                                        <h5 class="fw-bold w-75">Driver Details</h5>

                                        <button onclick="openDriverList()" class="btn btn-primary">Assing Driver</button>

                                    </div>
                                    <div class="table-responsive">
                                            <table class="table mb-0" id="driverTable">
                                               <thead>


  <tr class="table-light">
    <th>Name</th>
    <th>Mobile</th>
    <th>Profile</th>

   
  </tr>
</thead>
                                                <tbody>
                                                    <?php if(isset($booking_detail['driver']->first_name)):?>
                                                    <tr>
                                                        <td class="border border-light"><?=$booking_detail['driver']->first_name??''?></td>
                                                         <td class="border-light border"><?=$booking_detail->phone??''?></td>

                                                         <td class="border border-light"> <?php $media=$booking_detail['driver']->getDefaultMedia();

                                                  if(isset($media['file_thumb_path'])):

                                                  ?>

                                                   <img class=" w-50 " style="height:78px;width: 100%;min-width: 80px;" src="<?=base_url($media['file_thumb_path'])?>" alt="car">

                                               <?php else:?>

                                                <div class=" w-50 bg-light text-center " style="height:78px;width: 100%;min-width: 80px;font-size:56px" ><i class="fas fa-user"></i></div>



                                              <?php endif;?></td></tr>

                                          <?php endif;?>
                                                       
                                                </tbody>
                                            </table>

                                        </div>
                                </div>

                                <!--Driver End -->


                            </div>



                        </div>
                </div>


<?=view('admin/partials/booking_addon_modal',$response['data'])?>

<?=view('admin/partials/driver-modal')?>




<?=$this->endSection()?>

<?=$this->section('page-script')?>

 <?=script_tag('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')?>

 <?=script_tag('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>

 <script type="text/javascript">
     
     function removeAddon(selector,id)
     {
        if(id)
        {
             var data={'id':id};

                var url='<?=base_url('admin/bookings/remove/')?>'+id+'/addon';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                            $(selector).closest('tr').remove();
                                          }
                                       })
                                });
        }
     }

      function showAddons(id)
    {
        $('.addOnModal').modal('show');
        $('#addOnBookingId').val(id);
    }

    function setServicePrice(selector)
    {
        $('#servicePrice').val($(selector).find('option:selected').attr('data-price'));
    }

       document.getElementById("addOnForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('addOnForm');

   data.service_name=$('#serviceDropDown').find('option:selected').text();
 
   let url='<?=base_url('admin/bookings/add/addon')?>'
  // console.log(data);return false;
   submitNormalForm('addOnForm',url,data,function(data){
    if(data.status)
    {
        $('.addOnModal').modal('hide');
        if(data.fields)
        {
            $('.addonsBody').append('<tr><td>'+data.fields.service_name+'</td><td>'+data.fields.note+'</td><td>'+data.fields.amount+'</td><td><a href="javascript:void()" onclick="removeAddon(this,'+data.fields.id+')"><i class="fas fa-minus-circle text-danger"></i></a></td><tr>');
        }
    }
   });
});

       function openDriverList()
       {
         $('.bs-driver-modal-center').modal('show');
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

                        let url='<?=base_url('admin/bookings/assign/driver')?>';

                        let data={'driver_id':driver_id,'booking_id':'<?=$booking['id']?>'};

                      let response=__postRequest(url,data,__showMessage);

                    response.then(function(data)
                    {

                        if(data.status)
                        {
                            var html='<tr><td class="border border-light">'+data.driver.first_name+'</td><td class="border-light border">'+data.driver.phone+'</td><td class="border border-light">';

                                var img='<div class="w-50 bg-light text-center" style="height:78px;width:100%;min-width:80px;font-size:56px"><i class="fas fa-user"></i></div>';
                                if(data.driver.media)
                                {
                                    img='<img class=" w-50" style="height:78px;width: 100%;min-width: 80px;" src="<?=base_url()?>'+data.driver.media.file_thumb_path+'" alt="driver">'
                                }

                               html+=img+'</td></tr>';

                               $('#driverTable').find('tbody').html(html);
         $('#searchDriverInList').val('')
         $('#driver_list_area').html('');
         $('.bs-driver-modal-center').modal('hide');


                        }
                    })

                     }
 </script>


<?=$this->endSection()?>