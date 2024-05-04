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
    }
?>