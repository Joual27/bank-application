<?php
require_once("../config/config.php");
session_start();

$loginIssue = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $username = $_POST["username"];
   $password = $_POST["password"];

   $errorMsg = "";
   $usernameErr = "";
   $pwErr = "";

   if(empty($username) || empty($password)){
    $errorMsg = "Both username and password are required";
   }
   else{
      $username = trim($username);
      $userNameRegex = "/^[a-zA-Z0-9_]+$/";
      $pwRegex = "/^(?=.*[A-Z])(?=.*\d).+$/";

    if(!preg_match($userNameRegex,$username)){
         $usernameErr = "username can contain only Chars or Numbers !";
     }
          
    if(strlen($password) < 8){
            $pwErr = "Password must contain 8 digits at least";
    }
    else if(!preg_match($pwRegex,$password)){
         $pwErr = "pw must contain 1 Upper letter and 1 number !";
    }
     else {
            Redirect("../auth/authentification.php?username=$username&pw=$password");
    }

   }
}

if(isset($_SESSION["authError"])){
    $loginIssue = $_SESSION["authError"];
    unset($_SESSION["authError"]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<section class="bg-gray-200 ">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 `">
          <img class="w-8 h-8 mr-2" src="" alt="logo">
          C.B.M.    
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6"  method="POST">
                  <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Username</label>
                      <input type="text" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter username">
                      <p class="text-white font-semibold"><?php if(!empty($usernameErr)){
                        echo $usernameErr;
                      } ?></p>
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <p class="text-white font-semibold"><?php if(!empty($pwErr)){
                        echo $pwErr;
                      } ?></p>
                    </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="w-full text-gray-800 bg-white  focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-800 block">Sign in</button>
                  <p class="text-white font-semibold">
                  <?php if(!empty($errorMsg)){
                        echo $errorMsg;
                      } ?>
                  </p>
                  <p class="text-white font-semibold">
                  <?php if(!empty($loginIssue)){
                        echo $loginIssue;
                      } ?>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>  

</body>
</html>