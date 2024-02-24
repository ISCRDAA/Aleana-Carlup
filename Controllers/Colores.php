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
    }
?>