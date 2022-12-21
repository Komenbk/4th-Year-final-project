<?php

$val = "test"; //assigned iPay Vendor ID... hard code it here.
/*
these values below are picked from the incoming URL and assigned to variables that we
will use in our security check URL
*/
$val1 = $_GET["id"];
$val2 = $_GET["ivm"];
$val3 = $_GET["qwh"];
$val4 = $_GET["afd"];
$val5 = $_GET["poi"];
$val6 = $_GET["uyt"];
$val7 = $_GET["ifd"];
$val8 = $_GET["mc"];

$ipnurl = "https://www.ipayafrica.com/ipn/?vendor=".$val."&id=".$val1."&ivm=".
$val2."&qwh=".$val3."&afd=".$val4."&poi=".$val5."&uyt=".$val6."&ifd=".$val7;
$fp = fopen($ipnurl, "rb");
$status = stream_get_contents($fp, -1, -1);
fclose($fp);
//the value of the parameter “vendor”, in the url being opened above, is your iPay assigned Vendor ID.
//this is the correct iPay status code corresponding to this transaction.
//Use it to validate your incoming transaction(not the one supplied in the incoming url)

//continue your shopping cart update routine code here below....
//then redirect to to the customer notification page here...

include("../functions/db.php");

if ($status=="fe2707etr5s4wq") {
	$st='FAILED';

	$sqltr="update transactions set amount='$val8',status='$st' where referenceNo='$val1'";
	$deltr=mysqli_query($conn,$sqltr);

	echo '<script>window.location=""</script>';


}elseif($status=="aei7p7yrx4ae34"){
	$st='SUCCESS';

	$sqltr="update transactions set amount='$val8',status='$st' where referenceNo='$val1'";
	$deltr=mysqli_query($conn,$sqltr);

	echo '<script>window.location=""</script>';

}elseif($status=="bdi6p2yy76etrs"){
	$st='PENDING';

	$sqltr="update transactions set amount='$val8',status='$st' where referenceNo='$val1'";
	$deltr=mysqli_query($conn,$sqltr);

	echo '<script>window.location=""</script>';

}elseif($status=="cr5i3pgy9867e1"){
	$st='FAILED. USED CODE';

	$sqltr="update transactions set amount='$val8',status='$st' where referenceNo='$val1'";
	$deltr=mysqli_query($conn,$sqltr);

	echo '<script>window.location=""</script>';

}elseif($status=="dtfi4p7yty45wq"){
	$st='LESS AMOUNT';

	$sqltr="update transactions set amount='$val8',status='$st' where referenceNo='$val1'";
	$deltr=mysqli_query($conn,$sqltr);

	echo '<script>window.location=""</script>';

}



?>