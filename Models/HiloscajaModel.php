<?php
    class HiloscajaModel extends Mysql
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function selectHiloscaja()
        {
            // Extraer Hilos Cajas, Colores y Tipos
            $sql = "SELECT
                        hcaja.id_hilo_caja,
                        ch.nombre_color,
                        hcaja.marca,
                        hcaja.tenida,
                        t.nombre AS nombre_tipo,
                        hcaja.cantidad_de_cajas,
                        hcaja.cantidad_de_conos,
                        hcaja.peso_total,
                        hcaja.tipo_empaquetado,
                        hcaja.status
                    FROM
                        hilo_caja AS hcaja
                    INNER JOIN
                        colores_hilos AS ch ON hcaja.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hcaja.tipo_id = t.id_tipo;";
            $request = $this -> select_all($sql);
            return $request;
        }
    }
?>