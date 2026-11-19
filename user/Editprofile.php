<?php
$userid="";
$username="";
$usercontact="";
$useraddress="";
include("../Assets/Connection/Connection.php");
include("Header.php");
$selQry = "select * from tbl_user where user_id='".$_SESSION['uid']."'";
$row=$Con->query($selQry);
  $data=$row->fetch_assoc();
         $userid= $data['user_id'];
		$username= $data['user_name'];
		$useremail= $data['user_email'];
		$usercontact=$data['user_contact'];
		$useraddress=$data['user_address'];
if(isset($_POST['btn_submit'])) {
		  $name = $_POST['txt_name'];
		$email = $_POST['txt_email'];
		$contact= $_POST['txt_contact'];
		$address= $_POST['txt_address'];
		 $upQry="update tbl_user set  user_name='".$name."',user_email='".$email."',user_contact='".$contact."',user_address='".$address."' where user_id='".$userid."'";
		 if($Con->query($upQry))
		{
		  ?>
		   <script>
			 alert("profile updated");
			window.location="Myprofile.php";
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
  <title>Edit Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
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
      width: 30%;
      color: #444;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
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

  <h2>Edit Profile</h2>

  <div class="form-container">
    <form id="form1" name="form1" method="post" action="">
      <table>
        <tr>
          <td>Name</td>
          <td>
            <input name="txt_id" type="hidden" value="<?php echo $userid ?>" />
            <input type="text" name="txt_name" id="txt_name"
              required
              title="Name allows only alphabets, spaces, and the first letter must be capital."
              pattern="^[A-Z]+[a-zA-Z ]*$"
              minlength="3"
              value="<?php echo $username ?>" />
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td>
            <input type="email" name="txt_email" id="txt_email"
              required
              value="<?php echo $useremail ?>" />
          </td>
        </tr>
        <tr>
          <td>Contact</td>
          <td>
            <input type="text" name="txt_contact" id="txt_contact"
              required
              pattern="[6-9]{1}[0-9]{9}"
              title="Phone number should start with 6-9 and contain 10 digits total."
              maxlength="10"
              value="<?php echo $usercontact ?>" />
          </td>
        </tr>
        <tr>
          <td>Address</td>
          <td>
            <input type="text" name="txt_address" id="txt_address"
              required
              value="<?php echo $useraddress ?>" />
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
