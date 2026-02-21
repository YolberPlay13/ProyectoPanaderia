<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuControl extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Seguridad: si no hay sesión, redirige al login
        if (!$this->session->userdata('usuario')) {
            redirect(base_url('LoginControl'));
        }
        
        // Cargar modelos necesarios para el dashboard
        $this->load->model('ProductosModel');
        $this->load->model('ProveedorModel');
        $this->load->model('ClientesModel');
    }

    public function index() {
        // Preparar datos para el dashboard
        $data['page_title'] = 'Dashboard - Panel Principal';
        
        // Obtener estadísticas
        $productos = $this->ProductosModel->getActive();
        $data['total_productos'] = count($productos);
        $data['productos_stock_bajo'] = count(array_filter($productos, function($p) { 
            return $p->existencia_producto <= 10; 
        }));
        
        $data['total_proveedores'] = count($this->ProveedorModel->getAll());
        $data['total_clientes'] = count($this->ClientesModel->getAll());
        
        // Cargar la vista del dashboard con Bootstrap
        $content = $this->load->view('dashboard/dashboard_content', $data, TRUE);
        $data['content'] = $content;
        
        $this->load->view('layouts/main', $data);
    }
}