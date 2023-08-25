<!doctype html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$pageTitle??''?></title>
    <meta name="author" content="Taxiar">
    <meta name="description" content="Taxiar - Online Taxi Service HTML Template">
    <meta name="keywords" content="Taxiar - Online Taxi Service HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <?= view('user/layouts/styles') ?>

  
  </head>
  <body class="">

  	  <?= view('user/layouts/preloader') ?>

  	  <?= view('user/layouts/header') ?>



      <?= $this->renderSection('content') ?>


  	  <?= view('user/layouts/footer') ?>

   
   
   
   
    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
      </svg></div>

  	  <?= view('user/layouts/scripts') ?>

      <?= $this->renderSection('page-script') ?>


   
  </body>
</html>