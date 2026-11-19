<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['eid'])) 
{
    $evstation_id = $_SESSION['eid'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Bookings</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
  }

  /* Card Styles for Today's Bookings */
  .today-bookings {
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
  }

  .booking-card {
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 15px;
    width: 250px;
    text-align: left;
    transition: transform 0.2s;
  }

  .booking-card:hover {
    transform: translateY(-5px);
  }

  .booking-card h3 {
    margin: 0 0 10px;
    font-size: 16px;
    color: #2a9d8f;
  }

  .booking-card p {
    margin: 5px 0;
    font-size: 14px;
    color: #333;
  }

  .booking-card .status {
    font-weight: bold;
    margin-top: 10px;
  }

  .booking-card .enter-unit {
    display: inline-block;
    text-decoration: none;
    background-color: #e76f51;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 13px;
    margin-top: 10px;
  }

  .booking-card .enter-unit:hover {
    background-color: #d35400;
  }

  /* Summary Styles */
  .summary {
    width: 90%;
    margin: 20px auto;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .summary div {
    flex: 1;
    text-align: center;
    padding: 10px;
  }

  .summary h4 {
    margin: 0 0 5px;
    font-size: 16px;
    color: #2a9d8f;
  }

  .summary p {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    color: #333;
  }

  /* Table Styles */
  table {
    border-collapse: collapse;
    width: 90%;
    margin: 20px auto;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  th, td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #e0e0e0;
  }

  th {
    background-color: #2a9d8f;
    color: white;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  td a {
    text-decoration: none;
    background-color: #e76f51;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 13px;
  }

  td a:hover {
    background-color: #d35400;
  }

  td {
    font-size: 14px;
    color: #333;
  }

  .pending {
    color: #666;
    font-style: italic;
  }

  .payment-pending {
    color: #d35400;
    font-weight: bold;
  }

  .paid {
    color: #28a745;
    font-weight: bold;
  }
</style>
</head>
<body>
<?php
$today = date('Y-m-d');

// Query for today's bookings
$todayQry = "
  SELECT u.*, d.charger_type, us.user_name
  FROM tbl_booking u 
  INNER JOIN tbl_slot p ON u.slot_id = p.slot_id 
  INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id 
  INNER JOIN tbl_user us ON u.user_id = us.user_id 
  WHERE p.evstation_id = '$evstation_id' AND u.booking_todate = '$today'
  ORDER BY u.booking_id DESC
";

// Query for slots booked today
$slotsQry = "
  SELECT COUNT(*) as slot_count
  FROM tbl_booking u 
  INNER JOIN tbl_slot p ON u.slot_id = p.slot_id 
  WHERE p.evstation_id = '$evstation_id' AND u.booking_todate = '$today'
";

// Query for today's income
$todayIncomeQry = "
  SELECT SUM(booking_amount) as today_income
  FROM tbl_booking u 
  INNER JOIN tbl_slot p ON u.slot_id = p.slot_id 
  WHERE p.evstation_id = '$evstation_id' AND u.booking_todate = '$today' AND u.booking_status = 2
";

// Query for total income
$totalIncomeQry = "
  SELECT SUM(booking_amount) as total_income
  FROM tbl_booking u 
  INNER JOIN tbl_slot p ON u.slot_id = p.slot_id 
  WHERE p.evstation_id = '$evstation_id' AND u.booking_status = 2
";

$todayResult = $Con->query($todayQry);
$slotsResult = $Con->query($slotsQry);
$todayIncomeResult = $Con->query($todayIncomeQry);
$totalIncomeResult = $Con->query($totalIncomeQry);

$slotCount = $slotsResult->fetch_assoc()['slot_count'] ?? 0;
$todayIncome = $todayIncomeResult->fetch_assoc()['today_income'] ?? 0;
$totalIncome = $totalIncomeResult->fetch_assoc()['total_income'] ?? 0;
?>

<!-- Summary Section -->
<div class="summary">
  <div>
    <h4>Slots Booked Today</h4>
    <p><?php echo $slotCount; ?></p>
  </div>
  <div>
    <h4>Today's Income</h4>
    <p>₹<?php echo number_format($todayIncome, 2); ?></p>
  </div>
  <div>
    <h4>Total Income</h4>
    <p>₹<?php echo number_format($totalIncome, 2); ?></p>
  </div>
</div>

<!-- Today's Bookings as Cards -->
<div class="today-bookings">
  <?php
  if ($todayResult->num_rows > 0) {
    while ($data = $todayResult->fetch_assoc()) {
      $canEnterUnits = ($data['booking_status'] == 1 && $data['booking_todate'] <= $today);
      $isPaymentPending = ($data['booking_status'] == 1 && $data['booking_unit'] != '' && $data['booking_unit'] != 0 && $data['booking_amount'] != '' && $data['booking_amount'] != 0);
      ?>
      <div class="booking-card">
        <h3><?php echo $data['user_name']; ?></h3>
        <p><strong>Vehicle Number:</strong> <?php echo $data['booking_vehiclenumber'] ?: 'Not Provided'; ?></p>
        <p><strong>Vehicle Type:</strong> 
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
        </p>
        <p><strong>Charger Type:</strong> <?php echo $data['charger_type']; ?></p>
        <p class="status">
          <?php 
          if ($data['booking_status'] == 0) {
              echo "<span class='pending'>Pending Advance Payment</span>";
          } elseif ($canEnterUnits && !$isPaymentPending) {
              echo "<a class='enter-unit' href='unit.php?Bid=" . $data['booking_id'] . "'>Enter Unit</a>";
          } elseif ($isPaymentPending) {
              echo "<span class='payment-pending'>Payment Pending (₹" . ($data['booking_amount'] - 100) . ")</span><br>";
              echo "<strong>Units:</strong> " . $data['booking_unit'];
          } elseif ($data['booking_status'] == 1) {
              echo "<span class='pending'>Waiting for To-Date (" . $data['booking_todate'] . ")</span>";
          } elseif ($data['booking_status'] == 2) {
              echo "<span class='paid'>Paid</span><br>";
              echo "<strong>Amount:</strong> ₹" . $data['booking_amount'] . "<br>";
              echo "<strong>Units:</strong> " . ($data['booking_unit'] ?: 'Not Set');
          } else {
              echo "<span class='pending'>Booking Cancelled</span>";
          }
          ?>
        </p>
      </div>
      <?php
    }
  } else {
    ?>
    <div style="width: 90%; margin: 20px auto; text-align: center; color: #666;">
      No bookings for today.
    </div>
    <?php
  }
  ?>
</div>

<!-- Existing Table for All Bookings -->
<table>
  <tr>
    <th>Sl No</th>
    <th>User Details</th>
    <th>Vehicle Number</th>
    <th>Vehicle Type</th>
    <th>To-Date</th>
    <th>Booking Date</th>
    <th>Charger Type</th>
    <th>Action</th>
  </tr>

  <?php
  $p = 0;
  $selQry = "
    SELECT u.*, d.charger_type, us.user_name
    FROM tbl_booking u 
    INNER JOIN tbl_slot p ON u.slot_id = p.slot_id 
    INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id 
    INNER JOIN tbl_user us ON u.user_id = us.user_id 
    WHERE p.evstation_id = '$evstation_id'
    ORDER BY u.booking_todate DESC, u.booking_id DESC
  ";

  $row = $Con->query($selQry);
  if ($row->num_rows > 0) {
    while ($data = $row->fetch_assoc()) {
      $p++;
      $canEnterUnits = ($data['booking_status'] == 1 && $data['booking_todate'] <= $today);
      $isPaymentPending = ($data['booking_status'] == 1 && $data['booking_unit'] != '' && $data['booking_unit'] != 0 && $data['booking_amount'] != '' && $data['booking_amount'] != 0);
      ?>
      <tr>
        <td><?php echo $p; ?></td>
        <td><?php echo $data['user_name']; ?></td>
        <td><?php echo $data['booking_vehiclenumber'] ?: 'Not Provided'; ?></td>
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
        <td><?php echo $data['booking_todate']; ?></td>
        <td><?php echo $data['booking_date']; ?></td>
        <td><?php echo $data['charger_type']; ?></td>
        <td>
          <?php 
          if ($data['booking_status'] == 0) {
              echo "<span class='pending'>Pending Advance Payment</span>";
          } elseif ($canEnterUnits && !$isPaymentPending) {
              ?>
              <a href="unit.php?Bid=<?php echo $data['booking_id']; ?>">Enter Unit</a>
              <?php
          } elseif ($isPaymentPending) {
              ?>
              <span class='payment-pending'>Payment Pending (₹<?php echo $data['booking_amount'] - 100; ?>)</span><br>
              <strong>Units:</strong> <?php echo $data['booking_unit']; ?>
              <?php
          } elseif ($data['booking_status'] == 1) {
              echo "<span class='pending'>Waiting for To-Date (" . $data['booking_todate'] . ")</span>";
          } elseif ($data['booking_status'] == 2) {
              ?>
              <span class='paid'>Paid</span><br>
              <strong>Amount:</strong> ₹<?php echo $data['booking_amount']; ?><br>
              <strong>Units:</strong> <?php echo $data['booking_unit'] ?: 'Not Set'; ?>
              <?php
          } else {
              echo "<span class='pending'>Booking Cancelled</span>";
          }
          ?>
        </td>
      </tr>
      <?php
    }
  } else {
    ?>
    <tr>
      <td colspan="8" style="text-align: center; padding: 20px;">No bookings found.</td>
    </tr>
    <?php
  }
  ?>
</table>
</body>
</html>

<?php
include("Footer.php");
?>