<?php 
// Include File 
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php';




?>


   <!-- TABLE -->


      <div class="relative overflow-x-auto shadow-md  ml-[185px] top-12 sm:rounded-lg">
        <button id="btnForm" class="font-bold  px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-800 text-gray-200 font-serif ">
            <a href="userForm.php">+ Add User</a>
        </button>

        <table class="w-full text-lg text-left rtl:text-right mt-5 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        USERNAME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EMAIL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        GENDER
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
                        AGENCY
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ROLE
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
