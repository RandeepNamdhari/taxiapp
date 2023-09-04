  const __postRequest=async (url,data,callback=null)=>
  {
    const _token=csrfToken;
    const rawResponse =  await fetch(url, {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN':_token,
    },
    body: JSON.stringify(data)
  });  
      let response=await rawResponse.json();
       if(callback)
       {
           callback(response.message,response.type,response);
       }

         return response;
       
  }




  const __showMessage=(message,type,response='')=>
  {
    
       Swal.fire({
                title: message,
                icon: type,
                toast: true,
                position: 'top-right', // Adjust the position as needed
                showConfirmButton: false,
                timer: 3000 // Close the toast after 3 seconds
            });

       if(typeof response.redirect !='undefined' && response.redirect.length)
       {

        setTimeout(function(){

        window.location.assign(response.redirect);


        },2000)

         

  }



         }



         const __askThenDelete=(url,data,callback=null)=>
         {
           Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Handle the delete action here

          let response=__postRequest(url,data,__showMessage);

         

          if(callback)
          {
            callback(response);
            
          }
         
   

         
        }
    });

         }


         const __showUserModal=(selector,id)=>
         {
            console.log(id);
            $('.bs-users-modal-center').modal('show');
         }

         const __searchUser=(selector)=>
         {
            let search=selector.value;

            if(search.length >1){


            let data={'search':search};
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
         }
