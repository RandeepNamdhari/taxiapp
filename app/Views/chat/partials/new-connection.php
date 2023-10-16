<?php 

$connection=$user[0];

 $first_name=$connection['sender_first_name']?$connection['sender_first_name']:$connection['sender_username'];
      $photo=$connection['sender_photo'];
      $data_user_id=$connection['sender'];

      ?>
<a href="javascript:void(0)" class="d-flex p-1 userElement" data-user-id="<?=$data_user_id?>" data-connection-id="<?=$connection['id']?>" style="min-height: 50px;">

   
                                            <div class="flex-shrink-0 me-3" style="padding-left:5px;pointer-events: none;">
                                              <?php if( file_exists($photo)):?>
                                                <img class="rounded-circle" src="<?=base_url($photo)?>" alt="Generic placeholder image" height="50">

                                              <?php else:?>
                                                 <span class="rounded-circle user-img-span" height="50" style="background:<?=randomColor($first_name)?>;">
                                                        <?=strtoupper(mb_substr($first_name, 0,1));?>
                                                        </span>

                                              <?php endif;?>

                                                 <span class="user-status userStatus__<?=$data_user_id?>" data-user-id="<?=$data_user_id?>"></span>

                                             

                                              
                                               
                                            </div>
                                            <div class="flex-grow-1 chat-user-box pt-2" style="height:0">
                                             
                                                <p class="user-title m-0"><?=$first_name?></p>

                                             
                                                <p class="text-muted lastMessageArea" ><?=$connection['message']??''?></p>
                                                <span data-count="<?=$connection['unread_messages_count']??0?>" class="unreadCounter badge bg-danger rounded-pill message-count <?=($connection['unread_messages_count']>0?'':'d-none')?>"><?=$connection['unread_messages_count']??''?> </span>
                                            </div>
                                        </a>