<script src="text/javascript">
	function Messanger(config)
	{
          this.messages=config.messages;
          this.users=config.users;
          this.sendMessageUrl=config.sendMessageUrl;
          this.textInput=document.getElementById(config.textInput);
          this.fileInput=document.getElementBy(config.fileInput);
          this.userSearchUrl=config.userSearchUrl;
          this.searchElement=document.getElementById(config.searchElement);
          this.userContainerId=document.getElementBy(config.userContainer);
          this.messageContainer=document.getElementById(config.messageContainer);
          this.fileUploadIcon=document.getElementById(config.fileUploadIcon);
          this.sendButton=document.getElementById(config.sendButton);


          this.sendMessage=(e)=>
          {
          	 console.log(e);
          }

         this.setup=()=>
         {
             this.sendButton.addEventListener('click',this.sendMessage);
         }


	}
</script>
