<script>

              document.getElementById("driverForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=new FormData(this);
   let url='<?=base_url('admin/customers/'.($customer->id??'').'/drivers/'.($response['data']['driver']->id??'').'/update')?>'
  // console.log(data);return false;
   submitFormWithMedia('driverForm',url,data,function(data)
    {
       console.log(data);
    });
});

</script>