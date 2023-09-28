<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>

  <?=link_tag('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')?>

  <?=link_tag('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')?>

  <style type="text/css">
          
  </style>



<?=$this->endSection()?>

<?= $this->section('content') ?>


  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Services</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                     
                                        <li class="breadcrumb-item active"><a href="<?=base_url('admin/services')?>">Services</a></li>
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/services/create')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-plus-circle"></i>&nbsp;Add New Service
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->



                            <table id="servicesTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Service Charge</th>
                                              
                                                <th>Status</th>
                                              
                                                <th>Action</th>

                                            </tr>
                                            </thead>


                                            <tbody>
                                         
                                            
                                            </tbody>
                                        </table>



                        </div>
                </div>





<?=$this->endSection()?>

<?=$this->section('page-script')?>

 <?=script_tag('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')?>

 <?=script_tag('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>

 <script type="text/javascript">
        let servicesTable;
    $(document).ready(function () {
         servicesTable=$('#servicesTable').DataTable({
            ajax: '<?= base_url('admin/services') ?>', // AJAX endpoint
            serverSide:true,
            columns: [
                {data:'serial_no','sortable':false},
                { data: 'name','sortable':true },
                { data: 'amount','sortable':false },

            


                { data: 'status','sortable':false },

              
                {data:'actions','sortable':false}

                // Add more columns as needed
            ]
        });
    });

    function deleteService(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/services/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              servicesTable.draw();
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

                var url='<?=base_url('admin/services/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }

  

  
</script>


<?=$this->endSection()?>