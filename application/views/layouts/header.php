<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url();?>assets/img/logo.png" type="image/x-icon">
  <title>Decorgloboom</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free-6.4.2-web/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">

    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="sidebar-collapse-slides-open sidebar-collapse hold-transition   layout-fixed layout-navbar-fixed layout-footer-fixed" style="height:auto;">
<div class="wrapper">

  <!-- Preloader   
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<//?php echo base_url();?>assets/img/logo.png" height="60" width="60">
  </div> -->


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-red">
    <!-- Left navbar links -->
    <a href="#" class="brand-link navbar-red">
      <img src="<?php echo base_url();?>assets/img/logo.png" class="brand-image elevation-0" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: white;"><strong>DECORGLOBOOM</strong></span>
    </a>
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link navbar-red" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



      <ul class="navbar-nav">
      <?php if($this->session->userdata('rol') == 1) { ?>  
        <li class="nav-item dropdown">
          <a class="nav-link navbar-red" data-toggle="dropdown" href="#">
            Administrar
            <i class="nav-icon fa fa-cubes"></i>
          </a>
          <div class="dropdown-menu">
            <a href="<?php echo base_url();?>usuarios" class="dropdown-item">
              <i class="fas fa-users nav-icon "></i>
              Usuarios
            </a>
            <a href="<?php echo base_url();?>categorias" class="dropdown-item">
              <i class="fa fa-tags nav-icon "></i>
              Categorias
            </a>
            <a href="<?php echo base_url();?>productos" class="dropdown-item">
              <i class="fa fa-window-restore nav-icon"></i>
              Productos
            </a>
          </div>
        </li>           
      <?php }?>                        
      <?php if($this->session->userdata('login')) { ?>   
        <li class="nav-item">
          <a href="<?php echo base_url();?>clientes" class="nav-link navbar-red">
            <p>Clientes</p>
          </a>
        </li>   
        <li class="nav-item">
          <a href="<?php echo base_url();?>ventas" class="nav-link navbar-red">
            <p>Ventas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url();?>reportes" class="nav-link navbar-red">
            <p>Reportes</p>
          </a>
        </li> 
        <li class="nav-item">
          <a href="<?php echo base_url();?>reportes/estadistica" class="nav-link navbar-red">
            <p>Mas Vendidos</p>
          </a>
        </li>    
      <?php }?>     
      </ul>
      <!-- Navbar Search -->    
       <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          
          <i class="fa fa-user navbar-red"></i>
          <!--span class="badge badge-warning navbar-badge">15</!--span-->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> Perfil</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()?>usuarios/viewprofile/<?php echo $this->session->userdata('id_usuario'); ?> " class="dropdown-item">
            <i class="fa fa fa-user mr-2"></i>
            <?php echo $this->session->userdata("nombre");?>
            <!--span class="float-right text-muted text-sm">3 mins</!span-->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('usuarios/password/'.$this->session->userdata('id_usuario')); ?>" class="dropdown-item">
            <i class="fa-solid fa-lock mr-2"></i> Cambiar Contraseña
            <!--span-- class="float-right text-muted text-sm">12 hours</!--span-->
          </a>        
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url();?>/auth/logout" class="dropdown-item ">
          <i class="fa-solid fa-right-from-bracket fa-lg mr-2"></i></ion-icon>Salir</a>
        </div>
      </li>


      <!--li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </!li>
      <li-- class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li-->
    </ul>
  </nav>
  <!-- /.navbar -->