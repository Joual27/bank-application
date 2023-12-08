<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
include '../../../models/distributeur/distributeurClass.php';

if (isset($_GET['id'])) {
    $atmToDelete = $_GET['id'];

    $distributeur = new Distributeur();
    $distributeur->setId($atmToDelete);
    $distributeur->deleteDistributeur();

    // Redirect back to the dashboard after deletion
    header("Location: distributeur.php");
    exit();
} else {
    echo "Invalid request!";
    exit();
}

?>