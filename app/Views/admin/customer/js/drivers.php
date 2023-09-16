
<script type="text/javascript">

	   function deleteDriver(selector,id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/customers/'.$customer->id.'/drivers/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              $(selector).parents('.driver-card').eq(0).parent('div').remove();
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

                var url='<?=base_url('admin/customers/'.$customer->id.'/drivers/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }

</script>