<?php
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit']))
{ 
  $photo=$_FILES['file_photo']['name'];
  $path=$_FILES['file_photo']['tmp_name'];
  move_uploaded_file($path,'../Assets/Files/User/photo/'.$photo);
  $username = $_POST['txt_name'];
  $useremail = $_POST['txt_email'];
  $usercontact = $_POST['txt_contact'];
  $useraddres = $_POST['txt_address'];
  $userpassword = $_POST['txt_password'];
  $selQry = "SELECT * FROM tbl_user WHERE user_email = '" .$useremail . "'";
        $res = $Con->query($selQry);
        if ($res->num_rows > 0)#default to check the num 
          {
             ?>
            <script>
                alert("This email address is already registered.");
            </script>
        <?php
        }

else{
  $insQry = "insert into tbl_user(user_name,user_email,user_contact,user_address,user_photo,user_password)
  values('".$username."','".$useremail."','".$usercontact."','".$useraddres."','".$photo."','".$userpassword."')";
if($Con->query($insQry))
    {
      ?>
       <script>
       alert("Registration Successfull");
        window.location="Login.php";
      </script>
        <?php
    }
}} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Registration</title>
  <link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/gif " />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #f5f7fa;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .container {
  display: flex;
  background-color: #ffffff;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  max-width: 1000px;  /* Increased width */
  width: 95%;
  height: 700px;       /* Increased height */
}


  .lottie-container {
    flex: 1;
    background-color: #eafaf1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }

  .form-container {
    flex: 1;
    padding: 25px 20px;
    overflow-y: auto;
  }

  h2 {
    text-align: center;
    color: #0c9947;
    margin-bottom: 15px;
    font-size: 22px;
  }

  form label {
    display: block;
    margin-bottom: 4px;
    font-weight: 500;
    color: #333;
    font-size: 14px;
  }

  form input,
  form select,
  form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
  }

  textarea {
    resize: vertical;
  }

  input[type="submit"] {
    background-color: #0c9947;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 6px;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #0a7e3c;
  }

  @media screen and (max-width: 768px) {
    .container {
      flex-direction: column;
      height: auto;
    }

    .lottie-container {
      display: none;
    }
  }
  .nav-button {
  display: inline-block;
  background-color: #0c9947;
  color: white;
  padding: 10px 18px;
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
    <div class="lottie-container">
      <lottie-player src="../Assets/Template/EV.json" background="transparent" speed="1" style="width: 100%; height: 400px;" loop autoplay></lottie-player>
    </div>

    <div class="form-container">
      <h2>User Registration</h2>
      <form enctype="multipart/form-data" method="post">
        <label for="txt_name">Full Name</label>
        <input type="text" name="txt_name" id="txt_name" placeholder="Enter Your Name " required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name must start with a capital letter and contain only letters/spaces" />

        <label for="txt_email">Email</label>
        <input type="email" name="txt_email" id="txt_email"  placeholder="Enter The Email" required />

        <label for="txt_contact">Contact</label>
        <input type="text" name="txt_contact" id="txt_contact" maxlength="10" required pattern="[6-9]{1}[0-9]{9}" title="Valid Indian number starting with 6-9" placeholder="Phone-Number"/>

        <label for="txt_address">Address</label>
        <textarea name="txt_address" id="txt_address" rows="3" placeholder="Enter The Address"required ></textarea>

        <label for="file_photo">Upload Photo</label>
        <input type="file" name="file_photo" id="file_photo" required accept="image/*" />

        <label for="txt_password">Password</label>
        <input type="password" name="txt_password" id="txt_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must include uppercase, lowercase, number, and at least 8 characters"placeholder="Enter Strong Password" />

        <input type="submit" name="btn_submit" value="Register Now" />
      </form>
    <div style="text-align: center; margin-top: 20px;">
  <a href="../index.php" class="nav-button">Home</a>
  <a href="../Guest/Login.php" class="nav-button">Login</a>
</div>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.4/lottie.min.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <script src="../Assets/JQ/jQuery.js"></script>
  
</body>
</html>
