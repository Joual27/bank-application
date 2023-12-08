<?php 
if (!isset($_GET['id'])) {
    echo "Invalid request!";
    exit();
}

require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
include '../../../models/account/account.php';

if (isset($_GET['id'])) {
    $accountIdToEdit = $_GET['id'];

    // Fetch the account data from the database
    $sql = "SELECT * FROM account WHERE accountId = ?";
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param("s", $accountIdToEdit); // Change "i" to "s" since accountId is a string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the account exists
    if ($result->num_rows > 0) {
        $accountData = $result->fetch_assoc();
    } else {
        echo "Account not found!";
        exit();
    }

    // Handle form submission to update the account
    if (isset($_POST['updateAccount'])) {
        $updatedAccount = new Account();
        $updatedAccount->setAccountId($accountIdToEdit);

        // Check if $accountData is set before accessing its elements
        $updatedAccount->setBalance(isset($_POST['balance']) ? $_POST['balance'] : '');
        $updatedAccount->setRib(isset($_POST['rib']) ? $_POST['rib'] : '');
        $updatedAccount->setUserId(isset($_POST['userId']) ? $_POST['userId'] : ''); // Fix the setUserId line

        $updatedAccount->updateAccount();

        // Redirect back to dashboard.php after update
        header("Location: dashboard.php");
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
    <title>Edit Account</title>
</head>
<body>
    
<div class="relative p-5 font-mono items-center max-w-2xl mx-auto rounded-lg shadow-lg shadow-gray-800/70 dark:bg-gray-800 mt-28">
    <h1 class="text-3xl text-white font-sans text-center mb-5">Edit Account</h1>
    <form method="POST" action="editAccount.php?id=<?= $accountIdToEdit; ?>">
        <!-- Add other form fields for editing -->
        <label for="balance" class="block text-gray-700 dark:text-gray-400 mb-2">Balance:</label>
        <input type="text" name="balance" id="balance" class="block w-full p-2 border rounded mb-4" value="<?= $accountData['balance']; ?>">

        <label for="rib" class="block text-gray-700 dark:text-gray-400 mb-2">RIB:</label>
        <input type="text" name="rib" id="rib" class="block w-full p-2 border rounded mb-4 " readonly value="<?= $accountData['rib']; ?>">

        <label for="userId" class="block text-gray-700 dark:text-gray-400 mb-2">User ID:</label>
        <select id="userId" name="userId" class="w-[304px] block py-2.5 px-0 text-lg text-gray-900 bg-gray-800 p-2 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
           
            <?php
            $userQuery = "SELECT userID, username FROM users";
            $userResult = $cnx->query($userQuery);

            if ($userResult->num_rows > 0) {
                while ($user = $userResult->fetch_assoc()) {
                    echo "<option value='{$user['userID']}'>{$user['username']}</option>";
                }
            }
            ?>
        </select>

        <input type="submit" value="Update Account" name="updateAccount" class="block bg-blue-500 text-white p-3 rounded">
    </form>
</div>
</body>
</html>
