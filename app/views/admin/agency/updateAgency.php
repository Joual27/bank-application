<?php 

include '../../incfile/header.php';

require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
require_once("../../../models/Agency.php");




$db = new Database();
$bringBanks = "select * from bank ";
$db->query($bringBanks);

try{
    $banks = $db->fetchMultipleRows();
}
catch(Exception $e){
    die($e->getMessage());
}

$agencyId = $_GET["agency"];
$adressId = $_GET["adress"];

$db = new Database();
$findAdressQuery = "select * from adress where addressID = :adressId";
$db->query($findAdressQuery);
$db->bind(":adressId",$adressId);
$adressToUpdate = $db->fetchOne();
$agencyService = new AgencyService($db);

$agencyToUpdate = $agencyService->getAgencyById($agencyId);
$bank = $agencyToUpdate->bankID;

// var_dump($adressToUpdate);

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $longitude = $agencyToUpdate->longitude;
    $latitude = $agencyToUpdate->latitude;
   
    $ville = $adressToUpdate->ville;
    $quartier = $adressToUpdate->quartier;
    $rue = $adressToUpdate->rue;
    $codePostal = $adressToUpdate->codePostal;
    $phone = $adressToUpdate->phone;
    $email = $adressToUpdate->email;
  
}


else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $longitude = $_POST["longitude"];
    $latitude = $_POST["latitude"];
    $phone = $_POST["phone"];
    $ville = $_POST["ville"];
    $rue = $_POST["rue"];
    $quartier = $_POST["quartier"];
    $codePostal = $_POST["codePostal"];
    $email = $_POST["email"];


    
    

    $agencyService = new AgencyService($db);
    $agency = new Agency($agencyId,$longitude,$latitude,"45",$adressId);

    $adress = [
        "adressId" => $adressId,
        "ville" => $ville,
        "quartier" => $quartier,
        "rue" => $rue,
        "codePostal" => $codePostal,
        "email" => $email,
        "phone" => $phone,
    ];
    try{
        $agencyService->updateAgency($agency,$adress);
        Redirect("dashboard.php",false);
    }
    catch(PDOException $e){
        die($e->getMessage());
    }
     

}









//   $db = new Database();
//   $agencyService = new AgencyService($db);
//   $adresstoAdd = [
//     "adressId" => $adressId,
//     "ville" => $ville,
//     "quartier" => $quartier,
//     "rue" => $rue,
//     "codePostal" => $codePostal,
//     "email" => $email,
//     "phone" => $phone,
//  ];

//   $agencyToAdd = new Agency($agencyId,$longitude,$latitude,$bank,$adressId);


//   $agencyService->addAgency($agencyToAdd,$adresstoAdd);

   



?>


<div id="form" class="duration-700 ">                                               <!-- FORM -->
<form method="POST" action="" class="w-[1300px] relative p-5 font-mono items-center max-w-2xl mx-auto rounded-lg shadow-lg shadow-gray-800/70 drop-shadow-2xl  dark:bg-gray-800 mt-20 " >
    <div class="flex justify-center ">
        <h1 class="text-3xl text-white font-sans text-center">Update Agencies</h1>
        <div class="absolute flex flex-col right-5">
            <a href="" id="btnCloseform">
            <i class="fa-solid fa-xmark text-white text-2xl font-meduim"></i>
            </a>
        </div>   
    </div>
      <!-- ========== Add to Table USERS ================== -->
      <div class="">
        <!-- Id User -->
    
          
          <div class="flex gap-5 my-5">
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                <input type="text" name="longitude" id="username" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="<?php echo $longitude ?>"/>
                <label for="longitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >Longitude</label>
                
            </div>
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="text" name="latitude" id="email" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $latitude ?>" />
                 <label for="latitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >Latitude</label>
                 

                </div>
          </div>
          <div class="flex gap-5 my-5">
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                  <input type="text" name="phone" id="phone" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $phone ?>"/>
                  <label for="phone" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >Phone</label>
                 

                </div>
               <div class="relative w-[50%] z-0 w-72 mb-5 group">
                  <input type="text" name="ville" id="ville" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $ville ?>"/>
                  <label for="ville" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >Ville</label>
           

                </div>
          </div>
          <div class="flex gap-5 my-5">
                <div class="relative w-[50%] z-0 w-72 mb-5 group">
                  <input type="text" name="rue" id="rue" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $rue ?>"/>
                  <label for="rue" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >Rue</label>
                  

                </div>
              <div class="relative z-0 w-[50%]  mb-5 group">
                <input type="text" name="quartier" id="quartier" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $quartier ?>" />
                <label for="quartier" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quartier</label>
                

            </div>
          </div>
          <div class="flex gap-5 my-3">
              <div class="relative  w-[50%] z-0 w-72 mb-5 group">
                <input type="text" name="codePostal" id="password" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $codePostal ?>" />
                <label for="codePostal" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code Postal</label>
          

            </div>
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="text" name="email" id="confirmePassword" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $email ?>" />
                 <label for="email" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                
                </div>
          </div>

          <div class="flex gap-4">
            <!-- ============ Fetch Role User =========== -->
             


              <div class="w-[33.33%] mb-[1.5rem]">
                  <select id="role" name="bank" class=" w-full block py-2.5 px-0 w-44 text-lg text-gray-900 bg-gray-800 p-2 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                   <!-- <label for="role" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Select Role</label> -->
                
                    <?php
                     $bringBankName = "select * from bank where bankID = '$bank'";
                     $db->query($bringBankName);
                     $bankInfos = $db->fetchOne();
                     

                    echo "<option value='$bankInfos->bankID' readonly>$bankInfos->bankName</option>";
                        
                    
                    ?>
                </select>
              </div>
              
              
          </div>
          </div>
        <!-- ========== End to Table USERS ================== -->

    <input type="submit" value="Add User" name="addUser" id="submitBtn" class="block mx-auto w-[200px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-blod rounded-lg text-xl  px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 duration-700 dark:focus:ring-blue-800">
    <p class="text-white font-semibold"><?php if(!empty($errorMsg)){
      echo $errorMsg;
    }?></p>
  </form>
</div>  