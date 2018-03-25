<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<?php

	session_start();

	function mytest($input_data) {
		$input_data = trim($input_data);
		$input_data = stripcslashes($input_data);
		$input_data = htmlspecialchars($input_data);
		return $input_data;
	}

	$name = $e_mail = $education = $country = $phone = "";
	$Servername = "localhost";
	$name_err = $e_mail_err = $edu_err = $country_err = $phone_err = "";
	$status = "";
	
	if(empty($_POST['name'])) {
		$name_err = "Name field is required";
	}
	else {
		$name = mytest($_POST['name']);
	}

	if(empty($_POST['e_mail']))
		$e_mail_err = "E-mail field is required";
	else {
		$e_mail = mytest($_POST["e_mail"]);

		if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL))
			$e_mail_err = "Invalid Format";
	}

	if(empty($_POST['education']))
		$edu_err = "Education field is required";
	else {
		$education = mytest($_POST["education"]);
	}

	if(empty($_POST['country']))
		$country_err = "Country field is required";
	else {
		$country = mytest($_POST["country"]);
	}
		
	if(empty($_POST['phone']))
		$phone_err = "Phone field is required";
	else {
		$phone = mytest($_POST["phone"]);

		if(!preg_match("/^[0-9]*$/", $phone))
			$phone_err = "Invalid Format";
	}

	if(empty($_POST['name']) || empty($_POST['e_mail']) || empty($_POST['education']) || empty($_POST['country']) || empty($_POST['phone']) || $phone_err == "Invalid Format" || $e_mail_err == "Invalid Format") {
		$status = "";
	}
	else {
			$con=mysqli_connect($Servername,"root","","userinfo");
	
			if (mysqli_connect_errno())
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();

			$sql="INSERT INTO DATA VALUES(\"$name\",\"$e_mail\",\"$education\",\"$country\",\"$phone\")";

			if ($result=mysqli_query($con,$sql))
			{
			$status = "Submission successfull.";
			mysqli_free_result($result);	
			}

			mysqli_close($con);
		}
	?>
<style type="text/css">
body {
	background-image: url("http://cdn.pcwallart.com/images/light-blue-gradient-wallpaper-3.jpg");
	background-size: 100%;
	/*background-color: rgb(200,220,220);*/
}
</style>

</head>

<body>
	<div style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_5qnAQWPDgFVqcOa6ex7Jvsn_batYp5p7BtAbek2By1hGxCLqpg');background-size: 100%;border-radius: 0px"><br><h1 style="color: rgb(240,240,240); text-indent: 70px">Registration Form</h1><br></div>
	<div class="container-fluid" >
		<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
			<h1 class="text-center" style="color: rgb(65,65,65);"><br>Please Complete Your Details</h1><br><br>

			<div class="form-group text-center">
				<div class="row"><label class="col-md-4 control-label">Name</label>
					<div class="col-md-4 input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class="form-control" type="text" name="name" placeholder="<?php echo $name_err; ?>">
					</div>
				</div><br>
				
				<div class="row">
					<label class="col-md-4 control-label">E-mail</label>
					<div class="col-md-4 input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input class="form-control" type="text" name="e_mail" placeholder="<?php echo $e_mail_err; ?>">
					</div>
				</div><br>

				<div class="row">
					<label class="col-md-4 control-label">Education</label>
					<div class="col-md-4 input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
						<input class="form-control" type="text" name="education" placeholder="<?php echo $edu_err; ?>">
					</div>
				</div><br>

				<div class="row">
					<label class="col-md-4 control-label">Country</label>
					<div class="col-md-4 input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
						<input class="form-control" type="text" name="country" placeholder="<?php echo $country_err; ?>">
					</div>
				</div><br>

				<div class="row">
					<label class="col-md-4 control-label">Contact No.</label>
					<div class="col-md-4 input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						<input class="form-control" type="text" name="phone" placeholder="<?php echo $phone_err; ?>">
					</div>
				</div><br>

				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-success">Submit</button>
					</div><br><br>
					<h3><?php echo $status;?></h3>
				</div>
			</div>
		
		</form>	
  	</div>
</body>

<footer class="container-fluid" style="background-color: black; color: rgb(120,120,120);">
	<div class="pull-right"><h4>DEVELOPED BY KEVAL NAGDA</h4></div>
</footer>
