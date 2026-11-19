<?php
include("../Assets/Connection/Connection.php");
include("Header.php");

if (isset($_SESSION['uid'])) {
    $user_id = $_SESSION['uid'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Feedback</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .container13 {
            max-width: 900px;
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
    </style>
</head>
<body>

<div class="container13">
    <h1>User Feedback</h1>

    <table>
        <thead>
            <tr>
                <th>SI-No</th>
                <th>User Name</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $p = 0;
            $selQry = "SELECT * FROM tbl_feedback f INNER JOIN tbl_user u ON f.user_id = u.user_id";
            $row = $Con->query($selQry);
            while ($data = $row->fetch_assoc()) {
                $p++;
                ?>
                <tr>
                    <td><?php echo $p; ?></td>
                    <td><?php echo htmlspecialchars($data['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($data['feedback_content']); ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php include("Footer.php"); ?>
