<?php
    class HiloseurosModel extends Mysql
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

        public function selectHiloseuros()
        {
            // Extraer Hilos Euros, Colores y Tipos
            $sql = "SELECT
                        hEuros.idhiloseuros,
                        ch.nombre_color,
                        hEuros.marca,
                        hEuros.tenida,
                        t.nombre AS nombre_tipo,
                        hEuros.peso_total,
                        hEuros.tipo_empaquetado,
                        hEuros.datecreated,
                        hEuros.dateupdate,
                        hEuros.status
                    FROM
                        hiloseuros AS hEuros
                    INNER JOIN
                        colores_hilos AS ch ON hEuros.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hEuros.tipo_id = t.id_tipo
                    WHERE hEuros.status != 0";
            $request = $this -> select_all($sql);
            return $request;
        }

        public function insertHiloeuro(int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoempaquetado, string $fechaupdate, int $status)
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

            $query_insert = "INSERT INTO hiloseuros(color_id,marca,tenida,tipo_id,peso_total,tipo_empaquetado,dateupdate,status) VALUES (?,?,?,?,?,?,?,?)";
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

        public function selectHiloEuro(int $idhiloeuro)
        {
            $this->intIdHiloEuro = $idhiloeuro;
            $sql = "SELECT
                        hEuros.idhiloseuros,
                        ch.id_color AS color_id,
                        ch.nombre_color AS color_nombre,
                        hEuros.marca,
                        hEuros.tenida,
                        t.id_tipo AS tipo_id,
                        t.nombre AS tipo_nombre,
                        hEuros.peso_total,
                        hEuros.tipo_empaquetado,
                        DATE_FORMAT(hEuros.datecreated, '%d-%m-%Y') AS datecreated,
                        DATE_FORMAT(hEuros.dateupdate, '%d-%m-%Y') AS dateupdate,
                        hEuros.status
                    FROM
                        hiloseuros AS hEuros
                    INNER JOIN
                        colores_hilos AS ch ON hEuros.color_id = ch.id_color
                    INNER JOIN
                        tipo AS t ON hEuros.tipo_id = t.id_tipo
                    WHERE hEuros.idhiloseuros = '{$this->intIdHiloEuro}'";
            $request = $this->select($sql);
            return $request;
        }

        public function updateHiloeuro(int $idhiloeuro, int $color, string $marca, string $tenida, int $tipo, int $peso, string $tipoEmpaquetado, string $fechaupdate,int $status)
        {
            $this->intIdHiloEuro = $idhiloeuro;
            $this->intColor = $color;
            $this->strMarca = $marca;
            $this->strTenida = $tenida;
            $this->intTipo = $tipo;
            $this->intPeso = $peso;
            $this->strTipoEmpaquetado = $tipoEmpaquetado;
            $this->strfechaUpdate = $fechaupdate;
            $this->intStatus = $status;

            $sql = "UPDATE hiloseuros SET color_id=?, marca=?, tenida=?, tipo_id=?, peso_total=?, tipo_empaquetado=?, dateupdate=?, status=? WHERE idhiloseuros = '{$this->intIdHiloEuro}'";
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