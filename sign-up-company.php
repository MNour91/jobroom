<?php
require 'admin/functions/connect.php';


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpkixx.com/html/JOBROOM/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Aug 2022 17:40:51 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>JOBROOM | Social Media Network Template</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
<div class="page-loader" id="page-loader">

  <div class="loader"><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span></div>

</div><!-- page loader -->
<div class="theme-layout">
	
	<div class="authtication bluesh high-opacity">
		<div class="verticle-center">
			<div class="welcome-note">
				<div class="logo"><img src="images/logo.png" alt=""><span>JOBROOM</span></div>
				<h1>Welcome to JOBROOM</h1>
				<p>
					JOBROOM is a one and only plateform for the researcheres, students, and Acdamic people. Every one can join this plateform free and share his ideas and research with seniors and juniours comments and openions. 
				</p>
			</div>
			<div class="bg-image" style="background-image: url(images/resources/login-bg.png)"></div>
		</div>
	</div>
	<div class="auth-login">
		<div class="verticle-center">
			<div class="signup-form">
				<h4><i class="icofont-lock"></i> Singup</h4>
				<form method="post" class="c-form" action="admin/functions/add_company.php">
					<input type="hidden" name="type_user" value="2">
					<div class="row merged-10">
						<div class="col-lg-12"><h4>What type of researcher are you?</h4></div>
						<div class="col-lg-6 col-sm-6 col-md-6">
							<input type="text" name = "name" placeholder="Name" require>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6">
							<input type="text" name = "username" placeholder="Owner Name" require>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6">
							<input type="number" name = "phone" placeholder="phone" require>
						</div>
						
						<div class="col-lg-6 col-sm-6 col-md-6">
							<input type="text" name="email" placeholder="Email@" require>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6">
							<input type="password" name="password" placeholder="Password" require>
						</div>
						
						<div class="col-lg-6 col-sm-6 col-md-6">
							<input type="text"  name="website" placeholder="website" >
							
						</div>
						<div class="col-lg-12">
							<select name="disciplien" require >
                            <option disabled selected>Open this select discipliens</option>
                            <?php  
                            $select = $connect ->query("SELECT * FROM discipliens WHERE discipliens != ''");
                            while($row=$select->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['discipliens']; ?></option>
                            <?php } ?>
                            </select>
                            
						</div>

						<div class="col-lg-12">
                        <br>
							<input type="text" name="address" placeholder="Address" require>
						</div>
						<div class="col-lg-12">
                        <textarea  name="about" placeholder="Company description" require></textarea>
						</div>
						
						<div class="col-lg-12">
							<div class="checkbox">
								<input type="checkbox" id="checkbox" checked>
								<label for="checkbox"><span>I agree the terms of Services and acknowledge the privacy policy</span></label>
							</div>
							<button class="main-btn" type="submit"><i class="icofont-key"></i> Signup</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>
	
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	

</body>	

<!-- Mirrored from wpkixx.com/html/JOBROOM/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Aug 2022 17:40:52 GMT -->
</html>