<script>

	          document.getElementById("employeeForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=new FormData(this);
   let url='<?=base_url('admin/companies/'.($company->id??'').'/employees/store')?>'
  // console.log(data);return false;
   submitFormWithMedia('employeeForm',url,data,function(data)
   	{
       console.log(data);
   	});
});

</script>