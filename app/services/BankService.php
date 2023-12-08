<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/Database.php");

require_once("ServiceBankInterface.php");

class BankService implements ServiceBankInterface{
     
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllBanks(){
        $bringBanks = "select * from bank";
        $this->db->query($bringBanks);
        try{
            return $this->db->fetchMultipleRows();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function addBank(Bank $bank){
       $addank = "insert into bank values (:id,:name,:logo)";
       $this->db->query($addank);
       $this->db->bind(":id",$bank->getBankId());
       $this->db->bind(":name",$bank->getBankName());
       $this->db->bind(":logo",$bank->getlogo());

       try{
        $this->db->execute();
       }
       catch(PDOException $e){
          die($e->getMessage());
       }
    }
    public function updateBank(Bank $bank){
        $updateBank = "update bank set bankName = :bankName, bankLogo = :bankLogo where bankID = :bankId ";
        $this->db->query($updateBank);
        $this->db->bind(":bankName",$bank->getBankName());
        $this->db->bind(":bankLogo",$bank->getlogo());
        $this->db->bind(":bankId",$bank->getBankId());
        try{
            $this->db->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
    }
}

        public function deleteBank($bankId){
            $deleteBank = "delete from bank where bankID = :bankId";
            $this->db->query($deleteBank);
            $this->db->bind(":bankId",$bankId);
            try{
                $this->db->execute();
            }
            catch(PDOException $e){
                die($e->getMessage());
            }
                }

}


?>