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
          this.activeUser=config.activeUser;
          this.loaderContainer=this.mainContainer.querySelector(config.loaderContainer);
          this.chatForm;
          this.searchForm;
          


          this.sendMessage=(e)=>
          {
          	 this.startLoader(e);

             this.setFormData();

             let obj=this;


            let response= __postCall('chats/send/message',this.chatForm,function(res){
                console.log(res);
             });

            response.then(function(data)
            {
                if(data.status)
                {
                     obj.messageContainer.innerHTML+=data.content;
                }
            })

             this.stopLoader();
          }

         this.setup=()=>
         {
             this.sendButton.addEventListener('click',this.sendMessage);
             this.fileUploadIcon.addEventListener('click',this.openFileInput);
            // this.fileInput.addEventListener('change',this.sendMessage);
             this.searchInput.addEventListener('keyup',this.searchUser);

               this.userToggle.forEach(userElement => {

  userElement.addEventListener('click',this.setActiveUser);
});     




         }

         this.refreshUsers=()=>{

              this.userToggle=this.mainContainer.querySelectorAll(config.userToggle);

               this.userToggle.forEach(userElement => {

  userElement.addEventListener('click',this.setActiveUser);
});     

         }


         this.setActiveUser=(e)=>
         {
           
            this.activeUser=e.target.closest(config.userToggle).getAttribute(this.userIdAttr);
            this.userToggle.forEach(userElement => {

  userElement.classList.remove('bg-warning');
});     
               //        this.toogleMessageContainer('hide');
             
                          this.loadMessages();






             e.target.closest(config.userToggle).classList.add('bg-warning');

         }

         this.loadMessages=()=>
         {
            if(this.activeUser)
            {
                let response=__getCall('chats/get/messages/'+this.activeUser);
                let obj=this;

                response.then(function(data)
                {
                    if(data.status)
                    {
                        obj.messageContainer.innerHTML=data.content;
                        
                       // obj.toogleMessageContainer('show');
                    }
                })
            }
         }

         this.toogleMessageContainer=(type='hide')=>
         {
            if(type=='show')
            {
               this.loaderContainer.classList.add('d-none');

             this.messageContainer.classList.remove('d-none');
            }
            else
            {
               this.loaderContainer.classList.remove('d-none');

               this.messageContainer.classList.add('d-none');
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