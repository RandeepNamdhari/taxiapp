
                                            <div class="tab-pane p-3 active show pt-3" id="profile" role="tabpanel">

                                                <div class="row">

                                                    <div class="col-md-12">
                                                     
                                                   <div class="d-flex" style="align-items:center;">
                                                       <h5 class="d-inline-block w-75">Company Information</h5>

                                                       <div class="w-25 text-end" >

                                                       <a href="<?=base_url('admin/companies/'.($company->id??'').'/edit')?>" class="fs-4 text-primary text-end">
                                                                   <i class="fas fa-edit"></i> </a>
                                                               </div>
                                                   </div>
                                                        <hr class="mt-1" style="border:1px solid;border-radius: 25px;">


            <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Full Name:</strong><span class="d-inline-block w-75"> <?=($company->first_name??'').' '.($company->middle_name??'').' '.($company->last_name??'')?><span></p>

                  <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Company:</strong><span class="d-inline-block w-75"> <?=$company->company_name??''?><span></p>

                 <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Email:</strong><span class="d-inline-block w-75"> <?=$company->email??''?><span></p>

                     <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">phone:</strong><span class="d-inline-block w-75"> <?=$company->phone??''?><span></p>

                         <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Date Of Birth:</strong><span class="d-inline-block w-75"> <?=$company->date_of_birth??''?><span></p>

                    <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Address:</strong><span class="d-inline-block w-75"> <?=$company->address??''?><span></p>

                        <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Suburb:</strong><span class="d-inline-block w-75"> <?=$company->suburb??''?><span></p>

                             <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">State:</strong><span class="d-inline-block w-75"> <?=$company->state??''?><span></p>

                                 <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Post Code:</strong><span class="d-inline-block w-75"> <?=$company->post_code??''?><span></p>
         
                                                </div>

                                               
                                            </div>
                                        </div>