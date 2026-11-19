<?php
$disid="";
$plcid="";
include("Header.php");
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit']))
{ 
}
?>
  <br><br>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>user view station</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <style>
    table,
    td,
    th {
      border: 1px solid black;
      color: black;
    }

    footer {
      padding-top: 40px;
    }
  </style>
</head>

<body>
  <h3> </h3>
  <form id="form1" name="form1" method="post" action="">
   <!-- CSS Styling -->
<style>
  .filter-card {
    max-width: 700px;
    margin: 40px auto;
    margin-top: 80px; 
    background-color: #ffffff;
    border: 1px solid #28a745;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    font-family: 'Segoe UI', sans-serif;
  }

  .filter-card h3 {
    text-align: center;
    margin-bottom: 25px;
    color: #28a745;
  }

  .form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
  }

  .form-group {
    flex: 1 1 45%;
    display: flex;
    flex-direction: column;
  }

  label {
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
  }

  select {
    padding: 10px;
    border: 1px solid #28a745;
    border-radius: 6px;
    font-size: 15px;
    background-color: #f9f9f9;
    color: #333;
    transition: all 0.3s ease;
  }

  select:focus {
    border-color: #1e7e34;
    outline: none;
    background-color: #fff;
  }

  @media (max-width: 600px) {
    .form-group {
      flex: 1 1 100%;
    }
  }
</style>
<!-- Modern Filter Card -->
<div class="filter-card">
  <h3>Search EV Stations</h3>
  <div class="form-row">
    <div class="form-group">
      <label for="sel_district">District</label>
      <select name="sel_district" id="sel_district" onChange="getPlace(this.value)" required>
        <option>--Select--</option>
        <?php
        $selQry = "SELECT * FROM tbl_district";
        $row = $Con->query($selQry);
        while ($data = $row->fetch_assoc()) {
        ?>
          <option value="<?php echo $data['district_id']; ?>">
            <?php echo $data['district_name']; ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="sel_place">Place</label>
      <select name="sel_place" id="sel_place" onChange="getevstation(this.value)" required>
        <option value="">--Select--</option>
      </select>
    </div>
  </div>
</div>


   <!-- Card Styling -->
<style>
  .station-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
    margin: 30px;
  }

  .station-card {
    width: 300px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', sans-serif;
  }

  .station-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
  }

  .station-card h4 {
    margin: 10px 0 5px;
    color: #28a745;
  }

  .station-card p {
    margin: 4px 0;
    font-size: 14px;
    color: #555;
  }

  .station-card .rating {
    text-align: center;
    margin-top: 10px;
  }

  .station-card .booking-btn {
    display: block;
    margin-top: 12px;
    padding: 8px 10px;
    background-color: #28a745;
    color: white;
    text-align: center;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
  }

  .fas.fa-star {
    color: #fc3;
  }

  .fas.fa-star.inactive {
    color: #ccc;
  }
</style>

<!-- Card Container -->
<div class="station-container" id="result">

  <?php
  $selQry = "SELECT * FROM tbl_evstation ev INNER JOIN tbl_place p ON ev.place_id = p.place_id INNER JOIN tbl_district d ON p.district_id = d.district_id WHERE evstation_status = '1'";
  $rowS = $Con->query($selQry);
  while ($data = $rowS->fetch_assoc()) {
    // Ratings Logic
    $average_rating = 0;
    $total_review = 0;
    $total_user_rating = 0;
    $query = "SELECT rating_data FROM tbl_rating WHERE evstation_id = '" . $data["evstation_id"] . "'";
    $result = $Con->query($query);
    while ($row = $result->fetch_assoc()) {
      $total_review++;
      $total_user_rating += $row["rating_data"];
    }
    if ($total_review > 0) {
      $average_rating = $total_user_rating / $total_review;
    }
  ?>
    <div class="station-card">
      <img src="../Assets/Files/evstation/photo/<?php echo $data['evstation_photo']; ?>" alt="EV Station">
      <h4><?php echo $data['evstation_name']; ?></h4>
      <p><strong>Email:</strong> <?php echo $data['evstation_email']; ?></p>
      <p><strong>Contact:</strong> <?php echo $data['evstation_contact']; ?></p>
      <p><strong>Description:</strong> <?php echo $data['evstation_description']; ?></p>
      <p><strong>District:</strong> <?php echo $data['district_name']; ?></p>
      <p><strong>Place:</strong> <?php echo $data['place_name']; ?></p>

      <div class="rating">
        <?php
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= round($average_rating)) {
            echo '<i class="fas fa-star"></i>';
          } else {
            echo '<i class="fas fa-star inactive"></i>';
          }
        }
        ?>
      </div>

      <a class="booking-btn" href="booking.php?ei=<?php echo $data['evstation_id']; ?>">Book Now</a>
    </div>
  <?php } ?>
</div>

  </form>
</body>

</html>
<div style="height: 100px;"></div>
<?php include("Footer.php");
 ?>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {
        $("#sel_place").html(result);
      }
    });
  }
</script>
<script>
  function getevstation(did) {
    $.ajax({
      url: "../Assets/AjaxPages/Ajaxevstation.php?did=" + did,
      success: function (result) {
        $("#result").html(result);
      }
    });
  }
</script>