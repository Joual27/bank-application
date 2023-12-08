<?php



interface UserInterface{
    public function getAllUsers();
    public function getUserByID($userID);
    public function addUser(User $user);
    public function updateUser(User $data);
    public function deleteUser($userID);

}



?>