<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) 
{
    $user_id = $_SESSION['uid'];
}

// Handle booking cancellation
if (isset($_GET['cancel_id'])) {
    $cancel_id = $_GET['cancel_id'];
    $updateQry = "UPDATE tbl_booking SET booking_status = 3 WHERE booking_id = '$cancel_id' AND user_id = '$user_id' AND booking_status IN (0, 1) AND (booking_amount = '' OR booking_amount = 0)";
    if ($Con->query($updateQry)) {
        echo "<script>alert('Booking cancelled successfully.'); window.location.href='BookingTable.php';</script>";
    } else {
        echo "<script>alert('Failed to cancel booking.'); window.location.href='BookingTable.php';</script>";
    }
}
?>

<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f9f4;
    color: #222;
  }
  .booking-table {
    border-collapse: separate;
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
  }
  .booking-table th,
  .booking-table td {
    padding: 12px 15px;
    text-align: left;
  }
  .booking-table thead {
    background: linear-gradient(90deg, #28a745, #218838);
    color: #fff;
  }
  .booking-table tbody tr:nth-child(odd) {
    background-color: #f2faf2;
  }
  .booking-table tbody tr:hover {
    background-color: #e6f5e6;
  }
  .status {
    font-weight: bold;
    color: #155724;
  }
  .pay-advance,
  .pay-balance,
  .cancel-booking {
    display: inline-block;
    padding: 6px 12px;
    margin: 4px 2px;
    font-size: 0.9rem;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
  }
  .pay-advance {
    background-color: #ffc107;
    color: #212529;
  }
  .pay-advance:hover {
    background-color: #e0a800;
  }
  .pay-balance {
    background-color: #007bff;
    color: #fff;
  }
  .pay-balance:hover {
    background-color: #0056b3;
  }
  .cancel-booking {
    background-color: #dc3545;
    color: #fff;
  }
  .cancel-booking:hover {
    background-color: #c82333;
  }
  .rating-link {
    display: inline-block;
    padding: 6px 12px;
    margin: 4px 2px;
    font-size: 0.9rem;
    background-color: #17a2b8;
    color: #fff;
    border: none;
    border-radius: 4px;
    text-decoration: none;
  }
  .rating-link:hover {
    background-color: #138496;
  }
</style>

<table class="booking-table">
  <thead>
    <tr>
      <th>SL-NO</th>
      <th>EV-Station</th>
      <th>Vehicle Number</th>
      <th>To Date</th>
      <th>Booking Date</th>
      <th>Charger Type</th>
      <th>Amount & Unit</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $p = 0;
      $selQry = "
        SELECT *
        FROM tbl_booking u
        INNER JOIN tbl_slot p ON u.slot_id = p.slot_id
        INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id
        INNER JOIN tbl_evstation v ON p.evstation_id = v.evstation_id
        WHERE u.user_id = '$user_id'
        ORDER BY u.booking_id DESC
      ";
      $row = $Con->query($selQry);
      if ($row->num_rows > 0) {
        while ($data = $row->fetch_assoc()) {
          $p++;
          $advancePaid = ($data['booking_status'] >= 1) ? 100 : 0;
          $totalAmount = ($data['booking_amount'] != '' && $data['booking_amount'] != 0) ? $data['booking_amount'] : 'Pending';
    ?>
     <tr>
        <td><?php echo $p; ?></td>
        <td><?php echo $data['evstation_name']; ?></td>
        <td><?php echo $data['booking_vehiclenumber'] ?: 'Not Provided'; ?></td>
        <td><?php echo $data['booking_todate']; ?></td>
        <td><?php echo $data['booking_date']; ?></td>
        <td><?php echo $data['charger_type']; ?></td>
        <td class="status">
          Advance Paid: <?php echo $advancePaid; ?><br>
          Total Amount: <?php echo $totalAmount; ?><br>
          Unit Required: <?php echo $data['booking_unit'] ?: 'Not Set'; ?>
        </td>
        <td>
          <?php if ($data['booking_status'] == 0) { ?>
            <a class="pay-advance" href="AdvancePayment.php?bi=<?php echo $data['booking_id']; ?>">Pay Advance (100)</a>
          <?php } elseif ($data['booking_status'] == 1 && $data['booking_amount'] != '' && $data['booking_amount'] != 0) { ?>
            <a class="pay-balance" href="Payment.php?pid=<?php echo $data['booking_id']; ?>">Pay Balance (<?php echo $data['booking_amount'] - 100; ?>)</a>
          <?php } elseif ($data['booking_status'] == 1) { ?>
            <span>Waiting for EV Station to Update Amount</span><br />
          <?php } elseif ($data['booking_status'] == 2) { ?>
            Payment Completed<br />
            <a class="rating-link" href="Rating.php?rid=<?php echo $data['evstation_id']; ?>">Rate</a>
            <a class="rating-link" href="evcomplaints.php?fid=<?php echo $data['evstation_id']; ?>">Complaints</a>
          <?php } else { ?>
            Booking Cancelled
          <?php } ?>
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
  </tbody>
</table>

<div style="height: 100px;"></div>

<?php
include("Footer.php");
?>