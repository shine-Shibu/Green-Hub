<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_GET["ac"]))
	{
		 $upQry="update tbl_evstation set evstation_status ='1' where evstation_id='".$_GET["ac"]."'";
		 if($Con->query($upQry))
			{
			  ?>
			   <script>
				 alert("acccepted");
				window.location="viewstation.php";
				</script>
				  <?php
			  }
	}
if(isset($_GET["re"]))
	{
		 $upQry="update tbl_evstation set evstation_status ='2' where evstation_id='".$_GET["re"]."'";
		 if($Con->query($upQry))
			{
			  ?>
			   <script>
				 alert("rejected");
				window.location="viewstation.php";
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
  <title>View EV Stations</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
      padding: 2rem;
      color: #222;
    }

    h2 {
      text-align: center;
      color: #2c3e50;
      margin: 3rem 0 1rem;
      text-transform: uppercase;
      font-size: 1.8rem;
    }

    table {
      width: 100%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
      text-align: left;
      font-size: 15px;
      color: #333;
    }

    th {
      background-color: #0056b3;
      color: #fff;
      text-transform: uppercase;
    }

    tr:nth-child(even) {
      background-color: #f8f9fa;
    }

    tr:hover td {
      background-color: #eaf4fd;
    }

    img {
      border-radius: 6px;
      border: 1px solid #ccc;
      max-width: 100px;
      height: auto;
    }

    .action-buttons a {
      display: inline-block;
      margin-right: 8px;
      padding: 6px 12px;
      border-radius: 5px;
      font-weight: bold;
      font-size: 14px;
      text-decoration: none;
      color: #fff;
      transition: background-color 0.3s ease;
    }

    .accept {
      background-color: #28a745;
    }

    .accept:hover {
      background-color: #1e7e34;
    }

    .reject {
      background-color: #dc3545;
    }

    .reject:hover {
      background-color: #a71d2a;
    }

    u {
      color: #2c3e50;
    }
  </style>
</head>
<body>

<h2><u>Pending EV Station Requests</u></h2>
<table>
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Description</th>
      <th>Photo</th>
      <th>District</th>
      <th>Place</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $p = 0;
    $selQry = "SELECT evstation_id, evstation_name, evstation_email, evstation_contact, evstation_description, evstation_photo, place_name, district_name FROM tbl_evstation ev INNER JOIN tbl_place p ON ev.place_id = p.place_id INNER JOIN tbl_district d ON p.district_id = d.district_id WHERE evstation_status IS NULL OR evstation_status = '0'";
    $row = $Con->query($selQry);
    while ($data = $row->fetch_assoc()) {
      $p++;
    ?>
    <tr>
      <td><?php echo $p; ?></td>
      <td><?php echo $data['evstation_name']; ?></td>
      <td><?php echo $data['evstation_email']; ?></td>
      <td><?php echo $data['evstation_contact']; ?></td>
      <td><?php echo $data['evstation_description']; ?></td>
      <td><img src="../Assets/Files/evstation/photo/<?php echo $data['evstation_photo']; ?>" alt="EV Photo" /></td>
      <td><?php echo $data['district_name']; ?></td>
      <td><?php echo $data['place_name']; ?></td>
      <td class="action-buttons">
        <a href="Viewstation.php?ac=<?php echo $data['evstation_id']; ?>" class="accept">Accept</a>
        <a href="Viewstation.php?re=<?php echo $data['evstation_id']; ?>" class="reject">Reject</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<h2><u>Accepted EV Stations</u></h2>
<table>
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Description</th>
      <th>Photo</th>
      <th>District</th>
      <th>Place</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $r = 0;
    $selQry = "SELECT evstation_id, evstation_name, evstation_email, evstation_contact, evstation_description, evstation_photo, place_name, district_name FROM tbl_evstation ev INNER JOIN tbl_place p ON ev.place_id = p.place_id INNER JOIN tbl_district d ON p.district_id = d.district_id WHERE evstation_status = '1'";
    $row = $Con->query($selQry);
    while ($data = $row->fetch_assoc()) {
      $r++;
    ?>
    <tr>
      <td><?php echo $r; ?></td>
      <td><?php echo $data['evstation_name']; ?></td>
      <td><?php echo $data['evstation_email']; ?></td>
      <td><?php echo $data['evstation_contact']; ?></td>
      <td><?php echo $data['evstation_description']; ?></td>
      <td><img src="../Assets/Files/evstation/photo/<?php echo $data['evstation_photo']; ?>" alt="EV Photo" /></td>
      <td><?php echo $data['district_name']; ?></td>
      <td><?php echo $data['place_name']; ?></td>
      <td class="action-buttons">
        <a href="Viewstation.php?re=<?php echo $data['evstation_id']; ?>" class="reject">Reject</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<h2><u>Rejected EV Stations</u></h2>
<table>
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Description</th>
      <th>Photo</th>
      <th>District</th>
      <th>Place</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $s = 0;
    $selQry = "SELECT evstation_id, evstation_name, evstation_email, evstation_contact, evstation_description, evstation_photo, place_name, district_name FROM tbl_evstation ev INNER JOIN tbl_place p ON ev.place_id = p.place_id INNER JOIN tbl_district d ON p.district_id = d.district_id WHERE evstation_status = '2'";
    $row = $Con->query($selQry);
    while ($data = $row->fetch_assoc()) {
      $s++;
    ?>
    <tr>
      <td><?php echo $s; ?></td>
      <td><?php echo $data['evstation_name']; ?></td>
      <td><?php echo $data['evstation_email']; ?></td>
      <td><?php echo $data['evstation_contact']; ?></td>
      <td><?php echo $data['evstation_description']; ?></td>
      <td><img src="../Assets/Files/evstation/photo/<?php echo $data['evstation_photo']; ?>" alt="EV Photo" /></td>
      <td><?php echo $data['district_name']; ?></td>
      <td><?php echo $data['place_name']; ?></td>
      <td class="action-buttons">
        <a href="Viewstation.php?ac=<?php echo $data['evstation_id']; ?>" class="accept">Accept</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</body>
</html>

<?php
include("Footer.php");
?>