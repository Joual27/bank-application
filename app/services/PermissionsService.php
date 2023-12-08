<?php





class PermissionsService implements PermissionsInterface{


    public function handlePermissionsOfUser($permissionName)
    {
        switch($permissionName){
            case "permissions_of_admin":
                return ["add_agency","update_agency","delete_agency","add_atm","update_atm","delete_atm"];
            case "permissions_of_sub_admin" :
                return ["add_client","update_client","delete_client","add_account","update_account","delete_account","add_transaction","delete_transaction"];
            case "permissions_of_user":
                return["update_password","make_transfer"];
            case "permissions_of_super_admin":
                return ["add_bank","update_bank","delete_bank","add_admin","delete_admin"];
            default:
                return [];
        }
    }
}


?>