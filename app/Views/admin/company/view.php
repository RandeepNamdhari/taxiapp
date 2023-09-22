<?php 
    $data=$response??[];

if(isset($response['data']['company'])):

    $company=$response['data']['company'];



    $data['company']=$company;

 


endif;

//echo '<pre>';print_r($company);die;




?>
<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>


   



     



<?=$this->endSection()?>

<?= $this->section('content') ?>

  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Company Details</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Company Management</a></li>
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin/customers')?>">Companies</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Company <?=ucwords($activeTab)?></li>
                                    </ol>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end">
                                     
                                        <a href="<?=base_url('admin/companies')?>"  class="btn btn-outline-primary waves-effect waves-light">
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
                                       
                                       <?=view('admin/company/tabs',$data)?>

                                        <!-- Tab panes -->
                                        <div class="tab-content">

                                            <?=view('admin/company/'.$activeContent,$data)?>
                                           

                                        
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>





                        </div>
                    </div>





                <?= $this->endSection() ?>


                <?=$this->section('page-script')?>



      <?=view('admin/company/js/'.$activeContent,$data)?>





      <?=$this->endSection()?>