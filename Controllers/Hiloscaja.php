<?php
    class Hiloscaja extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function hiloscaja()
        {
            $data['page_tag'] = "Hilos por Caja";
            $data['page_title'] = "Hilos por caja <small>Aleana&Carlup</small>";
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
                if($arrData[$i]['status'] == 1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btn-sm btnPermisosRol" rl="'.$arrData[$i]['id_hilo_caja'].'" title="Permisos"><i class="fas fa-key"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditRol" rl="'.$arrData[$i]['id_hilo_caja'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelRol" rl="'.$arrData[$i]['id_hilo_caja'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setHilocaja()
        {
            if ($_POST) {
                if (empty($_POST['listColor']) || empty($_POST['txtMarca']) || empty($_POST['txtTenida']) || empty($_POST['listTipo']) || empty($_POST['txtCantidadCajas']) || empty($_POST['txtCantidadConos']) || empty($_POST['txtPesoTotal']) || empty($_POST['listTipoEmpaquetado']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $intColor = intval(strClean($_POST['listColor']));
                    $strMarca = ucwords(strClean($_POST['txtMarca']));
                    $strTenida = ucwords(strClean($_POST['txtTenida']));
                    $intTipo = intval(strClean($_POST['listTipo']));
                    $intCantidadCajas = intval(strClean($_POST['txtCantidadCajas']));
                    $intCantidadConos = intval(strClean($_POST['txtCantidadConos']));
                    $intPeso = intval(strClean($_POST['txtPesoTotal']));
                    $strTipoEmpaquetado = ucwords(strClean($_POST['listTipoEmpaquetado']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $request_hilocaja = $this->model->insertHilocaja($intColor,
                                                                    $strMarca,
                                                                    $strTenida,
                                                                    $intTipo,
                                                                    $intCantidadCajas,
                                                                    $intCantidadConos,
                                                                    $intPeso,
                                                                    $strTipoEmpaquetado,
                                                                    $intStatus);

                    if ($request_hilocaja > 0)
                    {
                        $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
                    }/*else if($request_hilocaja == 'exist')
                    {
                        $arrResponse = array("status" => false, "msg" => '¡Atención! el email o la identificación ya existe, ingrese otro.');
                    }*/else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }
?>