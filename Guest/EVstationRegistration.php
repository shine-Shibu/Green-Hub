<?php
$disid="";
$plcid="";
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit']))
{ 
  $place = $_POST["sel_place"];
  $photo=$_FILES['file_photo']['name'];
  $path=$_FILES['file_photo']['tmp_name'];
   move_uploaded_file($path,'../Assets/Files/evstation/photo/'.$photo);
  $EVname = $_POST['txt_name'];
  $EVemail = $_POST['txt_email'];
  $EVcontact = $_POST['txt_contact'];
  $EVaddres = $_POST['txt_addres'];
  $EVpassword = $_POST['txt_password'];
  $selQry = "SELECT * FROM tbl_evstation WHERE evstation_email = '" .$EVemail . "'";#default to check the email is already registred or not 
        $res = $Con->query($selQry);
        if ($res->num_rows > 0)
          {
             ?>
            <script>
                alert("This email address is already registered.");
            </script>
        <?php
        }
else{
 $insQry ="insert into tbl_evstation(evstation_name, evstation_email, evstation_contact, evstation_description, evstation_photo, evstation_password,place_id)     
values('".$EVname."','".$EVemail."','".$EVcontact."','".$EVaddres."','".$photo."','".$EVpassword."','".$place."')";
if($Con->query($insQry))
    {
      ?>
       <script>
      alert("Registration Successfull");
      window.location="Login.php";
      </script>
        <?php
    }
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <title>EV Station Registration</title>
  <link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/gif " />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #e0f7fa, #eafaf1);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
  display: flex;
  width: 90%;
  max-width: 900px;
  height: 90vh; /* Fit to 90% of screen height */
  background: #ffffff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}


    .lottie-section {
      flex: 1;
      background: #eafaf1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px;
    }

   .form-section {
  flex: 1;
  padding: 25px 20px;
  overflow-y: auto;     /* This is key */
  max-height: 90vh;     /* Limit height to screen */
}


    .form-section h2 {
      text-align: center;
      color: #0c9947;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: 500;
      color: #333;
    }

    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #0c9947;
      color: white;
      border: none;
      margin-top: 20px;
      padding: 12px;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #0a7e3c;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .lottie-section {
        display: none;
      }
    }
    .nav-buttons {
  text-align: center;
  margin-top: 20px;
}

.nav-button {
  display: inline-block;
  background-color: #0c9947;
  color: white;
  padding: 10px 20px;
  margin: 5px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
  transition: background 0.3s ease;
}

.nav-button:hover {
  background-color: #0a7e3c;
}

  </style>
</head>
<body>

<div class="container">
  <!-- Lottie Animation Section -->
  <div class="lottie-section">
    <lottie-player src="../Assets/Template/eev.json" background="transparent" speed="1" style="width: 100%; height: 400px;" loop autoplay></lottie-player>
  </div>

  <!-- Form Section -->
  <div class="form-section">
    <h2>EV Station Registration</h2>
    <form method="post" enctype="multipart/form-data">
      <label for="txt_name">Station Name</label>
      <input type="text" name="txt_name" id="txt_name" placeholder="EV-Station Name" required pattern="^[A-Z]+[a-zA-Z ]*$" title="First letter must be capital and only letters/spaces allowed" />

      <label for="txt_email">Email</label>
      <input type="email" name="txt_email" id="txt_email" placeholder="Enter The Email"required />

      <label for="txt_contact">Contact</label>
      <input type="text" name="txt_contact" id="txt_contact" maxlength="10" required pattern="[6-9]{1}[0-9]{9}" title="Valid Indian number starting with 6-9" placeholder="Phone-Number" />

      <label for="txt_addres">Description</label>
      <textarea name="txt_addres" id="txt_addres" rows="3" placeholder="Enter The Description" required></textarea>

      <label for="file_photo">Upload Photo</label>
      <input type="file" name="file_photo" id="file_photo" required accept="image/*" />

      <label for="sel_district">District</label>
      <select name="sel_district" id="sel_district" onchange="getPlace(this.value)" required>
        <option value="">--Select District--</option>
        <?php
        $selQry = "SELECT * FROM tbl_district";
        $row = $Con->query($selQry);
        while ($data = $row->fetch_assoc()) {
          echo "<option value='{$data['district_id']}'>{$data['district_name']}</option>";
        }
        ?>
      </select>

      <label for="sel_place">Place</label>
      <select name="sel_place" id="sel_place" required>
        <option value="">--Select Place--</option>
      </select>

      <label for="txt_password">Password</label>
      <input type="password" name="txt_password" id="txt_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must include uppercase, lowercase, number, and at least 8 characters"  placeholder="Enter Strong Password"/>

      <input type="submit" name="btn_submit" value="Register Now" />
    </form>
    <div class="nav-buttons">
  <a href="../index.php" class="nav-button">Home</a>
  <a href="../Guest/Login.php" class="nav-button">Login</a>
</div>

  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.4/lottie.min.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did) {
  $.ajax({
    url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
    success: function(result) {
      $("#sel_place").html(result);
    }
  });
}
</script>
</body>
</html>
