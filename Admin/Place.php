<?php
$disid="";
$placename="";
$placeid="";
$id="";
include("../Assets/Connection/Connection.php");

include("Header.php");
if(isset($_POST["btn_submit"])) {
    $district = $_POST["seldis"];
    $place = $_POST["txt_place"];
  $id=$_POST['txt_id'];
  
  if($id=="")
  {
  $insQry = "insert into tbl_place(district_id,place_name) values('".$district."','".$place."')";
  echo $insQry;

    if($Con->query($insQry))
    {
      ?>
       <script>
       alert("PLACE INSERTED SUCESSFULLY");
      window.location="Place.php";
      </script>
        <?php
      }
      }  
  else
  {
  $upQry="update tbl_place set district_id='".$district."',place_name='".$place."' where place_id='".$id."'";
  if($Con->query($upQry))
    {
      ?>
      <script>
      alert("updated")
      window.location="Place.php";
      </script>
      <?php
      
      
      }
  }
    
}
            
  if(isset($_GET["Did"]))
  {
    $delQry="delete from tbl_place where place_id='".$_GET["Did"]."'";
    if($Con->query($delQry))
    {
    ?>
      <script>
      alert("deleted")
      window.location="Place.php";
      </script>
      <?php
    }
  }
  if(isset($_GET["ed"]))
  {
    $selQry="select * from tbl_place where place_id='".$_GET["ed"]."'";
    $row=$Con->query($selQry);
    $data=$row->fetch_assoc();
    $placeid= $data['place_id'];
    $disid= $data['district_id'];
    $placename=$data['place_name'];
    
  }
  ?> 
  <br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Places</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f7fa;
      margin: 0;
      padding: 0;
    }
select {
  background-color: #ffffff;  /* White background */
  color: #000000;             /* Black text */
}

/* Optional: also style dropdown options */
select option {
  background-color: #ffffff;  /* White */
  color: #000000;             /* Black */
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
      color: #222;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 0.5rem;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 0.6rem 1rem;
      border: 1.8px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    select:focus {
      border-color: #007BFF;
      outline: none;
    }

    .form-actions {
      text-align: center;
      margin-top: 1.5rem;
    }

    input[type="submit"],
    input[type="reset"] {
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"] {
      background-color: #6d6e70ff;
      color: white;
      margin-right: 10px;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
      transform: translateY(-2px);
    }

    input[type="reset"] {
      background-color: #dc3545;
      color: white;
    }

    input[type="reset"]:hover {
      background-color: #a71d2a;
      transform: translateY(-2px);
    }

    table {
      width: 100%;
      margin-top: 2rem;
      border-collapse: collapse;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 0.75rem 1rem;
      text-align: left;
      background-color: #fefefe;
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
    <h1>Places</h1>
    <form id="form1" name="form1" method="post" action="">
      <input type="hidden" name="txt_id" value="<?php echo $placeid ?>" />

      <div class="form-group">
        <label for="sel_district">District</label>
        <select name="seldis" id="sel_district" required>
          <option value="">-- Select District --</option>
          <?php
            $selQry = "SELECT * FROM tbl_district";
            $row = $Con->query($selQry);
            while($data = $row->fetch_assoc()) {
          ?>
            <option value="<?php echo $data['district_id']; ?>" 
              <?php if($disid == $data['district_id']) echo "selected"; ?>>
              <?php echo $data['district_name']; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="txt_place">Place</label>
        <input type="text" name="txt_place" id="txt_place" placeholder="Enter your place" value="<?php echo $placename ?>" required />
      </div>

      <div class="form-actions">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_reset" id="btn_reset" value="Reset" />
      </div>
    </form>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>District</th>
          <th>Place</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $t = 0;
          $selQry = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON p.district_id = d.district_id";
          $row = $Con->query($selQry);
          while($data = $row->fetch_assoc()) {
            $t++;
        ?>
        <tr>
          <td><?php echo $t ?></td>
          <td><?php echo htmlspecialchars($data['district_name']); ?></td>
          <td><?php echo htmlspecialchars($data['place_name']); ?></td>
          <td class="actions">
            <a href="Place.php?ed=<?php echo $data['place_id'] ?>" class="edit">Edit</a>
            <a href="Place.php?Did=<?php echo $data['place_id'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this place?');">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>

<?php
include("Footer.php");
?>