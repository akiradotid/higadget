<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbukukas_model extends CI_Model {

  public function getWhere($bulan, $tahun)
  {   
    $query = $this->db->get_where('tb_buku_kas', array('bulan' => $bulan, 'tahun' => $tahun));
    return $query->result_array();
  }
  
  public function createUpdate($data) {
    $bulan = $data['bulan'];
    $tahun = $data['tahun'];

    $query = $this->db->get_where('tb_buku_kas', array('bulan' => $bulan, 'tahun' => $tahun));

    if($query->num_rows() > 0) {
      $this->db->where('bulan', $bulan);
      $this->db->where('tahun', $tahun);
      $this->db->update('tb_buku_kas', $data);
    } else {
      $this->db->insert('tb_buku_kas', $data);
    }
  }

  public function delete($bulan, $tahun)
  {
    $success = $this->db->delete('tb_buku_kas', array('bulan' => $bulan, 'tahun' => $tahun));
    $message = $success ? 'Data berhasil dihapus' : 'Gagal dihapus';
    return array('success' => $success, 'message' => $message);
  }

}

/* End of file Mbukukas_model.php */
/* Location: ./application/models/Mbukukas_model.php */