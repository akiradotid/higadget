<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfinanceakun_model extends CI_Model {

  public function getDataByParams($searchTerm = [
    'id_finance_akun' => '',
    'nama' => '',
  ]) {
    $this->db->select(['id_finance_akun', 'nama', 'kategori']);
    $this->db->from('tb_finance_akun');
    $this->db->where_in('is_display', ['1']);

    // Add the search conditions if a search term is provided
    if ($searchTerm['nama'] != '') {
        $this->db->group_start();
        $this->db->like('nama', $searchTerm['nama']);
        $this->db->group_end();
    }

    $this->db->order_by('id_finance_akun', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getWhere($id)
  {   
    $query = $this->db->get_where('tb_finance_akun', array('id_finance_akun' => $id));
    return $query->result_array();
  }

  public function create($data)
  {
    $this->db->insert('tb_finance_akun',$data);
  }

  public function update($id, $data) {
    $this->db->where('id_finance_akun', $id);
    $this->db->update('tb_finance_akun', $data);
  }

  public function delete($id)
  {
    $this->db->where('id_finance_akun', $id);
    $success = $this->db->delete('tb_finance_akun', array("id_finance_akun" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }

}

/* End of file Mfinanceakun_model.php */
/* Location: ./application/models/Mfinanceakun_model.php */