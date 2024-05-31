<?php
    class Coloresmodelos extends Controllers{
        public function __construct()
        {
            parent:: __construct();
        }

        public function coloresmodelos()
        {
            $data['page_id'] = 6;
            $data['page_tag'] = "Colores Modelos";
            $data['page_name'] = "colores_modelos";
            $data['page_title'] = "Colores Modelos <small>Aleana&Carlup</small>";
            // hacemos el llamado a la vista que queremos mostrar
            // enviandole como parametro el arrary de datos $data
            $this -> views -> getView($this, "coloresmodelos",$data);
        }

        public function getColoresmodelos()
        {
            $arrData = $this -> model -> selectColoresmodelos();
            //dep($arrData[0]['status']);exit;

            for ($i = 0; $i < count($arrData); $i++)
            {
                // Validar cada campo de color
                $camposColor = array($arrData[$i]['color_combinacion_01'],
                                    $arrData[$i]['color_combinacion_02'],
                                    $arrData[$i]['color_combinacion_03'],
                                    $arrData[$i]['color_combinacion_04'],
                                    $arrData[$i]['color_combinacion_05']
                );

                // in_array() busca si un valor específico existe en un array. Su sintaxis básica es: in_array($valor_a_buscar, $array_a_buscar);
                // La función devuelve true si el valor está presente en el array y false si no lo está.
                if (in_array('No Asignado', $camposColor)) {
                    $arrData[$i]['color_combinacion_01'] = '<span class="badge badge-danger">No Asignado</span>';
                    $arrData[$i]['color_combinacion_02'] = '<span class="badge badge-danger">No Asignado</span>';
                    $arrData[$i]['color_combinacion_03'] = '<span class="badge badge-danger">No Asignado</span>';
                    $arrData[$i]['color_combinacion_04'] = '<span class="badge badge-danger">No Asignado</span>';
                    $arrData[$i]['color_combinacion_05'] = '<span class="badge badge-danger">No Asignado</span>';
                    // Puedes hacer lo mismo para los otros campos de color si es necesario
                }

                if($arrData[$i]['status'] == 1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }

                $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-info btn-sm btn-sm btnViewColorModelo" cm="'.$arrData[$i]['id_color_modelo'].'" title="Ver Color del modelo"><i class="far fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btn-sm btnEditColorModelo" cm="'.$arrData[$i]['id_color_modelo'].'" title="Editar Color del modelo"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btn-sm btnDelColorModelo" cm="'.$arrData[$i]['id_color_modelo'].'" title="Eliminar Color del modelo"><i class="fas fa-trash-alt"></i></button>
                                            </div>';
            }

            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setColormodelo()
        {
            if ($_POST) {
                //dep($_POST);exit;
                if (empty($_POST['listColor']) || empty($_POST['listModelo']) || empty($_POST['listStatus']) || empty($_POST['listCombinacion01']) || empty($_POST['listCombinacion02']) || empty($_POST['listCombinacion03']) || empty($_POST['listCombinacion04']) || empty($_POST['listCombinacion05'])) {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                } else {
                    $intColor = intval(strClean($_POST['listColor']));
                    $intModelo = intval(strClean($_POST['listModelo']));
                    $intCombinacion01 = intval(strClean($_POST['listCombinacion01']));
                    $intCombinacion02 = intval(strClean($_POST['listCombinacion02']));
                    $intCombinacion03 = intval(strClean($_POST['listCombinacion03']));
                    $intCombinacion04 = intval(strClean($_POST['listCombinacion04']));
                    $intCombinacion05 = intval(strClean($_POST['listCombinacion05']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $request_colormodelo = $this->model->insertColorModelo($intColor,
                                                                    $intModelo,
                                                                    $intCombinacion01,
                                                                    $intCombinacion02,
                                                                    $intCombinacion03,
                                                                    $intCombinacion04,
                                                                    $intCombinacion05,
                                                                    $intStatus);

                    if ($request_colormodelo > 0)
                    {
                        $arrResponse = array("status" => true, "msg" => 'Datos guardados correctamente.');
                    }else if($request_colormodelo == 'exist')
                    {
                        $arrResponse = array("status" => false, "msg" => '¡Atención! el modelo con ese color ya existe, ingrese otro.');
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