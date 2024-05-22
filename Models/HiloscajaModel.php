<?php
    class HiloscajaModel extends Mysql
    {
        private $intIdHiloCaja;
        private $intColor;
        private $strMarca;
        private $strTenida;
        private $intTipo;
        private $intCantidadCajas;
        private $intCantidadConos;
        private $intPeso;
        private $strTipoEmpaquetado;
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
                        hcaja.cantidad_de_cajas,
                        hcaja.cantidad_de_conos,
                        hcaja.peso_total,
                        hcaja.tipo_empaquetado,
                        hcaja.datecreated,
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

        public function insertHilocaja(int $color, string $marca, string $tenida, int $tipo, int $cantidadcajas, int $cantidadconos, int $peso, string $tipoempaquetado, int $status)
        {
            $this->intColor = $color;
            $this->strMarca = $marca;
            $this->strTenida = $tenida;
            $this->intTipo = $tipo;
            $this->intCantidadCajas = $cantidadcajas;
            $this->intCantidadConos = $cantidadconos;
            $this->intPeso = $peso;
            $this->strTipoEmpaquetado = $tipoempaquetado;
            $this->intStatus = $status;
            $return = 0;

            $query_insert = "INSERT INTO hilo_caja(color_id,marca,tenida,tipo_id,cantidad_de_cajas,cantidad_de_conos,peso_total,tipo_empaquetado,status) VALUES (?,?,?,?,?,?,?,?,?)";
            $arrData = array($this->intColor,
                            $this->strMarca,
                            $this->strTenida,
                            $this->intTipo,
                            $this->intCantidadCajas,
                            $this->intCantidadConos,
                            $this->intPeso,
                            $this->strTipoEmpaquetado,
                            $this->intStatus);
            $request_insert = $this->insert($query_insert,$arrData);
            $return = $request_insert;
            return $return;
        }
    }
?>