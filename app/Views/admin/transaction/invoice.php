<?php

   $invoice=$response['data']['invoice'][0]??[];

   $items=$response['data']['invoice']??[];

 ?>


<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>



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
                                    <h6 class="page-title">Transactions</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Transaction Invoice</a></li>
                                        
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin/transactions')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left"></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                          <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    <h4 class="float-end font-size-16"><strong>Order # <?=strtotime($invoice['created_at']).$invoice['id']?></strong></h4>
                                                    <h3>
                                                        <img src="<?=base_url('admin/assets/images/logo-sm.png')?>" alt="logo" height="24">
                                                    </h3>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <address class="">
                                                            <strong>Billed To:</strong><br>
                                                           <?=ucwords($invoice['username']?$invoice['username']:$invoice['first_name'])?><br>
                                                          <p class="w-50"> <?=$invoice['address']??''?></p>
                                                        </address>
                                                    </div>


                                                    <div class="col-6 text-end">

                                                        <address>
                                                            <strong>Order Date:</strong><br>
                                                            <?=date('d M Y',strtotime($invoice['created_at']));?><br><br>
                                                        </address>

                                                       
                                                    </div>
                                                </div>
                                                 <?php if($invoice['from_location']):?>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12 text-center"><h4>Trip Details</h4></div>
                                                    <div class="col-4 mt-4">
                                                       
                                                             <strong>PickUp Location:</strong><br>

                                                        <div><?=$invoice['from_location']?></div>
                                                       


                                                  
                                                    </div>
                                                  <div class="col-4 mt-4 text-center">
                                                       
                                                             <strong>Droping Location:</strong><br>

                                                        <div> <?=$invoice['to_location']?></div>
                                                       


                                                  
                                                    </div>

                                                     <div class="col-4 mt-4 text-end">
                                                       
                                                       
                                                             <strong class="">Driver Detail:</strong><br>

                                                             <?php if($invoice['driver_phone']):?>


                                                        <div><?=$invoice['driver_name']?$invoice['driver_name']:$invoice['driver_first_name']?><br>
                                                            <?=$invoice['driver_phone']?>
                                                    </div>

                                                    <?php else:?>

                                                        <p>N/A</p>


                                                    <?php endif;?>
                                                       

                                                     
                                                  
                                                    </div>
                                                </div>
                                                  <?php endif;?>
                                            </div>
                                        </div>

                                        <hr>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Item</strong></td>
                                                                    <td class="text-center"><strong>Price</strong></td>
                                                                    <td></td>
                                                                   
                                                                    <td class="text-end"><strong>Totals</strong></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                                <?php
                                                                $total=(float)0.00;
                                                                 if(count($items)):
                                                                    foreach($items as $kk => $item):

                                                                        $total+=$item['amount'];
                                                                        ?>
                                                                <tr>
                                                                    <td><?=$item['model']?>
                                                                        <?php if($item['service_name']):
                                                                            echo '('.$item['service_name'].')';
                                                                        endif;
                                                                        ?>
                                                                    </td>
                                                                    <td class="text-center"><?=system_setting('currency_icon').$item['amount']?></td>
                                                                    <td></td>
                                                                    
                                                                    <td class="text-end"><?=system_setting('currency_icon').$item['amount']?></td>
                                                                </tr>

                                                            <?php endforeach;
                                                        endif;?>

                                                              
                                                         
                                                                <tr>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line text-center">
                                                                        <strong>Total</strong></td>
                                                                    <td class="no-line text-end"><h4 class="m-0"><?=system_setting('currency_icon').(float)$total?></h4></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
        
                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div> <!-- end row -->
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>



                        </div>
                </div>





<?=$this->endSection()?>

<?=$this->section('page-script')?>

 <?=script_tag('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')?>

 <?=script_tag('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>

 <script type="text/javascript">
        let TransactionTable;
    $(document).ready(function () {
         TransactionTable=$('#TransactionTable').DataTable({
            ajax: '<?= base_url('admin/transactions') ?>', // AJAX endpoint
            serverSide:true,
            columns: [
                {data:'serial_no'},
                { data: 'username' },
                {data:'model'},
                { data: 'type' },
                { data: 'amount' },
              
                { data: 'status' },
                { data: 'created_at' },
                {data:'actions'}

                // Add more columns as needed
            ]
        });
    });

    function deleteCustomer(id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/customers/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              TransactionTable.draw();
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

                var url='<?=base_url('admin/transactions/')?>'+id+'/change/status';

                        __postRequest(url,data,__showMessage);
        }
    }
</script>


<?=$this->endSection()?>