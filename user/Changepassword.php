<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	 $old= $_POST['txt_password'];
     $new= $_POST['txt_newpassword'];
	 $repass= $_POST['txt_repassword'];
	 
   $selQry = "select user_password from tbl_user where user_id='".$_SESSION['uid']."'";
   $row=$Con->query($selQry);
   $data=$row->fetch_assoc();
	  if ($data['user_password'] == $old)
	  {
		 if($new == $repass)
			 {
				  $userid = $_SESSION['uid'];
				  $upQry="update tbl_user set  user_password='".$new."'where user_id='".$userid."'";
				  if($Con->query($upQry))
				 {
				  ?>
				   <script>
					 alert("password change sucessfully");
					window.location="Myprofile.php";
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
		  echo"enter wrong password";
	  }
	 }
  
?>
  <br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <title>Change Password</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
    }

    h3 {
      text-align: center;
      color: #28a745;
      font-size: 28px;
      text-transform: uppercase;
    }

    .form-container {
      width: 420px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px 25px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 12px 10px;
      font-size: 16px;
      color: #333;
    }

    td:first-child {
      font-weight: 600;
      width: 40%;
      color: #444;
      text-transform: capitalize;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border-radius: 6px;
      border: 1px solid #ccc;
      transition: 0.3s;
    }

    input[type="password"]:focus {
      border-color: #28a745;
      box-shadow: 0 0 5px rgba(40, 167, 69, 0.4);
      outline: none;
    }

    input[type="submit"] {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
      background-color: #1e7e34;
    }

    @media (max-width: 480px) {
      .form-container {
        width: 90%;
        padding: 20px;
      }

      td {
        display: block;
        width: 100%;
      }

      td:first-child {
        margin-bottom: 5px;
      }
    }
  </style>
</head>

<body>

  <h3>Change Password</h3>

  <div class="form-container">
    <form id="form1" name="form1" method="post" action="">
      <table>
        <tr>
          <td>Old Password</td>
          <td>
            <input type="password" name="txt_password" id="txt_password"
                   placeholder="Enter old password" required />
          </td>
        </tr>
        <tr>
          <td>New Password</td>
          <td>
            <input type="password" name="txt_newpassword" id="txt_newpassword"
                   placeholder="Enter new password"
                   required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one number, one uppercase and lowercase letter, and be at least 8 characters long." />
          </td>
        </tr>
        <tr>
          <td>Re-type Password</td>
          <td>
            <input type="password" name="txt_repassword" id="txt_repassword"
                   placeholder="Retype new password"
                   required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must match the new password and meet the same criteria." />
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
<?php include("Footer.php"); ?>
