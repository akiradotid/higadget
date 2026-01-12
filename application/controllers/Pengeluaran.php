<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class Pengeluaran extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mfinancetrx_model');
  }

  public function index()
  {
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();
    $data['content'] = $this->load->view('finance/pengeluaran', $data, true);
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
    <script src="' . base_url('assets/js/additional-js/pengeluaran.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }

  function createpost(){
    $data = [
        'id_finance_trx'      => uniqid(),
        'tgl_transaksi'      => $this->input->post('tgl_transaksi'),
        'id_finance_kategori'      => $this->input->post('kategori'),
        'catatan'      => $this->input->post('catatan'),
        'nominal'      => $this->input->post('nominal'),
        'created_at'      => date('Y-m-d H:i:s'),
    ];
		
    $this->Mfinancetrx_model->create($data);

    redirect('pengeluaran');
  }

  public function edit($id){
    $data['get_id']= $this->Mfinancetrx_model->getWhere($id);
    echo json_encode($data);
  }

  public function updatepost(){
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('eid');
      $data = [
        'tgl_transaksi'     => $this->input->post('etgl_transaksi'),
        'kategori'   => $this->input->post('ekategori'),
        'catatan'   => $this->input->post('ecatatan'),
        'nominal'   => $this->input->post('enominal'),
      ];
      
      $this->Mfinancetrx_model->update($id, $data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('pengeluaran');
    }
  }

  public function deletepost($id) {
    $result = $this->Mfinancetrx_model->delete($id);
    echo json_encode($result);
  }

  public function jsonfnp(){
    $this->load->library('datatables');
    $this->datatables->select('trx.id_finance_trx,trx.tgl_transaksi,fk.nama as nama_kategori,trx.catatan,trx.nominal,tb.no_rek,tb.nama_bank,trx.created_at');
    $this->datatables->from('tb_finance_trx trx');
    $this->datatables->join('tb_finance_kategori fk', 'trx.id_finance_kategori = fk.id_finance_kategori', 'left');
    $this->datatables->join('tb_bank tb', 'tb.id_bank = trx.id_bank', 'left');
    $this->datatables->where('fk.tipe', 'Pengeluaran');
    return print_r($this->datatables->generate());
  }

}


/* End of file Pengeluaran.php */
/* Location: ./application/controllers/Pengeluaran.php */