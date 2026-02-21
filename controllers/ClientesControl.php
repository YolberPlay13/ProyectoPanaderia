<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ClientesModel');
        $this->load->model('DetalleIngresoModel');
    }

    // Listar clientes activos
    public function index() {
        $data['clientes'] = $this->ClientesModel->getAll(); // CORRECTO
        $this->load->view('clientes/lista', $data);
    }

    // Formulario para crear cliente
    public function crear() {
        $this->load->view('clientes/formulario');
    }

    // Guardar cliente nuevo
    public function guardar() {
        $data = array(
            'cedula_cliente' => $this->input->post('cedula_cliente'),
            'nombres_apellidos_cliente' => $this->input->post('nombres_apellidos_cliente'),
            'telefono_cliente' => $this->input->post('telefono_cliente'),
            'correo_cliente' => $this->input->post('correo_cliente'),
            'estado_cliente' => 1
        );
        $this->ClientesModel->insert($data);
        redirect(base_url('ClientesControl'));
    }

    // Editar cliente
    public function editar($id) {
        $data['cliente'] = $this->ClientesModel->getById($id);
        $this->load->view('clientes/formulario', $data);
    }

    // Actualizar cliente
    public function actualizar($id) {
        $data = array(
            'cedula_cliente' => $this->input->post('cedula_cliente'),
            'nombres_apellidos_cliente' => $this->input->post('nombres_apellidos_cliente'),
            'telefono_cliente' => $this->input->post('telefono_cliente'),
            'correo_cliente' => $this->input->post('correo_cliente'),
        );
        $this->ClientesModel->update($id, $data);
        redirect(base_url('ClientesControl'));
    }

    // Cambiar estado (activar/inactivar)
    public function cambiar_estado($id, $estado) {
        $nuevo_estado = ($estado == 1) ? 0 : 1;
        $this->ClientesModel->changeEstado($id, $nuevo_estado); // CORRECTO
        redirect(base_url('ClientesControl'));
    }
    public function historia() {
        $this->load->view('clientes/historia');
    }
}
