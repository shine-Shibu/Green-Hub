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
         </li>>             
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

      <!-- end header section -->
      <!-- banner section start --> 
      <div class="banner_section layout_padding">
         <div class="container-fluid">
            <div class="row " id="hom">
               <div class="col-md-6">
                  <div id="banner_slider" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital"> "Power Up <br>  Your Ride"</h1>
                              <p class="banner_text">Reserve your EV charging spot instantly and drive without delays 
                                 Experience seamless electric mobility with smart, reliable charging solutions.   </p>

                              <!-- <div class="form-group">
                                 <input type="text" class="update_mail" placeholder="Search here" name="Search here">
                                 <div class="subscribe_bt"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
                              </div> -->
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">“AmpUp  <br> Now”</h1>

                              <p class="banner_text">
                                 Charge smarter, drive farther <br>
                                 Skip the wait—book your charging slot instantly</p>
                              <!-- <div class="form-group">
                                 <input type="text" class="update_mail" placeholder="Search here" name="Search here">
                                 <div class="subscribe_bt"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
                              </div> -->
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">“GreenSpark”</h1>


                              <p class="banner_text">Fuel your electric drive the smart way.<br>
                                                                 Find, book, and charge with zero stress.</p>
                              <!-- <div class="form-group">
                                 <input type="text" class="update_mail" placeholder="Search here" name="Search here">
                                 <div class="subscribe_bt"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
                              </div> -->
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                     <i class="fa fa-angle-left"></i>
                     </a>
                     <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                     <i class="fa fa-angle-right"></i>
                     </a>
                  </div>
               </div>
               <div class="col-md-6 padding_right0">
                  <div class="banner_img"><img src="../Assets/Template/Main/images/re.jpg " style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 8px;"></div>
               </div>
            </div>
         </div>
      </div>
     <div class="about_section" style="padding: 60px 0; background-color: #f5fdf7;">
  <div class="container" style="border: 2px solid #d2e9dc; border-radius: 14px; padding: 40px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); background: #ffffff;">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="about_img">
          <img src="../Assets/Template/Main/images/rr.jpg" 
               style="width: 100%; max-height: 370px; object-fit: cover; border-radius: 12px;" 
               alt="EV Charging About Image">
        </div>
      </div>
      <div class="col-md-6" id="ab">
       <h3 style="font-size: 36px; font-weight: bold; color: #0c9947; position: relative; display: inline-block; margin-bottom: 20px; padding-bottom: 10px;">
  About Us
  <span style="position: absolute; bottom: 0; left: 0; width: 60px; height: 4px; background-color: #35c66b; border-radius: 2px;"></span>
</h3>

        <p class="ullamco_text" style="font-size: 17px; color: #444; line-height: 1.8;">
          <strong>"Charge smarter. Drive confidently"</strong><br><br>
          Our platform simplifies EV charging by letting you pre-book slots with ease.<br>
          No more long queues or last-minute searching—just tap, reserve, and charge.<br><br>
          🌍 Trusted by EV users across 50+ locations.
        </p>
        <p style="margin-top: 20px; font-size: 15px; color: #888; font-style: italic;">
          “Reliable charging, wherever the road takes you.”
        </p>
      </div>
    </div>
  </div>
</div>

      <!-- about section end -->
      <!-- models section start -->
      <div class="models_section layout_padding">
         <div class="container">
            <div class="row" id="ch">
               <div class="col-md-12">
                  <h1 class="models_taital">CHARGER-TYEPES</h1>
               </div>
            </div>
           <div class="models_section_2 small-model">
   <div class="row align-items-center" style="min-height: 400px;">
   <div class="col-md-6">
      <div class="models_img">
         <img src="../Assets/Template/Main/images/evch3.webp" 
              style="width: 100%; max-height: 350px; object-fit: cover; border-radius: 8px;">
      </div>
   </div>
      <div class="col-md-6">
         <h3 class="carolo_text"><span class="number_text">01</span> level 1 charger </h3>
         <p class="ullamco_text">
            Level 1 charging uses a regular 120V outlet and is best suited for long-duration parking. It provides 2–5 miles of range per hour and is perfect for users who plan to park for a longer time.
         </p>
         <div class="price_main">
            <p class="price_text"><span style="color: #0c9947ff;">ABOVE </span>30+ Stations</p>
         </div>
      </div>
   </div>
