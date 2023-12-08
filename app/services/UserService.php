<?php



require_once $_SERVER['DOCUMENT_ROOT'] . "/bank-app/app/services/userInterface.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/bank-app/app/repositories/database.php";



class UserService  implements UserInterface {

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    // Function To Fetch Multipale Users 
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users join adress on users.addressID = adress.addressID";
        $this->db->query($sql);
        try {
            return $this->db->fetchMultipleRows();

        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // Function To Add USer to DB
    public function addUser(User $user)
    {


        $sqlAd = "
        INSERT INTO adress VALUES(:addressID , :ville , :quartier , :rue , :codePostal , :email , :phone)
        ";
        // $this->db->query($sqlAdress);
    $this->db->query($sqlAd);
    // Bind Address
    $this->db->bind(':addressID' , $user->getAddresID());
    $this->db->bind(':ville' , $user->getVille());
    $this->db->bind(':quartier' , $user->getQuartier());
    $this->db->bind(':rue' , $user->getRue());
    $this->db->bind(':codePostal' , $user->getCodePostal());
    $this->db->bind(':email' , $user->getEmail());
    $this->db->bind(':phone' , $user->getPhone());

    try {
        $this->db->execute();
    } catch (PDOException $e) {
        die('Failed To Address User' . $e->getMessage());
    }
    // Insert Into Table Users
    $sql = "INSERT INTO users VALUES(:userID , :username , :userPass , :addressID , :agencyID)";

    $this->db->query($sql);

    // // Bind Users 
    $this->db->bind(':userID' , $user->getUserId());
    $this->db->bind(':username' , $user->getUsername());
    $this->db->bind(':userPass' , $user->getPassword());
    $this->db->bind(':addressID' , $user->getAddresID());
    $this->db->bind(':agencyID' , $user->getAgencyID());

    try {
        $this->db->execute();
    } catch (PDOException $e) {
        die('Failed To add User' . $e->getMessage());
    };

    // Add Role Of User
    $sql = "INSERT INTO roleOfUser VALUES(:roleName , :userID)";

    $this->db->query($sql);

    // Bind Role Of User 
    $this->db->bind(':roleName' , $user->getRoleName());
    $this->db->bind(':userID' , $user->getUserId());

    try {
        $this->db->execute();
    } catch (PDOException $e) {
        die('Failed To Add Role Of User' . $e->getMessage());
    }

    }// Fin Procedur Add User

    public function getUserByID($userID){
        $sql = "SELECT * FROM users 
        JOIN adress ON users.addressID = adress.addressID 
        JOIN agency ON users.agencyID = agency.agencyID 
        JOIN roleOfUser ON users.userID = roleOfUser.userID 
        WHERE users.userID = :userID";

        $this->db->query($sql);
        $this->db->bind(":userID" , $userID);
        try {
            $this->db->execute();
            $user = $this->db->fetchOne();
            return $user;
        } catch (PDOException $e) {
            die("Faild To Fetch User " . $e->getMessage());
        }
    }


    public function updateUser(User $data){
        $sql = "UPDATE adress SET ville = :ville , quartier = :quartier , rue = :rue , codePostal = :codePostal , email = :email , phone = :phone";
        $this->db->query($sql);

        $this->db->bind(":ville" , $data->getVille());
        $this->db->bind(":quartier" , $data->getQuartier());
        $this->db->bind(":rue" , $data->getRue());
        $this->db->bind(":codePostal" , $data->getCodePostal());
        $this->db->bind(":email" , $data->getEmail());
        $this->db->bind(":phone" , $data->getPhone());

        try {
            $this->db->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        // Update Users 
        $sql = "UPDATE users SET username = :username";

        $this->db->query($sql);
        $this->db->bind(":username" , $data->getUsername());

        try {
            $this->db->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteUser($userID){
        $sql = "DELETE FROM users WHERE userID = :userID";

        $this->db->query($sql);
        $this->db->bind(':userID' , $userID);
        try {
            $this->db->execute();
            
        } catch (PDOException $e) {
            die("user not Delete" . $e->getMessage());
        }


    } 


}


?>