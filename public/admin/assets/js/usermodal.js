         const __showUserModal=(selector,id='',type='')=>
         {
            $('#userlist_content').html('');
            $('.bs-users-modal-center').find('#existingUsersType').val(type);
            $('.bs-users-modal-center').find('#modelId').val(id);

            $('.bs-users-modal-center').find('#searchUserInList').val();
            

            $('.bs-users-modal-center').modal('show');
            setTimeout(function(){
               $('.bs-users-modal-center').find('#searchUserInList').focus();

},500);
         }

         const __searchUser=(selector)=>
         {
            let search=selector.value;
           let type= $('.bs-users-modal-center').find('#existingUsersType').val();
           let id= $('.bs-users-modal-center').find('#modelId').val();

            if(search.length >1){


            let data={'search':search,'id':id,'type':type};
            let usersList=__postRequest(baseURL+'/admin/search/user',data)

            usersList.then(function(data)
            {
                if(data.data.content){
                  $('#userlist_content').html(data.data.content);
                }
                else
                {
                  $('#userlist_content').html('No user found.')
                }
            })

            }
            else
            {
                  $('#userlist_content').html('');

            }
         }


         const attachUser=(selector,type,user_id,model_id=null,callback=null)=>{

            let data={'user_id':user_id,'type':type,'model_id':model_id};

            if($(selector).prop('checked'))
            {
                let url=baseURL+'admin/attach/'+type;

                let response=__postRequest(url,data);

                if(callback)
                {
                    response.then(function(data)
                    {
                        callback(data,selector)
                    })
                }

                
            }


         }