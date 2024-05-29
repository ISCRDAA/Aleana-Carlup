<?php
    class HiloscostalModel extends Mysql
    {
        private $intIdHiloCaja;
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

        public function insertHilocaja(int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoempaquetado, string $fechaupdate, int $status)
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
    }
?>