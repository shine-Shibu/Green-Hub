<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
$chargerid = "";
$chargername = "";
if (isset($_POST['btn_submit'])) {
    $chargerid = $_POST['txt_id'];
    $chargername = $_POST['txt_name'];

    if ($chargerid == "") {
        $insQry = "insert into tbl_chargertype(charger_type) values('" . $chargername . "')";
        if ($Con->query($insQry)) {
            echo "<script>alert('CHARGER-TYPE INSERTED'); window.location='Chargertype.php';</script>";
        }
    } else {
        $upQry = "update tbl_chargertype set charger_type='" . $chargername . "' where chargertype_id='" . $chargerid . "'";
        if ($Con->query($upQry)) {
            echo "<script>alert('Updated'); window.location='Chargertype.php';</script>";
        }
    }
}

if (isset($_GET["Did"])) {
    $deleteId = $_GET["Did"];
    $delQry = "delete from tbl_chargertype where chargertype_id='" . $deleteId . "'";
    if ($Con->query($delQry)) {
        echo "<script>alert('Deleted'); window.location='Chargertype.php';</script>";
    }
}

if (isset($_GET["ed"])) {
    $selQry = "select * from tbl_chargertype where chargertype_id='" . $_GET["ed"] . "'";
    $row = $Con->query($selQry);
    $data = $row->fetch_assoc();
    $chargerid = $data['chargertype_id'];
    $chargername = $data['charger_type'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Charger Type</title>
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

        input[type="text"] {
            width: 100%;
            padding: 0.6rem 1rem;
            border: 1.8px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
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
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            background-color: #6d6e70ff;
            color: white;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <h1>Charger Type</h1>
    <form method="post" action="">
        <input type="hidden" name="txt_id" value="<?php echo $chargerid; ?>"/>

        <div class="form-group">
            <label for="txt_name">Charger Type</label>
            <input type="text" name="txt_name" id="txt_name" placeholder="Enter charger type" value="<?php echo $chargername; ?>" required/>
        </div>

        <div class="form-actions">
            <input type="submit" name="btn_submit" value="Submit"/>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>Sl-No</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $s = 0;
            $selQry = "SELECT * FROM tbl_chargertype";
            $row = $Con->query($selQry);
            while ($data = $row->fetch_assoc()) {
                $s++;
                ?>
                <tr>
                    <td><?php echo $s ?></td>
                    <td><?php echo htmlspecialchars($data['charger_type']); ?></td>
                    <td class="actions">
                        <a href="Chargertype.php?ed=<?php echo $data['chargertype_id'] ?>" class="edit">Edit</a>
                        <a href="Chargertype.php?Did=<?php echo $data['chargertype_id'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this charger type?');">Delete</a>
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