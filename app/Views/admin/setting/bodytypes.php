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
                                        <li class="breadcrumb-item active"><a href="<?=base_url('admin/settings/vehicle/bodytypes')?>">Vehicle Body Types</a></li>
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4 d-none">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/customers/create')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-plus-circle"></i>&nbsp;Add New Customer
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                       

                                        <form class="row" action="#" id="saveBodyType">
                                            <div class="mb-3">
                                                <label class="form-label">Body Type</label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="w-75">
                                                <input type="text" class="form-control" id="bodyTypeName" name="name" placeholder="Name">
                                            </div>
                                                <button style="max-height:36px;" id="addButton" class="btn btn-outline-primary waves-effect waves-light"> <i class="fas fa-plus-circle"></i>&nbsp;Add New Type
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

                            <table id="BodyTypesTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
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
        let BodyTypesTable;
    $(document).ready(function () {
         BodyTypesTable=$('#BodyTypesTable').DataTable({
            ajax: '<?= base_url('admin/settings/vehicle/bodytypes') ?>', // AJAX endpoint
            serverSide:true,
            columns: [
                {data:'serial_no','sortable':false},
                { data: 'name','sortable':true },
                { data: 'status','sortable':false },

              
                {data:'actions','sortable':false}

                // Add more columns as needed
            ]
        });
    });

    function deleteBodyType(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/settings/vehicle/bodytypes/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              BodyTypesTable.draw();
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

                var url='<?=base_url('admin/settings/vehicle/bodytypes/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }

    function editRow(selector)
    {
          var rowData = BodyTypesTable.row($(selector).parents('tr').eq(0)).data();
          console.log(rowData);
        let name=rowData.name;

        $('#hid').remove();

        $('#addButton').addClass('d-none');
        $('#updateButton').removeClass('d-none');


        $('#bodyTypeName').val(name);

        $('#bodyTypeName').after('<input type="hidden" id="hid" name="hid" value="'+rowData.id+'"/>');

        $('#bodyTypeName').focus();





        

    }

   document.getElementById("saveBodyType").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=getFormData('saveBodyType');
   let url='<?=base_url('admin/settings/vehicle/bodytypes/store')?>';
  // console.log(data);return false;
   submitNormalForm('saveBodyType',url,data,function(data)
    {
        
            if(data.status)
            {
         $('#bodyTypeName').val('');

                $('#hid').remove();
                 $('#addButton').removeClass('d-none');
                 if(!$('#updateButton').hasClass('d-none')){
        $('#updateButton').addClass('d-none');

                 }
                BodyTypesTable.draw();
            }
       
    });
});
</script>


<?=$this->endSection()?>