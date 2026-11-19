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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Booking History</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
     
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    table {
  width: 90%;
  margin: auto;
  border-collapse: collapse;
  background-color: #fff;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  color: black; /* ✅ Makes all table text black */
}

th, td {
  color: black; /* ✅ Ensure text inside cells is black */
}

a {
  color: black; /* ✅ Link text inside table also appears black */
  text-decoration: none;
  font-weight: bold;
}

a:hover {
  text-decoration: underline;
}


    



    th {
      background-color: #0c7515ff;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    

    

    .no-data {
      text-align: center;
      padding: 20px;
      color: #888;
      font-style: italic;
    }
  </style>
</head>
<body>

  <h1>Booking History</h1>

  <form method="post" action="">
    <table>
      <tr>
        <th>Sl. No</th>
        <th>Booking Date</th>
        <th>Station Name</th>
        <th>Vehicle Number</th>
        <th>View More</th>
      </tr>
      
      <?php
      $selQry = "
        SELECT *
        FROM tbl_booking u
        INNER JOIN tbl_slot p ON u.slot_id = p.slot_id
        INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id
        INNER JOIN tbl_evstation v ON p.evstation_id = v.evstation_id
        INNER JOIN tbl_user u1 ON u.user_id = u1.user_id
        WHERE u.user_id = '$user_id'
      ";

      $row = $Con->query($selQry);
      $p = 0;

      if ($row && $row->num_rows > 0) {
          while ($data = $row->fetch_assoc()) {
              $p++;
              ?>
              <tr>
                <td><?php echo $p; ?></td>
                <td><?php echo $data['booking_date']; ?></td>
                <td><?php echo $data['evstation_name']; ?></td>
                <td><?php echo $data['booking_vehiclenumber']; ?></td>
                <td><a href="Bill.php?rp=<?php echo $data['booking_id']; ?>">View More</a></td>
              </tr>
              <?php
          }
      } else {
          echo '<tr><td colspan="5" class="no-data">No bookings found.</td></tr>';
      }
      ?>
    </table>
  </form>

</body>
</html>