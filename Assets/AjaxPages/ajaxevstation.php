<?php
include("../Connection/Connection.php");
?>

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
    color: #F96;
    font-size: 20px;
  }

  .fas.fa-star {
    color: #fc3;
  }

  .fas.fa-star.inactive {
    color: #ccc;
  }

  .booking-btn {
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
</style>

<div class="station-container">
<?php
$p = 0;
$selQry = "SELECT evstation_id, evstation_name, evstation_email, evstation_contact, evstation_description, evstation_photo, place_name, district_name FROM tbl_evstation ev INNER JOIN tbl_place p ON ev.place_id = p.place_id INNER JOIN tbl_district d ON p.district_id = d.district_id WHERE ev.place_id='" . $_GET['did'] . "' AND evstation_status ='1'";

$rowS = $Con->query($selQry);
while ($data = $rowS->fetch_assoc()) {
    $p++;

    // Calculate average rating
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
        <img src="../Assets/Files/evstation/photo/<?php echo $data['evstation_photo']; ?>" alt="EV Station Photo">
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
<?php
}
?>
</div>
