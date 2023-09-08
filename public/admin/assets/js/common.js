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


         // function to submit form
             const submitNormalForm=(formId,url,data,callback=null)=>{

             

              toggleLoaderButton(formId,'show');



               var response=__postRequest(url,data,__showMessage);

        response.then(function(data){

            $('.validation-error').remove();
            $('.alert-danger').remove();

           if(!data.status && data.errors)
          {
            Object.keys(data.errors).forEach(key => {

              
                     $('#'+formId).find('[name="'+key+'"]').after('<div class="validation-error">'+data.errors[key].replace('_',' ')+'</div>');
                 
              
              });
          }

          if(callback)
          {
            callback(data);
          }

          toggleLoaderButton(formId,'hide')
         
        })


        }

        const getFormData=(formId)=>
        {
          let $form = $('#'+formId);
  
  
         let formData = {};

 
  $form.find('input,textarea,select').each(function() {
    let $input = $(this);
    let inputName = $input.attr('name');
    let inputValue = $input.val();
    
   
    formData[inputName] = inputValue;
    
        })
  return formData;
      }


      const toggleLoaderButton=(formId,type='show')=>
      {
            if(type=='show'){
                 $('#'+formId).find('.serverLoader').removeClass('d-none');

              $('#'+formId).find('.serverSaveButton').addClass('d-none');
            }
            else
            {
                 $('#'+formId).find('.serverLoader').addClass('d-none');

              $('#'+formId).find('.serverSaveButton').removeClass('d-none');
            }
          
      }


      const goBack=()=>{
    const previousUrl = document.referrer;
    window.location.href = previousUrl;
}



