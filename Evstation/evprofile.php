<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
 $selQry = "select * from tbl_evstation u
  inner JOIN tbl_place p ON u.place_id = p.place_id inner JOIN tbl_district d ON p.district_id = d.district_id where evstation_id='".$_SESSION['eid']."'";
  $row=$Con->query($selQry);
  $data=$row->fetch_assoc();
?>
<br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <title>EV Station Profile</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #f4f6f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-card {
      width: 500px;
      margin: 50px auto;
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      padding: 20px 30px;
    }

    .profile-photo {
      display: block;
      margin: 0 auto 20px;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #4CAF50;
    }

    .profile-table {
      width: 100%;
      border-collapse: collapse;
    }

    .profile-table td {
      padding: 12px;
      vertical-align: top;
      border-bottom: 1px solid #eee;
    }

    .profile-table td:first-child {
      font-weight: 600;
      color: #333;
      width: 40%;
    }

    .profile-table td:last-child {
      color: #555;
    }

    .action-buttons {
      text-align: center;
      margin-top: 20px;
    }

    .action-buttons a {
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      margin: 5px;
      border-radius: 5px;
      transition: background 0.3s ease;
      display: inline-block;
    }

    .action-buttons a:hover {
      background-color: #45a049;
    }

    @media (max-width: 550px) {
      .profile-card {
        width: 90%;
        padding: 15px;
      }

      .profile-table td {
        display: block;
        width: 100%;
      }

      .profile-table td:first-child {
        width: 100%;
        font-weight: bold;
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <form method="post" action="">
    <div class="profile-card">
      <img src="../Assets/Files/Evstation/photo/<?php echo $data['evstation_photo']; ?>" alt="EV Station Photo" class="profile-photo" />

      <table class="profile-table">
        <tr>
          <td>Name</td>
          <td><?php echo $data['evstation_name']; ?></td>
        </tr>
        <tr>
          <td>Contact</td>
          <td><?php echo $data['evstation_contact']; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $data['evstation_email']; ?></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><?php echo $data['evstation_description']; ?></td>
        </tr>
        <tr>
          <td>District</td>
          <td><?php echo $data['district_name']; ?></td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo $data['place_name']; ?></td>
        </tr>
      </table>

      <div class="action-buttons">
        <a href="editprofileev.php">Edit Profile</a>
        <a href="changepassev.php">Change Password</a>
         <a href="Logout.php"> Logout</a>
      </div>
    </div>
  </form>
</body>
</html>
<div style="height: 100px;"></div>
<?php
 include("Footer.php");
  ?>
