<?php
    class ColoresmodelosModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function selectColoresmodelos()
        {
            // Extraer Colores y Modelos
            $sql = "SELECT
                        cm.id_color_modelo,
                        ch.nombre_color,
                        m.nombre AS nombre_modelo,
                        cm.status
                    FROM
                        color_modelo AS cm
                    INNER JOIN
                        colores_hilos AS ch ON cm.color_id = ch.id_color
                    INNER JOIN
                        modelo AS m ON cm.modelo_id = m.id_modelo;";
            $request = $this -> select_all($sql);
            return $request;
        }
    }
?>