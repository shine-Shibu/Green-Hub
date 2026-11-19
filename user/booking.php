<?php 
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) 
{
    $user_id = $_SESSION['uid'];
} 

if (isset($_POST["btn_submit"])){
	$ev=$_GET['ei'];
	$chargerid = $_POST["sel_charger"];
	$bookingtodate =$_POST["txt_date"];
	 $chargertype = $_POST["sel_charger"];	
	 $slot_id = $_POST["sel_slot"];
	 $vehcilenumber=$_POST["txt_vehiclenumber"];
	 $vechiletype=$_POST["txt_vehicle"];
	 $insQry="insert into tbl_booking (booking_todate,booking_date,user_id,slot_id,charger_id,booking_vehicle,booking_vehiclenumber, booking_status) values ( '".$bookingtodate."',CURDATE(),'".$user_id."','".$slot_id."','".$chargerid."','".$vechiletype."','".$vehcilenumber."', 0)";
		if($Con->query($insQry))
				{
					$booking_id = $Con->insert_id;
					?>
				   <script>  
					window.location="AdvancePayment.php?bi=<?php echo $booking_id; ?>";
					</script>
					  <?php
				  
		 } 
}
?>
  <br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOOKING-EVSTATION</title>
<style>
 
  table, td, th {
    border: 1px solid black;
    color: black;
  }

  .booking-form {
    max-width: 500px;
    background: #fff;
    border: 1px solid #28a745;
    border-radius: 12px;
    padding: 30px 40px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .booking-form h3 {
    text-align: center;
    color: #28a745;
    margin-bottom: 25px;
    font-weight: 700;
  }

  .form-row {
    margin-bottom: 20px;
  }

  .form-row label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
  }

  .form-row input[type="date"],
  .form-row select,
  .form-row input[type="text"] {
    width: 100%;
    padding: 10px 12px;
    border: 1.5px solid #28a745;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s ease;
  }

  .form-row input[type="date"]:focus,
  .form-row select:focus,
  .form-row input[type="text"]:focus {
    border-color: #1e7e34;
    outline: none;
    background-color: #fff;
  }

  .radio-group {
    display: flex;
    gap: 20px;
  }

  .radio-group label {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #333;
    cursor: pointer;
    gap: 6px;
  }

  .radio-group input[type="radio"] {
    width: 18px;
    height: 18px;
    accent-color: #28a745;
    cursor: pointer;
  }

  .submit-btn {
    width: 100%;
    background-color: #28a745;
    color: white;
    font-weight: 700;
    border: none;
    padding: 12px 0;
    border-radius: 10px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .submit-btn:hover {
    background-color: #1e7e34;
  }
  .content-wrapper {
  padding-top: 120px; /* Adjust based on header height */
}
</style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <div class="content-wrapper">
  <div align="center">
<div class="booking-form">
  <h3>Book Your Slot</h3>
  <form method="post" action="">

    <div class="form-row">
      <label for="txt_date">TO-DATE</label>
      <input name="txt_date" id="txt_date" type="date" required
        min="<?php echo date('Y-m-d'); ?>"
        max="<?php echo date('Y-m-d', strtotime('+2 month')); ?>" />
    </div>

    <div class="form-row">
      <label for="sel_charger">CHARGER-TYPE</label>
      <select name="sel_charger" id="sel_charger" onChange="getslot(this.value,'<?php echo $_GET['ei']  ?>')" required>
        <option value="">--select--</option>
        <?php
        $selQry = "select * from tbl_chargertype";
        $row = $Con->query($selQry);
        while ($data = $row->fetch_assoc()) {
          ?>
          <option value="<?php echo $data['chargertype_id'] ?>">
            <?php echo $data['charger_type'] ?>
          </option>
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-row">
      <label for="sel_slot">SLOT</label>
      <select name="sel_slot" id="sel_slot" required>
        <option value="">--select--</option>
      </select>
    </div>

    <div class="form-row">
      <label for="txt_vehiclenumber">Vehicle-Number</label>
     <input type="text" id="vehicle" name="txt_vehiclenumber"
        
         title="Enter a valid vehicle number "
         required>
    </div>

    <div class="form-row">
      <label>Select-type</label>
      <div class="radio-group">
        <label><input type="radio" name="txt_vehicle" value="1" required /> 4 wheel</label>
        <label><input type="radio" name="txt_vehicle" value="2" required /> 2 wheel</label>
        <label><input type="radio" name="txt_vehicle" value="3" required /> 3 wheel</label>
      </div>
    </div>

    <div class="form-row">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="submit-btn" />
    </div>

  </form>
</div>
</div>
 </div>
</form>
</body>
</html>
<div style="height: 100px;"></div>
<?php
include("Footer.php");
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getSlots() {
    var chargerId = $("#sel_charger").val();
    var bookingDate = $("#txt_date").val();
    var evStationId = '<?php echo isset($_GET['ei']) ? $_GET['ei'] : ''; ?>';

    if (chargerId && bookingDate) {
        $.ajax({
            url: "../Assets/AjaxPages/Ajaxslot.php?did=" + chargerId + "&ei=" + evStationId + "&date=" + bookingDate,
            success: function(result) {
                $("#sel_slot").html(result);
            }
        });
    }
}

$(document).ready(function() {
    $("#txt_date, #sel_charger").change(function() {
        getSlots();
    });
});
</script>