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
         

  }



  