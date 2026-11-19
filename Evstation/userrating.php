<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['eid'])) 
{
    $evstation_id = $_SESSION['eid'];
} 
?>
<br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <title>Rating View</title>
  <style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f8;
  }

  h1 {
    text-align: center;
    color: #333;
  }

  table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }

  th, td {
    padding: 12px 15px;
    border: 1px solid #dddddd;
    text-align: left;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  td {
    color: black; /* ✅ Set this for black table content */
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tr:hover {
    background-color: #f1f1f1;
  }
</style>

</head>
<body>

<h1>EV Station Ratings</h1>

<table>
  <tr>
    <th>SL No</th>
    <th>User Name</th>
    <th>Rating Content</th>
    <th>Ratings</th>
    <th>Rating Date</th>
  </tr>

  <?php
  $r = 0;
  $selQry = "SELECT r.*, u.user_name 
             FROM tbl_rating r 
             INNER JOIN tbl_user u ON r.user_id = u.user_id 
             WHERE r.evstation_id = '".$evstation_id."'";

  $row = $Con->query($selQry);

  while ($data = $row->fetch_assoc()) {
      $r++;
      ?>
      <tr>
        <td><?php echo $r; ?></td>
        <td><?php echo htmlspecialchars($data['user_name']); ?></td>
        <td><?php echo htmlspecialchars($data['rating_content']); ?></td>
        <td><?php echo htmlspecialchars($data['rating_data']); ?></td>
        <td><?php echo htmlspecialchars($data['rating_datetime']); ?></td>
      </tr>
  <?php
  }
  ?>
</table>
</body>
</html>
