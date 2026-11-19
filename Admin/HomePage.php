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
      <li><a href="Adminregistration.php"><i class="zmdi zmdi-account-circle"></i> <span>Registarion</span></a></li>
  

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

  <!--Start Dashboard Content-->

	<div class="card mt-3">
  <div id="dash">
    <div class="card-content">
      <div class="row row-group m-0">

        <!-- District Card -->
        <div class="col-12 col-lg-6 col-xl-3 mb-3">
          <div class="card bg-dark text-white h-100 shadow-sm">
            <div class="card-body">
              <h5 class="mb-0">
                12+ 
                <span class="float-end">
                  <i class="fas fa-map-marker-alt"></i>
                </span>
              </h5>
              <div class="progress my-3" style="height: 4px;">
                <div class="progress-bar bg-info" style="width: 55%"></div>
              </div>
              <p class="mb-0 small">Districts
                <span class="float-end text-success">
                  +0.2% <i class="fas fa-arrow-up"></i>
                </span>
              </p>
            </div>
          </div>
        </div>

        <!-- EV Stations Card -->
        <div class="col-12 col-lg-6 col-xl-3 mb-3">
          <div class="card bg-dark text-white h-100 shadow-sm">
            <div class="card-body">
              <h5 class="mb-0">
                800+
                <span class="float-end">
                  <i class="fas fa-charging-station"></i>
                </span>
              </h5>
              <div class="progress my-3" style="height: 4px;">
                <div class="progress-bar bg-success" style="width: 55%"></div>
              </div>
              <p class="mb-0 small">EV Stations
                <span class="float-end text-success">
                  +0.2% <i class="fas fa-arrow-up"></i>
                </span>
              </p>
            </div>
          </div>
        </div>

        <!-- User Accounts Card -->
        <div class="col-12 col-lg-6 col-xl-3 mb-3">
          <div class="card bg-dark text-white h-100 shadow-sm">
            <div class="card-body">
              <h5 class="mb-0">
                6200
                <span class="float-end">
                  <i class="fas fa-users"></i>
                </span>
              </h5>
              <div class="progress my-3" style="height: 4px;">
                <div class="progress-bar bg-warning" style="width: 55%"></div>
              </div>
              <p class="mb-0 small">User Accounts
                <span class="float-end text-success">
                  +5.2% <i class="fas fa-arrow-up"></i>
                </span>
              </p>
            </div>
          </div>
        </div>
        <!-- Feedbacks Card -->
        <div class="col-12 col-lg-6 col-xl-3 mb-3">
          <div class="card bg-dark text-white h-100 shadow-sm">
            <div class="card-body">
              <h5 class="mb-0">
                400+
                <span class="float-end">
                  <i class="fas fa-comments"></i>
                </span>
              </h5>
              <div class="progress my-3" style="height: 4px;">
                <div class="progress-bar bg-danger" style="width: 55%"></div>
              </div>
              <p class="mb-0 small">Feedbacks
                <span class="float-end text-success">
                  +2.2% <i class="fas fa-arrow-up"></i>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <h4>Recent EV Stations</h4>
      <P> </p>
      <div class="row">
        <?php
        $selQry = "SELECT * FROM tbl_evstation WHERE evstation_status = '1'";
        $result = $Con->query($selQry);

        while ($data = $result->fetch_assoc()) {
        ?>
          <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm">
              <img src="../Assets/Files/evstation/photo/<?php echo $data['evstation_photo']; ?>" class="card-img-top" alt="<?php echo $data['evstation_name']; ?>" style="height: 180px; object-fit: cover;">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $data['evstation_name']; ?></h5>
                <p class="card-text mb-4">
                  <strong>Contact:</strong> <?php echo $data['evstation_contact']; ?><br>
                   <strong>E-MAIL</strong> <?php echo $data['evstation_email']; ?>
                </p>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>



<!--End Row-->

      <!--End Dashboard Content-->
	  
	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
<footer style="background-color: #f4eff100;" class="text-white py-4 mt-5 shadow-sm">
  <div class="container text-center">
    <div class="mb-2">
      <i class="fas fa-bolt fa-lg text-warning me-2"></i>
      <strong>EV Station Admin Dashboard</strong>
    </div>
    <p class="mb-1 small">
      Managing your electric future, one station at a time ⚡
    </p>
    <p class="mb-0 small">
      &copy; <?= date('Y') ?> <span class="text-warning">EV Admin Panel</span>. 
    </p>
  </div>
</footer>
	<!--End footer-->
	
  
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="../Assets/Template/Admin/assets/js/jquery.min.js"></script>
  <script src="../Assets/Template/Admin/assets/js/popper.min.js"></script>
  <script src="../Assets/Template/Admin/assets/js/bootstrap.min.js"></script>
 <!-- simplebar js -->
  <script src="../Assets/Template/Admin/assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../Assets/Template/Admin/assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="../Assets/Template/Admin/assets/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="../Assets/Template/Admin/assets/js/app-script.js"></script>
  <!-- Chart js -->
  <script src="../Assets/Template/Admin/assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Index js -->
  <script src="../Assets/Template/Admin/assets/js/index.js"></script>
</body>
</html>
