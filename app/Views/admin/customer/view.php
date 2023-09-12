<?php 

if(isset($response['data']['customer'])):

    $customer=$response['data']['customer'];




    $licence_front=$customer->getFile('licence_front');

    $licence_back=$customer->getFile('licence_back');


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
                                        <li class="breadcrumb-item active" aria-current="page">Create New Customer</li>
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
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="true">
                                                    <span class="d-none d-md-block">Profile</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                </a>
                                            </li>
                                           
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-none d-md-block">Vehicles</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                                                    <span class="d-none d-md-block">Drivers</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane p-3 active show" id="home" role="tabpanel">

                                            	<div class="row">
                                            		<div class="col-md-12">
                                            	</div>
                                             
                                            </div>
                                        </div>

                                            <div class="tab-pane p-3 active show pt-0" id="profile" role="tabpanel">

                                                <div class="row">

                                                    <div class="col-md-6">
                                                     
                                                   <div class="d-flex" style="align-items:center;">
                                                       <h3 class="d-inline-block w-75">Customer Information</h3>

                                                       <div class="w-25 text-end" >

                                                       <a href="<?=base_url('admin/customers/'.($customer->user_id??'').'/edit')?>" class="fs-4 text-primary text-end">
                                                                   <i class="fas fa-edit"></i> </a>
                                                               </div>
                                                   </div>
                                                        <hr class="mt-1" style="border:1px solid;border-radius: 25px;">


            <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Full Name:</strong><span class="d-inline-block w-75"> <?=($customer->first_name??'').' '.($customer->middle_name??'').' '.($customer->last_name??'')?><span></p>

                  <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Company:</strong><span class="d-inline-block w-75"> <?=$customer->company_name??''?><span></p>

                 <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Email:</strong><span class="d-inline-block w-75"> <?=$customer->email??''?><span></p>

                     <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">phone:</strong><span class="d-inline-block w-75"> <?=$customer->phone??''?><span></p>

                         <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Date Of Birth:</strong><span class="d-inline-block w-75"> <?=$customer->date_of_birth??''?><span></p>

                    <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Address:</strong><span class="d-inline-block w-75"> <?=$customer->address??''?><span></p>

                        <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Suburb:</strong><span class="d-inline-block w-75"> <?=$customer->suburb??''?><span></p>

                             <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">State:</strong><span class="d-inline-block w-75"> <?=$customer->state??''?><span></p>

                                 <p><strong  class="w-25 d-inline-block" style="vertical-align: top;">Post Code:</strong><span class="d-inline-block w-75"> <?=$customer->post_code??''?><span></p>
         
                                                </div>

                                                <div class="col-md-5">
                                               
                                                     
                                                   <div class="d-flex" style="align-items:center;">
                                                       <h3 class="d-inline-block w-75">Licence Information</h3>

                                                       <div class="w-25 text-end" >
