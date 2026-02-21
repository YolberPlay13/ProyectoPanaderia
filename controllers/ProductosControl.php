<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductosModel');
    }

    // Listado de productos activos
    public function index() {
        $data['productos'] = $this->ProductosModel->getActive(); // solo activos
        $data['categoria'] = $this->ProductosModel->categoria(); // solo activos
        $this->load->view('productos/index', $data);
    }

    // Crear producto
    public function crear() {
        if ($this->input->post()) {
            $data = [
                'nombre_producto'     => $this->input->post('nombre_producto'),
                'categoria_id'     => $this->input->post('categoria_id'),
                'existencia_producto' => $this->input->post('existencia_producto'),
                'estado_producto'     => 1
            ];
            $this->ProductosModel->insert($data);
            redirect(base_url('ProductosControl'));
        } else {
            $data['categoria'] = $this->ProductosModel->categoria();
            $this->load->view('productos/crear', $data);
        }
    }

    // Editar producto
    public function editar($id) {
        if ($this->input->post()) {
            $data = [
                'nombre_producto'     => $this->input->post('nombre_producto'),
                'existencia_producto' => $this->input->post('existencia_producto')
            ];
            $this->ProductosModel->update($id, $data);
            redirect(base_url('ProductosControl'));
        } else {
            $data['producto'] = $this->ProductosModel->getById($id);
            $this->load->view('productos/editar', $data);
        }
    }

    // “Eliminar” producto (borrado lógico)
    public function eliminar($id) {
        $this->ProductosModel->cambiar_estado($id, 0); // cambia estado a 0
        redirect(base_url('ProductosControl'));
    }
}
