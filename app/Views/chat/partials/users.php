<?php for($i=0;$i<10;$i++):?>

  <a href="javascript:void(0)" class="d-flex p-1 userElement" data-user-id="<?=$user['id']??2?>">
                                            <div class="flex-shrink-0 me-3" style="padding-left:5px;pointer-events: none;">
                                                <img class="rounded-circle" src="assets/images/users/user-4.jpg" alt="Generic placeholder image" height="50">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="flex-grow-1 chat-user-box pt-2" style="height:0">
                                                <p class="user-title m-0">David Medina</p>
                                                <p class="text-muted">Yeah everything is fine</p>
                                                <span class="badge bg-danger rounded-pill message-count">3</span>
                                            </div>
                                        </a>

                                <?php endfor;?>