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
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                        <li class="breadcrumb-item active"><a href="<?=base_url('admin/settings/taxes')?>">Tax Types</a></li>
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4 d-none">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/customers/create')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-plus-circle"></i>&nbsp;Add New Tax
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="col-lg-12">
                                <div class="card">
                                                <h5 class="bg-success m-0 p-2 text-light">Tax Detail</h5>

                                    <div class="card-body">

                                       

                                        <form class="row" action="#" id="saveTax">

                                            <div class="mb-3">

                                                <div class="d-flex justify-content-between">
                                                    <div class="w-50">
                                                <input type="text" class="form-control" id="taxName" name="name" placeholder="Tax Name">
                                            </div>
                                              <div class="">
                                                <input type="number" class="form-control" id="taxPercent" name="percent" placeholder="Tax Percentage">
                                            </div>
                                                <button style="max-height:36px;" id="addButton" class="btn btn-outline-primary waves-effect waves-light"> <i class="fas fa-plus-circle"></i>&nbsp;Add New Tax
                                            </button>

                                            <button style="max-height:36px;" id="updateButton" class="btn btn-outline-primary waves-effect waves-light d-none">Update
                                            </button>

                                        </div>
                                            </div>

                                           
                                        </form>
                                        <!-- end form -->
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>

                            <table id="taxesTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Percent</th>
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
        let taxesTable;
    $(document).ready(function () {
         taxesTable=$('#taxesTable').DataTable({
            ajax: '<?= base_url('admin/settings/taxes') ?>', // AJAX endpoint
            serverSide:true,
            columns: [
                {data:'serial_no','sortable':false},
                { data: 'name','sortable':false },
                { data: 'percent','sortable':true },

                { data: 'status','sortable':false },

              
                {data:'actions','sortable':false}

                // Add more columns as needed
            ]
        });
    });

    function deleteTaxType(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/settings/taxes/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              taxesTable.draw();
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

                var url='<?=base_url('admin/settings/taxes/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }

    function editRow(selector)
    {
          var rowData = taxesTable.row($(selector).parents('tr').eq(0)).data();
          console.log(rowData);
        let code=rowData.code;

        $('#hid').remove();

        $('#addButton').addClass('d-none');
        $('#updateButton').removeClass('d-none');


        $('#taxName').val(rowData.name);
        $('#taxPercent').val(rowData.percent);


        $('#taxName').after('<input type="hidden" id="hid" name="hid" value="'+rowData.id+'"/>');

        $('#taxName').focus();





        

    }

   document.getElementById("saveTax").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('saveTax');
   let url='<?=base_url('admin/settings/taxes/store')?>';
  // console.log(data);return false;
   submitNormalForm('saveTax',url,data,function(data)
    {
        
            if(data.status)
            {
         $('#taxName').val('');
         $('#taxPercent').val('');


                $('#hid').remove();
                 $('#addButton').removeClass('d-none');
                 if(!$('#updateButton').hasClass('d-none')){
        $('#updateButton').addClass('d-none');

                 }
                taxesTable.draw();
            }
       
    });
});
</script>


<?=$this->endSection()?>