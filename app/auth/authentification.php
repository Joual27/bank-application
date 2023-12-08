<?php
    require_once '../repositories/database.php';
        
    session_start();

    $username = $_GET['username'];
    $password = $_GET['pw'];

    
    
    $db = new Database();
    $sql = "SELECT * FROM users WHERE username = :user and userPass = :userPass";
    $db = new Database();
    $db->query($sql);
    $db->bind(":user" , $username);
    $db->bind(":userPass" , $password);
 
    try {
        $row = $db->fetchOne();
        // print_r($row);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    if (!$row) {
        $_SESSION["authError"] = "Invalid credentials . TRY AGAIN !";
        Redirect(APPROOT . '/views/login.php' , false);
    }else {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        
        $userID = $row->userID;  
        var_dump($userID); 
        $sql = "SELECT * FROM roleOfUser WHERE userID = $userID";

        $db->query($sql);
        try {
            $roleOfuser = $db->fetchOne();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        if ($roleOfuser->roleName === 'client') { 
            $_SESSION['roleUser'] = $roleOfuser->roleName;
            Redirect(APPROOT .'/views/client/index.php' , false);
        }else {
            $_SESSION['roleUser'] = $roleOfuser->roleName;
            Redirect(APPROOT . '/views/admin/index.php' , false);

           
        }
        
    }

?>