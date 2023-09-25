<a href="javascript:void(0)" class="text-reset notification-item" >
                                        <div class="d-flex border border-rounder border-success mt-1 p-2 selectedCompany" onclick="selectCompany(this,<?=$company->id?>)" style="align-items: center;">
                                            
                                            <div class="flex-grow-1">
                                                <span class="d-block w-100">Company Name:&nbsp;&nbsp;<b><?=ucwords($company->company_name)?></b></span>

                                                <span class="d-block w-100">ABN Number:&nbsp;&nbsp;<b><?=($company->abn_number)?></b></span>

                                                <span class="d-block w-100">ACN Number:&nbsp;&nbsp;<b><?=($company->acn_number)?></b></span>
                                                
                                            </div>

                                             <div class="d-flex w-25" style="pointer-events: all;">
                                               
                                            </div>
                                        </div>
                                    </a>

                                

