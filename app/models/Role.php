<?php

require_once("../repositories/database.php");


        class role{

        private  $roleName;

        public function getroleName(){
            return $this->roleName;
        }
        public function setAgencyId($roleName){
            $this->roleName = $roleName;
        }
    }

?>