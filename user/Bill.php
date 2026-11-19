<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) {
    $user_id = $_SESSION['uid'];
}
?>
  <br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Bills</title>
<style>
  body {
   
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f0f4f8;
    color: #2c3e50;
  
  }

  .cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }

  .card {
    flex: 0 1 calc(33.33% - 20px);
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.12);
    padding: 25px 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
  }

  .card h3 {
    margin: 0 0 20px 0;
    color: #27ae60;
    font-weight: 700;
    border-left: 5px solid #27ae60;
    padding-left: 10px;
    font-size: 1.3rem;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  td {
    padding: 10px 12px;
    border-bottom: 1px solid #ecf0f1;
    font-size: 0.95rem;
  }

  td:first-child {
    font-weight: 600;
    color: #16a085;
    width: 130px;
  }

  tr:last-child td {
    border-bottom: none;
  }

  .pending {
    text-align: center;
    color: #c0392b;
    font-weight: 600;
    font-size: 1.1rem;
    padding: 20px 0;
  }

  form {
    text-align: center;
    margin-top: 10px;
  }

  form input[type="submit"] {
    background: #27ae60;
    border: none;
    padding: 10px 25px;
    color: white;
    font-weight: 700;
    border-radius: 30px;
    cursor: pointer;
    font-size: 1rem;
    box-shadow: 0 6px 12px rgba(39, 174, 96, 0.6);
    transition: background-color 0.3s ease;
  }

  form input[type="submit"]:hover {
    background: #2ecc71;
  }

  @media (max-width: 960px) {
    .card {
      flex: 0 1 calc(50% - 20px);
    }
  }

  @media (max-width: 640px) {
    .card {
      flex: 0 1 100%;
    }
  }
</style>
</head>
<body>

<h2 style="text-align:center;">Your Bills</h2>

<div class="cards-container">
<?php
 $selQry = "
        SELECT *
        FROM tbl_booking u
        INNER JOIN tbl_slot p ON u.slot_id = p.slot_id
        INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id
        INNER JOIN tbl_evstation v ON p.evstation_id = v.evstation_id
        INNER JOIN tbl_user u1 ON u.user_id = u1.user_id
        WHERE booking_id='" . $_GET["rp"] . "'";
$row = $Con->query($selQry);
$sl = 0;
while ($data = $row->fetch_assoc()) {
    $sl++;
    ?>
    <div class="card">
        <table>
           <tr>
                <td>User Name</td>
                <td><?php echo $data['user_name']; ?></td>
            </tr>
            <tr>
                <td>Station Name</td>
                <td><?php echo $data['evstation_name']?></td>
            </tr>
             <tr>
                <td>User Contact</td>
                <td><?php echo $data['user_contact']; ?></td>
            </tr>
            <tr>
                <td>Vehicle Number</td>
                <td><?php echo $data['booking_vehiclenumber']; ?></td>
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
                  } 
                ?>
              </td>

            </tr>
            <tr>
                <td>Charger Type</td>
                <td><?php echo $data['charger_type']; ?></td>
            </tr>
            <tr>
                <td>Slot Time</td>
                <td><?php echo $data['slot_fromtime'] . " - " . $data['slot_totime']; ?></td>
            </tr>
            <tr>
                <td>Booking Date</td>
                <td><?php echo $data['booking_date']; ?></td>
            </tr>

            <?php if ($data['booking_status'] == 2) { ?>
           
           
            <tr>
                <td>Unit Consumed</td>
                <td><?php echo $data['booking_unit']; ?> units</td>
            </tr>
              <tr>
                <td>Advance Payemnt</td>
                <td>(100RS) on <?php echo $data['booking_date']; ?> </td>
            </tr>
            <tr>
                <td>Payment Date</td>
                <td><?php echo $data['booking_todate'];?></td>
            </tr>
             <tr>
                <td>Total Amount</td>
                <td><?php echo $data['booking_amount']; ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <form action="download_bill.php" method="post">
                        <input type="hidden" name="booking_id" value="<?php echo $data['booking_id']; ?>">
                        <input type="submit" value="Download Bill">
                    </form>
                </td>
            </tr>
            <?php } else { ?>
            <tr>
                <td colspan="2" class="pending">
                    Payment is pending. Please complete payment to view full bill.
                </td>
            </tr>
            <?php } ?>
        </table>
        <div class="back-btn">
    <a href="Histroy.php">← Back to History</a>
  </div>
    </div>
<?php
}
?>
</div>

<div style="height: 100px;"></div>
<?php include("Footer.php"); ?> 
</body>
</html>
