<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
 $selQry = "select * from tbl_user  where user_id='".$_SESSION['uid']."'";
  $row=$Con->query($selQry);
  $data=$row->fetch_assoc();
 ?>
   <br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>My Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f8;
      
    }

    h3 {
      text-align: center;
      color: #333;
      font-size: 28px;
      text-transform: uppercase;
    }

    .profile-card {
      width: 400px;
      background: #fff;
      margin: auto;
      padding: 30px 25px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .profile-card img {
      display: block;
      margin: 0 auto 20px auto;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #28a745; /* green border */
    }

    .profile-card table {
      width: 100%;
      border-collapse: collapse;
    }

    .profile-card td {
      padding: 10px;
      vertical-align: top;
      color: #444;
      font-size: 16px;
    }

    .profile-card td:first-child {
      font-weight: 600;
      width: 35%;
      color: #555;
    }

    .profile-card .btn-group {
      text-align: center;
      margin-top: 20px;
    }

    .profile-card a {
      display: inline-block;
      margin: 0 10px;
      padding: 10px 20px;
      background-color: #28a745; /* green button */
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 14px;
      transition: 0.3s;
    }

    .profile-card a:hover {
      background-color: #1e7e34; /* darker green on hover */
    }

    @media (max-width: 450px) {
      .profile-card {
        width: 90%;
        padding: 20px;
      }
    }
  </style>
</head>

<body>

  <h3>My Profile</h3>

  <div class="profile-card">
    <form id="form1" name="form1" method="post" action="">
      <img src="../Assets/Files/user/photo/<?php echo $data['user_photo']; ?>" alt="Profile Photo" />

      <table>
        <tr>
          <td>Name</td>
          <td><?php echo $data['user_name'] ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $data['user_email'] ?></td>
        </tr>
        <tr>
          <td>Contact</td>
          <td><?php echo $data['user_contact'] ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $data['user_address'] ?></td>
        </tr>
      </table>

      <div class="btn-group">
        <a href="Editprofile.php"><i class="fas fa-user-edit"></i> Edit Profile</a>
        <a href="Changepassword.php"><i class="fas fa-key"></i> Change Password</a>
        <a href="Logout.php"><i class="fas fa-key"></i> Logout</a>
      </div>
    </form>
  </div>
</body>
</html>
<div style="height: 100px;"></div>
<?php
include("Footer.php");
?>