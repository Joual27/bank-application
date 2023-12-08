<?php

require_once("../repositories/database.php");

        class roleOfUser{

            private $roleOfUser;

            public function getRoleOfUser(){
                return $this->roleOfUser;
            }
            public function setRoleOfUser($roleOfUser) {
                $this->roleOfUser = $roleOfUser;
            }
        }
        
       

?>