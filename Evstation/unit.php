<?php 
$chargerid="";
$bookingamount="";
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) 
{
    $user_id = $_SESSION['uid'];
} 
if (isset($_POST["btn_submit"])){
  $bookingunit = $_POST["txt_UNIT"];
  $selQry="select *  from tbl_booking b inner join tbl_charger c on b.charger_id=c.charger_id  where booking_id='".$_GET['Bid']."'";
	$row=$Con->query($selQry);
	$data=$row->fetch_assoc();
	$charger_amount=$data['charger_amount'];  
	$bookingamount=($charger_amount*$bookingunit);
   $upQry="update tbl_booking set  booking_unit='".$bookingunit."',booking_amount='".$bookingamount."', booking_status ='1' where booking_id='".$_GET['Bid']."'";
    if($Con->query($upQry))
    {
					?>
				   <script>
					 alert("unit enteredsucessfully");
				  
					window.location="viewbooking.php";
					</script>
					  <?php
				  
		 } 
}
?>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Stylish Unit Enter Form</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #eef2f7;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
  }

  h2 {
    color: #333;
    margin-bottom: 24px; /* This creates the gap */
  }

  table {
    border-collapse: separate;
    border-spacing: 0;
    width: 320px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    overflow: hidden;
  }

  td {
    padding: 15px 20px;
    border-bottom: 1px solid #e2e8f0;
    color: #333;
    font-weight: 600;
  }

  td:last-child {
    font-weight: normal;
  }

  tr:last-child td {
    border-bottom: none;
    text-align: center;
  }

  input[type="number"] {
    width: 100%;
    padding: 10px 12px;
    border: 2px solid #cbd5e0;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
  }

  input[type="number"]:focus {
    border-color: #2563eb;
    outline: none;
  }

  input[type="submit"] {
    background-color: #14851eff;
    color: white;
    padding: 12px 0;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    font-size: 17px;S
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #0f7d09ff;
  }
</style>
</head>
<body>
  <h2>Enter Unit of Charge</h2>
  <form id="form1" name="form1" method="post" action="">
    <table align="center">
      <tr>
        <td>UNIT OF CHARGE</td>
        <td><input name="txt_UNIT" type="number" placeholder="enter unit of charge required" required /></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        </td>
      </tr>
    </table>
  </form>
</body>
</html>

<div style="height: 100px;"></div>
<?php 
include("Footer.php");
 ?>
