<script>

	          document.getElementById("vehicleForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('vehicleForm');
   let url='<?=base_url('admin/customers/'.($customer->id??'').'/vehicles/store')?>'
  // console.log(data);return false;
   submitNormalForm('vehicleForm',url,data,function(data)
   	{
       console.log(data);
   	});
});

</script>