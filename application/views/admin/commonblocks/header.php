<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sheppard Agency Dashboard</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/mediaelementplayer.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/style.css">
  <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" />
</head>
<body class="hold-transition sidebar-mini">
  <div id="reloadtransparency" style="height:0px;"></div>
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>" class="nav-link">Site-Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Hashlink</a>
      </li>
    </ul>
    <form class="form-inline ml-3" name="searchvoices" method="post" action="<?php echo base_url(); ?>admin/searchvoices.html">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="searchvoices" placeholder="Search Voices by Name" aria-label="Search Voices by Name" value="<?php if(isset($searchterm)) { echo $searchterm; } ?>">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/logout');?>"><i class="fa fa-user pr-2"></i>Logout</a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="<?php echo base_url(); ?>images/sheppard-agency-admin-logo.png" class="brand-image img-circle"
           style="opacity: 1">
      <span class="brand-text font-weight-light">SA</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>images/admin/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Sheppard</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Agency
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard - All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/addvoice" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Voice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/editpage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Pages</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/send_remote_link" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Send Remote Link <span class="right badge badge-danger">New</span></p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
