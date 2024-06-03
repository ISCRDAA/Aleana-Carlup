<?php
    class HilosinternacionalesModel extends Mysql
    {
        private $intIdHiloEuro;
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

        public function selectHilosinternacionales()
        {
            // Extraer Hilos Internacionales, Colores y Tipos
            $sql = "SELECT
                        hInter.idhilosinternacionales,
                        ch.nombre_color,
                        hInter.marca,
                        hInter.tenida,
                        t.nombre AS nombre_tipo,
                        hInter.peso_total,
                        hInter.tipo_empaquetado,
                        hInter.datecreated,
                        hInter.dateupdate,
                        hInter.status
                    FROM
                        hilosinternacionales AS hInter
                    INNER JOIN
                        colores_hilos AS ch ON hInter.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hInter.tipo_id = t.id_tipo
                    WHERE hInter.status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertHilointernacional(int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoempaquetado, string $fechaupdate, int $status)
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

            $query_insert = "INSERT INTO hilosinternacionales(color_id,marca,tenida,tipo_id,peso_total,tipo_empaquetado,dateupdate,status) VALUES (?,?,?,?,?,?,?,?)";
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