<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
require_once("include/config.php");
if(!empty($_POST["phone"])) {
	$phone= $_POST["phone"];
	
		$result =mysql_query("SELECT phone FROM users WHERE phone='$phone'");
		$count=mysql_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Phone already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Phone available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
