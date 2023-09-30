<?php

  $page=$response['data']['page']??[];

 // echo '<pre>';print_r($policy);die;



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
                                    <h6 class="page-title"><?=ucwords($pageName).' '.ucwords($pageType)?></h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                       
                                      
                                        <li class="breadcrumb-item active" aria-current="page"><?=ucwords($pageName).' '.ucwords($pageType)?></li>
                                    </ol>
                                </div>

                                <div class="col-md-4 d-none">
                                    <div class="text-end">
                                     
                                         <a href="<?=base_url('admin/services')?>"  class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left "></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                       <div class="row">

                        <div class="col-lg-12">
                            <h4 class="card-title mb-0 bg-success p-3 text-light"><?=ucwords($pageName).' '.ucwords($pageType)?></h4>
                                <div class="card">
                                    <div class="card-body">
                                        
                                    

                                        <form class="mt-3" id="pageForm">

                                            <div class="row">
                                               
 <div class="col-md-12 mb-3">
 <label>Content</label>
<textarea class="form-control" rows="10" id="elm1" name="content"><?=$page['content']??''?></textarea>
 </div>



<div class="col-md-12 d-flex justify-content-end text-end">

 <div class="col-md-3 mb-3">
    <label>&nbsp;</label>
  <button class="btn btn-primary form-control serverSaveButton" type="submit">Save</button>
  <div class="text-center serverLoader d-none">
  <div class="spinner-border text-primary m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div></div>
 </div>
</div>

 </div>

                                        </form>
                                      <!-- end form -->
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>

                       </div>





                        </div>
                    </div>





                <?= $this->endSection() ?>

                <?=$this->section('page-script')?>

    <?=script_tag("admin/assets/libs/tinymce/tinymce.min.js")?>

        <!-- init js -->
        <?=script_tag('admin/assets/js/pages/form-editor.init.js')?>





                <script type="text/javascript">
                    
                     document.getElementById("pageForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   let data=new FormData(this);
   let url='<?=base_url('admin/pages/'.($pageName).'/'.$pageType)?>'
  // console.log(data);return false;
   
   submitFormWithMedia('pageForm',url,data,null,1);

});

                

        
                </script>

               
      

                <?=$this->endSection()?>