<?php



interface UserServiceInterface{
    public function getAllUsers();
    public function addUser($data);
    
    public function getUserByUsername($username);

    public function updateUser($data);

    public function deleteUser($id);

}



?>