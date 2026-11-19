<?php
$adminid = "";
$adminname = "";
$adminemail = "";
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_pass'];
    $adminid = $_POST['txt_id'];
    
    $selQry = "SELECT * FROM tbl_admin WHERE admin_email = '" . $email . "'"; // check if email exists
    $res = $Con->query($selQry);
    
    if ($res->num_rows > 0) {
        ?>
        <script>
            alert("This email address is already registered.");
        </script>
        <?php
    } else {
        $insQry = "INSERT INTO tbl_admin(admin_name, admin_email, admin_password) VALUES ('" . $name . "', '" . $email . "', '" . $password . "')";
        if ($Con->query($insQry)) {
            ?>
            <script>
                alert("REGISTRATION SUCCESSFUL");
                window.location = "../Guest/Login.php";
            </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <!--favicon-->
   <link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/x-icon">
    <meta charset="utf-8" />
    <title>Admin Registration</title>
    <link rel="icon" href="../Assets/Template/Main/images/bf.jpg" type="image/jpeg" />
    <style>
        /* Reset */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #121212;
            color: #e0e0e0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
        }

        form {
            background: #1f1f1f;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.7);
            max-width: 600px;
            width: 100%;
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h3 {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 30px;
            color: #90caf9;
            letter-spacing: 1px;
            text-align: center;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
            margin-bottom: 30px;
        }

        table tr {
            background: #2a2a2a;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s ease;
        }

        table tr:hover {
            background-color: #394b61;
        }

        table td {
            padding: 12px 15px;
            font-size: 15px;
            vertical-align: middle;
            color: #e0e0e0;
        }

        table td:first-child {
            width: 30%;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1.8px solid #444;
            font-size: 16px;
            background: #121212;
            color: #e0e0e0;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #90caf9;
            box-shadow: 0 0 8px #90caf9;
        }

        input[type="submit"] {
            background-color: #90caf9;
            color: #121212;
            border: none;
            padding: 14px 0;
            width: 100%;
            font-size: 18px;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(144, 202, 249, 0.6);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #64b5f6;
            box-shadow: 0 8px 20px rgba(100, 181, 246, 0.8);
        }

        table.list {
            margin-top: 20px;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }

        table.list th {
            background-color: #263238;
            color: #90caf9;
            font-weight: 700;
            padding: 12px 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table.list td {
            background-color: #2a2a2a;
            border-bottom: 1px solid #444;
            padding: 12px 15px;
            font-weight: 500;
        }

        /* Zebra striping */
        table.list tr:nth-child(even) td {
            background-color: #212121;
        }

        /* Home button */
        .home-button {
            background: #90caf9;
            color: #121212;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 6px 15px rgba(144, 202, 249, 0.6);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-top: 20px;
            display: inline-block;
        }

        .home-button:hover {
            background-color: #64b5f6;
            box-shadow: 0 8px 20px rgba(100, 181, 246, 0.8);
        }

        /* Responsive */
        @media (max-width: 650px) {
            form {
                padding: 20px 25px;
            }

            table, table.list {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <form id="form1" name="form1" method="post" action="">
        <h3>Admin Registration</h3>
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input name="txt_id" type="hidden" value="<?php echo htmlspecialchars($adminid ?? '') ?>" />
                    <input 
                        type="text" 
                        name="txt_name" 
                        id="txt_name"  
                        minlength="5" 
                        placeholder="Enter full name" 
                        required 
                        title="Name allows only alphabets, spaces and first letter must be capital" 
                        pattern="^[A-Z][a-zA-Z ]*$" 
                        value="<?php echo htmlspecialchars($adminname ?? '') ?>" />
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input 
                        type="email"  
                        name="txt_email" 
                        id="txt_email" 
                        required  
                        value="<?php echo htmlspecialchars($adminemail ?? '') ?>" />
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input 
                        type="password" 
                        name="txt_pass" 
                        id="txt_pass" 
                        required 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                </td>
            </tr>
        </table>
        <a href="../index.php" class="home-button">Home</a>
    </form>
</body>
</html>
