   <script type="text/javascript">
    const csrfToken = '<?= csrf_hash() ?>';
    const baseURL='<?=base_url()?>';

   </script> 
   

      <?=script_tag('admin/assets/libs/jquery/jquery.min.js')?>

      <?=script_tag('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')?>
      <?=script_tag('admin/assets/libs/metismenu/metisMenu.min.js')?>
      <?=script_tag('admin/assets/libs/simplebar/simplebar.min.js')?>
      <?=script_tag('admin/assets/libs/node-waves/waves.min.js')?>
      <?=script_tag('admin/assets/libs/sweetalert2/sweetalert2.min.js')?>
      <?=script_tag('admin/assets/js/app.js')?>
      <?=script_tag('admin/assets/js/common.js')?>
   

      


      <script type="text/javascript">

        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})



      </script>




          <?php if(isset($response['status']) && isset($response['message']) && isset($response['type'])):?>

          <script>

           var message='<?=$response['message']?>';
           var type='<?=$response['type']?>';
        

          __showMessage(message,type);

        </script>




          <?php endif;?>