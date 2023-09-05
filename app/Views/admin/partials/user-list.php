 <?php if(count($users)):
    foreach($users as $user):?>
 <a href="" class="text-reset notification-item">
                                        <div class="d-flex" style="align-items: center;">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs">
                                                   <span class="avatar-title rounded-circle text-white font-size-14" style="background:<?=randomColor($user['username'])?>;">
                                                        <?=strtoupper(mb_substr($user['username'], 0,1));?>
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class=""><?=ucwords($user['username'])?></h6>
                                                
                                            </div>

                                             <div class="d-flex w-25" style="pointer-events: all;">
                                                <div class="">
                                                   <input class="form-check" type="checkbox" onchange="attachUser(this,'user_role',<?=$user['id']?>,<?=$role_id?>,attachSuccess)" style="width: 50px;">
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <?php
                                     endforeach;

                                endif;
                                    ?>

