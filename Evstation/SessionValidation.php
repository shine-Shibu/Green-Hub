<?php
session_start();
if($_SESSION['eid'] == "")
{
header('location:../Guest/Login.php');
}
?>