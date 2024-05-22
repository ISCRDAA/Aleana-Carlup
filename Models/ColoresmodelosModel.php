<?php
    class ColoresmodelosModel extends Mysql
    {
        private $intIdColorModelo;
        private $intColor;
        private $intModelo;
        private $intStatus;

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

        public function insertColorModelo(int $color, int $modelo, int $status)
        {
            $this->intColor = $color;
            $this->intModelo = $modelo;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM color_modelo WHERE color_id = '{$this->intColor}' and modelo_id = '{$this->intModelo}'";
            $request = $this->select_all($sql);

            if (empty($request)) {
                $query_insert = "INSERT INTO color_modelo(color_id,modelo_id,status) VALUES (?,?,?)";
                $arrData = array($this->intColor,
                                $this->intModelo,
                                $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            } else {
                $return = "exist";
            }
            return $return;
        }
    }
?>