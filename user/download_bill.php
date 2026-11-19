<?php
include("../Assets/Connection/Connection.php");
session_start();

if (!isset($_POST['booking_id']) || !isset($_SESSION['uid'])) {
    echo "Invalid request.";
    exit;
}

$booking_id = $_POST['booking_id'];
$user_id = $_SESSION['uid'];

$query = "
    SELECT *
    FROM tbl_booking u
    INNER JOIN tbl_slot p ON u.slot_id = p.slot_id
    INNER JOIN tbl_chargertype d ON p.chargertype_id = d.chargertype_id
    INNER JOIN tbl_evstation v ON p.evstation_id = v.evstation_id
    INNER JOIN tbl_user u1 ON u.user_id = u1.user_id
    WHERE u.booking_id = '$booking_id' AND u.user_id = '$user_id' AND u.booking_status = 2
";

$result = $Con->query($query);

if ($result->num_rows == 0) {
    echo "Bill not found or payment is not completed.";
    exit;
}

$data = $result->fetch_assoc();

// Build bill content
$bill = "=========== EV CHARGING BILL ===========\n";
$bill .= "Booking ID      : " . $data['booking_id'] . "\n";
$bill .= "User Name       : " . $data['user_name'] . "\n";
$bill .= "Contact         : " . $data['user_contact'] . "\n";
$bill .= "Vehicle-type    : " . ($data['booking_vehicle'] == 1 ? "4 wheel" : "2 wheel") . "\n";
$bill .= "Vehicle-Number  : " . $data['booking_vehiclenumber'] . "\n";
$bill .= "Station Name    : " . $data['evstation_name'] . "\n";
$bill .= "Station Email   : " . $data['evstation_email'] . "\n";
$bill .= "Charger Type    : " . $data['charger_type'] . "\n";
$bill .= "Slot Time       : " . $data['slot_fromtime'] . " - " . $data['slot_totime'] . "\n";
$bill .= "Booking Date    : " . $data['booking_date'] . "\n";
$bill .= "Payment Date    : " . date("Y-m-d") . "\n";
$bill .= "Units Consumed  : " . $data['booking_unit'] . "\n";
$bill .= "Total Amount    : ₹" . $data['booking_amount'] . "\n";
$bill .= "========================================\n";

// Download headers
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="bill_' . $booking_id . '.txt"');
header('Content-Length: ' . strlen($bill));
echo $bill;
exit;
?>
