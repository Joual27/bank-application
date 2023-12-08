<?php 
// Include File 
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php';
  include '../../incfile/navbar.php';
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/config/redirect.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/models/User.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/UserInterface.php");


  $db = new Database();
  $userService = new UserService($db);
  $fetchUsers = $userService->getAllUsers();

?>


   <!-- TABLE -->




       <div class="relative overflow-x-auto shadow-md  px-10  sm:rounded-lg">
        <button id="btnForm" class="font-medium text-xl text-white  w-[180px] py-3 mb-10 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-800 text-gray-200  ">
            <a href="addUser.php">Add New User</a>
        </button>
        
            <table id="myTable" class="dataTable">
            <thead class="my-10">
                <tr class="bg-gray-800 text-white">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Ville</th>
                    <th>Quartier</th>
                    <th>Rue</th>
                    <th>Code Postal</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-black p-3">
                    <?php foreach($fetchUsers as $user) { ?>
                    <td><?= $user->userID ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->ville ?></td>
                    <td><?= $user->quartier ?></td>
                    <td><?= $user->rue ?></td>
                    <td><?= $user->codePostal ?></td>
                    <td><?= $user->email ?></td>

                    <td class="px-6 py-3 flex items-center gap-3">
                        <a href="deleteUser.php?id=<?= $user->userID ?>" class="flex items-center justify-center bg-slate-800 text-white w-[40px] h-[40px]">
                             <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="updateUser.php?id=<?= $user->userID ?>" class="flex items-center justify-center bg-slate-800 text-white w-[40px] h-[40px]">
                        <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="<?= APPROOT?>/views/admin/accounts/AccountUser.php?id=<?= $user->userID ?>" class="flex items-center justify-center bg-slate-800 text-white w-[40px] h-[40px]">
                        <i class="fa-solid fa-display"></i>
                        </a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
        </main>





      </div>





        <!-- <table class="" id="myTable">
            <thead class="">
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
                        CODE POSTAL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACTIONS
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fetchUsers as $user) { ?>
                    <tr>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->userID ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->username ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->email ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->phone ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->rue ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->ville ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->quartier ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $user->codePostal ?>
                    </th>
                    <th scope="col" class="px-6 py-3 flex items-center gap-3" >
                        <a href="deleteUser.php?id=<?= $user->userID ?>" class="flex items-center justify-center bg-rose-500 text-white w-[40px] h-[40px]">
                             <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="updateUser.php?id=<?= $user->userID ?>" class="flex items-center justify-center bg-green-500 text-white w-[40px] h-[40px]">
                        <i class="fa-solid fa-pen"></i>
                        </a>
                    </th>
                </tr>
                <?php } ?>
            </tbody>
        </table> -->
      





  



<?php include '../../incfile/footer.php' ?>
