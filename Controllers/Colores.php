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
                <button class="btn btn-secondary btn-sm btn-sm btnPermisosRol" rl="'.$arrData[$i]['id_color'].'" title="Permisos"><i class="fas fa-key"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditRol" rl="'.$arrData[$i]['id_color'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelRol" rl="'.$arrData[$i]['id_color'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
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
                if (empty($_POST['txtNombre']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $request_color = $this->model->insertColor($strNombre,
                                                            $intStatus);

                    if ($request_color > 0)
                    {
                        $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
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
    }
?>