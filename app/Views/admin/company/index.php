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
                                    <h6 class="page-title">Companies</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Company Management</a></li>
                                        <li class="breadcrumb-item active"><a href="<?=base_url('admin/companies')?>">Companies</a></li>
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/companies/create')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-plus-circle"></i>&nbsp;Add New Company
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                            <table id="companyTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                               
                                                <th>Company Name</th>

                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th class="text-center">Status</th>
                                                <th>Registration Date</th>
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
        let companyTable;
    $(document).ready(function () {
         companyTable=$('#companyTable').DataTable({
            ajax: '<?= base_url('admin/companies') ?>', // AJAX endpoint
            serverSide:true,
            columns: [
                {data:'serial_no'},
              
                { data: 'company_name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'status' },
                { data: 'created_at' },
                {data:'actions'}

                // Add more columns as needed
            ]
        });
    });

    function deleteCompany(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/companies/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              companyTable.draw();
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

                var url='<?=base_url('admin/companies/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }
</script>


<?=$this->endSection()?>