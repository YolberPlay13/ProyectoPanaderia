<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetalleIngresoModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getActive() {
        $this->db->where('estado_detalle_ingreso', 1);
        return $this->db->get($this->table)->result();
    }

    public function getDetallesByIngreso($id_ingreso){
        $this->db->select('d.*, p.nombre as nombre_producto');
        $this->db->from('detalle_ingreso d');
        $this->db->join('productos p', 'd.producto_ingresado = p.id', 'left');
        $this->db->where('d.id_ingreso', $id_ingreso);
        return $this->db->get()->result();
    }

    public function insertarDetalle($data){
        return $this->db->insert('detalle_ingreso', $data);
    }

    public function eliminarDetalle($id){
        return $this->db->delete('detalle_ingreso', ['id_detalle_ingreso' => $id]);
    }
}
