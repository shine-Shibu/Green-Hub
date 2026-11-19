<?php
include("SessionValidation.php");
?>
<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>GREEN-HUB</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../Assets/Template/Main/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/gif " />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="Assets/Template/Main/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

   </head>
   
   <body>
      <!-- header section strats -->
       
     <header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
               <li class="nav-item">
           <a class="nav-link" href="HomePage.php"> Home</a>
           </li>
           <li class="nav-item">
           <a class="nav-link" href="evprofile.php"> PROFILE</a>
           </li>
           <li class="nav-item">
           <a class="nav-link" href="Charger.php">Charger</a>
             </li>
            <li class="nav-item">
              <a class="nav-link" href="slot.php">Slots</a>
            </li>          
             <li class="nav-item">
              <a class="nav-link " href="userrating.php">Rating</a>
            </li>             
         <li class="nav-item">
           <a class="nav-link" href="viewbooking.php">Bookings</a>
         </li>           
         <li class="nav-item">
           <a class="nav-link " href="usercomplaints.php">complaints</a>
          </li>
          <li class="nav-item">
          <a class="nav-link " href="Histroy.php">History</a>
         </li>
        </ul>
      </div>
    </nav>
  </div>
</header>

<style>
/* Header Section */
.header_section {
  background: #ffffffff;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  position: sticky;
  top: 0;
  z-index: 1000;
  font-family: 'Poppins', sans-serif;
}

/* Navbar Links */
.navbar-nav .nav-link {
  color: #333 !important;
  font-weight: 500;
  font-size: 16px;
  padding: 12px 18px;
  transition: all 0.3s ease-in-out;
  position: relative;
}

/* Hover Zoom + Color Change */
.navbar-nav .nav-link:hover {
  transform: scale(1.1);
  color: #28a745 !important;  /* green */
}

/* Dropdown Styling */
.dropdown-menu {
  border-radius: 10px;
  padding: 10px 0;
  border: none;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

.dropdown-item {
  font-weight: 300;
  transition: all 0.3s ease-in-out;
}

.dropdown-item:hover {
  transform: scale(1.05);
  color: #28a745 !important;
  background: #ffffffff;
}

/* Navbar Toggler (mobile view) */
.navbar-toggler {
  border: none;
}

.navbar-toggler:focus {
  outline: none;
  box-shadow: none;
}
</style>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
