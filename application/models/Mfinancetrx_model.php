<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfinancetrx_model extends CI_Model {

  public function getDataByParams($searchTerm = [
    'id_finance_trx' => '',
    'nama' => '',
  ]) {
    $this->db->select(['id_finance_trx', 'nama', 'kategori']);
    $this->db->from('tb_finance_trx');
    $this->db->where_in('is_display', ['1']);

    // Add the search conditions if a search term is provided
    if ($searchTerm['nama'] != '') {
        $this->db->group_start();
        $this->db->like('nama', $searchTerm['nama']);
        $this->db->group_end();
    }

    $this->db->order_by('id_finance_trx', 'asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getWhere($id)
  {   
    $query = $this->db->get_where('tb_finance_trx', array('id_finance_trx' => $id));
    return $query->result_array();
  }

  public function create($data)
  {
    $this->db->insert('tb_finance_trx',$data);
  }

  public function update($id, $data) {
    $this->db->where('id_finance_trx', $id);
    $this->db->update('tb_finance_trx', $data);
  }

  public function delete($id)
  {
    $this->db->where('id_finance_trx', $id);
    // $query = $this->db->get('tb_detail_penjualan');

    // if ($query->num_rows() > 0) {
    //   return array('success' => false, 'message' => 'Data akun finance dengan kode "'.$id.'" tidak bisa dihapus, karena sudah terdaftar dipenjualan');
    // }   
    $success = $this->db->delete('tb_finance_trx', array("id_finance_trx" => $id));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }

}

/* End of file Mfinancetrx_model.php */
/* Location: ./application/models/Mfinancetrx_model.php */