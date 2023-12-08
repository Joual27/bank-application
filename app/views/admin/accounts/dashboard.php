<?php 
// Include File 
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php'; 
  require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
  include '../../../models/account/account.php';


      
  if (isset($_POST['addAccount'])) {
    $account = new Account();
    $account->setBalance($_POST['balance']);
    $account->setRib($_POST['rib']); 
    $account->setUserId(isset($_POST['userId']) ? $_POST['userId'] : ''); 

    // Call the addAccount method
    $account->addAccount();
}


$sql = "SELECT accountId, balance, rib, userId FROM account";
$result = $cnx->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    $accounts = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $accounts = [];
}
  




?>


   <!-- TABLE -->


      <div class="relative overflow-x-auto shadow-md  ml-[185px] top-12 sm:rounded-lg">
      <button id="btnForm" class="font-bold  px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-800 text-gray-200 font-serif ">
            <a href="accountForm.php">+ Add Account</a>
        </button>

        <table class="w-full text-sm text-left rtl:text-right mt-5 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        BALANCE
                    </th>
                    <th scope="col" class="px-6 py-3">
                       
                    RIB
                    </th>
                    <th scope="col" class="px-6 py-3">
                        USER NAME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACTION
                    </th>

                </tr>
            </thead>
            <tbody class="text-center">
            <?php foreach ($accounts as $account): ?>
                <tr>
                    <td class="px-6 py-4"><?= $account['accountId']; ?></td>
                    <td class="px-6 py-4"><?= $account['balance']; ?></td>
                    <td class="px-6 py-4"><?= $account['rib']; ?></td>
                    <td class="px-6 py-4"><?= isset($account['userId']) ? $account['userId'] : ''; ?></td>
                    <td class="px-6 py-4">
                        <a href="editAccount.php?id=<?= $account['accountId']; ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <a href="deleteAccount.php?id=<?= $account['accountId']; ?>" class="text-red-500 hover:text-red-700" >Delete</a>                    
                    </td>

                    
                </tr>
            <?php endforeach; ?>
           
            </tbody>
        </table>
    </div>
      

    
  


<?php include '../../incfile/footer.php' ?>;
