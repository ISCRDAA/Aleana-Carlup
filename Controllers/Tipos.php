<?php
    class Tipos extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function tipos()
        {
            $data['page_id'] = 5;
            $data['page_tag'] = "Tipos";
            $data['page_name'] = "tipos";
            $data['page_title'] = "Tipos <small>Aleana&Carlup</small>";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "tipos",$data);
        }

        public function getTipos()
        {
            $arrData = $this -> model -> selectTipos();
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
                <button class="btn btn-info btn-sm btn-sm btnViewTipo" tp="'.$arrData[$i]['id_tipo'].'" title="Ver tipo"><i class="far fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditTipo" tp="'.$arrData[$i]['id_tipo'].'" title="Editar tipo"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelTipo" tp="'.$arrData[$i]['id_tipo'].'" title="Eliminar tipo"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getSelectTipos()
        {
            $htmlOptions = "";
            $arrData = $this->model->selectTipos();
            if(count($arrData) > 0){
                for ($i=0; $i < count($arrData); $i++) {
                    $htmlOptions .= '<option value="'.$arrData[$i]['id_tipo'].'">'.$arrData[$i]['nombre'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function setTipo()
        {
            if ($_POST) {
                if (empty($_POST['txtTipo']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $strTipo = ucwords(strClean($_POST['txtTipo']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $request_tipo = $this->model->insertTipo($strTipo,
                                                            $intStatus);

                    if ($request_tipo > 0) {
                        $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
                    } else if($request_tipo == 'exist')
                    {
                        $arrResponse = array("status" => false, "msg" => '¡Atención! el tipo ya existe, ingrese otro.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getTipo(int $idtipo){
            $idTipo = intval($idtipo);
            if ($idTipo > 0)
            {
                $arrData = $this->model->selectTipo($idTipo);
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