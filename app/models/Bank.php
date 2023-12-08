<?php





class Bank {
    private $bankId;
    private $bankName;
    private $logo ;

    public function __construct($bankId,$bankName,$logo){
       $this->bankId = $bankId;
       $this->bankName = $bankName;
       $this->logo = $logo;
    }

    public function getBankId(){
        return $this->bankId;
    }
    public function setBankId($bankId){
         $this->bankId = $bankId;
    }
    public function getBankName(){
        return $this->bankName;
    }
    public function setBankName($bankName){
         $this->bankName = $bankName;
    }
    public function getlogo(){
        return $this->logo;
    }
    public function setlogo($logo){
         $this->logo = $logo;
    }
}


?>