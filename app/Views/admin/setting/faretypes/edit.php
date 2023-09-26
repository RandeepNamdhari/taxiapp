<?php

  $fare_type=$response['data']['fare_type']??'';



 ?>

<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>

 <!-- ION Slider -->
       
      <?=link_tag('admin/assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')?>



<?=$this->endSection()?>

<?= $this->section('content') ?>

  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Edit Fare Type</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/settings/fare/types')?>">Fare Types</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Fare Type</li>
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                         <a href="<?=base_url('admin/settings/fare/types')?>"  class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left "></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                       <div class="row">

                        <div class="col-lg-12">
                            <h4 class="card-title mb-0 bg-success p-3 text-light">Fare Type Setting</h4>
                                <div class="card">
                                    <div class="card-body">
                                        
                                    

                                        <form class="mt-3" id="fareTypeForm">

                                            <div class="row">
                                                <input type="hidden" name="hid" value="<?=$fare_type['id']??''?>">
 <div class="col-md-6 mb-3">
 <label>Name</label>
 <input  type="text" value="<?=$fare_type['name']??''?>" name="name" class="form-control" placeholder="Type Name">
 </div>

 <div class="col-md-6 mb-3">
 <label>Amount</label>
 <input  type="text" name="amount" value="<?=$fare_type['amount']??''?>" class="form-control" placeholder="Amount">
 </div>

 <div class="col-md-12 mb-3">
                                                <div class="p-3">
                                                    <h5 class="font-size-14 mb-3">Range (in Kms)</h5>
                                                    <input type="text" name="range" value="" id="range_01">
                                                </div>
                                            </div>
<div class="col-md-12 d-flex justify-content-center text-end">

 <div class="col-md-4 mb-3">
    <label>&nbsp;</label>
  <button class="btn btn-primary form-control serverSaveButton" type="submit">Save</button>
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

        
      <?=script_tag('admin/assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js')?>





                <script type="text/javascript">
                    
                     document.getElementById("fareTypeForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('fareTypeForm');
   let url='<?=base_url('admin/settings/fare/types/'.($fare_type['id']??'').'/update')?>'
  // console.log(data);return false;
   submitNormalForm('fareTypeForm',url,data);
});

                       $(document).ready(function(){

                        $("#range_01").ionRangeSlider({skin:"modern",type:"double",grid:!0,min:0,max:1e3,from:'<?=($fare_type['min_range']??1)?>',to:'<?=($fare_type['max_range']??100)?>',postfix:"km"})

    })

        
                </script>

               
      

                <?=$this->endSection()?>