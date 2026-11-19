<?php
include("../Connection/Connection.php");

$chargertype_id = $_GET['did'];
$evstation_id = $_GET['ei'];
$booking_date = $_GET['date'];

if (empty($chargertype_id) || empty($evstation_id) || empty($booking_date)) {
    echo "<option value=''>--Invalid Input--</option>";
    exit();
}

$selSlotQry = "SELECT * FROM tbl_slot WHERE chargertype_id = '" . $chargertype_id . "' AND evstation_id = '" . $evstation_id . "'";
$result_slots = $Con->query($selSlotQry);

$options = "<option value=''>--Select Slot--</option>";

while ($slot_data = $result_slots->fetch_assoc()) {
    $slot_id = $slot_data['slot_id'];
    
    $countBookingQry = "SELECT count(booking_id) as booking_count FROM tbl_booking WHERE slot_id = '" . $slot_id . "' AND booking_todate = '" . $booking_date . "'";
    $result_bookings = $Con->query($countBookingQry)->fetch_assoc();
    $booked_count = $result_bookings['booking_count'];

    $slot_capacity = !empty($slot_data['slot_count']) && is_numeric($slot_data['slot_count']) ? (int)$slot_data['slot_count'] : 1;
    
    $from_time = $slot_data['slot_fromtime'];
    $to_time = $slot_data['slot_totime'];

    if ($booked_count >= $slot_capacity) {
        $options .= "<option value='" . $slot_id . "' disabled class='disabled-option'>" . $from_time . " - " . $to_time . " (Full)</option>";
    } else {
        $options .= "<option value='" . $slot_id . "'>" . $from_time . " - " . $to_time . "</option>";
    }
}

echo $options;
?>