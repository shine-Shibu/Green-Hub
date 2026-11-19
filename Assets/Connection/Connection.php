<?php
$Server="localhost";
$USer="root";
$Password="";
$Db="db_greenhub";
$Con=mysqli_connect($Server,$USer,$Password,$Db);
if(!$Con)
{
	echo"connetion error";
}
?>




