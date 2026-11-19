<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
 $select="select * from tbl_admin where admin_id='".$_SESSION['aid']."'";
 $row=$Con->query($select);
 $data=$row->fetch_assoc();
?>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
  html, body {
  height: 100%;
  margin: 0;
}

body {
  font-family: 'Inter', sans-serif;
  background: #f0f2f5;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.profile-card {
  background: #86b0eeff;
  width: 100%;
  max-width: 360px;
  padding: 2rem;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  text-align: center;
}


    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: #e0e0e0;
      margin: 0 auto 1rem;
      background-size: cover;
      background-position: center;
    }
    .admin-name {
      font-size: 1.25rem;
      font-weight: 600;
      color: #333;
      margin-top: 0.5rem;
    }
    .admin-email {
      font-size: 0.95rem;
  color: #333;
      margin: 0.25rem 0 1rem;
    }
    .btn {
      display: inline-block;
      padding: 0.6rem 1.5rem;
      font-size: 1rem;
      color: #fff;
      background-color: #007bff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="profile-card" align="center">
   <div class="avatar" style="background-image: url('../Assets/Template/Main/images/bf.jpg');"></div>

    <div class="admin-name"><?php echo htmlspecialchars($data['admin_name']); ?></div>
    <div class="admin-email"><?php echo htmlspecialchars($data['admin_email']); ?></div>
    <form method="post" action="logout.php">
  <button type="submit" name="logout" class="btn btn-outline-light">Logout</button>
</form>
  </div>
</body>
</html>
<div style="height: 100px;"></div>
<?php 
include("Footer.php");
 ?>