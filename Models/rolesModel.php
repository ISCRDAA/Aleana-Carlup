<?php
    class rolesModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function selectRoles()
        {
            // Extraer Roles
            $sql = "SELECT * FROM z_rol WHERE status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }
    }
?>