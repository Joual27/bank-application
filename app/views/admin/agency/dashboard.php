<?php 
// Include File 

  session_start();
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php';

  require_once("../../../services/agencyService.php");
  require_once("../../../models/Agency.php");
  
  $db = new Database();
  $agencyService = new AgencyService($db);
  $agencies = $agencyService->getAllAgencies();  

//   var_dump($agencies);
  


?>


   <!-- TABLE -->


      <div class="relative overflow-x-auto shadow-md  ml-[185px] top-12 sm:rounded-lg">
        <button id="btnForm" class="font-bold  px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-800 text-gray-200 font-serif ">
            <a href="addAgency.php">+ Add Agency</a>
        </button>

        <p class="text-amber-600 font-semibold"><?php if(!empty($_SESSION["validationMsg"])){
            echo $$_SESSION["validationMsg"];
        } ?></p>
        <table class="w-full text-lg text-left rtl:text-right mt-5 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LONGITITUDE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LATITUDE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EMAIL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PHONE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RUE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        VILLE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        QUARTIER
                    </th>
                    <th scope="col" class="px-6 py-3">
                        BANK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CODE POSTAL
                    </th>
                    <th class="px-6 py-4">
                        ACTIONS
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 
                 foreach($agencies as $agency){
                   
                    echo "
                          <tr>
                          
                                    <th scope='col' class='px-6 py-3'>
                                    $agency->agencyID
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->longitude
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->latitude
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->email
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->phone
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->rue
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->ville
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->quartier
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->bankID
                                </th>
                                <th scope='col' class='px-7 py-3'>
                                    $agency->codePostal
                                </th>
                                <td class='px-6 py-4'>
                                    <a class='bg-gray-400' href='updateAgency.php?agency=$agency->agencyID&adress=$agency->addressID'>EDIT</a>
                                    <a class=bg-red-700  href='deleteAgency.php?agency=$agency->agencyID'>DELETE</a>
                                </td>
                          
                          
                          </tr>
                    ";
                 }
                
                ?>
                             
            </tbody>
        </table>

        
    </div>
      





  



<?php include '../../incfile/footer.php' ?>
