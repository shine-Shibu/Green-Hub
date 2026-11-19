<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) {
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
<meta charset="utf-8" />
<title>Recent Bookings</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color:  #f0f4f8;;

  }

  h2 {
    text-align: center;
    color: #2e7d32;
    
  }

  table {
    width: 90%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 128, 0, 0.08);
    border-radius: 8px;
    overflow: hidden;
  }

  th {
  padding: 14px 16px;
  text-align: center;
  font-size: 14px;
  border-bottom: 1px solid #e6e6e6;
  background-color: #388e3c;
  color: white;
  text-transform: uppercase;
  letter-spacing: 1px;
}

td {
  padding: 14px 16px;
  text-align: center;
  font-size: 14px;
  border-bottom: 1px solid #e6e6e6;
  color: black; /* <-- Set text color to black */
}


  th {
    background-color: #388e3c;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  tr:hover {
    background-color: #f1f8e9;
  }

  td a {
    text-decoration: none;
    background-color: #4caf50;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-weight: bold;
    font-size: 13px;
    transition: background 0.3s;
  }

  td a:hover {
    background-color: #388e3c;
  }

  @media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }

    tr {
      margin-bottom: 15px;
    }

    th {
      display: none;
    }

    td {
      text-align: right;
      padding-left: 50%;
      position: relative;
    }

    td::before {
      content: attr(data-label);
      position: absolute;
      left: 16px;
      top: 14px;
      font-weight: bold;
      color: #666;
      text-align: left;
    }
  }
</style>
</head>
<body>
<h2>Recent Bookings</h2>
<form id="form1" name="form1" method="post" action="">
  <table>
    <thead>
      <tr>
        <th>SI No</th>
        <th>User Name</th>
        <th> Booking Date</th>
        <th>Slot Time</th>
        <th>View Bill</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      $selQry = "
        SELECT *
        FROM tbl_booking u
        INNER JOIN tbl_slot p ON u.slot_id = p.slot_id
        INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id
        INNER JOIN tbl_evstation v ON p.evstation_id = v.evstation_id
        INNER JOIN tbl_user u1 ON u.user_id = u1.user_id
        WHERE p.evstation_id = '" . $_SESSION['eid'] . "'";

      $row = $Con->query($selQry);
      $p = 0;
      while ($data = $row->fetch_assoc()) {
          $p++;
          ?>
          <tr>
            <td data-label="SI No"><?php echo $p; ?></td>
            <td data-label="User Name"><?php echo $data['user_name']; ?></td>
            <td data-label="Date"><?php echo $data['booking_todate'];?></td>
            <td data-label="Slot Time"><?php echo $data['slot_fromtime'] . " - " . $data['slot_totime']; ?></td>
            <td data-label="View Bill">
              <a href="userbill.php?rp=<?php echo $data['booking_id']; ?>">VIEW-MORE</a>
            </td>
          </tr>
          <?php
      }
      ?>
    </tbody>
  </table>
</form>
</body>
</html>

