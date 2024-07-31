<?php
    class ColoresmodelosModel extends Mysql
    {
        private $intIdColorModelo;
        private $intColor;
        private $intModelo;
        private $intCombinacion01;
        private $intCombinacion02;
        private $intCombinacion03;
        private $intCombinacion04;
        private $intCombinacion05;
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
                        m.nombre AS nombre_modelo,
                        ch.nombre_color AS color_base,
                        ch1.nombre_color AS color_combinacion_01,
                        ch2.nombre_color AS color_combinacion_02,
                        ch3.nombre_color AS color_combinacion_03,
                        ch4.nombre_color AS color_combinacion_04,
                        ch5.nombre_color AS color_combinacion_05,
                        cm.status
                    FROM
                        color_modelo AS cm
                    INNER JOIN
                        colores_hilos AS ch ON cm.color_id = ch.id_color
                    INNER JOIN
                        colores_hilos AS ch1 ON cm.combinacion01 = ch1.id_color
                    INNER JOIN
                        colores_hilos AS ch2 ON cm.combinacion02 = ch2.id_color
                    INNER JOIN
                        colores_hilos AS ch3 ON cm.combinacion03 = ch3.id_color
                    INNER JOIN
                        colores_hilos AS ch4 ON cm.combinacion04 = ch4.id_color
                    INNER JOIN
                        colores_hilos AS ch5 ON cm.combinacion05 = ch5.id_color
                    INNER JOIN
                        modelo AS m ON cm.modelo_id = m.id_modelo
                    WHERE
                        cm.status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertColorModelo(int $color, int $modelo, int $combinacion01, int $combinacion02, int $combinacion03, int $combinacion04, int $combinacion05, int $status)
        {
            $this->intColor = $color;
            $this->intModelo = $modelo;
            $this->intCombinacion01 = $combinacion01;
            $this->intCombinacion02 = $combinacion02;
            $this->intCombinacion03 = $combinacion03;
            $this->intCombinacion04 = $combinacion04;
            $this->intCombinacion05 = $combinacion05;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM color_modelo WHERE color_id = '{$this->intColor}' and modelo_id = '{$this->intModelo}'";
            $request = $this->select_all($sql);

            if (empty($request)) {
                $query_insert = "INSERT INTO color_modelo(color_id,modelo_id,combinacion01,combinacion02,combinacion03,combinacion04,combinacion05,status) VALUES (?,?,?,?,?,?,?,?)";
                $arrData = array($this->intColor,
                                $this->intModelo,
                                $this->intCombinacion01,
                                $this->intCombinacion02,
                                $this->intCombinacion03,
                                $this->intCombinacion04,
                                $this->intCombinacion05,
                                $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            } else {
                $return = "exist";
            }
            return $return;
        }

        public function selectColorModelo(int $idColorModelo)
        {
            $this->intIdColorModelo = $idColorModelo;
            $sql = "SELECT
                        cm.id_color_modelo,
                        m.id_modelo AS id_modelo,
                        m.nombre AS nombre_modelo,
                        ch.id_color AS color_base_id,
                        ch.nombre_color AS color_base,
                        ch1.id_color AS color_combinacion_01_id,
                        ch1.nombre_color AS color_combinacion_01,
                        ch2.id_color AS color_combinacion_02_id,
                        ch2.nombre_color AS color_combinacion_02,
                        ch3.id_color AS color_combinacion_03_id,
                        ch3.nombre_color AS color_combinacion_03,
                        ch4.id_color AS color_combinacion_04_id,
                        ch4.nombre_color AS color_combinacion_04,
                        ch5.id_color AS color_combinacion_05_id,
                        ch5.nombre_color AS color_combinacion_05,
                        cm.status
                    FROM
                        color_modelo AS cm
                    INNER JOIN
                        colores_hilos AS ch ON cm.color_id = ch.id_color
                    INNER JOIN
                        colores_hilos AS ch1 ON cm.combinacion01 = ch1.id_color
                    INNER JOIN
                        colores_hilos AS ch2 ON cm.combinacion02 = ch2.id_color
                    INNER JOIN
                        colores_hilos AS ch3 ON cm.combinacion03 = ch3.id_color
                    INNER JOIN
                        colores_hilos AS ch4 ON cm.combinacion04 = ch4.id_color
                    INNER JOIN
                        colores_hilos AS ch5 ON cm.combinacion05 = ch5.id_color
                    INNER JOIN
                        modelo AS m ON cm.modelo_id = m.id_modelo
                    WHERE
                        cm.id_color_modelo = '{$this->intIdColorModelo}'";
            $request = $this->select($sql);
            return $request;
        }
    }
?>