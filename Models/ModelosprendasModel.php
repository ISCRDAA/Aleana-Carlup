<?php
    class ModelosprendasModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function selectModelosprendas()
        {
            // Extraer Modelos
            $sql = "SELECT
                        modelo.id_modelo,
                        modelo.nombre,
                        tipo.nombre AS tipo_nombre,
                        modelo.peso_modelo,
                        modelo.status
                    FROM
                        modelo
                    INNER JOIN
                        tipo ON modelo.tipo_id = tipo.id_tipo;";
            $request = $this -> select_all($sql);
            return $request;
        }
    }
?>