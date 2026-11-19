<?php
include("../Assets/Connection/Connection.php");
include("SessionValidation.php");
 $select="select * from tbl_admin where admin_id='".$_SESSION['aid']."'";
 $row=$Con->query($select);
 $data=$row->fetch_assoc();
	?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Admin-DashBoard</title>
  <!-- loader-->
  <link href="../Assets/Template/Admin/assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../Assets/Template/Admin/assets/js/pace.min.js"></script>
  <!--favicon-->
   <link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="../Assets/Template/Admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="../Assets/Template/Admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../Assets/Template/Admin/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../Assets/Template/Admin/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../Assets/Template/Admin/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../Assets/Template/Admin/assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../Assets/Template/Admin/assets/css/app-style.css" rel="stylesheet"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>

  </style>
</head>

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="HomePage.php">
       <img src="../Assets/Template/Main/images/bf.jpg" class="logo-icon" alt="logo icon">
       <h5 class="logo-text"> Admin-Dashboard</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="HomePage.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="Chargertype.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Chargertype</span>
        </a>
      </li>

      <li>
        <a href="District.php">
          <i class="zmdi zmdi-grid"></i> <span>Districts</span>
        </a>
      </li>

      <li>
        <a href="Place.php">
          <i class="zmdi zmdi-invert-colors"></i> <span>Place</span>
        </a>
      </li>

       <li>
        <a href="Viewstation.php">
          <i class="zmdi zmdi-lock"></i> <span>Available-Stations</span>
        </a>
      </li>

      <li>
        <a href="userfeedback.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>User-Feedback</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>

       <li>
        <a href="viewcomplaint.php" >
          <i class="zmdi zmdi-account-circle"></i> <span>viewcomplaint</span>
        </a>
      </li>

      <li class="sidebar-header">LABELS</li>
      <li><a href="Adminregistration.php"><i class="zmdi zmdi-account-circle"></i> <span>Registraion</span></a></li>
  

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>  
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item">
     <p> </p> <h6>WELCOME BACK <?php echo$_SESSION['name']?> </h6>
    </li>
     <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"  data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="../Assets\Template\Admin\assets\images\Aimg\bg.jpg" class="img-circle" alt="user avatar"></span>
      </a>
          <ul class="dropdown-menu dropdown-menu-right">
      <li class="dropdown-item user-details">
        <a href="javascript:void();">
          <div class="media">
            <div class="avatar">
              <img class="align-self-start mr-3"
                  src="../Assets/Template/Main/images/bf.jpg"
                  alt="user avatar">
            </div>
            <div class="media-body">
              <h6 class="mt-2 user-title">Admin name=
                <?= $data['admin_name']; ?>
              </h6>
              <p class="user-subtitle">email=
                <?= $data['admin_email']; ?>
              </p>
            </div>
          </div>
        </a>
      </li>
      <li class="dropdown-divider"></li>
      <li class="dropdown-item">
        <form action="logout.php" method="post" style="display:inline;">
          <button type="submit" class="btn btn-link p-0">Logout</button>
        </form>
      </li>
    </ul>

</ul>  
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">