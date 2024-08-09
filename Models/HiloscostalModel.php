<?php
    class HiloscostalModel extends Mysql
    {
        private $intIdHiloCostal;
        private $intColor;
        private $strMarca;
        private $strTenida;
        private $intTipo;
        private $intPeso;
        private $strTipoEmpaquetado;
        private $strfechaUpdate;
        private $intStatus;

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
                        hCostal.peso_total,
                        hCostal.tipo_empaquetado,
                        hCostal.datecreated,
                        hCostal.dateupdate,
                        hCostal.status
                    FROM
                        hilo_costal AS hCostal
                    INNER JOIN
                        colores_hilos AS ch ON hCostal.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hCostal.tipo_id = t.id_tipo
                    WHERE hCostal.status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertHilocostal(int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoempaquetado, string $fechaupdate, int $status)
        {
            $this->intColor = $color;
            $this->strMarca = $marca;
            $this->strTenida = $tenida;
            $this->intTipo = $tipo;
            $this->intPeso = $peso;
            $this->strTipoEmpaquetado = $tipoempaquetado;
            $this->strfechaUpdate = $fechaupdate;
            $this->intStatus = $status;
            $return = 0;

            $query_insert = "INSERT INTO hilo_costal(color_id,marca,tenida,tipo_id,peso_total,tipo_empaquetado,dateupdate,status) VALUES (?,?,?,?,?,?,?,?)";
            $arrData = array($this->intColor,
                            $this->strMarca,
                            $this->strTenida,
                            $this->intTipo,
                            $this->intPeso,
                            $this->strTipoEmpaquetado,
                            $this->strfechaUpdate,
                            $this->intStatus);
            $request_insert = $this->insert($query_insert,$arrData);
            $return = $request_insert;
            return $return;
        }

        public function selectHiloCostal(int $idhilocostal)
        {
            $this->intIdHiloCostal = $idhilocostal;
            $sql = "SELECT
                        hCostal.id_hilo_costal,
                        ch.id_color AS color_id,
                        ch.nombre_color AS color_nombre,
                        hCostal.marca,
                        hCostal.tenida,
                        t.id_tipo AS tipo_id,
                        t.nombre AS tipo_nombre,
                        hCostal.peso_total,
                        hCostal.tipo_empaquetado,
                        DATE_FORMAT(hCostal.datecreated, '%d-%m-%Y') AS datecreated,
                        DATE_FORMAT(hCostal.dateupdate, '%d-%m-%Y') AS dateupdate,
                        hCostal.status
                    FROM
                        hilo_costal AS hCostal
                    INNER JOIN
                        colores_hilos AS ch ON hCostal.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hCostal.tipo_id = t.id_tipo
                    WHERE hCostal.id_hilo_costal = '{$this->intIdHiloCostal}'";
            $request = $this->select($sql);
            return $request;
        }

        public function updatetHilocostal(int $idhilocostal, int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoEmpaquetado, string $fechaupdate,int $status)
        {
            $this->intIdHiloCostal = $idhilocostal;
            $this->intColor = $color;
            $this->strMarca = $marca;
            $this->strTenida = $tenida;
            $this->intTipo = $tipo;
            $this->intPeso = $peso;
            $this->strTipoEmpaquetado = $tipoEmpaquetado;
            $this->strfechaUpdate = $fechaupdate;
            $this->intStatus = $status;

            $sql = "UPDATE hilo_costal SET color_id=?, marca=?, tenida=?, tipo_id=?, peso_total=?, tipo_empaquetado=?, dateupdate=?, status=? WHERE id_hilo_costal = '{$this->intIdHiloCostal}'";
            $arrData = array($this->intColor,
                            $this->strMarca,
                            $this->strTenida,
                            $this->intTipo,
                            $this->intPeso,
                            $this->strTipoEmpaquetado,
                            $this->strfechaUpdate,
                            $this->intStatus);
            $request = $this->update($sql,$arrData);
            return $request;
        }
    }
?>