<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
include '../../../models/account/account.php';

if (isset($_GET['id'])) {
    $accountIdToDelete = $_GET['id'];

    $account = new Account();
    $account->setAccountId($accountIdToDelete);
    $account->deleteAccount();

    // Redirect back to the dashboard after deletion
    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid request!";
    exit();
}

?>