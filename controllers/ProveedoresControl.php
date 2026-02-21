<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedoresControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProveedorModel');
    }

    // Listar todos los proveedores activos
    public function index() {
        $data['proveedores'] = $this->ProveedorModel->getAll(); // solo activos
        $this->load->view('proveedores/lista', $data);
    }

    // Formulario para crear proveedor
    public function crear() {
        $this->load->view('proveedores/formulario');
    }

    // Guardar proveedor nuevo
    public function guardar() {
        $data = array(
            'nit_proveedor' => $this->input->post('nit_proveedor'),
            'nombre_proveedor' => $this->input->post('nombre_proveedor'),
            'telefono_proveedor' => $this->input->post('telefono_proveedor'),
            'correo_proveedor' => $this->input->post('correo_proveedor'),
            'estado_proveedor' => 1
        );
        $this->ProveedorModel->insert($data);
        redirect(base_url('ProveedoresControl'));
    }

    // Editar proveedor
    public function editar($id) {
        $data['proveedor'] = $this->ProveedorModel->getById($id);
        $this->load->view('proveedores/formulario', $data);
    }

    // Actualizar proveedor
    public function actualizar($id) {
        $data = array(
            'nit_proveedor' => $this->input->post('nit_proveedor'),
            'nombre_proveedor' => $this->input->post('nombre_proveedor'),
            'telefono_proveedor' => $this->input->post('telefono_proveedor'),
            'correo_proveedor' => $this->input->post('correo_proveedor'),
        );
        $this->ProveedorModel->update($id, $data);
        redirect(base_url('ProveedoresControl'));
    }

    // Inactivar proveedor (estado = 0)
    public function cambiar_estado($id) {
        $this->ProveedorModel->update($id, ['estado_proveedor' => 0]);
        redirect(base_url('ProveedoresControl'));
    }

}
