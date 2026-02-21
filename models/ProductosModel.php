<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model {

    private $table = "productos";

    public function __construct() {
        parent::__construct();
    }

    // Trae solo los productos activos
    public function getActive() {
        $this->db->where('estado_producto', 1);
        return $this->db->get($this->table)->result();
    }
    public function categoria() {
        $this->db->where('estado', 1);
        return $this->db->get('categoria')->result();
    }


    public function getProductosPorCategoria($categoria_id)
    {
        $this->db->where('categoria_id', $categoria_id);
        $this->db->where('estado_producto', 1);
        return $this->db->get('productos')->result();
    }


    // Trae todos los productos (opcional, si quieres incluir inactivos)
    public function getAll() {
        return $this->getActive();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ['id_producto' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_producto', $id)->update($this->table, $data);
    }

    // Cambia el estado de un producto (1=activo, 0=inactivo)
    public function cambiar_estado($id, $estado) {
        return $this->db->where('id_producto', $id)->update($this->table, ['estado_producto' => $estado]);
    }

    public function getProductosActivos() {
    return $this->db->where('estado_producto', 1)->get('productos')->result();
}

public function sumarStock($id_producto, $cantidad) {
    $this->db->set('existencia_producto', 'existencia_producto + '.$cantidad, FALSE);
    $this->db->where('id_producto', $id_producto);
    $this->db->update('productos');
}

}
