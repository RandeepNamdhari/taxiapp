<script>

	          document.getElementById("driverForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=new FormData(this);
   let url='<?=base_url('admin/customers/'.($customer->id??'').'/drivers/store')?>'
  // console.log(data);return false;
   submitFormWithMedia('driverForm',url,data,function(data)
   	{
       console.log(data);
   	});
});

              function changeAmountOfType(selector)
              {
                let amount=$(selector).find('option:selected').attr('data-amount');
                $(selector).parent('div').next('div').find('input').val(amount);
              }

</script>