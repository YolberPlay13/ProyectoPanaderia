<?php
class IngresosModel extends CI_Model {

    public function insertIngreso($data) {
        $this->db->insert('ingresos', $data);
        return $this->db->insert_id();
    }

    public function insertDetalle($data) {
        return $this->db->insert('detalle_ingreso', $data);
    }


    public function insertDetallePanes($data) {
        return $this->db->insert('detalle_ingreso_panes', $data);
    }
}
