                 <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Add Employee</h4>
                                        <small class="card-title-desc ">Please enter the employee details correctly and check the details before submit.</small>
               <form class="mt-3" id="employeeForm" enctype="multipart/form-data" method="POST">

                                            <div class="row">
 <div class="col-md-4 mb-3">
 <label> First Name</label>
 <input  type="text" name="first_name" class="form-control" placeholder="First Name">
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

 <div class="col-md-4 mb-3">
 <label>Allowded Limit</label>
 <input  type="number" name="limit" class="form-control" placeholder="Enter Limit" >
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