</div>

            <div class="models_section_2">
               <div class="row">
                  <div class="col-md-6">
                     <h3 class="carolo_text"><span class="number_text">02</span>  level 2 charger</h3>
                     <p class="ullamco_text">Level 2 Charging
       <b>erfect for Daily Use </b><br>
Level 2 charging uses a 240V outlet and delivers 10–30 miles of range per hour. This level is ideal for users needing a quicker top-up during the day or charging fully in just a few hours.</p>
                     <div class="price_main">
                        <p class="price_text"><span style="color: #059c2bff;">ABOVE </span>45+stations</p>
                       
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="models_img"><img src="../Assets/Template/Main/images/evch31.jpg"
                      style="width: 100%; max-height: 350px; object-fit: cover; border-radius: 8px;"></div>
                  </div>
               </div>
            </div>
            <div class="models_section_2">
               <div class="row">
                  <div class="col-md-6">
                     <div class="models_img"><img src="../Assets/Template/Main/images/evch32.jpg"
                      style="width: 100%; max-height: 350px; object-fit: cover; border-radius: 8px;"></div>
                  </div>
                  <div class="col-md-6">
                     <h3 class="carolo_text"><span class="number_text">03</span> Level 3 Charger</h3>
                     <p class="ullamco_text">Level 3 Charging (DC Fast Charging)
Ultra-Fast Charging – Get Back on the Road Quickly
Level 3 charging, also known as DC Fast Charging, uses high-powered stations to deliver up to 80% charge in just 20–40 minutes. It’s ideal for highway stops, long-distance travel, or when you're in a hurry.
</p>
                     <div class="price_main">
                        <p class="price_text"><span style="color: #0a9239ff;">Above </span>100+stations</p>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- models section end -->
      <div class="choose_section_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <h1 class="rated_text"><span class="padding_10"><i class="fas fa-smile-beam"></i></span>5000+</h1>
                <p class="house_text">Happy Clients</p>
            </div>
            <div class="col-lg-3 col-sm-6">
                <h1 class="rated_text"><span class="padding_10"><i class="fas fa-bolt"></i></span>500+</h1>
                <p class="house_text">Available-stations</p>
            </div>
            <div class="col-lg-3 col-sm-6">
                <h1 class="rated_text"><span class="padding_10"><i class="fas fa-charging-station"></i></span>3</h1>
                <p class="house_text">Charger-types</p>
            </div>
            <div class="col-lg-3 col-sm-6">
                <h1 class="rated_text"><span class="padding_10"><i class="fas fa-map-marker-alt"></i></span>300+</h1>
                <p class="house_text">locations</p>
            </div>
        </div>
    </div>
</div>

      <!-- blog section start -->
      <div class="blog_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="blog_taital">FEATURED VEHICLES</h1>
               </div>
            </div>
            <div class="blog_section_2">
               <div class="row">
                  <div class="col-md-4">
                    <div class="blog_img">
  <img src="../Assets/Template/Main/images/ts1.jpg" style="border-radius: 12px; width: 100%; height: auto;">
</div>

                     <div class="btn_main">
                        <div class="date_text"><a href="#">Price $ 84000.0</a></div>
                     </div>
                     <div class="blog_box">
                        <h3 class="blog_text">Tesla Model 3</h3>
                        <p class="lorem_text">"Tesla Model 3 is a premium all-electric sedan offering long range, fast acceleration, and advanced autopilot features — built for efficiency and performance." </p>
                     </div>
                     <div class="read_bt"><a href="https://www.tesla.com/">Read More<span class="arrow_icon"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></div>
                   
                  </div>
                  <div class="col-md-4">
                    <div class="blog_img">
  <img src="../Assets/Template/Main/images/ts2.jpg" style="border-radius: 12px; width: 100%; height: auto;">
