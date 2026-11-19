<?php
$chargertype="";
$evstation_id="";
$slotfrom="";
$slotto="";
$count="";
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['eid'])) 
{
    $evstation_id = $_SESSION['eid'];
} 
if (isset($_POST["btn_submit"]))
 {
	 $slotfrom=$_POST['txt_from'];
	 $slotto=$_POST['txt_to'];
	$chargertype = $_POST["sel_charger"];
  $count=$_POST["txt_count"];

	
		$insQry="insert into tbl_slot (slot_fromtime,slot_totime,chargertype_id,evstation_id,slot_count) values ('".$slotfrom."','".$slotto."','".$chargertype."','".$evstation_id."','".$count."')";
		if($Con->query($insQry))
				{
					?>
				   <script>
					 alert("SLOT TIME ENTRED SUCESSFULLY");
				  
					window.location="slot.php";
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
  <title>SLOT-REGISTRATION</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background: #f4f6f8;
      color: #2f855a;
    }

    h2 {
      text-align: center;
      color: #2f855a;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 12px 10px;
      vertical-align: top;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 6px;
    }

    input[type="time"],
    input[type="number"],
    select {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: 1.5px solid #c6f6d5;
      border-radius: 6px;
      background-color: #f9fffb;
      transition: border-color 0.3s ease;
    }

    input[type="time"]:focus,
    input[type="number"]:focus,
    select:focus {
      border-color: #38a169;
      outline: none;
      box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.2);
    }

    input[type="submit"] {
      background-color: #38a169;
      color: white;
      font-size: 1.1rem;
      font-weight: 600;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      display: inline-block;
      width: 100%;
      margin-top: 15px;
    }

    input[type="submit"]:hover {
      background-color: #2f855a;
      transform: translateY(-2px);
    }

    @media (max-width: 600px) {
      form {
        padding: 20px;
      }

      td {
        display: block;
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <h2>SLOT REGISTRATION</h2>

  <form id="form1" name="form1" method="post" action="">
    <table>
      <tr>
        <td>
          <label for="txt_from">Slot From Time</label>
          <input type="time" name="txt_from" id="txt_from" required />
        </td>
      </tr>
      <tr>
        <td>
          <label for="txt_to">Slot To Time</label>
          <input type="time" name="txt_to" id="txt_to" required />
        </td>
      </tr>
      <tr>
        <td>
          <label for="txt_count">Enter Unit</label>
          <input name="txt_count" type="number" placeholder="Enter your unit" required />
        </td>
      </tr>
      <tr>
        <td>
          <label for="sel_charger">Charger Type</label>
          <select name="sel_charger" id="sel_charger" required>
            <option value="">-- Select --</option>
            <?php 
              $selQry = "SELECT * FROM tbl_chargertype";
              $row = $Con->query($selQry);
              while($data = $row->fetch_assoc()) {
                $selected = (isset($chargertype) && $chargertype == $data['chargertype_id']) ? 'selected' : '';
                echo '<option value="' .$data['chargertype_id'] . '" ' . $selected . '>' .$data['charger_type']. '</option>';
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
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
