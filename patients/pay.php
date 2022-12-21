<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$fees=$_GET['cfee'];
$id=$_SESSION['id'];
$u_check="select * from users where id='$id'";
$run_user = mysql_query($u_check);
    while($row_pro=mysql_fetch_array($run_user)){
        $pname=$row_pro['fullName'];
        $phone=$row_pro['phone'];
    }

$specilization=$_GET['spc'];
$doctorid=$_GET['did'];
$userid=$_SESSION['id'];
$fees=$_GET['cfee'];
$appdate=$_GET['appdt'];
$time=$_GET['apptm'];
$userstatus=1;
$docstatus=1;
$appID="SINAI2019$userid$time";
if(isset($_POST['submit_app']))
{
	$query=mysql_query("insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus,appID) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus','$appID')");
	if($query)
	{
		echo "<script>
					window.location='success.php?ref=$appID';
				</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient  | Book Appointment</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<script>
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>	




	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
			
						<?php include('include/header.php');?>
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Patient | Book Appointment</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Book Appointment</span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
					<div class="sinai-cs-pay">
                        <dd>Hi <b><?php echo "$pname";?></b>, thank you for trusting our services. <br>To complete booking this appointment, you will have to pay ksh. <?php echo "$fees";?> consultation fee. To do so, follow the steps below:</dd>
        
                        <dd>1. Click on the <b id="pay">PROCEED TO BOOK</b> button below.</dd>
                        <dd>2. You will be taken to IPAY<i>s</i> payment page. Choose your payment method then click on the <b id="i-pay">PAY NOW</b> button.</dd>
                        <dd>3.) After paying, go back to IPAY<i>s</i> payment page and complete the transaction by clicking on the <b id="complete">COMPLETE</b> button.</dd>

                        <dd><b>Thank You.</b></dd><br>
                        
                        <div class="listings-btn-groups">';
                           <?php 
                           		$oid="test";
                           		$inv="test";
								$ttl=$fees;
								$tel='254724166674';
								$eml='sinai@gmail.com';
                           		include('../ipay.php');
                           ?>
                           <form method="POST" action=""><button name="submit_app" id="submit_app">COMPLETE</button></form>
                        </div>
                    </div>
				
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
	
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
