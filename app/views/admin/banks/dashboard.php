<?php 
// Include File 

  session_start();
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php';

  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/BankService.php");


  $db = new Database();
  $bankService= new BankService($db);
  
  $banks = $bankService->getAllBanks();




?>


   <!-- TABLE -->


      <div class="relative overflow-x-auto shadow-md  ml-[185px] top-12 sm:rounded-lg">
        <button id="btnForm" class="font-bold  px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-800 text-gray-200 font-serif ">
            <a href="addBank.php">+ Add Bank</a>
        </button>

        <table class="w-full text-lg text-left rtl:text-right mt-5 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Logo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACTIONS
                    </th>
                    
                    
                </tr>
            </thead>
            <tbody>
            <?php
                    foreach ($banks as $bank) {
                        $imgUrl = "bank-app/public/imgs/uploads/" . $bank->bankLogo;

                        echo "
                            <tr class='text-xs text-center font-semibold uppercase bg-gray-50'>
                                <td scope='col' class='px-6 py-3'>
                                    $bank->bankID
                                </td>
                                <td scope='col' class='px-6 py-3'>
                                    $bank->bankName
                                </td>
                                <td scope='col' class='px-6 py-3 relative'>
                                    <img class='absolute w-[50%] h-[50%] left-[25%] bottom-[25%]' src='http://localhost/$imgUrl' alt='bank logo'>
                                </td>
                            <td scope='col' class='px-6 py-3 flex items-center w-[30%] mx-auto gap-3'>
                                    <a href='deleteBank.php?bank=$bank->bankID' class='flex items-center justify-center bg-rose-500 text-white w-[40px] h-[40px]'>
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                                    <a href='updateBank.php?bank=$bank->bankID' class='flex items-center justify-center bg-green-500 text-white w-[40px] h-[40px]'>
                                        <i class='fa-solid fa-pen'></i>
                                    </a>
                                </td>
                            </tr>
                        ";
                    }
                    ?>

                 
    
            </tbody>
        </table>

        
    </div>
      





  



<?php include '../../incfile/footer.php' ?>