</div>

                     <div class="btn_main">
                        <div class="date_text active"><a href="#">Price $ 30000.0</a></div>
                     </div>
                     <div class="blog_box">
                        <h3 class="blog_text">MG ZS EV</h3>
                        <p class="lorem_text">"MG ZS EV is a spacious and feature-rich electric SUV offering strong performance, advanced safety tech, and fast charging — perfect for modern lifestyles." </p>
                     </div>
                     <div class="read_bt active"><a href="https://www.mgmotor.co.in/vehicles/mgzsev-electric-car-in-india">Read More<span class="arrow_icon"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></div>
                  </div>
                  <div class="col-md-4">
                     <div class="blog_img">
  <img src="../Assets/Template/Main/images/ts3.jpg" style="border-radius: 12px; width: 100%; height: auto;">
</div>

                     <div class="btn_main">
                        <div class="date_text"><a href="">Price $ 45000.0</a></div>
                     </div>
                     <div class="blog_box">
                        <h3 class="blog_text">Tata Nexon EV</h3>
                        <p class="lorem_text">"Tata Nexon EV is a stylish and compact electric SUV with impressive range, fast charging, and smart features — designed for city and highway drives."</p>
                     </div>
                     <div class="read_bt"><a href="https://ev.tatamotors.com/">Read More<span class="arrow_icon"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- blog section end -->
       <div class="row justify-content-center" style="margin-bottom: 30px;">
</div>

      <!-- client section start -->
     <div style="
  background: #f8fdfa;
  padding: 120px 0;
  font-family: 'Segoe UI', sans-serif;
">
  <div class="container">

    <!-- Section Heading -->
    <div class="text-center mb-5">
      <h2 style="
        font-size: 52px;
        font-weight: 900;
        color: #111;
        position: relative;
        display: inline-block;
        padding-bottom: 18px;
      ">
        Voices of Visionaries
        <span style="
          position: absolute;
          bottom: 0;
          left: 50%;
          transform: translateX(-50%);
          width: 70px;
          height: 4px;
          background-color: #1abc9c;
          border-radius: 2px;
        "></span>
      </h2>
      <p style="color: #444; font-size: 19px; max-width: 740px; margin: 25px auto 0;">
        Industry leaders share insights on the electrified future of transportation — why clean mobility isn't just innovation, it's a necessity.
      </p>
    </div>

    <!-- Testimonial Card 1 -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div style="
          background: #ffffff;
          border-radius: 18px;
          padding: 50px;
          box-shadow: 0 12px 35px rgba(0,0,0,0.08);
          display: flex;
          flex-wrap: wrap;
          align-items: center;
        ">
          <!-- Image -->
          <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="../Assets/Template/Main/images/demo34.jpg" alt="Elon Musk" style="
              width: 160px;
              height: 160px;
              border-radius: 50%;
              object-fit: cover;
              box-shadow: 0 6px 20px rgba(0,0,0,0.08);
              border: 5px solid #e4faf2;
            ">
            <p style="margin-top: 15px; font-weight: 600; font-size: 17px; color: #0c9947;">Elon Musk</p>
            <span style="font-size: 14px; color: #888;">CEO, Tesla & SpaceX</span>
          </div>

          <!-- Quote & Content -->
          <div class="col-md-8">
            <p style="font-size: 20px; font-style: italic; color: #222; margin-bottom: 20px; line-height: 1.6;">
              “The future of transport is electric — clean energy is no longer optional, it's essential.”
            </p>
            <p style="color: #666; font-size: 16.5px; line-height: 1.7;">
              Under Musk’s leadership, Tesla has become a symbol of clean innovation. His bold vision pushes the world to rethink mobility — making EVs not just accessible, but aspirational.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonial Card 2 -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="
          background: #ffffff;
          border-radius: 18px;
          padding: 50px;
          box-shadow: 0 12px 35px rgba(0,0,0,0.08);
          display: flex;
          flex-wrap: wrap;
          align-items: center;
          flex-direction: row-reverse;
        ">
          <!-- Image -->
          <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="../Assets\Template\Main\images\mr.jpeg" alt="Mary Barra" style="
              width: 160px;
              height: 160px;
              border-radius: 50%;
              object-fit: cover;
              box-shadow: 0 6px 20px rgba(0,0,0,0.08);
              border: 5px solid #e4faf2;
            ">
            <p style="margin-top: 15px; font-weight: 600; font-size: 17px; color: #0c9947;">Mary Barra</p>
            <span style="font-size: 14px; color: #888;">CEO, General Motors</span>
          </div>

          <!-- Quote & Content -->
          <div class="col-md-8">
            <p style="font-size: 20px; font-style: italic; color: #222; margin-bottom: 20px; line-height: 1.6;">
              “We’re committed to an all-electric future — one that’s inclusive, sustainable, and built for everyone.”
            </p>
            <p style="color: #666; font-size: 16.5px; line-height: 1.7;">
              As the first woman to lead a major global automaker, Mary Barra is driving GM toward a future where EVs are mainstream. Her leadership blends technology with purpose — steering toward zero emissions and zero compromise.
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


      <!-- client section end -->
    <!-- Contact Section Start -->
