<?php 

include '../../incfile/header.php';
include '../../incfile/sidebar.php';
require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
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
    
//   // Validation Formulaire User 
//   if (isset($_POST['addUser'])) {
//     if (empty($_POST['username'])) {
//         $errors['userErr'] = "Please Enter your username";
//     }else {
//         $username = $_POST['username'];
//         $pattern = '/^[a-zA-Z0-9_]{3,20}$/';
//         if (!preg_match($pattern, $username)) {
//             $errors['userErr'] = "Please Enter Correct username";
//         }else{
//             $errors['userErr'] = ""; 
//         }
//     }
//     if (empty($_POST['email'])) {
//         $errors['emailErr'] = "Please Enter your email";
//     }else {
//         $email = $_POST['email'];
//         $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
//         if (!preg_match($pattern, $email)) {
//             $errors['emailErr'] = "Please Enter Correct email";
//         }else{
//             $errors['emailErr'] = ""; 
//         }
//     }
//     if (empty($_POST['phone'])) {
//         $errors['phoneErr'] = "Please Enter your Phone";
//     }else {
//         $phone = $_POST['phone'];
//         $pattern = '/^\+212[5-9]\d{8}$/';
//         if (!preg_match($pattern, $phone)) {
//             $errors['phoneErr'] = "Please Enter Correct Phone";
//         }else{
//             $errors['phoneErr'] = ""; 
//         }
//     }
//     if (empty($_POST['ville'])) {
//         $errors['villeErr'] = "Please Enter your Ville";
//     }else {
//         $ville = $_POST['ville'];
//         $pattern = '/^[A-Za-zÀ-ÖØ-öø-ÿ -]+$/u';
//         if (!preg_match($pattern, $ville)) {
//             $errors['villeErr'] = "Please Enter Correct Vile";
//         }else{
//             $errors['villeErr'] = ""; 
//         }
//     }
//     if (empty($_POST['rue'])) {
//         $errors['rueErr'] = "Please Enter your rue";
//     }else {
//         $rue = $_POST['rue'];
//         $pattern = '/^[A-Za-zÀ-ÖØ-öø-ÿ -]+$/u';
//         if (!preg_match($pattern, $rue)) {
//             $errors['rueErr'] = "Please Enter Correct Vile";
//         }else{
//             $errors['rueErr'] = ""; 
//         }
//     }
//     if (empty($_POST['quartier'])) {
//         $errors['quartierErr'] = "Please Enter your Quartier";
//     }else {
//         $quartier = $_POST['quartier'];
//         $pattern = '/^[A-Za-zÀ-ÖØ-öø-ÿ -]+$/u';
//         if (!preg_match($pattern, $quartier)) {
//             $errors['quartierErr'] = "Please Enter Correct Quartier";
//         }else{
//             $errors['quartierErr'] = ""; 
//         }
//     }
//   }

?>


<div id="form" class="duration-700 ">                                               <!-- FORM -->
<form method="POST"  action="distributeur.php" class="w-[1300px] relative p-5 font-mono items-center max-w-2xl mx-auto rounded-lg shadow-lg shadow-gray-800/70 drop-shadow-2xl  dark:bg-gray-800 mt-28 " >
    <div class="flex justify-center ">
        <h1 class="text-3xl text-white font-sans text-center">Add New Distributeur</h1>
        <div class="absolute flex flex-col right-5">
            <a href="" id="btnCloseform">
            <i class="fa-solid fa-xmark text-white text-2xl font-meduim"></i>
            </a>
        </div>   
    </div>
      <!-- ========== Add to Table USERS ================== -->
      <div class="">
        <!-- Id User -->
          <div class="relative z-0 w-full mb-5 group">
           
          <div class="flex gap-5 my-5">
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="text" name="longitude" id="longitude" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                 <label for="longitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LONGTITUDE</label>            
                </div>
                <div class="relative w-[50%] z-0 w-72 mb-5 group">
                    <input type="text" name="latitude" id="latitude" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                    <label for="latitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LATITUDE</label>
                 </div>      
          </div>
          <div class="flex gap-5">
                 <div class="relative w-[50%] z-0 w-72 mb-5 group">
                    <input type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                    <label for="address" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ADDRESS</label>
                </div> 
              <div class="w-[33.33%]">
              <select id="bankId" name="bankId" class="w-[304px] block py-2.5 px-0 text-lg text-gray-900 bg-gray-800 p-2 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                  <option disabled selected value="" class="bg-dark-gray-800">Select Bank</option>
                  <?php
                  $bankQuery = "SELECT bankId, bankName FROM bank";
                  $bankResult = $cnx->query($bankQuery);

                  if ($bankResult->num_rows > 0) {
                      while ($bank = $bankResult->fetch_assoc()) {
                          echo "<option value='{$bank['bankId']}'>{$bank['bankName']}</option>";
                      }
                  }
                  ?>
              </select>
              </div>
              
          </div>
          </div>
        <!-- ========== End to Table USERS ================== -->

    <input type="submit" value="Add Distributeur" name="addDistributeur" id="submitBtn" class="block mx-auto w-[200px] mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-blod rounded-lg text-xl  px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 duration-700 dark:focus:ring-blue-800">
  </form>
</div>  