function Messanger(config)
	{
          this.mainContainer=document.querySelector(config.mainContainer);
          this.messageContainer=this.mainContainer.querySelector(config.messageContainer)
          this.userListContainer=this.mainContainer.querySelector(config.userListContainer);
          this.sendMessageUrl=config.sendMessageUrl;
          this.textInput=this.mainContainer.querySelector(config.textInput);
          this.fileInput=this.mainContainer.querySelector(config.fileInput);
          this.userSearchUrl=config.userSearchUrl;
          this.searchInput=this.mainContainer.querySelector(config.searchInput);
          this.fileUploadIcon=this.mainContainer.querySelector(config.fileUploadIcon);
          this.sendButton=this.mainContainer.querySelector(config.sendButton);
          this.chatUserType=this.mainContainer.querySelector(config.chatUserType).value;
          this.chatUserId=this.mainContainer.querySelector(config.chatUserId).value;
          this.userToggle=this.mainContainer.querySelectorAll(config.userToggle);
          this.userIdAttr=config.userIdAttr;
          this.connectionAttribute=config.userConnectionAttribute;
          this.activeUser=config.activeUser;
          this.loaderContainer=this.mainContainer.querySelector(config.loaderContainer);
          this.unreadCounter=config.unreadCounter;
          this.currentUserUnreadCount=0;
          this.unreadAttribute=config.unreadAttribute
          this.chatForm;
          this.form=this.mainContainer.querySelector(config.form);
          this.searchForm;
          this.isSimpleBarInit=0;
          this.simpleBar = new SimpleBar(this.messageContainer);
          this.connectionId;
          this.activeUserElement;
          this.limit=10;



          


          this.sendMessage=(e)=>
          {
          	 this.startLoader(e);

             this.setFormData();

             let obj=this;


            let response= __postCall('chats/send/message',this.chatForm,null);

            response.then(function(data)
            {
                if(data.status)
                {
                     obj.messageContainer.querySelector('.simplebar-content').innerHTML+=data.content;
             obj.scrollDown();
             obj.textInput.value='';


                }
            })

             this.stopLoader();
          }

          this.loadUsers=()=>
          {

              let obj=this;

             let response= __getCall('chats/users');

            response.then(function(data)
            {
                if(data.status)
                {
                     obj.userListContainer.innerHTML+=data.content;
                     obj.refreshUsers();
                    obj.activeUserUpdate();
                }
            })

          }

         this.setup=()=>
         {
             this.loadUsers();
             this.sendButton.addEventListener('click',this.sendMessage);
             this.fileUploadIcon.addEventListener('click',this.openFileInput);
            // this.fileInput.addEventListener('change',this.sendMessage);
             this.searchInput.addEventListener('keyup',this.searchUser);

             this.messageContainer.addEventListener('scroll', () => {
  if ( this.messageContainer.scrollTop === 0) {
    // User has scrolled to the top of the SimpleBar container
    console.log('User scrolled to the top of SimpleBar');
    // Add your event handling code here
  }
});
  

            
         }

         this.refreshUsers=()=>{

              this.userToggle=this.mainContainer.querySelectorAll(config.userToggle);

               this.userToggle.forEach(userElement => {

  userElement.addEventListener('click',this.setActiveUser);
});     

         }

         this.activeUserUpdate=()=> 
         {
             this.userToggle.forEach(userElement => {

                if(userElement.getAttribute(this.userIdAttr)==this.activeUser)
                {

  userElement.classList.add('bg-warning');
                   
                }

});     
         }


         this.setActiveUser=(e)=>
         {
           
            let user=e.target.closest(config.userToggle).getAttribute(this.userIdAttr);
            let unreadCount=e.target.closest(config.userToggle).querySelector(this.unreadCounter).getAttribute(this.unreadAttribute);

            this.activeUserElement=e.target.closest(config.userToggle);

            this.unreadCount=unreadCount;

            
            this.connectionId=e.target.closest(config.userToggle).getAttribute(this.connectionAttribute);

           // console.log(this.connectionId);

            if(user==this.activeUser)
            {
                return false;
            }
            this.activeUser=user;
            this.userToggle.forEach(userElement => {

  userElement.classList.remove('bg-warning');
});     
                       this.toogleMessageContainer('hide');
             
                          this.loadMessages();

                          if(this.unreadCount){

                            e.target.closest(config.userToggle).querySelector(this.unreadCounter).classList.add('d-none');
                            e.target.closest(config.userToggle).querySelector(this.unreadCounter).setAttribute(this.unreadAttribute,0);
                            e.target.closest(config.userToggle).querySelector(this.unreadCounter).innerHTML=0;

                          }

                          







             e.target.closest(config.userToggle).classList.add('bg-warning');

         }

         this.loadMessages=()=>
         {
            if(this.activeUser)
            {
                let response=__getCall('chats/get/messages/'+this.connectionId+'/'+this.unreadCount);
                let obj=this;

                response.then(function(data)
                {
                    if(data.status)
                    {
                        obj.messageContainer.querySelector('.simplebar-content').innerHTML=data.content;
                        
                      //  obj.toogleMessageContainer('show');

                        obj.form.classList.remove('d-none');

                        obj.scrollDown();
                    }
                })
            }
         }

         this.toogleMessageContainer=(type='hide')=>
         {
            if(type=='show')
            {
              
            }
            else
            {
              

               this.messageContainer.querySelector('.simplebar-content').innerHTML='<div class="d-flex w-100 justify-content-center loaderArea" style="min-height: 380px;align-items: center;"><div class="spinner-border text-warning m-1" role="status"><span class="sr-only">Loading...</span></div></div>';
            }
         }

         this.setSearchForm=()=>
         {
            this.searchForm=new FormData();

            this.searchForm.append('search',this.searchInput.value);

          
         }

         this.searchUser=(e)=>
         {
           let searchString=e.target.value;
           if(searchString.length >1)
           {

             this.setSearchForm();

             let UserContainer=this.userListContainer;

             let obj=this;

              let response= __postCall('chats/search/user',this.searchForm,null);
                response.then(function(data){
                    if(data.status)
                    {
                       
                        UserContainer.innerHTML=data.content;

                        obj.refreshUsers();


                    }
                })
             


           }
           else if(searchString.length==0)
           {
            this.userListContainer.innerHTML='';
              this.loadUsers();
            // this.activeUserElement.classList.add('bg-warning');

           }
         }

         this.scrollDown=()=>
         { 

    
            this.simpleBar.getScrollElement().scrollTop = this.simpleBar.getScrollElement().scrollHeight;
      
         }

         this.setFormData=()=>
         {
            this.chatForm=new FormData();

            if(this.fileInput.files[0]){

            this.chatForm.append('upload_file', this.fileInput.files[0]);
           


            }

            this.chatForm.append('message',this.textInput.value);
             this.chatForm.append('chat_user_id', this.activeUser);
           // this.chatForm.append('chat_user_type', this.chatUserType);
         }

         this.openFileInput=()=>
         {
            this.fileInput.click();
         }

         this.startLoader=()=>
         {
               this.sendButton.disabled=true;
         }

         this.stopLoader=()=>
         {
               this.sendButton.disabled=false;
         }


         

         this.setup();

     }


     const __postCall=async (url,formData,callback=null)=>
  {
    const _token=csrfToken;
    const rawResponse =  await fetch(baseURL+url, {
    method: 'POST',
    headers: {
    
        'X-CSRF-TOKEN':_token,
    },
    body: formData
  });  
      let response=await rawResponse.json();
       if(callback)
       {
           callback(response.message,response.type,response);
       }

         return response;
       
  }

  const __getCall=async (url,callback=null)=>
  {
    const _token=csrfToken;
    const rawResponse =  await fetch(baseURL+url, {
    method: 'GET',
    headers: {
    
        'X-CSRF-TOKEN':_token,
    },
    
  });  
      let response=await rawResponse.json();
       if(callback)
       {
           callback(response.message,response.type,response);
       }

         return response;
       
  }


  window.Messanger = Messanger;