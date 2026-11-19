
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
<link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/gif " />
<head>
<meta charset="utf-8" />
<title>User Bill</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color:  #f0f4f8;;
    color: #2e7d32;
  }

  .containers {
    max-width: 750px;
    margin: auto;
    background-color: #ffffff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 128, 0, 0.12);
    animation: fadeIn 0.8s ease-in-out;
  }

  h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #1b5e20;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  tr {
    border-bottom: 1px solid #dcedc8;
  }

  td {
    padding: 14px 10px;
    font-size: 15px;
    vertical-align: top;
  }

  td.label {
    font-weight: bold;
    width: 40%;
    color: #388e3c;
    background-color: #f1f8e9;
    border-radius: 4px;
  }

  td.value {
    color: #333;
  }

  tr:last-child td {
    border-bottom: none;
  }

  .back-btn {
    margin-top: 30px;
    text-align: center;
  }

  .back-btn a {
    background-color: #43a047;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    transition: background-color 0.3s;
  }

  .back-btn a:hover {
    background-color: #2e7d32;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 600px) {
    .container {
      padding: 20px;
    }

    td.label, td.value {
      display: block;
      width: 100%;
      text-align: left;
      padding: 8px 0;
    }

    td.label {
      margin-top: 10px;
      background: transparent;
    }

    tr {
      border-bottom: none;
    }
  }
</style>
</head>
<body>

<div class="containers">
  <h2>User Bill Details</h2>

  <form method="post" action="">
    <table>
      <?php
      $s = 0;
      $selQry = "
        SELECT *
        FROM tbl_booking u
        INNER JOIN tbl_slot p ON u.slot_id = p.slot_id
        INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id
        INNER JOIN tbl_evstation v ON p.evstation_id = v.evstation_id
        INNER JOIN tbl_user u1 ON u.user_id = u1.user_id
        WHERE booking_id='" . $_GET["rp"] . "'";

      $row = $Con->query($selQry);

      while ($data = $row->fetch_assoc()) {
          $s++;
      ?>
        <tr>
          <td class="label">SL No</td>
          <td class="value"><?php echo $s; ?></td>
        </tr>
        <tr>
          <td class="label">Station Name</td>
          <td class="value"><?php echo $data['evstation_name']; ?></td>
        </tr>
        <tr>
          <td class="label">User Name</td>
          <td class="value"><?php echo $data['user_name']; ?></td>
        </tr>
        <tr>
          <td class="label">User Contact</td>
          <td class="value"><?php echo $data['user_contact']; ?></td>
        </tr>
        <tr>
          <td class="label">Vehicle Number</td>
          <td class="value"><?php echo $data['booking_vehiclenumber']; ?></td>
        </tr>
        <tr>
          <td>Vehicle Type</td>
        <td>
            <?php
              if ($data['booking_vehicle'] == 1) {
                  echo "4 wheel";
              } elseif ($data['booking_vehicle'] == 2) {
                  echo "2 wheel";
              } elseif ($data['booking_vehicle'] == 3) {
                  echo "3 wheel";
              } else {
                  echo "Unknown";
              }
            ?>
      </td>
        <tr>
          <td class="label">Charger Type</td>
          <td class="value"><?php echo $data['charger_type']; ?></td>
        </tr>
        <tr>
          <td class="label">Slot Time</td>
          <td class="value"><?php echo $data['slot_fromtime'] . " - " . $data['slot_totime']; ?></td>
        </tr>
        <tr>
          <td class="label">Booking Date</td>
          <td class="value"><?php echo $data['booking_date']; ?></td>
        </tr>
        <tr>
          <td class="label">Payment Date</td>
          <td class="value"><?php echo  $data['booking_todate'];  ?></td>
        </tr>
        <tr>
          <td class="label">Unit Consumed</td>
          <td class="value"><?php echo $data['booking_unit']; ?></td>
        </tr>
        <tr>
                <td class="label">Advance Payemnt</td>
                <td class="value">(100RS) on <?php echo $data['booking_date']; ?> </td>
            </tr>
        <tr>
          <td class="label">Total Amount</td>
          <td class="value">₹<?php echo $data['booking_amount']; ?></td>
        </tr>
      <?php 
      }
      ?>
    </table>
  </form>

  <div class="back-btn">
    <a href="Histroy.php">← Back to History</a>
  </div>
</div>

</body>
</html>

