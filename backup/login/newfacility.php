<?php
include('session.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pool Diary</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    <div class="wrapper">
        <?php include "common/sidebar.php" ?>
        <div class="main-panel">
            <?php include('common/nav.php'); ?>
            <div class="content">
                <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">business</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Stacked Form</h4>
                                    <form method="POST" action="facilitypost.php">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Facility Name</label>
                                            <input type="text" class="form-control" name="FacilityName">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Owner's First Name</label>
                                            <input type="text" class="form-control" name="fName">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Owner's Last Name</label>
                                            <input type="text" class="form-control" name="lName">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <input type="text" class="form-control" name="Address">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">City</label>
                                            <input type="text" class="form-control" name="City">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">State</label>
                                            <input type="text" class="form-control" name="State">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Zip Code</label>
                                            <input type="text" class="form-control" name="Zip">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" class="form-control" name="Phone">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pool Size</label>
                                            <input type="text" class="form-control" name="Size">
                                        </div>

                                        <div class="col-md-3 col-md-6 col-sm-3">
                                                    <select class="selectpicker" data-style="btn btn-rose btn-round" title="Select Facility Type" name="FacilityTypeSelect">
                                                        
                                                        <?php
                                                        $con = mysql_connect("localhost","spujet_pooldiary","CAB:pool");
                                                        $db = mysql_select_db("spujet_pooldiary",$con);
                                                        $get=mysql_query("SELECT FacilityTypeID, FacilityType FROM FacilityType order by FacilityType");
                                                            while($row = mysql_fetch_assoc($get))
                                                            {
                                                           ?>
                                                             <option value="<?php echo $row['FacilityTypeID']; ?>"><?php echo $row['FacilityType']; ?></option>
                                                           <?php
                                                            }
                                                           ?>                                                        
                                                    </select>
                                               
                                        </div>
                                        <div>
                                        <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "common/footer.php" ?>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>

</html>