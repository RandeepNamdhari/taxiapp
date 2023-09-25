<a href="javascript:void(0)" class="text-reset notification-item" >
                                        <div class="d-flex border border-rounder border-success mt-1 p-2 selectEmployee" onclick="selectEmployee(this,<?=$employee->id?>)" style="align-items: center;">
                                            
                                            <div class="flex-grow-1">
                                                <span class="d-block w-100">Name:&nbsp;&nbsp;<b><?=ucwords($employee->first_name)?></b></span>

                                                <span class="d-block w-100">Email:&nbsp;&nbsp;<b><?=($employee->email)?></b></span>

                                                <span class="d-block w-100">Phone:&nbsp;&nbsp;<b><?=($employee->phone)?></b></span>
                                                
                                            </div>

                                             <div class="d-flex w-25" style="pointer-events: all;">
                                               
                                            </div>
                                        </div>
                                    </a>

                                 

