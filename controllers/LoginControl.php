<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $usuario = $this->LoginModel->validar_usuario($username, $password);

        if ($usuario) {
            // 🔹 Guardamos también el id_usuario en la sesión
            $this->session->set_userdata(array(
                'id_usuario' => $usuario->id_usuario,
                'usuario'    => $usuario->usuario
            ));
            redirect(base_url('MenuControl')); // redirige al controlador del menú
        } else {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
            redirect(base_url('LoginControl'));
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('LoginControl'));
    }
}
