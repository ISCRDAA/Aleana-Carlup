<?php
    class Colores extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function colores()
        {
            $data['page_id'] = 6;
            $data['page_tag'] = "Colores";
            $data['page_name'] = "colores";
            $data['page_title'] = "Colores <small>Aleana&Carlup</small>";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "colores",$data);
        }

        public function getColores()
        {
            $arrData = $this -> model -> selectColores();
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
                <button class="btn btn-info btn-sm btn-sm btnViewColor" cl="'.$arrData[$i]['id_color'].'" title="Ver color"><i class="fas fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditColor" cl="'.$arrData[$i]['id_color'].'" title="Editar color"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelColor" cl="'.$arrData[$i]['id_color'].'" title="Eliminar color"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getSelectColores()
        {
            $htmlOptions = "";
            $arrData = $this->model->selectColores();
            if(count($arrData) > 0){
                for ($i=0; $i < count($arrData); $i++) {
                    $htmlOptions .= '<option value="'.$arrData[$i]['id_color'].'">'.$arrData[$i]['nombre_color'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function setColor()
        {
            if ($_POST) {
                //dep($_POST);die();
                if (empty($_POST['txtNombre']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $idColor = intval($_POST['idColor']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    if ($idColor == 0) {
                        $option = 1;
                        $request_color = $this->model->insertColor($strNombre,
                                                            $intStatus);
                    } else {
                        $option = 2;
                        $request_color = $this->model->updateColor($idColor,
                                                            $strNombre,
                                                            $intStatus);
                    }

                    if ($request_color > 0)
                    {
                        if ($option == 1) {
                            $arrResponse = array("status" => true, "msg" => 'Datos Guardados correctamente.');
                        }else{
                            $arrResponse = array("status" => true, "msg" => 'Datos Actualizados correctamente.');
                        }
                    }else if($request_color == 'exist')
                    {
                        $arrResponse = array("status" => false, "msg" => '¡Atención! el color ya existe, ingrese otro.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getColor(int $idcolor){
            $idColor = intval($idcolor);
            if ($idColor > 0)
            {
                $arrData = $this->model->selectColor($idColor);
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