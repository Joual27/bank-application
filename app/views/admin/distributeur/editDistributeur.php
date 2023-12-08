<?php 
if (!isset($_GET['id'])) {
    echo "Invalid request!";
    exit();
}

require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
include '../../../models/distributeur/distributeurClass.php';

if (isset($_GET['id'])) {
    $atmIdToEdit = $_GET['id'];

    // Fetch the account data from the database
    $sql = "SELECT * FROM atm WHERE id = ?";
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param("s", $atmIdToEdit); // Change "i" to "s" since accountId is a string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the account exists
    if ($result->num_rows > 0) {
        $atmData = $result->fetch_assoc();
    } else {
        echo "Distributeur not found!";
        exit();
    }

    // Handle form submission to update the account
    if (isset($_POST['updateAtm'])) {
        $updateAtm = new Distributeur();
        $updateAtm->setId($atmIdToEdit);

        // Check if $accountData is set before accessing its elements
        $updateAtm->setLongitude(isset($_POST['longitude']) ? $_POST['longitude'] : '');
        $updateAtm->setLatitude(isset($_POST['latitude']) ? $_POST['latitude'] : '');
        $updateAtm->setAddress(isset($_POST['address']) ? $_POST['address'] : ''); 
        $updateAtm->setBankId(isset($_POST['bankId']) ? $_POST['bankId'] : '');

        $updateAtm->updateDistributeur();

        // Redirect back to dashboard.php after update
        header("Location: distributeur.php");
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Distributeur</title>
</head>
<body>
<div id="form" class="duration-700 ">                                               <!-- FORM -->
<form method="POST" action="editDistributeur.php?id=<?= $atmIdToEdit; ?>" class="w-[1300px] relative p-5 font-mono items-center max-w-2xl mx-auto rounded-lg shadow-lg shadow-gray-800/70 drop-shadow-2xl  dark:bg-gray-800 mt-28 " >
    <div class="flex justify-center ">
        <h1 class="text-3xl text-white font-sans text-center">Add New Distributeur</h1>
        <div class="absolute flex flex-col right-5">
            <a href="" id="btnCloseform">
            <i class="fa-solid fa-xmark text-white text-2xl font-meduim"></i>
            </a>
        </div>   
    </div>
      <!-- ========== Add to Table USERS ================== -->
      <div class="">
        <!-- Id User -->
          <div class="relative z-0 w-full mb-5 group">
           
          <div class="flex gap-5 my-5">
              <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="text" name="longitude" id="longitude" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?= $atmData['longitude']; ?>">
                 <label for="longitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LONGTITUDE</label>
                 
                </div>

                <div class="relative w-[50%] z-0 w-72 mb-5 group">
                 <input type="text" name="latitude" id="latitude" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="<?= $atmData['latitude']; ?>">
                 <label for="latitude" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LATITUDE</label>
                 
                </div>      
          </div>
          <div class="flex gap-5">
                 <div class="relative w-[50%] z-0 w-72 mb-5 group">
                    <input type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="<?= $atmData['address']; ?>">
                    <label for="address" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ADDRESS</label>
                </div> 
              <div class="w-[33.33%]">
              <select id="bankId" name="bankId" class="w-[304px] block py-2.5 px-0 text-lg text-gray-900 bg-gray-800 p-2 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                  <option disabled selected value="" class="bg-dark-gray-800">Select Bank</option>
                  <?php
                  $bankQuery = "SELECT bankId, bankName FROM bank";
                  $bankResult = $cnx->query($bankQuery);

                  if ($bankResult->num_rows > 0) {
                      while ($bank = $bankResult->fetch_assoc()) {
                          echo "<option value='{$bank['bankId']}'>{$bank['bankName']}</option>";
                      }
                  }
                  ?>
              </select>
              </div>
              
          </div>
          </div>
        <!-- ========== End to Table USERS ================== -->

    <input type="submit" value="Add Distributeur" name="updateAtm" id="submitBtn" class="block mx-auto w-[200px] mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-blod rounded-lg text-xl  px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 duration-700 dark:focus:ring-blue-800">
  </form>
</div>  
</body>
</html>