<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/Database.php");
require_once("AgencyServiceInterface.php");

class AgencyService implements AgencyServiceInterface{

    private $db ;


    public function __construct(Database $db){
        $this->db = $db;
    }

    
    public function getAllAgencies(){
        $fetchAllAgenciesData = "select * from agency join adress on agency.addressID = adress.addressID";
        $this->db->query($fetchAllAgenciesData);
        try{
            return $this->db->fetchMultipleRows();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }
    public function getAgencyById($agencyId):Agency{
        $agencyData = "select * from agency where agencyID = :agencyId";
        $this->db->query($agencyData);
        $this->db->bind(":agencyId",$agencyId);
        try{
            return $this->db->fetchOne();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }

    }
    public function addAgency(Agency $agency){
       $addAgencyQuery ="insert into agency values (:id,:longitude,:latitude,:bankId,:adressId)";
       $this->db->query($addAgencyQuery);
       $this->db->bind(":id",$agency->getAgencyId());
       $this->db->bind(":longitude",$agency->getLongitude());
       $this->db->bind(":latitude",$agency->getLatitude());
       $this->db->bind(":bankId",$agency->getBankId());
       $this->db->bind(":adressId",$agency->getAdressId());
       try{
        $this->db->execute();
        echo "added";
       }
       catch(PDOException $e){
         die($e->getMessage());
       }
    }
    public function updateAgency(Agency $agency){

    }
    public function deleteAgency($agencyId){
       
    }

}

?>