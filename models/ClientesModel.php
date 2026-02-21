<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesModel extends CI_Model {

    private $tabla = "clientes";

    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los clientes activos
    public function getAll() {
        $this->db->where('estado_cliente', 1); // solo activos
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

    // Obtener cliente por ID
    public function getById($id) {
        $this->db->where('id_cliente', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    // Insertar cliente
    public function insert($data) {
        return $this->db->insert($this->tabla, $data);
    }

    // Actualizar cliente
    public function update($id, $data) {
        $this->db->where('id_cliente', $id);
        return $this->db->update($this->tabla, $data);
    }

    // Cambiar estado (activar/inactivar)
    public function changeEstado($id, $estado) {
        $this->db->where('id_cliente', $id);
        return $this->db->update($this->tabla, ['estado_cliente' => $estado]);
    }


    
}
