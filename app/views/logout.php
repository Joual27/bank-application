<?php   

    session_start();
    session_unset();
    session_destroy();
    require_once("../config/redirect.php");
    require_once("../config/config.php");


    Redirect(PUBLICROOT . "/index.php");

?>
