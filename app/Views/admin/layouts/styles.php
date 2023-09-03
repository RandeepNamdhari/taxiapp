  <!-- App favicon -->
  <?php 

  helper('html')

  ?>
  
      <?=link_tag('admin/assets/images/favicon.ico')?>

    
      
      <?=link_tag('admin/assets/libs/chartist/chartist.min.css')?>

      <?=link_tag('admin/assets/css/bootstrap.min.css')?>

      <?=link_tag('admin/assets/css/icons.min.css')?>

      <?=link_tag('admin/assets/css/app.min.css')?>
      
      <?=link_tag('admin/assets/libs/sweetalert2/sweetalert2.min.css')?>


          <style>
            .validation-error
            {
                    
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: var(--bs-form-invalid-color);
            }

            .team-members div
            {
               display: flex;

            }

            .role-member
            {
              margin-left:-30px;

            }

            .zIndex0
            {
                  z-index: 0;
            }
            .zIndex1
            {
                  z-index: 1;
            }
            .zIndex0:hover
            {
                 z-index: 2;
            }
        </style>