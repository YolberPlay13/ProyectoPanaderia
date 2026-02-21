<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IngresosPanesControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('IngresosModel');
        $this->load->model('ProveedorModel');
        $this->load->model('ProductosModel');
        $this->load->library('session');
    }

    // Mostrar formulario
   
    public function crearPanes() {

    $data['proveedores'] = $this->ProveedorModel->getProveedoresActivos();

    // SOLO PRODUCTOS DE PANES
    $data['productos'] = $this->ProductosModel->getProductosPorCategoria(1);

    $this->load->view('ingresos/crearPanes', $data);
}


    // Guardar ingreso maestro-detalle
    public function guardar() {
        $id_usuario = $this->session->userdata('id_usuario');

        // Datos maestro
        $dataIngreso = array(
            'fecha_ingreso'  => date('Y-m-d'),
            'proveedor'      => $this->input->post('proveedor'),
            'estado_ingreso' => 1,
            'id_usuario'     => $id_usuario
        );

        $id_ingreso = $this->IngresosModel->insertIngreso($dataIngreso);

        // Detalle
        $productos = $this->input->post('producto');
        $cantidades = $this->input->post('cantidad');
        

        if($id_ingreso){
            for ($i = 0; $i < count($productos); $i++) {
                $detalle = array(
                    'id_ingreso'         => $id_ingreso,
                    'producto_ingresado' => $productos[$i],
                    'cantidad_ingresada' => $cantidades[$i],
                    
                    'estado_detalle_ingreso' => 1
                );
                $this->IngresosModel->insertDetallePanes($detalle);

                // Actualizar stock
                $this->ProductosModel->sumarStock($productos[$i], $cantidades[$i]);
            }
        }

        redirect('IngresosPanesControl/crearPanes');
    }
}
