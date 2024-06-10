<?php
    class ColoresModel extends Mysql
    {
        private $intIdColor;
        private $strNombre;
        private $intStatus;

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

        public function insertColor(string $nombre, int $status)
        {
            $this->strNombre = $nombre;
            $this->intStatus = $status;

            $sql = "SELECT * FROM colores_hilos WHERE nombre_color = '{$this->strNombre}'";
            $request = $this->select_all($sql);

            if (empty($request)) {
                $query_insert = "INSERT INTO colores_hilos(nombre_color,status) VALUES (?,?)";
                $arrData = array($this->strNombre,
                                $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            } else {
                $return = "exist";
            }
            return $return;
        }

        public function selectColor(int $idcolor)
        {
            $this->intIdColor = $idcolor;
            $sql = "SELECT * FROM colores_hilos WHERE id_color = '{$this->intIdColor}'";
            $request = $this->select($sql);
            return $request;
        }
    }
?>