<?php
    class ModelosprendasModel extends Mysql
    {
        private $intIdModeloPrenda;
        private $strNombre;
        private $intTipo;
        private $intPeso;
        private $intStatus;

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
                        tipo
                    ON modelo.tipo_id = tipo.id_tipo
                    WHERE modelo.status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertModeloprenda(string $nombre, int $tipo, int $peso, $status)
        {
            $this->strNombre = $nombre;
            $this->intTipo = $tipo;
            $this->intPeso = $peso;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM modelo WHERE nombre = '{$this->strNombre}'";
            $request = $this->select_all($sql);

            if (empty($request))
            {
                $query_insert = "INSERT INTO modelo(nombre,tipo_id,peso_modelo,status) VALUES (?,?,?,?)";
                $arrData = array($this->strNombre,
                                $this->intTipo,
                                $this->intPeso,
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