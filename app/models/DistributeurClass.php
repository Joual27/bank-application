<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/bank-app/datacnx.php");
class Distributeur {
    private $cnx;
    private $id;
    private $longitude;
    private $latitude;
    private $address;
    private $bankId;

   

    public function __construct() {
        global $cnx;
        $this->cnx = $cnx;
        $this->cnx->select_db("db_bank");

        if ($this->cnx->connect_error) {
            die("Database selection failed: " . $this->cnx->connect_error);
        }
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setBankId($bankId) {
        $this->bankId = $bankId;
    }
    public function generateUniqueId() {
        return uniqid('', true);  // Generates a unique ID with a prefix 'account_'
    }

    public function addDistributeur() {
        // Generate a unique accountId
        $this->id = $this->generateUniqueId();

        $stmt = $this->cnx->prepare("INSERT INTO atm (id, longitude, latitude, address, bankId) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->id, $this->longitude, $this->latitude, $this->address, $this->bankId);
        $stmt->execute();
        $stmt->close();
    }

    public function updateDistributeur() {
        $stmt = $this->cnx->prepare("UPDATE atm SET longitude=?, latitude=?, address=?, bankId=?  WHERE id=?");
        $stmt->bind_param("sssss", $this->longitude, $this->latitude, $this->address, $this->bankId, $this->id );     
        $stmt->execute();
        $stmt->close();
    }

    public function deleteDistributeur() {
        if (!isset($this->id)) {
            echo "Invalid request!";
            exit();
        }
        $stmt = $this->cnx->prepare("DELETE FROM atm WHERE id=?");
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $stmt->close();

        
    }
   
}



?>