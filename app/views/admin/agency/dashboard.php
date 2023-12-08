<?php 
// Include File 
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php';

  require_once("../../../services/agencyService.php");
  require_once("../../../models/Agency.php");
  
  $db = new Database();

  $agencyService = new AgencyService($db);

  $agencyModel = new Agency("100",100,100,"gydcyugdw",1,$agencyService);

  $agencyService = $agencyModel->getAgencyService();

  $agencies = $agencyService->getAllAgencies();  



  $agencyX = new Agency("4644",500,500,"aaasss2",'1',$agencyService);

  $agencyService->addAgency($agencyX);

  var_dump($agencies);

  

?>


   <!-- TABLE -->


      <div class="relative overflow-x-auto shadow-md  ml-[185px] top-12 sm:rounded-lg">
        <button id="btnForm" class="font-bold  px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-800 text-gray-200 font-serif ">
            <a href="userForm.php">+ Add Agency</a>
        </button>

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
                </tr>
            </thead>
            <tbody>
                             
            </tbody>
        </table>
    </div>
      





  



<?php include '../../incfile/footer.php' ?>
