<?php



interface AgencyServiceInterface{
    public function getAllAgencies();
    public function getAgencyById($agencyId):Agency;
    public function addAgency(Agency $agency);
    public function updateAgency(Agency $agency);
    public function deleteAgency($agencyId);

}


?>