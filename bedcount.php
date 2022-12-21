<?php
include("functions/db.php");
$bed=0;
$admit=0;
$sql="select * from beds";
$run=mysqli_query($conn,$sql);
while ($row_pro=mysqli_fetch_array($run)) {
	$bed=$row_pro['num'];
}

$sql1="select * from admitted where status='1'";
$run1=mysqli_query($conn,$sql1);
$admit=mysqli_num_rows($run1);

$bed-=$admit;
echo "$bed";
?>