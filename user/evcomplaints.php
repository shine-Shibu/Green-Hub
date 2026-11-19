<?php
$complaintcontent = "";
$complainttitle   = "";
$complaintid      = "";
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) 
{
    $user_id = $_SESSION['uid'];
} 
if (isset($_POST["btn_submit"])) {
    $complaintid      = $_POST["txt_id"];
    $complainttitle   = $_POST["txt_titile"];
    $complaintcontent = $_POST["txt_content"];
    $evstation_id      =  $_GET["fid"];
 if($complaintid=="")
  {
   echo  $insQry = "INSERT INTO tbl_complaint (complaint_title, complaint_content, complaint_date, user_id,evstation_id) 
               VALUES ('".$complainttitle."', '".$complaintcontent."',CURDATE(), '".$user_id."','".$evstation_id."')";
			   	if($Con->query($insQry))
				{
					?>
				   <script>
					alert("COMPLAINT REGISTRED SUCESSFULLY");
				  
				window.location="Homepage.php";
					</script>
					  <?php
				  
		 }
}
}
	?> 	  
  <br><br>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Complaints to EV</title>
<style>
  body {
    background-color: #e8f5e9;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    color: #2e7d32;
  }

  h3 {
    text-align: center;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 40px;
    letter-spacing: 0.1em;
    color: #1b5e20;
  }

  form {
    max-width: 700px;
    margin: 0 auto 50px;
    background: #fff;
    padding: 30px 25px;
    border-radius: 15px;
    box-shadow: 0 12px 30px rgba(46, 125, 50, 0.15);
  }

  label {
    font-weight: 600;
    display: block;
    margin-bottom: 8px;
    font-size: 1.1rem;
  }

  input[type="text"], textarea {
    width: 100%;
    font-size: 1rem;
    padding: 12px 15px;
    border: 2px solid #81c784;
    border-radius: 12px;
    background-color: #f1f8e9;
    color: #2e7d32;
    resize: vertical;
    transition: border-color 0.3s ease;
  }

  input[type="text"]:focus, textarea:focus {
    border-color: #388e3c;
    outline: none;
    box-shadow: 0 0 10px #4caf5088;
  }

  input[type="submit"] {
    display: block;
    margin: 25px auto 0;
    background: linear-gradient(135deg, #43a047, #1b5e20);
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    padding: 14px 0;
    width: 150px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(27, 94, 32, 0.4);
    transition: background 0.3s ease;
  }
  input[type="submit"]:hover {
    background: linear-gradient(135deg, #66bb6a, #2e7d32);
  }

  table {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    border-collapse: collapse;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(46, 125, 50, 0.15);
    background-color: #fff;
  }

  thead {
    background-color: #388e3c;
    color: #fff;
    font-weight: 700;
    font-size: 1.1rem;
  }

  th, td {
    padding: 15px 20px;
    text-align: left;
    border-bottom: 1px solid #c8e6c9;
  }

  /* Make data cells text black */
  tbody td {
    color: black;
  }

  tbody tr:nth-child(odd) {
    background-color: #f9fff9;
  }

  tbody tr:hover {
    background-color: #dcedc8;
  }

  /* Buttons for Edit and Delete */
  .btn {
    background: #43a047;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    margin-right: 8px;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s ease;
  }
  .btn:hover {
    background: #2e7d32;
  }

  /* Separate delete button style */
  .btn.delete {
    background: #e53935;
  }
  .btn.delete:hover {
    background: #ab000d;
  }

  @media (max-width: 600px) {
    form, table {
      width: 95%;
    }
    th, td {
      padding: 12px 10px;
      font-size: 0.9rem;
    }
    input[type="submit"] {
      width: 100%;
    }
  }
</style>
</head>
<body>

<h3>User Complaints to evstation</h3>

<form id="form1" name="form1" method="post" action="">
  <input type="hidden" name="txt_id" value="<?php echo $complaintid ?>" />

  <label for="txt_titile">Title of Complaint</label>
  <input type="text" name="txt_titile" id="txt_titile" placeholder="Title of Complaint" value="<?php echo $complainttitle ?>" required />

  <label for="txt_content">Content</label>
  <textarea name="txt_content" id="txt_content" rows="5" required><?php echo $complaintcontent ?></textarea>

  <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
</form>
</body>
</html>
<div style="height: 100px;"></div>
<?php
include("Footer.php");
?>