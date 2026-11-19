<?php
$districtid="";
$districtname="";
 include("../Assets/Connection/Connection.php");
 include("Header.php");
if(isset($_POST["btn_submit"]))
 {
	 $district=$_POST['txt_district'];
	 $districtid=$_POST['txt_id'];
	 if($districtid == "")
	 {
		 $insQry="insert into tbl_district(district_name)values('".$district."')";
		 if($Con->query($insQry))
		 {
			 ?>
			 <script>
			 alert("DISTRICT NAME REGISTRED SUCESSFULLY");
			 window.location="District.php";
			 </script>
			 <?php
		 }
	 }
	 else
	 {
		 $upQry="update tbl_district set district_name='".$district."' where district_id='". $districtid."'";
		 if($Con->query($upQry))
		 {
			 ?>
			 <script>
			 alert("Updated");
			 window.location="District.php";
			 </script>
			 <?php
		 }
 }
 }
 if(isset($_GET["Did"]))
 {
	 $DelQry="delete from tbl_district where district_id='".$_GET['Did']."'";
	 if($Con->query($DelQry))
	 {
		 ?>
         <script>
		 alert("deleted");
		 window.location="District.php";
		 </script>
     <?php 
	 }
 }
 if(isset($_GET['Eid']))
 {
	 $selQry="select * from tbl_district where district_id='".$_GET['Eid']."'";
	 $row=$Con->query($selQry);
	 $data=$row->fetch_assoc();
	 $districtid=$data['district_id'];
	 $districtname=$data['district_name'];
 }
 ?>
 <br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <title>District</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f7fa;
      margin: 0;
      padding: 0;
    }

    .container13 {
      max-width: 700px;
      margin: 2rem auto;
      background-color: #86b0eeff;
      color: #222;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    h1 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 2rem;
      color: #222;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: #222;
    }

    input[type="text"] {
      width: 100%;
      padding: 0.6rem 1rem;
      font-size: 1rem;
      border: 1.8px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus {
      border-color: #007BFF;
      outline: none;
    }

    .form-actions {
      text-align: center;
      margin-top: 1.5rem;
    }

    input[type="submit"] {
      background-color: #6d6e70ff;
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      font-weight: bold;
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 2rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 0.75rem 1rem;
      text-align: left;
      background-color: #fefefe;
      color: #222;
      border-bottom: 1px solid #eaeaea;
    }

    th {
      background-color: #0056b3;
      color: #e6eaf1;
      font-weight: 700;
    }

    tr:hover td {
      background-color: #e8f0fe;
    }

    .actions a {
      display: inline-block;
      margin-right: 0.5rem;
      padding: 0.35rem 0.8rem;
      border-radius: 5px;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      transition: background-color 0.3s ease;
    }

    .actions a.edit {
      background-color: #28a745;
    }

    .actions a.edit:hover {
      background-color: #1e7e34;
    }

    .actions a.delete {
      background-color: #dc3545;
    }

    .actions a.delete:hover {
      background-color: #a71d2a;
    }
  </style>
</head>
<body>
  <div class="container13">
    <h1>District</h1>
    <form method="post">
      <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $districtid ?>" />
      <div class="form-group">
        <label for="txt_district">District Name</label>
        <input type="text" name="txt_district" id="txt_district" placeholder="Enter District Name" value="<?php echo $districtname ?>" required />
      </div>
      <div class="form-actions">
        <input type="submit" name="btn_submit" id="btn_submit" value="Add" />
      </div>
    </form>

    <table>
      <thead>
        <tr>
          <th>Sl No</th>
          <th>District Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 0;
          $selQry = "SELECT * FROM tbl_district";
          $row = $Con->query($selQry);
          while($data = $row->fetch_assoc()) {
            $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo htmlspecialchars($data['district_name']); ?></td>
          <td class="actions">
            <a href="District.php?Eid=<?php echo $data['district_id'] ?>" class="edit">Edit</a>
            <a href="District.php?Did=<?php echo $data['district_id'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this district?');">Delete</a>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

<?php
include("Footer.php");
?>