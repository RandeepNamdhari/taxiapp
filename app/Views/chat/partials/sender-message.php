<?php if(isset($chat) && $chat):?>

    <?php  $first_name=$chat['first_name']?$chat['first_name']:$chat['username'];
      $photo=$chat['user_photo'];
     
      ?>

        <?php if( file_exists($photo)):?>
                                           <?php $photo='<img class="avatar-xs rounded-circle" src="'.base_url($photo).'" alt="Generic placeholder image" height="40">'; ?>



                                              <?php else: 
                                                $photo='<span class="rounded-circle user-message-info" height="40" style="background:'.randomColor($first_name).'">'.strtoupper(mb_substr($first_name, 0,1)).'
                                                        </span>';?>

                                              <?php endif;?>

  <li class="clearfix odd">
                                                    <div class="chat-avatar">
                                                        <?=$photo?>
                                                        <!-- <img src="assets/images/users/user-3.jpg" class="avatar-xs rounded-circle" alt="Female"> -->
                                                        <span class="time"><?=$chat['chat_time']?></span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name"><?=$first_name?></span>
                                                            <?php if($chat['is_file'] && file_exists($chat['attach_file']) && in_array($chat['attach_file_extension'],['png','jpeg'])):?>

                                                              <img src="<?=base_url($chat['attach_file'])?>" alt="" height="48" class="rounded me-2">
                                                          <?php endif;?>
                                                            <p>
                                                             <?=$chat['message']?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
	<?php endif;?>