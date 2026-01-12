<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterFinanceKategori extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mfinancekategori_model');
  }

  public function index()
  {
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();
    $data['content'] = $this->load->view('master/masterfinancekategori', $data, true);
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
    <script src="' . base_url('assets/js/additional-js/mfinancekategori.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }

  function createpost(){
    $data = [
        'id_finance_kategori'      => $this->input->post('id_finance_kategori'),
        'id_finance_akun'      => $this->input->post('id_finance_akun'),
        'nama'      => $this->input->post('nama'),
        'tipe'      => $this->input->post('tipe'),
    ];
		
		$this->Mfinancekategori_model->create($data);

    redirect('master-finance-kategori');
  }

  public function edit($id){
    $data['get_id']= $this->Mfinancekategori_model->getWhere($id);
    echo json_encode($data);
  }

  public function updatepost(){
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('eid');
      $data = [
        'id_finance_akun'     => $this->input->post('eid_finance_akun'),
        'nama'     => $this->input->post('enama'),
        'tipe'   => $this->input->post('etipe'),
      ];
      
      $this->Mfinancekategori_model->update($id, $data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('master-finance-kategori');
    }
  }

  public function deletepost($id) {
    $result = $this->Mfinancekategori_model->delete($id);
    echo json_encode($result);
  }

  public function loadfnk(){
    $searchTerm = [];
    $searchTerm['nama'] = $this->input->get('nama');
    $searchTerm['id_finance_kategori'] = '';
    $searchTerm['tipe'] = $this->input->get('tipe');
    $results = $this->Mfinancekategori_model->getDataByParams($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }

  public function jsonfnk(){
    $this->load->library('datatables');
    $this->datatables->select('fk.id_finance_kategori,fk.id_finance_akun,fk.nama,fk.tipe,fa.nama nama_finance_akun');
    $this->datatables->from('tb_finance_kategori fk');
    $this->datatables->join('tb_finance_akun fa', 'fk.id_finance_akun = fa.id_finance_akun', 'left');
    
    return print_r($this->datatables->generate());
  }

}


/* End of file MasterFinanceKategori.php */
/* Location: ./application/controllers/MasterFinanceKategori.php */