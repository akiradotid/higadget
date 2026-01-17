<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class BukuKas extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mbukukas_model');
  }

  public function index()
  {
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();
    $data['content'] = $this->load->view('finance/buku-kas', $data, true);
    $data['modal'] = '';
    $data['css'] = '
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/datatables.css').'">
    <link rel="stylesheet" type="text/css" href="'.base_url('assets/css/vendors/sweetalert2.css').'">
    <link rel="stylesheet" type="text/css" href="' . base_url('assets/css/vendors/select2.css') . '">
    <style>
        .select2-selection__rendered {
            line-height: 35px !important;
        }
        .select2-container .select2-selection--single {
            height: 38px !important;
            padding: 2px !important;
        }
        .select2-dropdown--below {
          margin-top:-2% !important;
        }
        .select2-selection__arrow {
            height: 37px !important;
        }
        .select2-container{
          margin-bottom :-2%;
        }
    </style>    
    ';
    $data['js'] = '<script>var base_url = "' . base_url() . '";</script>
    <script src="' . base_url('assets/js/sweet-alert/sweetalert.min.js').'"></script>
    <script src="' . base_url('assets/js/additional-js/buku-kas.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }

  public function edit($bulan, $tahun){
    $data['get_id']= $this->Mbukukas_model->getWhere($bulan, $tahun);
    echo json_encode($data);
  }

  public function updatepost(){
    if ($this->input->is_ajax_request()) {
      $data = [
        'bulan'     => $this->input->post('ebulan'),
        'tahun'   => $this->input->post('etahun'),
        'saldo_awal'   => $this->input->post('esaldo_awal'),
        'saldo_akhir'   => $this->input->post('esaldo_akhir'),
      ];
      
      $this->Mbukukas_model->createUpdate($data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('buku-kas');
    }
  }

  public function jsonkas(){
    $tahun = $this->input->get('tahun');

    $this->load->library('datatables');
    $this->datatables->select("bb.id as id_bulan,bb.nama_bulan,$tahun as tahun,bk.saldo_awal,bk.saldo_akhir");
    $this->datatables->from('tb_bulan bb');
    $this->datatables->join('tb_buku_kas bk','bk.bulan = bb.id', 'left');
    $this->datatables->where("bk.tahun = $tahun OR bk.tahun IS NULL");
    
    return print_r($this->datatables->generate());
  }

}


/* End of file BukuKas.php */
/* Location: ./application/controllers/BukuKas.php */