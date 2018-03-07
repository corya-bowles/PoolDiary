<?php
session_start();
/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    
    header('Location: index.php');
    exit;
}

if(isset($_POST['submit'])){
    
$FreeChlorine       = $_POST['fChlorine'];
$CombinedChlorine   = $_POST['CChlorine'];
$TotalChlorine      = $_POST['TChlorine'];
$PhLevel            = $_POST['PhLevel'];
$Alkalinity         = $_POST['Alk'];
$CalciumHardness    = $_POST['CHardness'];
$CyanuricAcid       = $_POST['CAcid'];
$TestDate           = date('Y-m-d H:i:s');
$FacilityID         = $_POST['TEST'];
$UserID             = $_SESSION['user_id'];

    
require 'common-php/dbconfig.php';

$sql = "INSERT INTO WaterTest 
(FreeChlorine, CombinedChlorine, TotalChlorine, PhLevel, Alkalinity, CalciumHardness, CyanuricAcid, TestDate, FacilityID, UserID)
VALUES 
(:FreeChlorine,:CombinedChlorine,:TotalChlorine,:PhLevel,:Alkalinity,:CalciumHardness,:CyanuricAcid,:TestDate,:FacilityID,:UserID)"; 

$stmt= $pdo->prepare($sql);

    $stmt->bindValue(':FreeChlorine', $FreeChlorine);
    $stmt->bindValue(':CombinedChlorine', $CombinedChlorine);
    $stmt->bindValue(':TotalChlorine', $TotalChlorine);
    $stmt->bindValue(':PhLevel', $PhLevel);
    $stmt->bindValue(':Alkalinity', $Alkalinity);
    $stmt->bindValue(':CalciumHardness', $CalciumHardness);
    $stmt->bindValue(':CyanuricAcid', $CyanuricAcid);
    $stmt->bindValue(':TestDate', $TestDate);
    $stmt->bindValue(':FacilityID', $FacilityID);
    $stmt->bindValue(':UserID', $UserID);
    
    $result = $stmt->execute();

    if(!$result){

   // header('Location: landing.php');
    echo 'Thank you for registering with our website.';
    echo "\nPDO::errorInfo():\n";
    print_r($dbh->errorInfo());

}
    else header('Location: landing.php');
    
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pool Diary</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
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
                        <div class="col-md-12">
                            <div class="card">
                                <form method="post" class="form-horizontal">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">Add a New Water Test</h4>
                                    </div>
                                    <div class="card-content">
                                        
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Chlorine</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" class="form-control" placeholder="Free Chlorine" name="fChlorine">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" class="form-control" placeholder="Combined Chlorine" name="CChlorine">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" class="form-control" placeholder="Total Chlorine" name="TChlorine">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">pH Level</label>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="pH Level" name="PhLevel">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left">Alkalinity</label>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Alkalinity" name="Alk">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Calcium Hardness</label>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Calcium Hardness" name="CHardness">
                                                </div>
                                            </div>
                                             <label class="col-sm-2 label-on-left">Cyanuric Acid</label>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Cyanuric Acid" name="CAcid">
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-md-6 col-sm-3">
                                                    <select class="selectpicker" data-style="btn btn-rose btn-round" title="Select Facility" name="TEST">
                                                        
                                                        <?php
                                                        require 'common-php/dbconfig.php';
                                                        
                                                        $sql = "SELECT FacilityID, FacilityName FROM Facility order by FacilityName";
                                            
                                                        $stmt = $pdo->prepare($sql);

                                                        $stmt->execute();
                                            
                                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                                            {
                                                           ?>
                                                             <option value="<?php echo $row['FacilityID']; ?>"><?php echo $row['FacilityName']; ?></option>
                                                           <?php
                                                            }
                                                           ?>                                                        
                                                    </select>
                                               
                                                </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-fill btn-rose">Submit</button>
                                    </div>

                                </form>
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
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>