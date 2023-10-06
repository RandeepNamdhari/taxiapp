<?php if(isset($chat) && $chat):?>

	 <li class="clearfix">
                                                    <div class="chat-avatar">
                                                        <img src="assets/images/users/user-2.jpg" class="avatar-xs rounded-circle" alt="male">
                                                        <span class="time">10:00</span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name"><?=$chat['first_name']?></span>
                                                            <p>
                                                               <?=$chat['message']?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

	<?php endif;?>