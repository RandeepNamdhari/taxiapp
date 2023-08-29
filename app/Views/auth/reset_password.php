<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title><?=$pageTitle??''?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url('admin/assets/images/favicon.ico')?>">

    <!-- Bootstrap Css -->
    <link href="<?=base_url('admin/assets/css/bootstrap.min.css')?>" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?=base_url('admin/assets/css/icons.min.css')?>" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?=base_url('admin/assets/css/app.min.css')?>" id="app-style" rel="stylesheet" type="text/css">

     <style>
            .validation-error
            {
                    
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: var(--bs-form-invalid-color);
            }
        </style>

</head>

<body class="account-pages">
    <!-- Begin page -->
    <div class="accountbg" style="background: url('<?=base_url("admin/assets/images/bg.jpg")?>');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card shadow-none">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box shadow-none p-4">
                        <div class="p-2">
                            <div class="text-center mt-4">
                                <a href="index.html" class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-dark.png" alt="" height="17">
                                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-light.png" alt="" height="18">
                                    </span>
                                </a>
                            </div>

                            <h4 class="font-size-18 mt-5 text-center">Set New Password</h4>

                            

                            <form class="mt-4" action="#" id="resetPasswordForm">

                               

                                <div class="mb-3">
                                    <label class="form-label" for="password">New Password</label>
                                    <input type="password"  class="form-control" id="password" placeholder="Enter Password">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="password_confirm">Password Confirm</label>
                                    <input type="password"  class="form-control" id="password_confirm" placeholder="Enter Password Again">
                                </div>

                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>
                                </div>

                                <div class="mt-2 mb-0 row d-none">
                                    <div class="col-12 mt-3">
                                        <a href="pages-recoverpw-2.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Remember It ? <a href="<?=base_url('admin/login')?>" class="fw-medium text-primary"> Sign In here </a> </p>
                                <p>©
                                    <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script src="<?=base_url('admin/assets/libs/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('admin/assets/libs/metismenu/metisMenu.min.js')?>"></script>
    <script src="<?=base_url('admin/assets/libs/simplebar/simplebar.min.js')?>"></script>
    <script src="<?=base_url('admin/assets/libs/node-waves/waves.min.js')?>"></script>

    <script src="<?=base_url('admin/assets/js/app.js')?>"></script>

        <script>
    const csrfToken = '<?= csrf_hash() ?>';
</script>
        <script src="<?=base_url('admin/assets/js/common.js');?>"></script>

        <script>

            document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the form from submitting
   submitform();
});

            function submitform(){

                 
          
            var data={};

            data.password=$('#resetPasswordForm').find('#password').val();


            data.password_confirm=$('#resetPasswordForm').find('#password_confirm').val();
         
            var url="<?=base_url('admin/reset/password/'.$token);?>";

               var response=__postRequest(url,data);

        response.then(function(data){

            $('.validation-error').remove();
            $('.alert-danger').remove();
           


         if(data.status)
         {
             $('#resetPasswordForm').prepend('<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+data.message+'</div>');
             setTimeout(function()
             {
               //window.location.assign("<?=base_url('admin/dashboard')?>");
             },2000)
         }

          else if(!data.status && data.errors)
          {
            Object.keys(data.errors).forEach(key => {

           $('#resetPasswordForm').find('#'+key).after('<div class="validation-error">'+data.errors[key].replace('_',' ')+'</div>');
              
              });
          }
          else
          {
             $('#resetPasswordForm').prepend('<div id="errorAlert" class="alert alert-danger alert-dismissible fade show mb-0" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+data.message+'</div>');
          }
        })

          

            return false;

        }



        </script>


</body>

</html>