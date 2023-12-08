<?php
    require_once '../repositories/database.php';
    require_once '../config/redirect.php';
        
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
        $sql = "SELECT * FROM roleOfUser WHERE userID = :userID";
        $db->query($sql);
        $db->bind(":userID" , $userID);
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