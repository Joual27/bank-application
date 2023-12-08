<?php



interface AgencyInterface{
    public function getAllAgencies();
    public function getAgencyById($agencyId);
    public function addAgency(Agency $agency,$adress);


    public function updateAgency(Agency $agency,$adress);
    public function deleteAgency($agencyId);

}


?>