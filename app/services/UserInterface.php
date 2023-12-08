<?php






interface UserInterface{
    public function getAllUsers();
    public function addUser(User $data);
    
    public function getUserById($id);

    public function updateUser(User $data);

    public function deleteUser($id);

}



?>



?>