<?php
    class HiloscajaModel extends Mysql
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

        public function selectHiloscaja()
        {
            // Extraer Hilos Cajas, Colores y Tipos
            $sql = "SELECT
                        hcaja.id_hilo_caja,
                        ch.nombre_color,
                        hcaja.marca,
                        hcaja.tenida,
                        t.nombre AS nombre_tipo,
                        hcaja.peso_total,
                        hcaja.tipo_empaquetado,
                        hcaja.datecreated,
                        hcaja.dateupdate,
                        hcaja.status
                    FROM
                        hilo_caja AS hcaja
                    INNER JOIN
                        colores_hilos AS ch ON hcaja.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hcaja.tipo_id = t.id_tipo
                    WHERE hcaja.status != 0";
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

            $query_insert = "INSERT INTO hilo_caja(color_id,marca,tenida,tipo_id,peso_total,tipo_empaquetado,dateupdate,status) VALUES (?,?,?,?,?,?,?,?)";
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

        public function selectHiloCaja(int $idhilocaja)
        {
            $this->intIdHiloCaja = $idhilocaja;
            $sql = "SELECT
                        hcaja.id_hilo_caja,
                        ch.nombre_color,
                        hcaja.marca,
                        hcaja.tenida,
                        t.nombre AS nombre_tipo,
                        hcaja.peso_total,
                        hcaja.tipo_empaquetado,
                        DATE_FORMAT(hcaja.datecreated, '%d-%m-%Y') AS datecreated,
                        DATE_FORMAT(hcaja.dateupdate, '%d-%m-%Y') AS dateupdate,
                        hcaja.status
                    FROM
                        hilo_caja AS hcaja
                    INNER JOIN
                        colores_hilos AS ch ON hcaja.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hcaja.tipo_id = t.id_tipo
                    WHERE hcaja.id_hilo_caja = '{$this->intIdHiloCaja}'";
            $request = $this->select($sql);
            return $request;
        }
    }
?>