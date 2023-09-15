
<script type="text/javascript">

	   function deleteVehicle(selector,id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/customers/'.$customer->id.'/vehicles/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              $(selector).parents('.vehicle-card').eq(0).parent('div').remove();
                                          }
                                       })
                                });
        }
    }

     function changeStatus(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/customers/'.$customer->id.'/vehicles/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }

</script>