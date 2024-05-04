<?php
    class HiloscostalModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function selectHiloscostal()
        {
            // Extraer Hilos Cajas, Colores y Tipos
            $sql = "SELECT
                        hCostal.id_hilo_costal,
                        ch.nombre_color,
                        hCostal.marca,
                        hCostal.tenida,
                        t.nombre AS nombre_tipo,
                        hCostal.cantidad_de_cajas,
                        hCostal.cantidad_de_conos,
                        hCostal.peso_total,
                        hCostal.tipo_empaquetado,
                        hCostal.status
                    FROM
                        hilo_costal AS hCostal
                    INNER JOIN
                        colores_hilos AS ch ON hCostal.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hCostal.tipo_id = t.id_tipo;";
            $request = $this -> select_all($sql);
            return $request;
        }
    }
?>