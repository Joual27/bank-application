<?php


session_start();

require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
require_once("../../../models/Agency.php");

$id = $_GET["agency"];

$db = new Database();
$agencyService = new AgencyService($db);

try{
    $agencyService->deleteAgency($id);
    Redirect("dashboard.php",false);
    $_SESSION["validationMsg"] = "Agency and its adress deleted successfully";
    
}
catch(PDOException $e){
    die($e->getMessage());
}


?>