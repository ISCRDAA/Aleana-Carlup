<?php
    class Modelosprendas extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function modelosprendas()
        {
            $data['page_id'] = 4;
            $data['page_tag'] = "Modelos de las Prendas";
            $data['page_name'] = "modelo_prendas";
            $data['page_title'] = "Modelos de las Prendas <small>Aleana&Carlup</small>";
            //echo "Mensaje desde el controlador";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "modelosprendas",$data);
        }

        public function getModelosprendas()
        {
            $arrData = $this -> model -> selectModelosprendas();

            for ($i = 0; $i < count($arrData); $i++)
            {
                if($arrData[$i]['status'] == 1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-info btn-sm btn-sm btnViewModeloPrenda" mp="'.$arrData[$i]['id_modelo'].'" title="Ver modelo de prenda"><i class="far fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditModeloPrenda" mp="'.$arrData[$i]['id_modelo'].'" title="Editar  modelo de prenda"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelModeloPrenda" mp="'.$arrData[$i]['id_modelo'].'" title="Eliminar  modelo de prenda"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getSelectModelosPrendas()
        {
            $htmlOptions = "";
            $arrData = $this->model->selectModelosprendas();
            if(count($arrData) > 0){
                for ($i=0; $i < count($arrData); $i++) {
                    $htmlOptions .= '<option value="'.$arrData[$i]['id_modelo'].'">'.$arrData[$i]['nombre'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function setModeloprenda(){
            if ($_POST) {
                if (empty($_POST['txtNombre']) || empty($_POST['listTipo']) || empty($_POST['txtPeso']) || empty($_POST['listStatus'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $intTipo = intval(strClean($_POST['listTipo']));
                    $intPeso = intval(strClean($_POST['txtPeso']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $request_modelpren = $this->model->insertModeloprenda($strNombre,
                                                                        $intTipo,
                                                                        $intPeso,
                                                                        $intStatus);

                    if ($request_modelpren > 0)
                    {
                        $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
                    }else if($request_modelpren == 'exist')
                    {
                        $arrResponse = array("status" => false, "msg" => '¡Atención! el Nombre del Modelo ya existe, ingrese otro.');
                    }else {
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }
?>