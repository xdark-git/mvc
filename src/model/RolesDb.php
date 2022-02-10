<?php
    namespace src\model;
    use libs\system\Model;
    

    class RolesDb extends Model
    {
        public function findAll()
        {
            return array("ROLE_USER", "ROLE_ADMIN");
        }
    }
?>