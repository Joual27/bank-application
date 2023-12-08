
<?php


interface ServiceBankInterface{
    public function getAllBanks();
    public function addBank(Bank $bank);
    public function updateBank(Bank $bank);
    public function deleteBank($bankId);

}


?>