<?php 

include '../../incfile/header.php';
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/config/redirect.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/models/User.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/UserInterface.php");

$addresID = uniqid();
$agencyID = uniqid();
$userID = uniqid();
$errors = [
    'userErr' => '',
    'emailErr' => '',
    'phoneErr' => '',
    'villeErr' => '',
    'rueErr' => '',
    'quartierErr' => '',
    'passErr' => '',
    'confirmPassErr' => '',
    'roleErr' => '',
    'agencyErr' => '',
    'codePostalErr' => ''
  ];

    
  // Validation Formulaire User 
  if (isset($_POST['addUser'])) {
    $data = [
      'username' => $_POST['username'],
      'password' => $_POST['password'],
      'email' => $_POST['email'],
      'phone' => $_POST['phone'],
      'quart' => $_POST['quart'],
      'ville' => $_POST['ville'],
      'rue' => $_POST['rue'],
      'userID' => $userID,
      'adressID' => $addresID,
      'agencyID' => $_POST['agency'],
      'roleName' => $_POST['role'],
      'codePostal' => $_POST['CodePostal']
    ];




    if (empty($data['username'])) {
        $errors['userErr'] = "Please Enter your username";
    }else {
        $username = $data['username'];
        $pattern = '/^[a-zA-Z0-9_]{3,20}$/';
        if (!preg_match($pattern, $username)) {
            $errors['userErr'] = "Please Enter Correct username";
        }else{
            $errors['userErr'] = ""; 
        }
    }
    if (empty($data['email'])) {
        $errors['emailErr'] = "Please Enter your email";
    }else {
        $email = $data['email'];
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (!preg_match($pattern, $email)) {
            $errors['emailErr'] = "Please Enter Correct email";
        }else{
            $errors['emailErr'] = ""; 
        }
    }
    if (empty($data['phone'])) {
        $errors['phoneErr'] = "Please Enter your Phone";
    }else {
        $phone = $data['phone'];
        $pattern = '/^\+212[5-9]\d{8}$/';
        if (!preg_match($pattern, $phone)) {
            $errors['phoneErr'] = "Please Enter Correct Phone";
        }else{
            $errors['phoneErr'] = ""; 
        }
    }
    if (empty($data['ville'])) {
        $errors['villeErr'] = "Please Enter your Ville";
    }else {
        $ville = $data['ville'];
        $pattern = '/^[A-Za-zÀ-ÖØ-öø-ÿ -]+$/u';
        if (!preg_match($pattern, $ville)) {
            $errors['villeErr'] = "Please Enter Correct Vile";
        }else{
            $errors['villeErr'] = ""; 
        }
    }
    if (empty($data['rue'])) {
        $errors['rueErr'] = "Please Enter your rue";
    }else {
        $rue = $data['rue'];
        $pattern = '/^[A-Za-zÀ-ÖØ-öø-ÿ -]+$/u';
        if (!preg_match($pattern, $rue)) {
            $errors['rueErr'] = "Please Enter Correct Vile";
        }else{
            $errors['rueErr'] = ""; 
        }
    }
    if (empty($data['quart'])) {
        $errors['quartierErr'] = "Please Enter your Quartier";
    }else {
      $errors['quartierErr'] = "";

    }
    if (empty($data['password'])) {
        $errors['passErr'] = "Please Enter your password";
    }else {
        $password = $data['password'];
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+[\]{}|;:\'",.<>?\/]).{8,}$/';
        if (!preg_match($pattern, $password)) {
            $errors['passErr'] = "Please Enter Correct password";
        }else{
            $errors['passErr'] = ""; 
        }
    }if ($_POST['password'] !== $_POST['confirmePassword'] ) {
        $errors['confirmPassErr'] = "Please Enter the same password";
    }else {
  $errors['confirmPassErr'] = "";
    }if (empty($data['roleName'])) {
      $errors['roleErr'] = "Please Enter Role";
    }else {
      $errors['roleErr'] = "";

    }
    if (empty($errors['userErr']) && empty($errors['emailErr']) && empty($errors['phoneErr']) 
    && empty($errors['villeErr']) && empty($errors['rueErr']) && empty($errors['quartierErr']) && empty($errors['passErr']) && empty($errors['confirmPassErr']) && empty($errors['roleErr'])
    && empty($errors['agencyErr']) && empty($errors['codePostalErr'])) {
      
    $db = new Database();

    $userService = new UserService($db);
    $newUser = new User($data['userID'] , $data['adressID'] , $data['agencyID'] , $data['username'] , $data['password'] , $data['email'] , $data['phone'] , $data['ville'] , $data['rue'] , $data['quart'] , $data['codePostal'] , $data['roleName']);

      try {
        $userService->addUser($newUser);
        echo "Added Succefully";
        Redirect('users.php', false);
      } catch (PDOException $e) {
        die("Not Added " . $e->getMessage());
      }
    }

}











