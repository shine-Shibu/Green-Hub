<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) 
{
    $user_id = $_SESSION['uid'];
} 
if (isset($_SESSION['eid'])) 
{
    $evstation_id = $_SESSION['eid'];
} 
?>
<br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIEW-Complaints</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7fc;
       
        margin: 0;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin: 40px 0 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    th, td {
        padding: 15px 20px;
        text-align: left;
        font-size: 14px;
    }

    th {
        background-color: #34495e;
        color: #fff;
        text-transform: uppercase;
    }

    td {
        color: #000;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e8f0fe;
    }

    td a {
        color: #2980b9;
        text-decoration: none;
        font-weight: bold;
    }

    td a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>

<h2>All Complaints</h2>
<table>
    <tr>
        <th>SI-NO</th>
        <th>User Name</th>
        <th>Complaint Title</th>
        <th>Complaint Content</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    <?php
    $p = 0;
  $selQry = "SELECT * FROM tbl_complaint c 
           INNER JOIN tbl_user u ON c.user_id = u.user_id 
           WHERE c.evstation_id = $evstation_id";
 
    $row = $Con->query($selQry);
    while ($data = $row->fetch_assoc()) {
        $p++;
    ?>
    <tr>
        <td><?php echo $p; ?></td>
        <td><?php echo $data['user_name']; ?></td>
        <td><?php echo $data['complaint_title']; ?></td>
        <td><?php echo $data['complaint_content']; ?></td>
        <td><?php echo $data['complaint_date']; ?></td>
       <td>
  <?php 
    if ($data['complaint_status'] == 0) {
        echo '<a href="Reply.php?rp=' .$data['complaint_id'] . '">Reply</a>';
    } else {
        echo 'Replied';
    }
  ?>
</td>

    </tr>
    <?php } ?>
</table>

<h2>Replied Complaints</h2>
<table>
    <tr>
        <th>SI-NO</th>
        <th>User Name</th>
        <th>Complaint Title</th>
        <th>Complaint Content</th>
        <th>Reply</th>
    </tr>
    <?php
    $p = 0;
    $selQry = "SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id = u.user_id WHERE complaint_status = '1' AND c.evstation_id = $evstation_id";
    $row = $Con->query($selQry);
    while ($data = $row->fetch_assoc()) {
        $p++;
    ?>
    <tr>
        <td><?php echo $p; ?></td>
        <td><?php echo htmlspecialchars($data['user_name']); ?></td>
        <td><?php echo htmlspecialchars($data['complaint_title']); ?></td>
        <td><?php echo htmlspecialchars($data['complaint_content']); ?></td>
        <td><?php echo htmlspecialchars($data['complaint_reply']); ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
