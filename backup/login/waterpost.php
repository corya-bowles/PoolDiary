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
$FreeChlorine=$_POST['fChlorine'];
$CombinedChlorine=$_POST['CChlorine'];
$TotalChlorine=$_POST['TChlorine'];
$PhLevel=$_POST['PhLevel'];
$Alkalinity=$_POST['Alk'];
$CalciumHardness=$_POST['CHardness'];
$CyanuricAcid=$_POST['CAcid'];
$TestDate=date('Y-m-d H:i:s');
$FacilityID=$_POST['TEST'];
$UserID='1';


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

