<?php
    class ColoresModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function selectColores()
        {
            // Extraer Colores
            $sql = "SELECT * FROM colores_hilos WHERE status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }
    }
?>