<div class="contact_section layout_padding" style="background-color: #000; padding: 60px 0; font-family: 'Segoe UI', sans-serif;" id="con">
  <div class="container text-center">
    
    <!-- Heading -->
    <div class="mb-4">
      <h1 class="contact_taital" style="font-size: 32px; font-weight: 800; color: #fff; margin-bottom: 12px;">Get in Touch</h1>
      <p class="contact_subtitle" style="color: #bbb; font-size: 16px; max-width: 700px; margin: 0 auto;">
        We’re here to assist you. Reach out via phone or email, and stay connected with us on social media.
      </p>
    </div>

    <!-- Contact Info -->
    <div class="contact_info mt-3" style="margin-bottom: 30px;">
      <ul class="list-unstyled contact_list" style="font-size: 16px; color: #0c9947;">
        <li style="margin-bottom: 10px;">
          <i class="fa fa-phone" style="margin-right: 8px; color: #0c9947;"></i> (91) 62829585199, 7560956869
        </li>
        <li>
          <i class="fa fa-envelope" style="margin-right: 8px; color: #0c9947;"></i> greenhub@gmail.com
        </li>
      </ul>
    </div>

    <!-- Social Icons -->
    <div class="social_icon mt-3">
      <ul class="list-inline" style="display: flex; justify-content: center; gap: 16px; padding: 0;">
        <li class="list-inline-item">
          <li class="list-inline-item">
  <a href="https://www.facebook.com/share/1BELhn3RHT/" style="...">
    <i class="fab fa-facebook-f"></i>
  </a>
</li>
<li class="list-inline-item">
  <a href="https://www.linkedin.com/in/shine-shibu-7409aa340?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" style="...">
    <i class="fab fa-linkedin-in"></i>
  </a>
</li>
<li class="list-inline-item">
  <a href="https://www.instagram.com/g4yoz__?igsh=MWtyOXU2NGhudXU3aA==" style="...">
    <i class="fab fa-instagram"></i>
  </a>
</li>

        
      </ul>
    </div>

  </div>
</div>
<!-- Contact Section End -->

<!-- Copyright Section Start -->
<div class="copyright_section" style="background-color: #000; padding: 12px 0;">
  <div class="container text-center">
    <p class="copyright_text" style="color: #fff; font-size: 13px; margin: 0;">
      © 2025 All Rights Reserved. Powering the future — prebook your EV charging slots with ease.
    </p>
  </div>
</div>
<!-- Copyright Section End -->

<!-- Copyright Section End -->

<!-- Copyright Section End -->

      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="../Assets/Template/Main/js/jquery.min.js"></script>
      <script src="../Assets/Template/Main/js/popper.min.js"></script>
      <script src="../Assets/Template/Main/js/bootstrap.bundle.min.js"></script>
      <script src="../Assets/Template/Main/js/jquery-3.0.0.min.js"></script>
      <script src="../Assets/Template/Main/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="../Assets/Template/Main/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../Assets/Template/Main/js/custom.js"></script>

   </body>
</html>