<?php

    define("DB_HOST" , 'localhost');
    define("DB_USER" , 'root');
    define("DB_PASS" , '');
    define("DB_NAME" , 'db_bank');

    // Root Application 
    define('APPROOT' , 'http://localhost/bank-app/app');
    define('PUBLICROOT' , 'http://localhost/bank-app/public');
    
   


// Redirect Funtion 
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}



?>