<!-- 
                                                       <a href="<?=base_url('admin/customers/'.($customer->user_id??'').'/edit')?>" class="fs-4 text-primary text-end">
                                                                   <i class="fas fa-edit"></i> </a> -->
                                                               </div>
                                                   </div>
                                                     <hr class="mt-1" style="border:1px solid;border-radius: 25px;">

                                                     <div class="row">

                                                        <div class="col-md-12">



                                                         
                                        <div class="mb-5">

                                            <p><strong  class="w-50 d-inline-block" style="vertical-align: top;">Licence Number:</strong><span class="d-inline-block w-50"> <?=$customer->licence_number??''?><span></p>

                                                <p><strong  class="w-50 d-inline-block" style="vertical-align: top;">Licence Expiry:</strong><span class="d-inline-block w-50"> <?=$customer->licence_expiry??''?><span></p>


                                            <form action="#" style="display:<?php if($licence_front)echo 'none';?>;" class="custom-dropzone" id="licence_front">
                                                <div class="fallback">
                                                    <input name="licence_front" type="file">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <h5>Drop your licence front image here.</h5>
                                                </div>
                                            </form><!-- end form -->

                                            <?php if($licence_front):



                                                echo '<div><img class="mh-207" src="'.base_url($licence_front).'" width="100%"><button class="btn btn-dark licence-change-button" onclick="showUploadArea(this)" class="text-secondary text-end"><i class="fas fa-edit"></i></button><button class="btn btn-dark licence-view-button" onclick="OpenImageModel(this,\''.base_url($licence_front).'\')" class="text-secondary text-end"><i class="fas fa-external-link-alt"></i></button></div>';


                                              endif;?>

                                          
                                        </div>

                                                        </div>

                                                        <div class="col-md-12">

                                                                 <div class="mb-5">
                                            <form action="#" style="display:<?php if($licence_front)echo 'none';?>;" class="custom-dropzone" id="licence_back">
                                                <div class="fallback">
                                                    <input name="licence_back" type="file">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <h5>Drop your licence back image here.</h5>
                                                </div>
                                            </form><!-- end form -->
                                             <?php if($licence_back):



                                                   echo '<div><img class="mh-207" src="'.base_url($licence_back).'" width="100%"><button class="btn btn-dark licence-change-button" onclick="showUploadArea(this)" class="text-secondary text-end"><i class="fas fa-edit"></i></button><button class="btn btn-dark licence-view-button" onclick="OpenImageModel(this,\''.base_url($licence_back).'\')" class="text-secondary text-end"><i class="fas fa-external-link-alt"></i></button></div>';


                                              endif;?>
                                        </div>

                                                        </div>

                                                         

                                                     </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                            <div class="tab-pane p-3" id="messages" role="tabpanel">
                                                <p class="mb-0">
                                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                                    farm-to-table readymade. Messenger bag gentrify pitchfork
                                                    tattooed craft beer, iphone skateboard locavore carles etsy
                                                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                                    Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                                    mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                                    retro mlkshk vice blog. Scenester cred you probably haven't
                                                    heard of them, vinyl craft beer blog stumptown. Pitchfork
                                                    sustainable tofu synth chambray yr.
                                                </p>
                                            </div>
                                            <div class="tab-pane p-3" id="settings" role="tabpanel">
                                                <p class="mb-0">
                                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                                    art party before they sold out master cleanse gluten-free squid
                                                    scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                                    art party locavore wolf cliche high life echo park Austin. Cred
                                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                                    farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                                    mustache readymade thundercats keffiyeh craft beer marfa
                                                    ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                                    vegan.
                                                </p>
                                            </div>
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


      <script type="text/javascript">

          Dropzone.autoDiscover = false;

          var myDropzone = new Dropzone("#licence_front", {
            url: "<?=base_url('admin/customers/upload/licence/licence_front/'.($customer->id??''))?>",
            maxFiles:1,
            paramName:'licence_front',
            addRemoveLinks:true,
             success: function (file, response) {
                // Handle the success event here
              //  console.log(file);
                if(response.status)
                {

                    //console.log(file.dataURL);
                    $('#licence_front').hide();
                    $('#licence_front').after('<div><img src="'+file.dataURL+'" width="100%"><button class="btn btn-dark licence-change-button" onclick="showUploadArea(this)" class="text-secondary text-end"><i class="fas fa-edit"></i></button><button class="btn btn-dark licence-view-button" onclick="OpenImageModel(this,'+file.dataURL+')" class="text-secondary text-end"><i class="fas fa-external-link-alt"></i></button>');
                }
              //  console.log("File uploaded successfully:", response);
                    __showMessage(response.message);

                // You can perform additional actions here, e.g., display a success message
            }
        });

             myDropzone.on("complete", function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
            //alert('Your action, Refresh your page here. ');
        }

        myDropzone.removeFile(file);
    });


              var myDropzone1 = new Dropzone("#licence_back", {
            url: "<?=base_url('admin/customers/upload/licence/licence_back/'.($customer->id??''))?>",
            maxFiles:1,
            paramName:'licence_back',
            addRemoveLinks:true,
             success: function (file, response) {
                // Handle the success event here
                console.log(file);
                if(response.status)
                {

                    
                    //console.log(file.dataURL);
                    $('#licence_back').hide();
                    $('#licence_back').after('<div><img src="'+file.dataURL+'" width="100%"><button class="btn btn-success licence-change-button" onclick="showUploadArea(this)" class="text-secondary text-end"><i class="fas fa-edit"></i>&nbsp;&nbsp;Change</button></div>');
                }
                __showMessage(response.message,response.type);
                console.log("File uploaded successfully:", response);
                // You can perform additional actions here, e.g., display a success message
            }
        });

             myDropzone1.on("complete", function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
            //alert('Your action, Refresh your page here. ');
        }

        myDropzone1.removeFile(file);
    });

           

           function showUploadArea(selector)
           {
             $(selector).parents('div').eq(0).prev().show();

             $(selector).parents(
                'div').eq(0).remove();

           }

           let files=<?php echo json_encode(array($licence_back,$licence_front))?>;

           let imageModal=new showImageModal({files:files});

           console.log(imageModal);     

           function OpenImageModel(selector,url)
           {
              imageModal.currentItem=url;
              imageModal.show();
           }

      </script>

      <?=$this->endSection()?>