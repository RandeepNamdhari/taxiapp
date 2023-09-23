 <?=script_tag('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')?>

 <?=script_tag('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>

 <script type="text/javascript">

            let employeesTable;
    $(document).ready(function () {
         employeesTable=$('#employeesTable').DataTable({
            ajax: '<?= base_url('admin/companies/'.$company->id.'/employees') ?>', // AJAX endpoint
            serverSide:true,
            columns: [
                {data:'serial_no'},
                { data: 'first_name' },
             
                { data: 'email' },
                { data: 'phone' },
                { data: 'limit' },

                { data: 'status' },
                { data: 'created_at' },
                {data:'actions'}

                // Add more columns as needed
            ]
        });
    });

    function deleteEmployee(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/companies/'.$company->id.'/employees/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              employeesTable.draw();
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

                var url='<?=base_url('admin/companies/'.$company->id.'/employees/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }

 </script>