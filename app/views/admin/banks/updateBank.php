<?php 

include '../../incfile/header.php';

require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/BankService.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/models/Bank.php");


 $errorMsg = "";
 
 $imagesStorer = $_SERVER["DOCUMENT_ROOT"]."/bank-app/public/imgs/uploads/";

 $db = new Database();
 $bankService = new BankService($db);


 if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $id = uniqid();
    $name = $_POST["name"];
    

    if(empty($name) || empty($_FILES["logo"]["name"])){
        $errorMsg = "pls fill both datas";
    }
    else{
        $fileName = basename($_FILES["logo"]["name"]);
        $placement = $imagesStorer.$fileName;
        $fileType = pathinfo($placement,PATHINFO_EXTENSION);

        $allowedTypes = array("jpg","png","jpeg");

        if(in_array($fileType,$allowedTypes)){
           
            if(move_uploaded_file($_FILES["logo"]["tmp_name"],$placement)){
               $updatedBank = new Bank($id,$name,$fileName);
               
               try{
                $bankService->updateBank($updatedBank);
                Redirect("dashboard.php",false);
               }
               catch(PDOException $e){
                die($e->getMessage());
               }
            }
            else{
                $errorMsg = "upload failed . TRY AGAIN !";
            }
        }
        else{
            $errorMsg = "only JPG , JPEG OR PNG are allowed";
        }
    }

 }

else if($_SERVER["REQUEST_METHOD"] == "GET"){
     
    $id = $_GET["bank"];

    $bringBank = "select * from bank where bankID = :bankId";
    $db->query($bringBank);
    $db->bind(":bankId",$id);
    $bankToModify = $db->fetchOne();
   


    $bankName = $bankToModify->bankName;
    $bankLogo = $bankToModify->bankLogo;
     
     

}



      

 



?>


<div id="form" class="duration-700 ">                                               <!-- FORM -->
<form method="POST" action="" enctype="multipart/form-data" class="w-[1300px] relative p-5 font-mono items-center max-w-2xl mx-auto rounded-lg shadow-lg shadow-gray-800/70 drop-shadow-2xl  dark:bg-gray-800 mt-20 " >
    <div class="flex justify-center ">
        <h1 class="text-3xl text-white font-sans text-center">Add Bank</h1>
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
                <input type="text" name="name" id="username" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $bankName ?>" />
                <label for="longitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                
            </div>
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="text"  name="logo" id="email" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $bankLogo ?>" />
                 <input type="file"  name="logo" id="email" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                 <label for="latitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Logo</label>
                
                </div>
          </div>
          
      </div>
        <!-- ========== End to Table USERS ================== -->

    <input type="submit" value="Add Bank" name="addUser" id="submitBtn" class="block mx-auto w-[200px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-blod rounded-lg text-xl  px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 duration-700 dark:focus:ring-blue-800">
   <p class="text-white font-semibold">
   <?php  if(!empty($errorMsg)){
        echo $errorMsg;
    } ?>
   </p>
  
  </form>
</div>  