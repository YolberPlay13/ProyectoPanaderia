<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Validar usuario en la BD
    public function validar_usuario($username, $password) {
        // Seleccionamos explícitamente id_usuario y usuario
        $this->db->select('id_usuario, nombre AS usuario');
        $this->db->from('usuarios');
        $this->db->where('nombre', $username);
        $this->db->where('contrasena', $password); //  En producción deberías usar hash
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row(); // retorna el usuario con id_usuario y usuario
        } else {
            return false;
        }
    }
}
