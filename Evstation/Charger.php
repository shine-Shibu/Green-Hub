<?php
$chargeramount="";
$chargertype="";
$chargerid="";
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['eid']))
{
 $evstation_id=	$_SESSION['eid'];
}
if (isset($_POST["btn_submit"]))
 {
    $chargertype = $_POST["sel_charger"];
    $chargeramount = $_POST["txt_amount"];
	  $chargerid = $_POST["txt_id"];
   

	if($chargerid=="")
    {
    $selQry = "SELECT * FROM tbl_charger WHERE chargertype_id = '$chargertype' AND evstation_id = '$evstation_id'";#default to check the email is already registred or not 
        $res = $Con->query($selQry);
        if ($res->num_rows > 0)
          {
             ?>
            <script>
                alert("This chargertype amount is already entered so you can edit it");
            </script>
        <?php
        }
else
  {
		$insQry="insert into tbl_charger (chargertype_id,charger_amount,evstation_id) values ('".$chargertype."','".$chargeramount."','".$evstation_id."')" ;
		if($Con->query($insQry))
				{
					?>
				   <script>
					 alert(" Amount-inserted");
				  
					window.location="charger.php";
					</script>
					  <?php
				  
		 }
	 }
  }
 else
 {
	 
	$upQry="update tbl_charger set chargertype_id='".$chargertype."',charger_amount='".$chargeramount."' where charger_id='".$chargerid."'";
	if($Con->query($upQry))
		{
			?>
			<script>
			alert("updated")
			window.location="charger.php";
			</script>
			<?php
	  	}
	}
		
	 
 }
 		  
	if(isset($_GET["Did"]))
	{
		$delQry="delete from tbl_charger where charger_id='".$_GET["Did"]."'";
		if($Con->query($delQry))
		{
		?>
			<script>
			alert("deleted")
			window.location="charger.php";
			</script>
			<?php
		}
	}
	
	if(isset($_GET["ed"]))
	{
		$selQry="select * from tbl_charger where  charger_id='".$_GET["ed"]."'";
		$row=$Con->query($selQry);
		$data=$row->fetch_assoc();
		$chargertype= $data['chargertype_id'];
		$chargerid= $data['charger_id'];
		$chargeramount=$data['charger_amount'];
		
	}

	?> 	
  <br><br>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>CHARGER_AMOUNTSTATIONS</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   background: #f4f6f8;
      color: #333;
    }

    h3 {
      text-align: center;
      font-size: 1.6rem;
      color: #22543d;
    }

    table {
      border-collapse: collapse;
      width: 90%;
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
      border-radius: 8px;
      overflow: hidden;
    }

    table th,
    table td {
      border: 1px solid #c6f6d5;
      padding: 14px 16px;
      text-align: center;
      font-size: 1rem;
    }

    table th {
      background-color: #38a169; /* Green header */
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    table tr:nth-child(even) {
      background-color: #f0fff4;
    }

   /* Action Buttons inside the Table */
table a {
  display: inline-block;
  padding: 8px 14px;
  margin: 0 6px;
  font-size: 0.95rem;
  font-weight: 600;
  text-decoration: none;
  border-radius: 6px;
  transition: background-color 0.3s ease, transform 0.2s ease;
  color: white;
}

/* Edit Button - Green */
table a[href*="ed="] {
  background-color: #38a169; /* Green */
}

table a[href*="ed="]:hover {
  background-color: #2f855a;
  transform: scale(1.05);
}

/* Delete Button - Red */
table a[href*="Did="] {
  background-color: #e53e3e; /* Red */
}

table a[href*="Did="]:hover {
  background-color: #c53030;
  transform: scale(1.05);
}


    form table {
      background-color: #ffffff;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
      border-radius: 10px;
    }

    form table td {
      padding: 14px;
    }

    select,
    input[type="number"] {
      width: 100%;
      padding: 10px 12px;
      font-size: 1rem;
      border: 1.5px solid #a0aec0;
      border-radius: 6px;
      box-sizing: border-box;
      background-color: #fdfdfd;
      transition: border-color 0.3s;
    }

    select:focus,
    input[type="number"]:focus {
      border-color: #38a169;
      outline: none;
      box-shadow: 0 0 0 3px rgba(56, 161, 105, 0.25);
    }

    input[type="submit"] {
      background-color: #38a169;
      border: none;
      color: white;
      padding: 12px 30px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
    }

    input[type="submit"]:hover {
      background-color: #2f855a;
      transform: translateY(-2px);
    }

    @media (max-width: 600px) {
      table, form table {
        width: 95%;
      }

      table th,
      table td,
      form table td {
        font-size: 0.95rem;
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <h3>Station-Charger</h3>
  <h3>Amount for one unit of charge is given</h3>

  <form id="form1" name="form1" method="post" action="">
    <table width="200" border="1">
    <tr>
      <td> charger-Type</td>
      <td><label for="sel_charger"></label>
        <select name="sel_charger"  required="required">
        <option value="">--select--</option>
        <?php 
      $selQry="select * from tbl_chargertype";
      $row=$Con->query($selQry);
      while($data=$row->fetch_assoc())
      {
        ?>
        <option <?php if($chargertype==$data['chargertype_id'])
         {
               echo "selected";
             }
             ?>
           value="<?php echo $data['chargertype_id']?>"><?php echo $data['charger_type']?></option>
             <?php
           }
           ?>

          </select>
           
      </td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><label for="txt_amount"></label>
      <input type="hidden" name="txt_id" value="<?php echo $chargerid ?>" />
      <input type="number" name="txt_amount" id="txt_amount" placeholder="ENTER THE AMOUNT" required value="<?php echo $chargeramount ?>" />

    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  </form>

  <table>
    <tr>
      <th>SI No</th>
      <th>Type</th>
      <th>Amount</th>
      <th>Action</th>
    </tr>
    <?php
      $r = 0;
      $selQry = "select * from tbl_charger p inner join tbl_chargertype d on p.chargertype_id=d.chargertype_id where evstation_id='".$evstation_id."'";
      $row = $Con->query($selQry);
      while($data = $row->fetch_assoc()) {
        $r++;
    ?>
      <tr>
        <td><?php echo $r ?></td>
        <td><?php echo $data['charger_type'] ?></td>
        <td><?php echo $data['charger_amount'] ?></td>
        <td>
          <a href="charger.php?Did=<?php echo $data['charger_id'] ?>">Delete</a>
          <a href="charger.php?ed=<?php echo $data['charger_id'] ?>">Edit</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
<div style="height: 100px;"></div>
<?php
 include("Footer.php");
  ?>
