<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title><?=$pageTitle??''?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <?= view('admin/layouts/styles') ?>

      <?= $this->renderSection('page-style') ?>
    
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?= view('admin/layouts/header') ?>

        <?= view('admin/layouts/sidebar') ?>

            
       

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->


            <div class="main-content">

      <?= $this->renderSection('content') ?>


               
                <!-- End Page-content -->

        <?= view('admin/layouts/footer') ?>



                
             

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <?= view('admin/layouts/rightbar') ?>

      
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>



                <!-- JAVASCRIPT -->

        <?= view('admin/layouts/scripts') ?>


      <?= $this->renderSection('page-script') ?>


           

    </body>

</html>