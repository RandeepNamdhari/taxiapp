

    <?php if(isset($messages) && count($messages)):

?>
    <?php foreach($messages as $message):?>

         <?php

    // if($message['sender']==getUserId()):
      $first_name=$message['sender_first_name']?$message['sender_first_name']:$message['sender_username'];
      $photo=$message['sender_photo'];
      $data_user_id=$message['sender'];
   // else:
      // $first_name=$message['receiver_first_name']?$message['receiver_first_name']:$message['receiver_username'];
      // $photo=$message['receiver_photo'];
      // $data_user_id=$message['receiver'];

//endif;

      ?>

      <?php if( file_exists($photo)):?>
                                           <?php $photo='<img class="avatar-xs rounded-circle" src="'.base_url($photo).'" alt="Generic placeholder image" height="40">'; ?>



                                              <?php else: 
                                                $photo='<span class="rounded-circle user-message-info" height="40" style="background:'.randomColor($first_name).'">'.strtoupper(mb_substr($first_name, 0,1)).'
                                                        </span>';?>

                                              <?php endif;?>




   


        <?php if($message['sender']==getUserId()):?>
                                            



  <li class="clearfix odd">
                                                    <div class="chat-avatar">
                                                        <?=$photo?>
                                                        <!-- <img src="assets/images/users/user-3.jpg" class="avatar-xs rounded-circle" alt="Female"> -->
                                                        <span class="time"><?=$message['chat_time']?></span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name"><?=$first_name?></span>
                                                             <?php if($message['is_file'] && file_exists($message['attach_file']) && in_array($message['attach_file_extension'],['png','jpeg'])):?>

                                                              <img src="<?=base_url($message['attach_file'])?>" alt="" height="48" class="rounded me-2">
                                                          <?php endif;?>
                                                            <p>
                                                             <?=$message['message']?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>




















                                            <?php else:?>
                                              

                                                    <li class="clearfix">
                                                    <div class="chat-avatar">
                                                        <?=$photo?>
                                                        <!-- <img src="assets/images/users/user-2.jpg" class="avatar-xs rounded-circle" alt="male"> -->
                                                        <span class="time"><?=$message['chat_time']?></span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name"><?=$first_name?></span>
                                                             <?php if($message['is_file'] && file_exists($message['attach_file']) && in_array($message['attach_file_extension'],['png','jpeg'])):?>

                                                              <img src="<?=base_url($message['attach_file'])?>" alt="" height="48" class="rounded me-2">
                                                          <?php endif;?>
                                                            <p>
                                                               <?=$message['message']?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php endif;endforeach;?>
                                             
                                             
                                            </div>


                                              <?php else:?>

                                                <div class="firstMessageScreen" style="height:380px;text-align: center;display: flex;align-items: center;"><h2 class="text-center w-100">Start Messaging...</h2></div>



                                                <?php endif;?>

                                              




                                   

                                          