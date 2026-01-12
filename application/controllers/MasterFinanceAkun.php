<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class MasterFinanceAkun extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mfinanceakun_model');
  }

  public function index()
  {
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();
    $data['content'] = $this->load->view('master/masterfinanceakun', $data, true);
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
    <script src="' . base_url('assets/js/additional-js/mfinanceakun.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);    
  }

  function createpost(){
    $data = [
        'id_finance_akun'      => $this->input->post('id_finance_akun'),
        'nama'      => $this->input->post('nama'),
        'kategori'      => $this->input->post('kategori'),
    ];
		
		$this->Mfinanceakun_model->create($data);

    redirect('master-finance-akun');
  }

  public function edit($id){
    $data['get_id']= $this->Mfinanceakun_model->getWhere($id);
    echo json_encode($data);
  }

  public function updatepost(){
    if ($this->input->is_ajax_request()) {
      $id = $this->input->post('eid');
      $data = [
        'nama'     => $this->input->post('enama'),
        'kategori'   => $this->input->post('ekategori'),
      ];
      
      $this->Mfinanceakun_model->update($id, $data);
      echo json_encode(['status' => 'success']);
    } else {
      redirect('master-finance-akun');
    }
  }

  public function deletepost($id) {
    $result = $this->Mfinanceakun_model->delete($id);
    echo json_encode($result);
  }

  public function loadfna(){
    $searchTerm = [];
    $searchTerm['nama'] = $this->input->get('nama');
    $searchTerm['id_finance_akun'] = '';
    $results = $this->Mfinanceakun_model->getDataByParams($searchTerm);
    header('Content-Type: application/json');
    echo json_encode($results);
  }

  public function jsonfna(){
    $this->load->library('datatables');
    $this->datatables->select('id_finance_akun,nama,kategori');
    $this->datatables->from('tb_finance_akun');
    return print_r($this->datatables->generate());
  }

}


/* End of file MasterFinanceAkun.php */
/* Location: ./application/controllers/MasterFinanceAkun.php */