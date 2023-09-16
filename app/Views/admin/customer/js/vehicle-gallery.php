      <script type="text/javascript">



          Dropzone.autoDiscover = false;

          var myDropzone = new Dropzone("#vehicleImages", {
            url: "<?=base_url('admin/customers/'.($customer->user_id??'').'/vehicles/'.($vehicle_id??'').'/gallery/upload')?>",
            maxFiles:10,
            paramName:'vehicle_image',
            addRemoveLinks:true,
             success: function (file, response) {
                // Handle the success event here
                //console.log(file); return false;
                if(response.status)
                {

                    //console.log(file.dataURL);
                    $('#gallerDiv').prepend('<div class="col-md-3 mb-3 image-card"><img src="'+baseURL+response.file.file_thumb_path+'" width="100%" style="min-width:212px;min-height:211px;"> <div class="d-flex justify-content-between p-1" style="height:0;position: relative;top: -30px;"> <div> <input class="form-check form-switch statusInput" onchange="changeFileStatus(this,'+response.file.file_id+')" type="checkbox" id="switch'+response.file.file_id+'" switch="warning" > <label class="form-label full-switch" for="switch'+response.file.file_id+'" data-on-label="Default" data-off-label="None"></label> </div><div><a href="javascript:void(0)" onclick="OpenImageModel(this,\''+baseURL+response.file.file_path+'\')" class="fs-5 text-success"><i class="fas fa-eye"></i></a> <a href="javascript:void(0)" onclick="deleteFile(this,'+response.file.file_id+')" class="fs-5 text-danger"><i class="fas fa-trash"></i></a></div></div></div>');

                    imageModal.files.push(baseURL+response.file.file_path);
                  
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





                   function deleteFile(selector,id)
    {
        if(id)
        {
                var data={'id':id};

               var url='<?=base_url('admin/media/file/')?>'+id+'/delete';

                        __askThenDelete(url,data,function(response)
                                {
                                       response.then(function(data){

                                          if(data.status)
                                          {
                                              $(selector).parents('.image-card').eq(0).remove();
                                          }
                                       })
                                });
        }
    }


     function changeFileStatus(selector,id)
    {
        if(id)
        {
                var data={'id':id};

                var url='<?=base_url('admin/media/file/')?>'+id+'/change/status';

                        var response=__postRequest(url,data,__showMessage);

                        response.then(function(res)
                        {

                            console.log(res);

                            if(res.status)
                        {
                           
                            if($(selector).prop('checked'))
                            {
                               
                               $('input.statusInput').not(selector).prop('checked',false);
                            }
                        }

                        })

                        
        }
    }


     <?php    if(isset($response['data']['vehicle']->media['vehicle']) && count($response['data']['vehicle']->media['vehicle'])):


                                            foreach($response['data']['vehicle']->media['vehicle'] as $file):

                                                $allFiles[]=base_url($file['file_path']);

                                            endforeach;


                                            endif;?>

     let files=<?php echo json_encode(($allFiles??[]))?>;

           let imageModal=new showImageModal({files:files});

          // console.log(imageModal);     

           function OpenImageModel(selector,url)
           {
              imageModal.currentItem=url;
              imageModal.show();
           }

  </script>