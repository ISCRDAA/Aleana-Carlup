<?php
    class Hiloseuros extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hiloseuros()
        {
            $data['page_tag'] = "Hilos Euros";
            $data['page_title'] = "Hilos Euros <small>Aleana&Carlup</small>";
            $data['page_name'] = "hiloseuros";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hiloseuros",$data);
        }

        public function getHilosEuros()
        {
            $arrData = $this -> model -> selectHiloseuros();
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
                <button class="btn btn-info btn-sm btn-sm btnViewHiloEuro" he="'.$arrData[$i]['idhiloseuros'].'" title="Ver hilo euro"><i class="fas fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditHiloEuro" he="'.$arrData[$i]['idhiloseuros'].'" title="Editar hilo euro"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelHiloEuro" he="'.$arrData[$i]['idhiloseuros'].'" title="Eliminar hilo euro"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setHiloeuro()
        {
            if ($_POST) {
                //dep($_POST);die();
                if (empty($_POST['listColor']) || empty($_POST['txtMarca']) || empty($_POST['txtTenida']) || empty($_POST['listTipo']) || empty($_POST['txtPesoTotal']) || empty($_POST['listTipoEmpaquetado']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $idhiloEuro = intval($_POST['idHilosEuros']);
                    $intColor = intval(strClean($_POST['listColor']));
                    $strMarca = ucwords(strClean($_POST['txtMarca']));
                    $strTenida = '#'.ucwords(strClean($_POST['txtTenida']));
                    $intTipo = intval(strClean($_POST['listTipo']));
                    $intPeso = intval(strClean($_POST['txtPesoTotal']));
                    $strTipoEmpaquetado = ucwords(strClean($_POST['listTipoEmpaquetado']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $fechaCliente = date("Y-m-d H:i:s"); // Capturar la fecha y hora actuales del servidor

                    if ($idhiloEuro == 0) {
                        $option = 1;
                        $request_hiloeuro = $this->model->insertHiloeuro($intColor,
                                                                    $strMarca,
                                                                    $strTenida,
                                                                    $intTipo,
                                                                    $intPeso,
                                                                    $strTipoEmpaquetado,
                                                                    $fechaCliente,
                                                                    $intStatus);
                    } else {
                        $option = 2;
                        $request_hiloeuro = $this->model->updateHiloeuro($idhiloEuro,
                                                                    $intColor,
                                                                    $strMarca,
                                                                    $strTenida,
                                                                    $intTipo,
                                                                    $intPeso,
                                                                    $strTipoEmpaquetado,
                                                                    $fechaCliente,
                                                                    $intStatus);

                    }

                    if ($request_hiloeuro > 0)
                    {
                        if ($option == 1) {
                            $arrResponse = array("status" => true, "msg" => 'Datos Guardados correctamente.');
                        }else{
                            $arrResponse = array("status" => true, "msg" => 'Datos Actualizados correctamente.');
                        }
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getHiloEuro(int $idhiloeuro){
            $idhiloEuro = intval($idhiloeuro);
            if ($idhiloEuro > 0)
            {
                $arrData = $this->model->selectHiloEuro($idhiloEuro);
                if (empty($arrData)) {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                } else {
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }
?>