<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/mediaelementplayer.min.css">
  <?php
  if($this->uri->segment(1)=='downloadfiles'){
  ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/dataTables.bootstrap4.css">'
  <?php
  }
  ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <title><?php if(isset($title)) echo $title; else echo 'Voices'; ?> - Sheppard</title>
</head>
<body>
  <!--Main Navigation-->
  <header class="gray-background  fixed-top">
    <div class="container text-center">
      <div class="row ">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg pl-0 pr-0 pt-0 pb-0 d-block ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav m-auto">
                <li class="nav-item">
                  <a class="nav-link" href="https://www.sheppard.agency/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url()?>">Voices <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="https://www.sheppard.agency/request-quote/">Request Quote</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="https://www.sheppard.agency/request-auditions/">Request Auditions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.sheppard.agency/contact">Contact</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="container header-img mt-5 pt-4 pb-3">
    <div class="row d-block text-center pt-5 pb-5">
          <div class="col-md-12">
      <a href="https://www.sheppard.agency/" target="_self"><img src="<?php echo base_url()?>images/Sheppard-Redefining-Voiceover-Branding-Logo.jpg" class="img-responsive" alt="Sheppard Agency Logo"></a>
    </div>
        </div>
  </div>



  <!--Main Navigation-->