?>


<div id="form" class="duration-700 ">                                               <!-- FORM -->
<form method="POST"  action="<?= $_SERVER['PHP_SELF'] ?>" class="w-[1300px] relative p-5 font-mono items-center max-w-2xl mx-auto rounded-lg shadow-lg shadow-gray-800/70 drop-shadow-2xl  dark:bg-gray-800 mt-20 " >
    <div class="flex justify-center ">
        <h1 class="text-3xl text-white font-sans text-center">Add New User</h1>
        <div class="absolute flex flex-col right-5">
            <a href="" id="btnCloseform">
            <i class="fa-solid fa-xmark text-white text-2xl font-meduim"></i>
            </a>
        </div>   
    </div>
      <!-- ========== Add to Table USERS ================== -->
      <div class="">

          <div class="flex gap-5 my-5">
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                <input type="text" name="username"  class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                <label for="username" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                <span class="text-lg font-semibold text-rose-500"><?= $errors['userErr'] ?></span>
            </div>
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="text" name="email" id="email" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                 <label for="email" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                 <span class="text-lg font-semibold text-rose-500"><?= $errors['emailErr'] ?></span>

                </div>
          </div>
          <div class="flex gap-5 my-5">
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                  <input type="text" name="phone" id="phone" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="phone" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
                    <span class="text-lg font-semibold text-rose-500"><?= $errors['phoneErr'] ?></span>

                </div>
               <div class="relative w-[50%] z-0 w-72 mb-5 group">
                  <input type="text" name="ville" id="ville" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="ville" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ville</label>
                  <span class="text-lg font-semibold text-rose-500"><?= $errors['villeErr'] ?></span>

                </div>
          </div>
          <div class="flex gap-5 my-5">
                <div class="relative w-[50%] z-0 w-72 mb-5 group">
                  <input type="text" name="rue" id="rue" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                  <label for="rue" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rue</label>
                  <span class="text-lg font-semibold text-rose-500"><?= $errors['rueErr'] ?></span>

                </div>
              <div class="relative z-0 w-[50%]  mb-5 group">
                <input type="text" name="quart" id="quartier" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                <label for="quartier" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quartier</label>
                <span class="text-lg font-semibold text-rose-500"><?= $errors['quartierErr'] ?></span>

            </div>
          </div>
          <div class="flex gap-5 my-3">
              <div class="relative  w-[50%] z-0 w-72 mb-5 group">
                <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                <label for="password" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                <span class="text-lg font-semibold text-rose-500"><?= $errors['passErr'] ?></span>

            </div>
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="password" name="confirmePassword" id="confirmePassword" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                 <label for="confirmePassword" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirme Password</label>
                 <span class="text-lg font-semibold text-rose-500"><?= $errors['confirmPassErr'] ?></span>
                </div>
          </div>

          <div class="flex gap-4">
            <!-- ============ Fetch Role User =========== -->
                <?php 
                    
                
                
                
                ?>




              <div class="w-[33.33%]">
                  <select id="role" name="role" class=" w-full block py-2.5 px-0 w-44 text-lg text-gray-900 bg-gray-800 p-2 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                   <label for="role" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Select Role</label>
                    <option disabled selected value=""  class="bg-dark-gray-800">Select Role</option>
                    <option  class="bg-dark-gray-800">admin</option>
                    <option  class="bg-dark-gray-800">sub_admin</option>
                    <option  class="bg-dark-gray-800">client</option>
                </select>
                <span class="text-lg font-semibold text-rose-500"><?= $errors['roleErr'] ?></span>
              </div>
              <div class="w-[33.33%]">
                  <select id="agency" name="agency" class=" w-full block py-2.5 px-0 w-44 text-lg text-gray-900 bg-gray-800 p-2 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                   <!-- <label for="role" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Select Role</label> -->
                    <option disabled selected  class="bg-dark-gray-800">Select Agency</option>
                    <option  class="bg-dark-gray-800" value="1">center ville</option>
                </select>
              </div>
              <div class="relative z-0 w-44 mb-5 group w-[33.33%]">
                <input type="text" name="CodePostal" id="CodePostal" class="w-full block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                <label for="CodePostal" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code Postal</label>
            </div>
          </div>
          </div>
        <!-- ========== End to Table USERS ================== -->

    <input type="submit" value="Add User" name="addUser" id="submitBtn" class="block mx-auto w-[200px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-blod rounded-lg text-xl  px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 duration-700 dark:focus:ring-blue-800">
  </form>
</div>  