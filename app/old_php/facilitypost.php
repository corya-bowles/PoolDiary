<?php

$user_name = "spujet_pooldiary";
$password = "CAB:pool";
$database = "spujet_pooldiary";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");

$testData = "INSERT INTO Facility
(FacilityName, OwnerFirstName, OwnerLastName, Address, City, State, Zip, Phone, PoolSize, FacilityTypeID)
VALUES 
('".$_POST['FacilityName']."', '".$_POST['fName']."', '".$_POST['lName']."', '".$_POST['Address']."', '".$_POST['City']."', '".$_POST['State']."', '".$_POST['Zip']."', '".$_POST['Phone']."', '".$_POST['Size']."', '".$_POST['FacilityTypeSelect']."')";


$result = mysql_query($testData);

if($result){

    header('Location: landing.php');

}
?>

