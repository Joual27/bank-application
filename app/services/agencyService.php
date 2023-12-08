<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/repositories/Database.php");
require_once("AgencyServiceInterface.php");

class AgencyService implements AgencyInterface{

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
    public function getAgencyById($agencyId){
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
    public function addAgency(Agency $agency,$adress){
       $adrId = $adress["adressId"];
       $addAdressQuery = "INSERT INTO `adress`(`addressID`, `ville`, `quartier`, `rue`, `codePostal`, `email`, `phone`) VALUES(:adressId,:ville,:quartier,:rue,:codePostal,:email,:phone)";
       $this->db->query($addAdressQuery);
        
       $this->db->bind(":adressId",$adrId);
       $this->db->bind(":ville",$adress["ville"]);
       $this->db->bind(":quartier",$adress["quartier"]);
       $this->db->bind("rue",$adress["rue"]);
       $this->db->bind(":codePostal",$adress["codePostal"]);
       $this->db->bind(":email",$adress["email"]);
       $this->db->bind(":phone",$adress["phone"]);
       
          
       try{
        $this->db->execute();
        echo "added";
       }
       catch(PDOException $e){
         die($e->getMessage());
       }

       $addAgencyQuery = "INSERT INTO `agency`(`agencyID`, `longitude`, `latitude`, `bankID`, `addressID`) VALUES (:agencyId,:longitude,:latitude,:bankId,:adressId)" ;
       $this->db->query($addAgencyQuery);
       $this->db->bind(":agencyId",$agency->getAgencyId());
       $this->db->bind(":longitude",$agency->getLongitude());
       $this->db->bind(":latitude",$agency->getLatitude());
       $this->db->bind(":bankId",$agency->getBankId());
       $this->db->bind(":adressId",$adrId);
 
    
       try{
        $this->db->execute();
        echo "added";
       }
       catch(PDOException $e){
         die($e->getMessage());
       }

    }
    public function updateAgency(Agency $agency,$adress){
         $updateAgency = "UPDATE `agency` SET `longitude`= :longitude,`latitude`= :latitude WHERE agencyID = :agencyId";
         $this->db->query($updateAgency);
         $this->db->bind(":longitude",$agency->getLongitude());
         $this->db->bind(":latitude",$agency->getLatitude());
         $this->db->bind(":agencyId",$agency->getAgencyId());
         try{
            $this->db->execute();
            echo "updated";
         }
         catch(PDOException $e){
            die($e->getMessage());
         }


         $updateAdress = "UPDATE `adress` SET `ville`=:ville,`quartier`=:quartier,`rue`=:rue,`codePostal`=:codePostal,`email`=:email,`phone`=:email where addressID = :adressId";
         $this->db->query($updateAdress);
         $this->db->bind(":ville",$adress["ville"]);
         $this->db->bind(":quartier",$adress["quartier"]);
         $this->db->bind(":rue",$adress["rue"]);
         $this->db->bind(":codePostal",$adress["codePostal"]);
         $this->db->bind(":email",$adress["email"]);
         $this->db->bind(":phone",$adress["phone"]);
         $this->db->bind(":adressId",$adress["adressId"]);

         try{
            $this->db->execute();
            echo "updated";
         }
         catch(PDOException $e){
            die($e->getMessage());
         }

    }
    public function deleteAgency($agencyId){
       $deleteAgency = "delete from agency where agencyID = :agencyId";
       $this->db->query($deleteAgency);
       $this->db->bind(":agencyId",$agencyId);
       try{
         $this->db->execute();
       }
       catch(PDOException $e){
        die($e->getMessage());
       }
    }

}

?>