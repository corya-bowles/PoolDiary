  <!doctype html>
  <html lang="en">

<?php
 
//login.php
 
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
require 'common-php/dbconfig.php';
 
 
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['btn-login'])){
    
    //Retrieve the field values from our login form.
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['upass']) ? trim($_POST['upass']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT UserID, Email, PassHash FROM User WHERE Email = :email";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':email', $email);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['PassHash']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['logged_in'] = time();
            $_SESSION['user_email'] = $user['Email'];
            
            //Redirect to our protected page, which we called home.php
            header('Location: landing.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }
    
}
 
?>


  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login - Pool Diary</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
  </head>

  <body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          <a class="navbar-brand" href=" ../">Pool Diary</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">

            <li>
              <a href="../">
                <i class="material-icons">home</i> Home
              </a>
            </li>
            <li class=" active ">
              <a href="login.html">
                <i class="material-icons">fingerprint</i> Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper wrapper-full-page">
      <div class="full-page login-page" filter-color="black" data-image="assets/img/pexels-photo-92070.jpeg">
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                <!--<form method="post" action="login.php">-->
                <form method="post">
                  <div class="card card-login card-hidden">
                    <div class="card-header text-center" data-background-color="blue">
                      <h4 class="card-title">Login</h4>
                    </div>

                    <div class="card-content">
                      <div class="input-group">
                        <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                        <div class="form-group label-floating">
                          <label class="control-label">Email address</label>
                          <input id="name" name="email" type="email" class="form-control">
                        </div>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                        <div class="form-group label-floating">
                          <label class="control-label">Password</label>
                          <input id="password" name="upass" type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="footer text-center">
                      <button name="btn-login" type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Let's go</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include "common/footer.php" ?>
      </div>
    </div>
  </body>
  <!--   Core JS Files   -->
  <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>
  <script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/jquery.validate.min.js"></script>
  <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
  <script src="assets/js/moment.min.js"></script>
  <!--  Charts Plugin -->
  <script src="assets/js/chartist.min.js"></script>
  <!--  Plugin for the Wizard -->
  <script src="assets/js/jquery.bootstrap-wizard.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>
  <!-- DateTimePicker Plugin -->
  <script src="assets/js/bootstrap-datetimepicker.js"></script>
  <!-- Vector Map plugin -->
  <script src="assets/js/jquery-jvectormap.js"></script>
  <!-- Sliders Plugin -->
  <script src="assets/js/nouislider.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <!-- Select Plugin -->
  <script src="assets/js/jquery.select-bootstrap.js"></script>
  <!--  DataTables.net Plugin    -->
  <script src="assets/js/jquery.datatables.js"></script>
  <!-- Sweet Alert 2 plugin -->
  <script src="assets/js/sweetalert2.js"></script>
  <!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin    -->
  <script src="assets/js/fullcalendar.min.js"></script>
  <!-- TagsInput Plugin -->
  <script src="assets/js/jquery.tagsinput.js"></script>
  <!-- Material Dashboard javascript methods -->
  <script src="assets/js/material-dashboard.js"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js"></script>
  <script type="text/javascript">
    $().ready(function() {
      demo.checkFullPageBackgroundImage();

      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700)
    });
  </script>

  </html>