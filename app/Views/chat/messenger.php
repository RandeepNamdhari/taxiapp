  <?=$this->section('page-style')?>


  <style type="text/css">

    .user-status
    {
            border-radius: 25px;
    height: 8px !important;
    background: green;
    padding: 5px;
    position: relative;
    display: block;
    width: 3px;
    top: -14px;
    left: 40px;
    }

    .message-count
    {
       position: relative;
    top: -60px;
    left: 140px;
    }

    .active-user
    {
        background: orange;
    }
          
  </style>



<?=$this->endSection()?>

   <div class="row chatMessangerContainer">

    <div class="col-xl-3 p-0" style="">

        <div class="bg-dark">

        <h4 class="p-2 bg-dark text-light" style="font-size: 16px;">User List</h4>

        <form class="app-search d-none d-lg-block p-2">
                            <div class="position-relative">
                                <input type="text" class="form-control userSearchInput" placeholder="Search...">
                                <span class="fa fa-search"></span>
                            </div>
                        </form>
                    </div>

    <div data-simplebar="init" style="min-height:395px;max-height: 395px;" class="simplebar-dragging bg-secondary"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;"><div class="simplebar-content userListArea"  style="padding: 0px;pointer-events:all;">

        <!-- User List -->

<?=view('chat/partials/users')?>

<!--End User List -->

                                    


</div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 71px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none; height: 129px;"></div></div></div>

    </div>


    <div class="col-xl-9" >
                                <div class="card">
                                    <div class="card-body m-0 p-0 " >
                                        <h4 class="card-title mb-4 p-3">Chat</h4>
                                        <div class="chat-conversation " >



                                            <!--Messages-->

                                    
                                            
                                             <?=view('chat/partials/messages');?>

                                          
                                          


                                            <!--End Messages -->

                                            <div class="d-flex w-100 justify-content-center loaderArea d-none" style="min-height: 380px;align-items: center;">
                                            <div class="spinner-border text-warning m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                            




                                            <div class="row">

                                                <form class="chatForm" style="display:flex;" enctype="multipart/form-data" id="" onsubmit="return false;">
                                                <input type="hidden" name="chat_user_type" class="chat_user_type" value="1">

                                                <input type="hidden" name="chat_user_id" class="chat_user_id" value="1">
                                                
                                                <div class="col-sm-9 col-7 chat-inputbar d-flex">
                                                    <div class=" d-flex p-2 " style="align-items: center;cursor: pointer;"><i id="" class="fas fa-link fs-4 fileUploadIcon"></i>
                                                        <input class="d-none fileInput" type="file" id="fileInput" name="uploadFile"/>
                                                </div>

                                                    <input type="text" id="" class="form-control chat-input textMessage" placeholder="Enter your text">
                                                </div>
                                                <div class="col-sm-3 col-3 chat-send">
                                                    <div class="d-grid">
                                                        <button type="submit" id="" class="btn btn-success sendChat">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

   </div>

   <?=$this->section('page-script')?>

   <?=script_tag('admin/assets/js/messanger.js')?>



 <script type="text/javascript">

    const messanger=new Messanger({
                                    mainContainer:'.chatMessangerContainer',
                                    sendButton:'.sendChat',
                                    textInput:'.textMessage',
                                    fileUploadIcon:'.fileUploadIcon',
                                    fileInput:'.fileInput',
                                    chatUserId:'.chat_user_id',
                                    chatUserType:'.chat_user_type',
                                    searchInput:'.userSearchInput',
                                    userListContainer:'.userListArea',
                                    userToggle:'.userElement',
                                    userIdAttr:'data-user-id',
                                    messageContainer:'.userMessageArea',
                                    activeUser:'',
                                    loaderContainer:'.loaderArea',



                                 });


  
</script>


<?=$this->endSection()?>