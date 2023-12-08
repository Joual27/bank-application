<?php 
// Include File 
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php';
  include '../../incfile/navbar.php';
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/database.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/config/redirect.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/models/User.php");
  require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/UserInterface.php");

    $accountID = $_GET['id'];
  $db = new Database();

  $sql = "SELECT * FROM transactions JOIN account on transactions.accountID = account.accountID
   WHERE account.accountID = :accountID";

  $db->query($sql);
  $db->bind(":accountID" , $accountID);

  try {
    $transactions = $db->fetchMultipleRows();
  } catch (PDOException $e) {
    die("Failed Display Account" . $e->getMessage());
  }

?>


   <!-- TABLE -->




       <div class="relative overflow-x-auto shadow-md  px-10  sm:rounded-lg">

        
            <table id="myTable" class="dataTable">
            <thead class="my-10">
                <tr class="bg-gray-800 text-white">
                    <th>ID</th>
                    <th>Montant</th>
                    <th>Type</th>
                    <th>Account RIB</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-black p-3">
                    <?php foreach($transactions as $transaction) { ?>
                    <td><?= $transaction->transactionID ?></td>
                    <td><?= $transaction->montant ?></td>
                    <td><?= $transaction->type ?></td>
                    <td><?= $transaction->rib ?></td>

                    <!-- <td class="px-6 py-3 flex items-center gap-3">
                        <a href="deleteUser.php?id=<?= $trea->accountID ?>" class="flex items-center justify-center bg-slate-800 text-white w-[40px] h-[40px]">
                             <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="updateUser.php?id=<?= $account->accountID ?>" class="flex items-center justify-center bg-slate-800 text-white w-[40px] h-[40px]">
                        <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="<?= APPROOT?>/views/admin/accounts/AccountUser.php?id=<?= $account->accountID ?>" class="flex items-center justify-center bg-slate-800 text-white w-[40px] h-[40px]">
                        <i class="fa-solid fa-display"></i>
                        </a>
                    </td> -->
                </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
        </main>





</div>




      





  



<?php include '../../incfile/footer.php' ?>
