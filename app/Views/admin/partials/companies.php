 <?php if(count($companies)):
    foreach($companies as $company):?>
 <a href="javascript:void(0)" class="text-reset notification-item" >
                                        <div class="d-flex" onclick="selectCompany(this,<?=$company->id?>)" style="align-items: center;">
                                            
                                            <div class="flex-grow-1">
                                                <span class="d-block w-100">Company Name:&nbsp;&nbsp;<b><?=ucwords($company->company_name)?></b></span>

                                                <span class="d-block w-100">ABN Number:&nbsp;&nbsp;<b><?=($company->abn_numberl)?></b></span>

                                                <span class="d-block w-100">ACN Number:&nbsp;&nbsp;<b><?=($company->acn_number)?></b></span>
                                                
                                            </div>

                                             <div class="d-flex w-25" style="pointer-events: all;">
                                               
                                            </div>
                                        </div>
                                    </a>

                                    <?php
                                     endforeach;

                                endif;
                                    ?>

