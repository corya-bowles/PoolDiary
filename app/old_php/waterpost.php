<?php
// Connection parameters to database
$user_name = "spujet_pooldiary";
$password = "CAB:pool";
$database = "spujet_pooldiary";
$server = "localhost";
// Connect
mysql_connect("$server","$user_name","$password");
// Select BD
mysql_select_db("$database");

//Parameters for qry seperated for readability
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


// QRY here
$testData = "INSERT INTO WaterTest 
(WaterTestID, FreeChlorine, CombinedChlorine, TotalChlorine, PhLevel, Alkalinity, CalciumHardness, CyanuricAcid, TestDate, FacilityID, UserID)
VALUES 
(NULL, '".$FreeChlorine."', '".$CombinedChlorine."', '".$TotalChlorine."', '".$PhLevel."', '".$Alkalinity."', '".$CalciumHardness."', '".$CyanuricAcid."', '".$TestDate."', '".$FacilityID."', '".$UserID."')";


$result = mysql_query($testData);

if($result){

    header('Location: landing.php'); // If it works send em back to the landing page

} 
?>

<?php
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