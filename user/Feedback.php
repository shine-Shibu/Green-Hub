<?php
$feedback="";
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_SESSION['uid'])) 
{
    $user_id = $_SESSION['uid'];
} 

if (isset($_POST["btn_submit"])) {
	$feedback=$_POST["txt_feedback"];
	$insQry="insert into tbl_feedback(feedback_content,user_id) value ('".$feedback."','".$user_id."')";
	if($Con->query($insQry))
        {
          ?>
           <script>
          alert("feedback entered successfully");
        window.location="Feedback.php";
          </script>
            <?php
          
     }
	 
}
?>
  <br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Feedback</title>
<style>
  body {
    background: #e6f2e6;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2e7d32;
  }
  h1 {
    text-align: center;
    color: #1b5e20;
    margin-bottom: 40px;
    font-weight: 700;
    letter-spacing: 0.1em;
  }
  form {
    max-width: 600px;
    margin: 0 auto 60px;
    background: #fff;
    padding: 30px 25px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(46, 125, 50, 0.15);
  }
  label {
    font-weight: 600;
    display: block;
    margin-bottom: 10px;
    font-size: 1.1rem;
  }
  textarea {
    width: 100%;
    height: 120px;
    padding: 15px;
    font-size: 1rem;
    border: 2px solid #81c784;
    border-radius: 12px;
    background: #f1f8e9;
    color: #2e7d32;
    resize: vertical;
    transition: border-color 0.3s ease;
  }
  textarea:focus {
    outline: none;
    border-color: #388e3c;
    box-shadow: 0 0 10px #4caf50aa;
  }
  input[type="submit"] {
    margin-top: 20px;
    width: 100%;
    padding: 14px 0;
    font-size: 1.1rem;
    font-weight: 700;
    background: linear-gradient(135deg, #43a047, #1b5e20);
    border: none;
    border-radius: 25px;
    color: #fff;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(27, 94, 32, 0.4);
    transition: background 0.3s ease;
  }
  input[type="submit"]:hover {
    background: linear-gradient(135deg, #66bb6a, #2e7d32);
  }

  table {
    max-width: 600px;
    margin: 0 auto;
    border-collapse: collapse;
    width: 100%;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(46, 125, 50, 0.15);
    background: #fff;
  }
  thead {
    background-color: #388e3c;
    color: #fff;
    font-weight: 700;
    font-size: 1.1rem;
  }
  th, td {
    padding: 15px 20px;
    border-bottom: 1px solid #c8e6c9;
    text-align: left;
  }
  tbody tr:nth-child(odd) {
    background-color: #f9fff9;
  }
  tbody tr:hover {
    background-color: #dcedc8;
  }
  td:first-child {
    width: 60px;
    font-weight: 700;
  }

  /* Responsive */
  @media (max-width: 480px) {
    form, table {
      width: 95%;
    }
    th, td {
      padding: 12px 10px;
      font-size: 0.9rem;
    }
  }
</style>
</head>
<body>

<h1>User Feedback</h1>

<form id="form1" name="form1" method="post" action="">
  <label for="txt_feedback">Your Feedback</label>
  <textarea name="txt_feedback" id="txt_feedback" placeholder="Enter your feedback here..." required></textarea>
  <input type="submit" name="btn_submit" id="btn_submit" value="Submit Feedback" />
</form>

<table aria-label="User feedback list">
  <thead>
    <tr>
      <th>SL-NO</th>
      <th>Feedback</th>
    </tr>
  </thead>
  <tbody>
    <?php
  $r=0;
  $selQry="select * from tbl_feedback where user_id = '".$user_id."' ";
  $row=$Con->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  $r++;
	  ?>
  <tr>
    <td><?php echo $r ?></td>
    <td><?php echo $data['feedback_content'] ?></td>
  </tr>
 <?php 
  }
  ?>
</table>
  </tbody>
</table>

</body>
</html>

<div style="height: 100px;"></div>
<?php
include("Footer.php");
?>
