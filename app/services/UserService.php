<?php



require_once("UserServiceInterface.php");
require_once("../repositories/database.php");



class UserService extends Database implements UserServiceInterface {
 


    public function getAllUsers()
    {
        // $fetchUsersDataQuery = "select * from users";
        // $stmt = $this->db->getStmt();
        // $stmt= $this->db->connectDB()->prepare($fetchUsersDataQuery);
        
        // try{
        //     $stmt->execute();
        // }
        // catch(PDOException $e){
        //     die($e->getMessage());
        // }   

    }
    public function getUserByUsername($username)
    {
        $getUser = "select * from users where username = :username";
       

       

    }

    public function addUser($data)
    {
        
    }

    public function updateUser($data)
    {
        
    }

    public function deleteUser($id)
    {
        
    }
}


?>