<?php
session_start();
include("functions/db.php");

function message(){
	global $conn;
	if(isset($_POST['submit_message'])){
		$name=mysqli_real_escape_string($conn,$_POST['sname']);
		$phone=mysqli_real_escape_string($conn,$_POST['sphone']);
		$subject=mysqli_real_escape_string($conn,$_POST['ssubject']);
		$message=mysqli_real_escape_string($conn,$_POST['smessage']);
		$p_date=date("l . Y/m/d | h:i:sa");

		$sql="insert into message(muser_name,muser_phone,msubject,mcontent,message_date) VALUES('$name','$phone','$subject','$message','$p_date')";
		$run_sql=mysqli_query($conn, $sql);
		if($run_sql){
			echo '<script>alert("Thank You '.$name.', We will contact you shortly with a reply."); window.location="index.php"</script>';
		}

	}
}
function doc_count(){
	global $conn;
	$count=0;
	$get_cats = "select * from doctors";
	$run_cats = mysqli_query($conn, $get_cats);
	$count=mysqli_num_rows($run_cats);
	echo "$count";
}
?>