<?php
    class Hiloscostal extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hiloscostal()
        {
            $data['page_tag'] = "Hilos Coperativa";
            $data['page_title'] = "Hilos Coperativa <small>Aleana&Carlup</small>";
            $data['page_name'] = "hiloscostal";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "hiloscostal",$data);
        }

        public function getHilosCostal()
        {
            $arrData = $this -> model -> selectHiloscostal();
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
                <button class="btn btn-info btn-sm btn-sm btnViewHiloCoperativa" hco="'.$arrData[$i]['id_hilo_costal'].'" title="Ver hilo coperativa"><i class="fas fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditHiloCoperativa" hco="'.$arrData[$i]['id_hilo_costal'].'" title="Editar hilo coperativa"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelHiloCoperativa" hco="'.$arrData[$i]['id_hilo_costal'].'" title="Eliminar hilo coperativa"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setHilocostal()
        {
            if ($_POST) {
                //dep($_POST);die();
                if (empty($_POST['listColor']) || empty($_POST['txtMarca']) || empty($_POST['txtTenida']) || empty($_POST['listTipo']) || empty($_POST['txtPesoTotal']) || empty($_POST['listTipoEmpaquetado']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $idHiloCostal = intval($_POST['idHilosCostal']);
                    $intColor = intval(strClean($_POST['listColor']));
                    $strMarca = ucwords(strClean($_POST['txtMarca']));
                    $strTenida = '#'.ucwords(strClean($_POST['txtTenida']));
                    $intTipo = intval(strClean($_POST['listTipo']));
                    $intPeso = intval(strClean($_POST['txtPesoTotal']));
                    $strTipoEmpaquetado = ucwords(strClean($_POST['listTipoEmpaquetado']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $fechaCliente = date("Y-m-d H:i:s"); // Capturar la fecha y hora actuales del servidor

                    if ($idHiloCostal == 0) {
                        $option = 1;
                        $request_hilocostal = $this->model->insertHilocostal($intColor,
                                                                        $strMarca,
                                                                        $strTenida,
                                                                        $intTipo,
                                                                        $intPeso,
                                                                        $strTipoEmpaquetado,
                                                                        $fechaCliente,
                                                                        $intStatus);
                    } else {
                        $option = 2;
                        $request_hilocostal = $this->model->updatetHilocostal($idHiloCostal,
                                                                        $intColor,
                                                                        $strMarca,
                                                                        $strTenida,
                                                                        $intTipo,
                                                                        $intPeso,
                                                                        $strTipoEmpaquetado,
                                                                        $fechaCliente,
                                                                        $intStatus);
                    }

                    if ($request_hilocostal > 0)
                    {
                        if ($option == 1) {
                            $arrResponse = array("status" => true, "msg" => 'Datos Guardados correctamente.');
                        } else {
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

        public function getHiloCostal(int $idhilocostal){
            $idHiloCostal = intval($idhilocostal);
            if ($idHiloCostal > 0)
            {
                $arrData = $this->model->selectHiloCostal($idHiloCostal);
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