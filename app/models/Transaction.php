<?php


// require_once("../repositories/database.php");

//     class Transactions{

//             private transactionID;
//             private montant;
//             private type;
//             private accountID;



//             public  function __construct(transactionID, montant, type, accountID){
//                 $this-> tansactionID = $transactionID;
//                 $this-> montant = $montant;
//                 $this-> type = $type;
//                 $this-> accountID = $accountID;
//             }


//             public function getTransactionID(){
//               return  $this-> transactionID;
//             }
//             public function setTransactionID($transactionID) {
//                 $this->transactionID =$transactionID;
//             }


//             public function getMontant(){
//                 return $this->montant;
//             }
//             public function setMontant($montant) {
//                 $this->montant =$montant;
//             }


//             public function getType(){
//                 return $this->type;
//             }
//             public function setType($type) {
//                 $this->type =$type;
//             }


//             public function getAccountID(){
//                 return $this->accountID;
//             }
//             public function setAccountID($accountID) {
//                 $this->accountID =$accountID;
//             }

    
//             public function addTransactions()
//                     {
//                         $database = new Database();

//                         $sql = "insert INTO Transactions (transactionID, montant, type, accountID) VALUES (:transactionID, :montant, :type, :accountID)";
//                         $database->query($sql);
//                         $database->bind(":transactionID", $this->balance);
//                         $database->bind(":montant", $this->rib);
//                         $database->bind(":type", $this->userId);
//                         $database->bind(":accountID", $this->userId);

//                         return $database->execute();
//                     }
//                     public function updateTransaction() {
//                         $database = new Database();
                
//                         $sql = "update Transactions SET montant = :montant, type = :type, accountID = :accountID WHERE transactionID = :transactionID";
//                         $database->query($sql);
//                         $database->bind(":transactionID", $this->transactionID);
//                         $database->bind(":montant", $this->montant);
//                         $database->bind(":type", $this->type);
//                         $database->bind(":accountID", $this->accountID);
                
//                         return $database->execute();
//                     }
//                     public function deleteTransaction() {
//                         $database = new Database();
                
//                         $sql = "DELETE FROM Transactions WHERE transactionID = :transactionID";
//                         $database->query($sql);
//                         $database->bind(":transactionID", $this->transactionID);
                
//                         return $database->execute();
//  }

 

?>