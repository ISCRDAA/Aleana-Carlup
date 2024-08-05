<?php
    class HilososcardominguezModel extends Mysql
    {
        private $intIdHiloOscarDominguez;
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

        public function selectHilososcardominguez()
        {
            // Extraer Hilos Euros, Colores y Tipos
            $sql = "SELECT
                        hOscarD.idhilososcardominguez,
                        ch.nombre_color,
                        hOscarD.marca,
                        hOscarD.tenida,
                        t.nombre AS nombre_tipo,
                        hOscarD.peso_total,
                        hOscarD.tipo_empaquetado,
                        hOscarD.datecreated,
                        hOscarD.dateupdate,
                        hOscarD.status
                    FROM
                        hilososcardominguez AS hOscarD
                    INNER JOIN
                        colores_hilos AS ch ON hOscarD.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hOscarD.tipo_id = t.id_tipo
                    WHERE hOscarD.status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertHilooscardominguez(int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoempaquetado, string $fechaupdate, int $status)
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

            $query_insert = "INSERT INTO hilososcardominguez(color_id,marca,tenida,tipo_id,peso_total,tipo_empaquetado,dateupdate,status) VALUES (?,?,?,?,?,?,?,?)";
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

        public function selectHiloOscarDominguez(int $idhilooscardominguez)
        {
            $this->intIdHiloOscarDominguez = $idhilooscardominguez;
            $sql = "SELECT
                        hOscarD.idhilososcardominguez,
                        ch.id_color AS color_id,
                        ch.nombre_color AS color_nombre,
                        hOscarD.marca,
                        hOscarD.tenida,
                        t.id_tipo AS tipo_id,
                        t.nombre AS tipo_nombre,
                        hOscarD.peso_total,
                        hOscarD.tipo_empaquetado,
                        DATE_FORMAT(hOscarD.datecreated, '%d-%m-%Y') AS datecreated,
                        DATE_FORMAT(hOscarD.dateupdate, '%d-%m-%Y') AS dateupdate,
                        hOscarD.status
                    FROM
                        hilososcardominguez AS hOscarD
                    INNER JOIN
                        colores_hilos AS ch ON hOscarD.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hOscarD.tipo_id = t.id_tipo
                    WHERE hOscarD.idhilososcardominguez = '{$this->intIdHiloOscarDominguez}'";
            $request = $this->select($sql);
            return $request;
        }
    }
?>