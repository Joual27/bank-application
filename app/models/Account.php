<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
class Account {
    private $cnx;
    private $accountId;
    private $balance;
    private $rib;
    private $userId;

   

    public function __construct() {
        global $cnx;
        $this->cnx = $cnx;
        $this->cnx->select_db("db_bank");

        if ($this->cnx->connect_error) {
            die("Database selection failed: " . $this->cnx->connect_error);
        }
    }

    public function setAccountId($accountId) {
        $this->accountId = $accountId;
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }

    public function setRib($rib) {
        $this->rib = $rib;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }
    public function generateUniqueId() {
        return uniqid('', true);  // Generates a unique ID with a prefix 'account_'
    }

    public function addAccount() {
        // Generate a unique accountId
        $this->accountId = $this->generateUniqueId();

        $stmt = $this->cnx->prepare("INSERT INTO account (accountId, balance, rib, userId) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->accountId, $this->balance, $this->rib, $this->userId);
        $stmt->execute();
        $stmt->close();
    }

    public function updateAccount() {
        $stmt = $this->cnx->prepare("UPDATE account SET balance=?, rib=?, userId=? WHERE accountId=?");
        $stmt->bind_param("ssss", $this->balance, $this->rib, $this->userId, $this->accountId);     
        $stmt->execute();
        $stmt->close();
    }

    public function deleteAccount() {
        if (!isset($this->accountId)) {
            echo "Invalid request!";
            exit();
        }
        $stmt = $this->cnx->prepare("DELETE FROM account WHERE accountId=?");
        $stmt->bind_param("s", $this->accountId);
        $stmt->execute();
        $stmt->close();

        
    }
   
}



?>