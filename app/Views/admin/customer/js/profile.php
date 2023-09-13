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