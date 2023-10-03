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
                                    <h6 class="page-title">Messages</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                     
                                        <li class="breadcrumb-item active"><a href="<?=base_url('admin/services')?>">Chats</a></li>
                                        
                                    </ol>
                                </div>

                                <div class="col-md-4 d-none">
                                    <div class="text-end">
                                     
                                          <a href="<?=base_url('admin')?>" class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-plus-circle"></i>&nbsp;dfjjkldfk
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->


                     <?=view('chat/messenger')?>




                        </div>
                </div>





<?=$this->endSection()?>

<?=$this->section('page-script')?>



 <script type="text/javascript">


  
</script>


<?=$this->endSection()?>