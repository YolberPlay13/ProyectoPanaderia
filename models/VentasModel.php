<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getVentas(){
        // Usar los campos REALES de tus tablas
        $this->db->select('v.id_ventas, v.fecha_venta, v.estado_venta, c.nombre as cliente_nombre');
        $this->db->from('ventas v');
        $this->db->join('clientes c', 'v.cliente = c.id_cliente', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function guardarVenta($data){
        $this->db->insert('ventas', $data);
        return $this->db->insert_id();
    }

    public function eliminarVenta($id){
        $this->db->where('id_ventas', $id);
        return $this->db->delete('ventas');
    }
}
