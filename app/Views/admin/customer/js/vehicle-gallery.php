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
                    $('#gallerDiv').prepend('<div class="col-md-3 m-1"><img src="'+file.dataURL+'" width="100%"></div>');
                  
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

  </script>