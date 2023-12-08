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

    }
    public function deleteBank($bankId){

    }


    
}


?>