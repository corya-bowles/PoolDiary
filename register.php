<!doctype html>
<html lang="en">

<?php $title = 'Register - PoolDiary' ?>
<?php include "common/head.php" ?>

<body class="signup-page">
	<?php include_once("common/analyticstracking.php") ?>
<?php include "common/nav.php" ?>


<?php
 
//register.php
 
/**
 * Start the session.
 */
session_start();
 
/**
 * Include ircmaxell's password_compat library.
 */
//require 'lib/password.php';
 
/**
 * Include our MySQL connection.
 */
require 'app/common-php/dbconfig.php';
 
 
//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['btn-signup'])){
    
    //Retrieve the field values from our registration form.
    $fname =!empty($_POST['fname']) ? trim($_POST['fname']) : null;
    $lname =!empty($_POST['lname']) ? trim($_POST['lname']) : null;
    $email =!empty($_POST['email']) ? trim($_POST['email']) : null;
    $upass =!empty($_POST['upass']) ? trim($_POST['upass']) : null;
    $ccode =!empty($_POST['ccode']) ? trim($_POST['ccode']) : null;
    
    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
    
    //Now, we need to check if the supplied username already exists.
    
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(Email) AS num FROM User WHERE Email = :Email";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':Email', $email);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($upass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO User (FirstName, LastName, PassHash, Email, CompanyID, CompanyCode) 
    					VALUES (:FirstName, :LastName, :PassHash, :Email, 1 ,:CompanyCode)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':FirstName', $fname);
    $stmt->bindValue(':LastName', $lname);
    $stmt->bindValue(':PassHash', $passwordHash);
    $stmt->bindValue(':Email', $email);
    $stmt->bindValue(':CompanyCode', $ccode);
 
    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
    }
    
}
 
?>


	<!-- 	<div class="page-header" style="background-image: url('login/assets/img/pexels-photo-92070.jpeg'); background-size: cover; background-position: top center;"> -->
	<div class="page-header header-filter" filter-color="blue" style="background-image: url('login/assets/img/pexels-photo-92070.jpeg'); background-size: cover; background-position: top center;">
 		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">

					<div class="card card-signup">
						<h2 class="card-title text-center">Register</h2>
						<div class="row">
							<div class="col-md-5 col-md-offset-1">
								<div class="info info-horizontal">
									<div class="icon icon-rose">
										<i class="material-icons">grade</i>
									</div>
								
                      
									<div class="description">
										<h4 class="info-title">Revolutionary</h4>
										<p class="description">

											Technology and design come together to offer you the best possible tools for your company.
										</p>
									</div>
								</div>

								<div class="info info-horizontal">
									<div class="icon icon-success">
										<i class="material-icons">payment</i>
									</div>
									<div class="description">
										<h4 class="info-title">Free for Individuals</h4>
										<p class="description">
											We want great technology to be accessible, that is why PoolDiary is free for individuals.
										</p>
									</div>
								</div>

								<div class="info info-horizontal">
									<div class="icon icon-info">
										<i class="material-icons">group</i>
									</div>
									<div class="description">
										<h4 class="info-title">Feature Forward</h4>
										<p class="description">
											PoolDiary is launching with great features and we have many more in development. Stay tuned on our blog!
										</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-5 ">
							<form class="form" method="post">

								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
										<input type="text" name ="fname" class="form-control" placeholder="First Name...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
										<input type="text" name ="lname" class="form-control" placeholder="Last Name...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
												<i class="material-icons">email</i>
											</span>
										<input type="text" name ="email" class="form-control" placeholder="Email...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
										<input type="password" name ="upass" placeholder="Password..." class="form-control" />
									</div>

									<!-- <div class="input-group">
										<span class="input-group-addon">
												<i class="material-icons">business</i>
											</span>
										<input type="text" name ="ccode" class="form-control" placeholder="Company Code...">
									</div> -->

									<!-- If you want to add a checkbox to this form, uncomment this code -->

									<div class="checkbox">
										<label>
												<input type="checkbox" name="optionsCheckboxes" checked>
												I agree to the <a href="#something">terms and conditions</a>.
											</label>
									</div>
								</div>
								<div class="footer text-center">
									<!--<a href="#pablo" class="btn btn-info btn-round">Get Started</a>-->
									<button name="btn-signup" type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<!-- 	            <nav class="pull-left">
					<ul>
						<li>
							<a href="http://www.creative-tim.com">
								Creative Tim
							</a>
						</li>
						<li>
							<a href="http://presentation.creative-tim.com">
							   About Us
							</a>
						</li>
						<li>
							<a href="http://blog.creative-tim.com">
							   Blog
							</a>
						</li>
						<li>
							<a href="http://www.creative-tim.com/license">
								Licenses
							</a>
						</li>
					</ul>
	            </nav> -->
			<div class="copyright pull-right" style="color:#3C4858">
				&copy;
				<script>
					document.write(new Date().getFullYear())
				</script>, made with <i class="fa fa-heart heart"></i> by PoolDiary
			</div>
		</div>
	</footer>

	</div>


</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!--	Plugin for Select Form control, full documentation here: https://github.com/FezVrasta/dropdown.js -->
<script src="../assets/js/jquery.dropdown.js" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="../assets/js/jquery.tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>

<!-- Plugin For Google Maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="../assets/js/material-kit.js" type="text/javascript"></script>

</html>