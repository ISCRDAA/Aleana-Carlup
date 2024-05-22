<?php
    class TiposModel extends Mysql
    {
        private $intIdTipo;
        private $strTipo;
        private $intStatus;

        public function __construct()
        {
            parent:: __construct();
        }

        public function selectTipos()
        {
            // Extraer Tipos
            $sql = "SELECT * FROM tipo WHERE status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertTipo(string $tipo, int $status)
        {
            $this->strTipo = $tipo;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM tipo WHERE nombre = '{$this->strTipo}'";
            $request = $this->select_all($sql);

            if (empty($request)) {
                $query_insert = "INSERT INTO tipo(nombre,status) VALUES (?,?)";
                $arrData = array($this->strTipo,
                                $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }
    }
?>