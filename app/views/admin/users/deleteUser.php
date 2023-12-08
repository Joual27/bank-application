<?php
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/config/redirect.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/models/User.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/UserInterface.php");

  $userID = $_GET['id'];

$db = new Database();

$userService = new UserService($db);
$userService->deleteUser($userID);

Redirect('users.php' , false);

?>