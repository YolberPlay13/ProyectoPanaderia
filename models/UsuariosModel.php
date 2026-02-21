<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    // Validar usuario y contraseña
    public function login($usuario, $contrasena){
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasena', $contrasena);
        $this->db->where('estado_usuario', 1);
        $query = $this->db->get('usuarios');
        return $query->row(); // devuelve un objeto si encuentra
    }
}
