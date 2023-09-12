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
                                    <h6 class="page-title">Add Customer</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/customers')?>">Customers</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create New Customer</li>
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                         <a href="<?=base_url('admin/customers')?>"  class="btn btn-outline-primary waves-effect waves-light">
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
                                        <h4 class="card-title mb-0">Customer Details</h4>
                                        <small class="card-title-desc ">Please enter the customer detail correctly and check the details before submit.</small>

                                        <form class="mt-3" id="customerForm">

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
 <label>Company Name</label>
 <input data-bind="companyName" type="text" name="company_name" class="form-control" placeholder="Company Name">
 </div>
 <div class="col-md-4 mb-3">
 <label> Email</label>
 <input  type="text" name="email" class="form-control" placeholder="Email"  autocomplete="no-autofill" >
 </div>
 <div class="col-md-4 mb-3">
 <label>Phone Number</label>
 <input  type="text" name="phone" class="form-control" placeholder="Phone Number" >
 </div>

 <div class="col-md-8 mb-3">
 <label> Address</label>
 <textarea  rows="5" type="text" name="address" class="form-control" placeholder="Address"></textarea>
 </div>

 <div class="col-md-4 mb-3">
    <div class="row">
 
 <div class="col-md-12  mb-3">
 <label> Suburb</label>
 <input  type="text" name="suburb" class="form-control" placeholder="Suburb" >
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
 <div class="col-md-4 mb-3">
 <label> Licence No</label>
 <input type="text" name="licence_number" class="form-control" placeholder="Licence No">
 </div>
 <div class="col-md-4 mb-3">
 <label> Licence Expiry</label>
 <input type="date" name="licence_expiry" class="form-control 
 " placeholder="Licence Expiry">
 </div>
 <div class="col-md-4 mb-3">
 <label> Interested Party</label>
 <input type="text" name="interested_party" class="form-control" placeholder="Interested Party">
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
                    
                     document.getElementById("customerForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('customerForm');
   let url='<?=base_url('admin/customers/store')?>'
  // console.log(data);return false;
   submitNormalForm('customerForm',url,data);
});

        
                </script>

               
      

                <?=$this->endSection()?>