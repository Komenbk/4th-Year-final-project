<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$id=$_SESSION['id'];
$u_check="select * from users where id='$id'";
$run_user = mysql_query($u_check);
    while($row_pro=mysql_fetch_array($run_user)){
        $pname=$row_pro['fullName'];
        $phone=$row_pro['phone'];
    }
$aid=$_GET['ref'];
$u_check="select * from appointment where appID='$aid'";
$run_user = mysql_query($u_check);
    while($row_pro=mysql_fetch_array($run_user)){
        $specilization=$row_pro['doctorSpecialization'];
		$doctorid=$row_pro['doctorId'];
		$userid=$row_pro['userId'];
		$fees=$row_pro['consultancyFees'];
		$appdate=$row_pro['appointmentDate'];
		$time=$row_pro['appointmentTime'];

		$u_ch="select * from doctors where id='$doctorid'";
		$run_us = mysql_query($u_ch);
	    while($row_pro1=mysql_fetch_array($run_us)){
	        $dname=$row_pro1['doctorName'];
	        $dphone=$row_pro1['contactno'];
	    }

    }
if(isset($_POST['submit_app']))
{
	$query=mysql_query("insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus,appID) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus','$appid')");
	if($query)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
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
									<h1 class="mainTitle">Patient | Appointment Booked Successfully </h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Success</span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
					<div class="sinai-cs-pay">
						<div><img src="assets/images/success.png"></div>
						<table class="table table-striped table-bordered table-hover" style="width: 800px;">
                            <tbody>
                                <tr>
					                <td><strong>DOCTOR'S NAME</strong></td>
						                <td><?php echo "$dname";?></td>
						            </tr>
					            <tr>
					                <td><strong>DOCTORS CONTACTS</strong></td>
					                <td><?php echo "$dphone";?></td>
					            </tr>
					            <tr>
					                <td><strong>DOCTORS DEPARTMENT</strong></td>
					                <td><?php echo "$specilization";?></td>
					            </tr>
					            <tr>
					                <td><strong>FEE PAID</strong></td>
					                <td><?php echo "$fees";?></td>
					            </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped table-bordered table-hover" style="width: 800px;">
                            <tbody>
                                <tr>
					                <td><strong>APPOINTMENT ID</strong></td>
						                <td><?php echo "$aid";?></td>
						            </tr>
					            <tr>
					                <td><strong>APPOINTMENT DATE</strong></td>
					                <td><?php echo "$appdate";?></td>
					            </tr>
					            <tr>
					                <td><strong>APPOINTMENT TIME</strong></td>
					                <td><?php echo "$time";?></td>
					            </tr>
                            </tbody>
                        </table>

                        <dd>Hi <b><?php echo "$pname";?></b>, Thank you for trusting our services. <br>The doctor will be ready to see you on. <?php echo "$appdate";?> at <?php echo "$time";?>. Please avail yourself.</dd>
      

                        <dd><b>Thank You.</b></dd><br>
                        
                        
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
