<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	 $old= $_POST['txt_password'];
     $new= $_POST['txt_newpassword'];
	 $repass= $_POST['txt_repassword'];
	 
   $selQry = "select evstation_password from tbl_evstation where evstation_id='".$_SESSION['eid']."'";
   $row=$Con->query($selQry);
   $data=$row->fetch_assoc();
	  if ($data['evstation_password'] == $old)
		  {
			 if($new == $repass)
				 {
					  $evid = $_SESSION['eid'];
					  $upQry="update tbl_evstation set  evstation_password='".$new."'where evstation_id='".$evid."'";
					  if($Con->query($upQry))
					 {
					  ?>
					   <script>
						 alert("password change sucessfully");
						window.location="evprofile.php";
						</script>
						  <?php
					  }
				}
			  else
			  {
				echo"new password do not match";  
			  }
		  }
	  else
	  {
		  echo" you enter wrong password";
	  }
	 }
?>
<br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<title>Change Password</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f8;
    margin: 0;
    padding: 0;
  }

  h2 {
    text-align: center;
    color: #28a745;
    font-size: 32px;
    text-transform: uppercase;
  }

  .form-container {
    width: 450px;
    background-color: #fff;
    margin: 40px auto;
    padding: 30px 25px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  .form-container table {
    width: 100%;
    border-collapse: collapse;
  }

  .form-container td {
    padding: 12px 8px;
    font-size: 16px;
    color: #333;
  }

  .form-container td:first-child {
    font-weight: 600;
    width: 40%;
    color: #444;
    text-transform: capitalize;
  }

  input[type="password"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
    transition: 0.3s;
    box-sizing: border-box;
  }

  input[type="password"]:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
    outline: none;
  }

  input[type="submit"] {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
  }

  input[type="submit"]:hover {
    background-color: #1e7e34;
  }

  @media (max-width: 480px) {
    .form-container {
      width: 90%;
      padding: 20px;
    }
  }
</style>
</head>

<body>

  <h2>Change Password</h2>

  <div class="form-container">
    <form id="form1" name="form1" method="post" action="">
      <table>
        <tr>
          <td>Old password</td>
          <td>
            <input type="password" name="txt_password" id="txt_password"
              placeholder="Enter old password" required />
          </td>
        </tr>
        <tr>
          <td>New password</td>
          <td>
            <input type="password" name="txt_newpassword" id="txt_newpassword"
              placeholder="Enter new password"
              required
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number, one uppercase, one lowercase letter, and minimum 8 characters" />
          </td>
        </tr>
        <tr>
          <td>Re-type password</td>
          <td>
            <input type="password" name="txt_repassword" id="txt_repassword"
              placeholder="Retype new password"
              required
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number, one uppercase, one lowercase letter, and minimum 8 characters" />
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>
<div style="height: 100px;"></div>
<?php
 include("Footer.php"); 
 ?>
