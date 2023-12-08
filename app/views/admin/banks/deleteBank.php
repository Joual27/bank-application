<?php


session_start();

require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/BankService.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/models/Bank.php");

$id = $_GET["bank"];

$db = new Database();
$bankService = new BankService($db);

try{
    $bankService->deleteBank($id);
    Redirect("dashboard.php",false);
    
}
catch(PDOException $e){
    die($e->getMessage());
}


?>