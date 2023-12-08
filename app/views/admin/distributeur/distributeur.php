<?php 
// Include File 
  include '../../incfile/header.php';
  include '../../incfile/sidebar.php';
  require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
  include '../../../models/distributeur/distributeurClass.php';


  if (isset($_POST['addDistributeur'])) {
    $distributeur = new Distributeur();
    $distributeur->setLongitude($_POST['longitude']);
    $distributeur->setLatitude($_POST['latitude']); 
    $distributeur->setAddress(isset($_POST['address']) ? $_POST['address'] : ''); 
    $distributeur->setBankId(isset($_POST['bankId']) ? $_POST['bankId'] : ''); 

    // Call the addAccount method
    $distributeur->addDistributeur();
}


$sql = "SELECT id, longitude, latitude, address, bankId FROM atm";
$result = $cnx->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    $distributeurs = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $distributeurs = [];
}
  



?>


   <!-- TABLE -->


      <div class="relative overflow-x-auto shadow-md  ml-[185px] top-12 sm:rounded-lg">
        <button id="btnForm" class="font-bold  px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-800 text-gray-200 font-serif ">
            <a href="distributeurForm.php">+ Add Distributeur</a>
        </button>

        <table class="w-full text-lg text-left rtl:text-right mt-5 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LONGTITUDE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LATITUDE
                    </th>
                    <th scope="col" class="px-6 py-3">
                       ADDRESSE 
                    </th>
                    <th scope="col" class="px-6 py-3">
                       BANK ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACTION
                    </th>
                    
                </tr>
            </thead>
            <tbody class="text-center text-black">
            <?php foreach ($distributeurs as $distributeur): ?>
                <tr>
                    <td class="px-6 py-4"><?= $distributeur['id']; ?></td>
                    <td class="px-6 py-4"><?= $distributeur['longitude']; ?></td>
                    <td class="px-6 py-4"><?= $distributeur['latitude']; ?></td>
                    <td class="px-6 py-4"><?= isset($distributeur['address']) ? $distributeur['address'] : ''; ?></td>
                    <td class="px-6 py-4"><?= isset($distributeur['bankId']) ? $distributeur['bankId'] : ''; ?></td>
                    <td class="px-6 py-4">
                        <a href="editDistributeur.php?id=<?= $distributeur['id']; ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <a href="deleteDistributeur.php?id=<?= $distributeur['id']; ?>" class="text-red-500 hover:text-red-700" >Delete</a>                    
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
      





  



<?php include '../../incfile/footer.php' ?>
