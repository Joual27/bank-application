<?php     
        require_once '../../config/config.php';
        session_start();
    
        if ($_SESSION['roleUser'] != 'client') {
            Redirect('../admin/index.php');
        }
?>

