<?php 
    $data=$response??[];

if(isset($response['data']['customer'])):

    $customer=$response['data']['customer'];




    $licence_front=$customer->getFile('licence_front');

    $licence_back=$customer->getFile('licence_back');


    $data['customer']=$customer;

    $data['licence_back']=$licence_back;
    $data['licence_front']=$licence_front;


endif;




?>
<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>


      <?=link_tag('admin/assets/css/custom-dropzone.min.css')?>



     



<?=$this->endSection()?>

<?= $this->section('content') ?>

  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Add Customer</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/customers')?>">Customers</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Customer <?=ucwords($activeTab)?></li>
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                        <a href="<?=base_url('admin/customers')?>"  class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left "></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                        	<div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                      <!--   <h4 class="card-title">Default Tabs</h4>
                                        <p class="card-title-desc">Use the tab JavaScript plugin—include
                                            it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                                            file—to extend our navigational tabs and pills to create tabbable panes
                                            of local content, even via dropdown menus.</p>
 -->
                                        <!-- Nav tabs -->
                                       
                                       <?=view('admin/customer/tabs',$data)?>

                                        <!-- Tab panes -->
                                        <div class="tab-content">

                                            <?=view('admin/customer/'.$activeContent,$data)?>
                                           

                                        
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>





                        </div>
                    </div>


<?=view('admin/partials/image-modal')?>


                <?= $this->endSection() ?>


                <?=$this->section('page-script')?>

      <?=script_tag('admin/assets/libs/dropzone/min/dropzone.min.js')?>

      <?=script_tag('admin/assets/js/showimagemodal.js')?>


      <?=view('admin/customer/js/'.$activeContent,$data)?>





      <?=$this->endSection()?>