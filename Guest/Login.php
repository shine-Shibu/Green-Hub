<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_submit']))
{
  $Email = $_POST['txt_email'];
  $pass = $_POST['txt_password'];
  $selQry="Select * from tbl_admin where admin_email='".$Email."' and admin_password='".$pass."'";
  $row=$Con->query($selQry);
  $sel="Select * from tbl_user where user_email='".$Email."' and user_password='".$pass."'";
  $row1=$Con->query($sel);
  $sele="Select * from tbl_evstation where evstation_email='".$Email."' and evstation_password='".$pass."'";
  $row2=$Con->query($sele);
  if($data=$row->fetch_assoc())
  {
    $_SESSION['aid']=$data['admin_id'];
    $_SESSION['name']=$data['admin_name'];
    header("location:../Admin/HomePage.php");
    
   }
  else if($data2=$row2->fetch_assoc())
  {
    $_SESSION['eid']=$data2['evstation_id'];
    $_SESSION['ename']=$data2['evstation_name'];
    header("location:../Evstation/HomePage.php");
    
   }
   else if($data1=$row1->fetch_assoc())
  {
    $_SESSION['uid']=$data1['user_id'];
    $_SESSION['uname']=$data1['user_name'];
    header("location:../user/HomePage.php");
   }
   else
   {
     ?>
         <script>
    alert("invalid login check email and password")
     window.location="Login.php";
     </script>
         <?php
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login User</title>
  <link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/gif " />
  <link rel="icon" href="../Assets/Template/Main/images/favicon.ico" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #0f1c15ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 25px;
      color: #333;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    button.login-btn,
    input[type="submit"]#btn_submit {
      width: 100%;
      padding: 12px;
      background-color: #0c9947;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button.login-btn:hover,
    input[type="submit"]#btn_submit:hover {
      background-color: #0b8838;
    }

    .error-message {
      color: red;
      margin-top: -15px;
      margin-bottom: 15px;
      font-size: 14px;
      display: none;
    }
    /* Login Button */
button.login-btn,
input[type="submit"]#btn_submit {
  width: 100%;
  padding: 14px;
  background-color: #0c9947;
  border: none;
  border-radius: 8px;
  color: #fff;
  font-size: 18px;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 6px rgba(12, 153, 71, 0.4);
  text-transform: uppercase;
}

button.login-btn:hover,
input[type="submit"]#btn_submit:hover {
  background-color: #0b8838;
  box-shadow: 0 6px 12px rgba(11, 136, 56, 0.6);
}

/* Container for Home and Forgot Password links */
.links-container {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 25px;
}

/* Style the links like buttons */
.links-container a {
  display: inline-block;
  padding: 10px 20px;
  background-color: #0c9947;
  color: white;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  font-size: 14px;
  transition: background-color 0.3s ease;
  box-shadow: 0 3px 6px rgba(12, 153, 71, 0.4);
}

.links-container a:hover {
  background-color: #0b8838;
  box-shadow: 0 5px 10px rgba(11, 136, 56, 0.6);
}

  </style>
  
</head>
<body>
  <div class="login-container">
    <h2>Login Here</h2>  
    <form id="form1" name="form1" method="post" action="">
      <input type="email" name="txt_email" id="txt_email" placeholder="Enter your email" required="required"/>
      <input type="password" name="txt_password" id="txt_password" placeholder="Enter your password" required="required" />
      <div class="error-message" id="error-message">Invalid email or password. Please try again.</div>
      <button type="submit" name="btn_submit" id="btn_submit" class="login-btn">Login</button>
    </form>

<div class="links-container">
  <a href="../index.php">Home</a>
  <a href="ForgetPassword.php">Forgot Password?</a>
</div>

<p style="font-size: 14px; color: #555; margin-top: 20px;">
  New here? Register as 
  <a href="UserRegistration.php" style="color:#0c9947; font-weight: 600; text-decoration: none;">User</a> or 
  <a href="EvStationRegistration.php" style="color:#0c9947; font-weight: 600; text-decoration: none;">EV Station</a>.
</p>


</p>
  </div>
  </form>
</body>
</html>