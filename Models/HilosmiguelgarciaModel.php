<?php
    class HilosmiguelgarciaModel extends Mysql
    {
        private $intIdHiloMiguelGarcia;
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

        public function selectHilosmiguelgarcia()
        {
            // Extraer Hilos Miguel Garcia, Colores y Tipos
            $sql = "SELECT
                        hMiguelG.idhilosmiguelgarcia,
                        ch.nombre_color,
                        hMiguelG.marca,
                        hMiguelG.tenida,
                        t.nombre AS nombre_tipo,
                        hMiguelG.peso_total,
                        hMiguelG.tipo_empaquetado,
                        hMiguelG.datecreated,
                        hMiguelG.dateupdate,
                        hMiguelG.status
                    FROM
                        hilosmiguelgarcia AS hMiguelG
                    INNER JOIN
                        colores_hilos AS ch ON hMiguelG.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hMiguelG.tipo_id = t.id_tipo
                    WHERE hMiguelG.status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertHilomiguelgarcia(int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoempaquetado, string $fechaupdate, int $status)
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

            $query_insert = "INSERT INTO hilosmiguelgarcia(color_id,marca,tenida,tipo_id,peso_total,tipo_empaquetado,dateupdate,status) VALUES (?,?,?,?,?,?,?,?)";
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

        public function selectHiloMiguelGarcia(int $idhilomiguelgarcia)
        {
            $this->intIdHiloMiguelGarcia = $idhilomiguelgarcia;
            $sql = "SELECT
                        hMiguelG.idhilosmiguelgarcia,
                        ch.nombre_color,
                        hMiguelG.marca,
                        hMiguelG.tenida,
                        t.nombre AS nombre_tipo,
                        hMiguelG.peso_total,
                        hMiguelG.tipo_empaquetado,
                        DATE_FORMAT(hMiguelG.datecreated, '%d-%m-%Y') AS datecreated,
                        DATE_FORMAT(hMiguelG.dateupdate, '%d-%m-%Y') AS dateupdate,
                        hMiguelG.status
                    FROM
                        hilosmiguelgarcia AS hMiguelG
                    INNER JOIN
                        colores_hilos AS ch ON hMiguelG.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hMiguelG.tipo_id = t.id_tipo
                    WHERE hMiguelG.idhilosmiguelgarcia = '{$this->intIdHiloMiguelGarcia}'";
            $request = $this->select($sql);
            return $request;
        }
    }
?>