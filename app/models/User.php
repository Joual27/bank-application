
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/bank-app/app/services/userService.php");

    class User {
        private $userID;
        private $addressID;
        private $agencyID;
        private $username;
        private $password;
        private $email;
        private $phone;
        private $ville;
        private $rue;
        private $quartier;
        private $codePostal;
        private $roleName;

        public function __construct($userID , $addressID , $agencyID , $username , $password , $email , $phone , $ville , $rue , $quartier ,$codePostal , $roleName)
        {
            $this->userID = $userID;
            $this->addressID = $addressID;
            $this->agencyID = $agencyID;
            $this->username = $username;
            $this->email = $email;
            $this->phone = $phone;
            $this->ville = $ville;
            $this->quartier = $quartier;
            $this->codePostal = $codePostal;
            $this->password = $password;
            $this->rue = $rue;
            $this->roleName = $roleName;

        }

        public function getUsername() {
            return $this->username;
        }
        public function setUsername($username) {
             $this->username = $username;
        }
        public function getPassword() {
            return $this->password;
        }
        public function setPassword($password) {
             $this->password = $password;
        }
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
             $this->email = $email;
        }
        public function getPhone() {
            return $this->phone;
        }
        public function setPhone($phone) {
             $this->phone = $phone;
        }
        public function getVille() {
            return $this->ville;
        }
        public function setVille($ville) {
             $this->ville = $ville;
        }
        public function getRue() {
            return $this->rue;
        }
        public function setRue($rue) {
             $this->rue = $rue;
        }
        public function getQuartier() {
            return $this->quartier;
        }
        public function setQuartier($quartier) {
             $this->quartier = $quartier;
        }
        public function getCodePostal() {
            return $this->codePostal;
        }
        public function setCodePostal($codePostal) {
             $this->codePostal = $codePostal;
        }
        public function getUserId() {
            return $this->userID;
        }
        public function setUserID($userID) {
             $this->userID = $userID;
        }
        public function getAddresID() {
            return $this->addressID;
        }
        public function setAddresID($addressID) {
             $this->addressID = $addressID;
        }
        public function getAgencyID() {
            return $this->agencyID;
        }
        public function setAgencyID($agencyID) {
             $this->agencyID = $agencyID;
        }
        public function getRoleName() {
            return $this->roleName;
        }
        public function setRoleName($roleName) {
             $this->roleName = $roleName;
        }
        
    }


?>