<?php
    class TiposModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function selectTipos()
        {
            // Extraer Tipos
            $sql = "SELECT * FROM tipo WHERE status != 0;";
            $request = $this -> select_all($sql);
            return $request;
        }
    }
?>