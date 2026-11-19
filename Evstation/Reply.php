<?php
$replycontent="";
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_POST["btn_submit"]))
 {
	 $replycontent=$_POST["txt_reply"];
	
	 $upQry="update tbl_complaint set complaint_reply='".$replycontent."', complaint_status=1 where complaint_id='".$_GET["rp"]."'";
	  if($Con->query($upQry))
			{
			  ?>
			   <script>
				 alert("replyed successfully");
				window.location="usercomplaints.php";
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
  <title>Admin Reply</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      padding: 40px;
      margin: 0;
    }

    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
      text-transform: uppercase;
    }

    .reply-container {
      width: 60%;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 15px;
      font-size: 16px;
      color: #333;
    }

    textarea {
      width: 100%;
      padding: 12px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
      resize: vertical;
      min-height: 100px;
    }

    input[type="submit"] {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
      transform: translateY(-2px);
    }

    input[type="submit"]:active {
      background-color: #004085;
      transform: translateY(0);
    }

    ::placeholder {
      color: #aaa;
    }
  </style>
</head>
<body>

<h2><u>Evstation-Reply</u></h2>

<div class="reply-container">
  <form method="post" action="">
    <table>
      <tr>
        <td><label for="txt_reply">Reply</label></td>
        <td>
          <textarea name="txt_reply" id="txt_reply" placeholder="Enter reply for complaint" required></textarea>
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

<?php
include("Footer.php");
?>