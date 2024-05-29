<?php
    class Hiloscaja extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hiloscaja()
        {
            $data['page_tag'] = "Hilos Aguila";
            $data['page_title'] = "Hilos Aguila <small>Aleana&Carlup</small>";
            $data['page_name'] = "hiloscaja";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hiloscaja",$data);
        }

        public function getHilosCaja()
        {
            $arrData = $this -> model -> selectHiloscaja();
            //dep($arrData[0]['status']);exit;

            for ($i = 0; $i < count($arrData); $i++)
            {
                // Obtiene la fecha en formato 'Y-m-d' (solo la fecha)dateupdate
                $dateCreated = date("Y-m-d", strtotime($arrData[$i]['datecreated']));
                $dateUpdate = date("Y-m-d", strtotime($arrData[$i]['dateupdate']));
                $arrData[$i]['datecreated'] = $dateCreated;
                $arrData[$i]['dateupdate'] = $dateUpdate;

                if($arrData[$i]['status'] == 1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-info btn-sm btn-sm btnViewHiloCaja" hca="'.$arrData[$i]['id_hilo_caja'].'" title="Ver hilo aguila"><i class="fas fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditHiloCaja" hca="'.$arrData[$i]['id_hilo_caja'].'" title="Editar hilo aguila"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelHiloCaja" hca="'.$arrData[$i]['id_hilo_caja'].'" title="Eliminar hilo aguila"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setHilocaja()
        {
            if ($_POST) {
                if (empty($_POST['listColor']) || empty($_POST['txtMarca']) || empty($_POST['txtTenida']) || empty($_POST['listTipo']) || empty($_POST['txtPesoTotal']) || empty($_POST['listTipoEmpaquetado']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $intColor = intval(strClean($_POST['listColor']));
                    $strMarca = ucwords(strClean($_POST['txtMarca']));
                    $strTenida = '#'.ucwords(strClean($_POST['txtTenida']));
                    $intTipo = intval(strClean($_POST['listTipo']));
                    $intPeso = intval(strClean($_POST['txtPesoTotal']));
                    $strTipoEmpaquetado = ucwords(strClean($_POST['listTipoEmpaquetado']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $fechaCliente = date("Y-m-d H:i:s"); // Capturar la fecha y hora actuales del servidor

                    $request_hilocaja = $this->model->insertHilocaja($intColor,
                                                                    $strMarca,
                                                                    $strTenida,
                                                                    $intTipo,
                                                                    $intPeso,
                                                                    $strTipoEmpaquetado,
                                                                    $fechaCliente,
                                                                    $intStatus);

                    if ($request_hilocaja > 0)
                    {
                        $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }
?>