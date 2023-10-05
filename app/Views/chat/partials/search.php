<?php if(isset($users) && count($users)):?>


<h5 class="p-1" style="font-style: italic;">#Other Users</h5>

<?php

foreach ($users as $key => $user):

?>


  <a href="javascript:void(0)" class="d-flex p-1 userElement" data-user-id="<?=$user['id']?>">
                                            <div class="flex-shrink-0 me-3" style="padding-left:5px;">
                                                <img class="rounded-circle" src="assets/images/users/user-4.jpg" alt="Generic placeholder image" height="50">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="flex-grow-1 chat-user-box pt-2" style="height:0">
                                                <p class="user-title m-0"><?=$user['first_name']?></p>
                                                <p class="text-muted">Yeah everything is fine</p>
                                                <span class="badge bg-danger rounded-pill message-count d-none">0</span>
                                            </div>
                                        </a>

                                <?php endforeach;?>

                        


                                <?php endif;?>