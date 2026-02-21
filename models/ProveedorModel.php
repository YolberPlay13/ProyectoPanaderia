<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedorModel extends CI_Model {

    private $tabla = "proveedores";

    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los proveedores activos
    public function getAll() {
        $this->db->where('estado_proveedor', 1); // solo activos
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

    // Obtener proveedor por ID
    public function getById($id) {
        $this->db->where('id_proveedor', $id);
        $query = $this->db->get($this->tabla);
        return $query->row();
    }

    // Insertar proveedor
    public function insert($data) {
        return $this->db->insert($this->tabla, $data);
    }

    // Actualizar proveedor
    public function update($id, $data) {
        $this->db->where('id_proveedor', $id);
        return $this->db->update($this->tabla, $data);
    }

    public function getProveedoresActivos() {
    return $this->db->where('estado_proveedor', 1)->get('proveedores')->result();
    }


}
