    <?php

  $employees=$response['data']['employees']??[];


   ?>
                                            <div class="tab-pane p-3 active" id="employees" role="tabpanel">
                                               <div class="row">

                                                <div class="col-md-12 text-end mb-3">
                                                   <a href="<?=base_url('admin/companies/'.$company->id.'/employees/create')?>" class="btn btn-outline-primary">Add Employee</a>
                                                </div>

                                                                       
                            <table id="employeesTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Limit</th>
                                                <th class="text-center">Status</th>
                                                <th>Registration Date</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>


                                            <tbody>
                                         
                                            
                                            </tbody>
                                        </table>

                                        </div>
                                                   
                                          
                                                
                                            </div>