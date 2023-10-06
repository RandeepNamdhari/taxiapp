
<ul class="conversation-list" data-simplebar="init" style="max-height: 367px;min-height: 380px;"><div class="simplebar-wrapper" style="margin: 0px -10px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -15px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content userMessageArea" style="padding: 0px 10px;">
    <?php if(isset($messages) && count($messages)):

?>
    <?php foreach($messages as $message):?>

        <?php if($message['sender']!=getUserId()):?>
                                                <li class="clearfix">
                                                    <div class="chat-avatar">
                                                        <img src="assets/images/users/user-2.jpg" class="avatar-xs rounded-circle" alt="male">
                                                        <span class="time">10:00</span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name">John Deo</span>
                                                            <p>
                                                                Hello!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php else:?>
                                                <li class="clearfix odd">
                                                    <div class="chat-avatar">
                                                        <img src="assets/images/users/user-3.jpg" class="avatar-xs rounded-circle" alt="Female">
                                                        <span class="time">10:01</span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name">Smith</span>
                                                            <p>
                                                                Hi, How are you? What about our next meeting?
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php endif;endforeach;?>
                                                <li class="clearfix">
                                                    <div class="chat-avatar">
                                                        <img src="assets/images/users/user-2.jpg" class="avatar-xs rounded-circle" alt="male">
                                                        <span class="time">10:04</span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name">John Deo</span>
                                                            <p>
                                                                Yeah everything is fine
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>


                                                <li class="clearfix odd">
                                                    <div class="chat-avatar">
                                                        <img src="assets/images/users/user-3.jpg" class="avatar-xs rounded-circle" alt="male">
                                                        <span class="time">10:05</span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name">Smith</span>
                                                            <p>
                                                                Wow that's great
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="clearfix odd">
                                                    <div class="chat-avatar">
                                                        <img src="assets/images/users/user-3.jpg" class="avatar-xs rounded-circle" alt="male">
                                                        <span class="time">10:08</span>
                                                    </div>
                                                    <div class="conversation-text">
                                                        <div class="ctext-wrap">
                                                            <span class="user-name mb-2">Smith</span>

                                                            <img src="assets/images/small/img-1.jpg" alt="" height="48" class="rounded me-2">
                                                            <img src="assets/images/small/img-2.jpg" alt="" height="48" class="rounded">
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>


                                              <?php else:?>

                                                <div>Start Messaging...</div>



                                                <?php endif;?>



                                        </div></div></div><div class="simplebar-placeholder" style="width: auto; height: 528px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 255px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>

                                          