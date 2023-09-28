<?php

  $service=$response['data']['service']??'';



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
                                    <h6 class="page-title">Edit Service</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/services')?>">Services</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                         <a href="<?=base_url('admin/services')?>"  class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left "></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                       <div class="row">

                        <div class="col-lg-12">
                            <h4 class="card-title mb-0 bg-success p-3 text-light">Edit Service</h4>
                                <div class="card">
                                    <div class="card-body">
                                        
                                    

                                        <form class="mt-3" id="serviceForm">

                                            <div class="row">
                                                <input type="hidden" name="hid" value="<?=$service['id']??''?>">
 <div class="col-md-6 mb-3">
 <label>Name</label>
 <input  type="text" value="<?=$service['name']??''?>" name="name" class="form-control" placeholder="Type Name">
 </div>

 <div class="col-md-6 mb-3">
 <label>Amount</label>
<input  type="text" name="amount" value="<?=$service['amount']??''?>" class="form-control" placeholder="Amount" style="padding-left: 25px;">
  <span class="currency_icon"><?=system_setting('currency_icon')?></span>
 </div>


<div class="col-md-12 d-flex justify-content-center text-end">

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
                    
                     document.getElementById("serviceForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('serviceForm');
   let url='<?=base_url('admin/services/'.($service['id']??'').'/update')?>'
  // console.log(data);return false;
   submitNormalForm('serviceForm',url,data);
});

                

        
                </script>

               
      

                <?=$this->endSection()?>