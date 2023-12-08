<?php



require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/AgencyService.php");


class Agency{
    private $agencyId;
    private $longitude;
    private $latitude ;
    private $bankId ;
    private $adressId;
    private $agencyService;


    
    public function __construct($agencyId,$longitude,$latitude,$bankId,$adressId,AgencyService $agencyService){
        $this->agencyId = $agencyId;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->bankId = $bankId;
        $this->adressId = $adressId;
        $this->agencyService = $agencyService;
    }

    public function getAgencyId(){
        return $this->agencyId;
    }
    public function setAgencyId($agencyId){
        $this->agencyId = $agencyId;
    }

    public function getAgencyService(){
        return $this->agencyService;
    }
    public function setAgencyService(AgencyService $agencyService){
        $this->agencyService = $agencyService;
    }
    public function getLongitude(){
        return $this->longitude;
    }
    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }
    public function getLatitude(){
        return $this->latitude;
    }
    public function setLatitude($latitude){
        $this->agencyId = $latitude;
    }
    public function getBankId(){
        return $this->bankId;
    }
    public function setBankId($bankId){
        $this->bankId = $bankId;
    }
    public function getAdressId(){
        return $this->adressId;
    }
    public function setAdressId($adressId){
        $this->adressId = $adressId;
    }

}


?>