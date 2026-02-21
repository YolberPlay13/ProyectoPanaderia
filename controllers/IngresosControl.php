<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IngresosControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('IngresosModel');
        $this->load->model('ProveedorModel');
        $this->load->model('ProductosModel');
        $this->load->library('session');
    }

    // Mostrar formulario
    public function crear() {
        $data['proveedores'] = $this->ProveedorModel->getProveedoresActivos();
        $data['productos']   = $this->ProductosModel->getProductosActivos();
        $this->load->view('ingresos/crear', $data);
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
        $precios    = $this->input->post('precio');

        if($id_ingreso){
            for ($i = 0; $i < count($productos); $i++) {
                $detalle = array(
                    'id_ingreso'         => $id_ingreso,
                    'producto_ingresado' => $productos[$i],
                    'cantidad_ingresada' => $cantidades[$i],
                    'precio_ingreso'     => $precios[$i],
                    'estado_detalle_ingreso' => 1
                );
                $this->IngresosModel->insertDetalle($detalle);

                // Actualizar stock
                $this->ProductosModel->sumarStock($productos[$i], $cantidades[$i]);
            }
        }

        redirect('IngresosControl/crear');
    }
}
