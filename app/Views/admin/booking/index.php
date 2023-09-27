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
                                    <h6 class="page-title">Bookings</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Booking Management</a></li>
                                        <li class="breadcrumb-item active"><a href="<?=base_url('admin/bookings')?>">Bookings</a></li>
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/bookings/create')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-plus-circle"></i>&nbsp;Add New Booking
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                            <table id="BookingTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Booking ID</th>
                                                <th>Customer Name</th>
                                                <th>Driver</th>
                                                <th>Vehicle</th>
                                                <th>Amount</th>
                                                <th>Location</th>
                                                <th class="text-center">Status</th>
                                                <th>Booking Date</th>
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
        let BookingTable;
    $(document).ready(function () {
         BookingTable=$('#BookingTable').DataTable({
            ajax: '<?= base_url('admin/bookings') ?>', // AJAX endpoint
            serverSide:true,
            columns: [
                {data:'serial_no'},
                {data:'booking_uid'},

                { data: 'first_name' },
                { data: 'driver_name' },
                { data: 'vehicle_name' },
                { data: 'booking_fares' },
                { data: 'locations' },
                { data: 'status' },

                { data: 'booking_date' },
              
                {data:'actions'}

                // Add more columns as needed
            ]
        });
    });

    function deleteBooking(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/bookings/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              BookingTable.draw();
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

                var url='<?=base_url('admin/customers/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }
</script>


<?=$this->endSection()?>