<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('VentasModel');
        $this->load->model('ClientesModel'); // para mostrar cliente en combos
        $this->load->helper('url');

        // Protegemos con login
        if (!$this->session->userdata('logueado')) {
            redirect('login');
        }
    }

    // Listar ventas
    public function index(){
        $data['ventas'] = $this->VentasModel->getVentas();
        $this->load->view('Dashboard/header');
        $this->load->view('Dashboard/nav');
        $this->load->view('ventas/index', $data);
        $this->load->view('Dashboard/footer');
    }

    // Nuevo registro de venta
    public function nuevo(){
        $data['clientes'] = $this->ClientesModel->getClientes();
        $this->load->view('Dashboard/header');
        $this->load->view('Dashboard/nav');
        $this->load->view('ventas/nuevo', $data);
        $this->load->view('Dashboard/footer');
    }

    // Guardar venta
    public function guardar(){
        $data = [
            'fecha_venta' => $this->input->post('fecha_venta'),
            'cliente'     => $this->input->post('cliente'),
            'total_venta' => $this->input->post('total_venta'),
            'estado_venta'=> $this->input->post('estado_venta'),
            'id_usuario'  => $this->session->userdata('usuario') ?? 1
        ];
        $this->VentasModel->guardarVenta($data);
        redirect('ventas');
    }

    public function eliminar($id){
        $this->VentasModel->eliminarVenta($id);
        redirect('ventas');
    }
}
