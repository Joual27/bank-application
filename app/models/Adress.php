<?php

require_once("../repositories/database.php");


     
        
        class Adress{

            private $addressID;
            private $ville;
            private $quartier;
            private $rue;
            private $codePostal;
            private $email;
            private $phone;

            public function __construct($addressId,$ville,$quartier,$rue,$codePostal,$email,$phone){
              $this->addressID = $addressId;
              $this->ville = $ville;
              $this->quartier = $quartier;
              $this->rue = $rue;
              $this->codePostal = $codePostal;
              $this->email = $email;
              $this->phone = $phone;

            }
            public function getAddressID(){
                return $this->addressID;
            }
            public function setAddressID($addressID) {
                $this->addressID = $addressID;
            }


            public function getVille(){
                return $this->ville;
            }
            public function setVille($ville) {
                $this->ville = $ville;
            }


            public function getQuartier(){
                return $this->quartier;
            }
            public function setRoleOfUser($quartier) {
                $this->quartier = $quartier;
            }


            public function getRue(){
                return $this->rue;
            }
            public function setRue($rue) {
                $this->rue = $rue;
            }


            public function getCodePostal(){
                return $this->codePostal;
            }
            public function setCodePostal($codePostal) {
                $this->codePostal = $codePostal;
            }


            public function getEmail(){
                return $this->email;
            }
            public function setEmail($email) {
                $this->email = $email;
            }



            public function getPhone(){
                return $this-> phone;
            }
            public function setPhone ($phone) {
                $this->phone = $phone;
            }
            }
        

?>