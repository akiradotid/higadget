<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Auth.php');
class LaporanKeuangan extends Auth
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('LaporanKeuangan_model');
    $this->load->model('Mbukukas_model');
  }

  public function index(){
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();
    $data['content'] = $this->load->view('laporan-keuangan/index-bulanan', $data, true);
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
    <script src="' . base_url('assets/js/additional-js/laporan-keuangan.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);
  }

  public function tahunan(){
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();
    $data['content'] = $this->load->view('laporan-keuangan/index-tahunan', $data, true);
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
    <script src="' . base_url('assets/js/additional-js/laporan-keuangan.js') . '"></script>
    <script src="' . base_url('assets/js/select2/select2.full.min.js') . '"></script>
    <script src="' . base_url('assets/js/modalpage/validation-modal.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/jquery.dataTables.min.js') . '"></script>
    <script src="' . base_url('assets/js/datatable/datatables/datatable.custom.js') . '"></script>
    ';
    $this->load->view('layout/base', $data);
  }

  public function neraca(){
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();

    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');

    $date_start = $tahun . '-' . $bulan . '-01';
    $date_end = date("Y-m-t", strtotime($date_start));

    $data['date_start'] = $date_start;
    $data['date_end'] = $date_end;

    $kas_bulan_ini = $this->Mbukukas_model->getWhere($bulan, $tahun);
    $data['saldo_awal'] = $kas_bulan_ini ? $kas_bulan_ini[0]['saldo_awal'] : 0;
    
    $data_penjualan = $this->LaporanKeuangan_model->laporan_penjualan($date_start, $date_end);
    $data['total_penjualan'] = $data_penjualan ? array_sum(array_map(function($item) {
        return $item->total_penjualan - $item->total_diskon - $item->total_cashback;
    }, $data_penjualan)) : 0;

    $data_inventaris = $this->LaporanKeuangan_model->laporan_persediaan($date_end);
    $data['total_inventaris'] = $data_inventaris ? array_sum(array_map(function($item) {
        return $item->hrg_hpp;
    }, $data_inventaris)) : 0;

    $data_pengeluaran_per_kategori = $this->LaporanKeuangan_model->laporan_per_kategori($date_start, $date_end, 'pengeluaran');
    $total_pengeluaran = 0;

    foreach ($data_pengeluaran_per_kategori as $row) {
        $total_pengeluaran += $row->nominal;
    }

    $data['total_pengeluaran'] = $total_pengeluaran;

    $data_pembelian = $this->LaporanKeuangan_model->laporan_pembelian($date_start, $date_end);
    $data['total_pembelian'] = $data_pembelian ? array_sum(array_map(function($item) {
        return $item->total_hpp;
    }, $data_pembelian)) : 0;

    $this->load->view('laporan-keuangan/neraca', $data);
  }
  public function bukubesar(){
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();

    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');

    $date_start = $tahun . '-' . $bulan . '-01';
    $date_end = date("Y-m-t", strtotime($date_start));

    $data['date_start'] = $date_start;
    $data['date_end'] = $date_end;

    $kas_bulan_ini = $this->Mbukukas_model->getWhere($bulan, $tahun);
    $data['saldo_awal'] = $kas_bulan_ini ? $kas_bulan_ini[0]['saldo_awal'] : 0;

    $data['data_penjualan'] = $this->LaporanKeuangan_model->laporan_penjualan($date_start, $date_end);
    $data['data_pembelian'] = $this->LaporanKeuangan_model->laporan_pembelian($date_start, $date_end);
    $data_pemasukan_per_kategori = $this->LaporanKeuangan_model->laporan_per_kategori($date_start, $date_end, 'pendapatan');

    $group_data_pemasukan = [];

    foreach ($data_pemasukan_per_kategori as $row) {
        $key = $row->nama_kategori;

        if (!isset($group_data_pemasukan[$key])) {
            $group_data_pemasukan[$key] = [];
        }

        $group_data_pemasukan[$key][] = $row;
    }
    $data['data_pemasukan_per_kategori'] = $group_data_pemasukan;

    $data_pengeluaran_per_kategori = $this->LaporanKeuangan_model->laporan_per_kategori($date_start, $date_end, 'pengeluaran');
    $group_data_pengeluaran = [];

    foreach ($data_pengeluaran_per_kategori as $row) {
        $key = $row->nama_kategori;

        if (!isset($group_data_pengeluaran[$key])) {
            $group_data_pengeluaran[$key] = [];
        }

        $group_data_pengeluaran[$key][] = $row;
    }
    $data['data_pengeluaran_per_kategori'] = $group_data_pengeluaran;

    $data['saldo_akhir'] = $kas_bulan_ini ? $kas_bulan_ini[0]['saldo_akhir'] : 0;

    $this->load->view('laporan-keuangan/buku-besar', $data);
  }
  public function labarugi(){
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();

    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');

    $date_start = $tahun . '-' . $bulan . '-01';
    $date_end = date("Y-m-t", strtotime($date_start));

    $data['date_start'] = $date_start;
    $data['date_end'] = $date_end;


    $data_penjualan = $this->LaporanKeuangan_model->laporan_penjualan($date_start, $date_end);
    $data['total_penjualan'] = $data_penjualan ? array_sum(array_map(function($item) {
        return $item->total_penjualan - $item->total_diskon - $item->total_cashback;
    }, $data_penjualan)) : 0;

    $data_pemasukan_per_kategori = $this->LaporanKeuangan_model->laporan_per_kategori($date_start, $date_end, 'pendapatan');

    $group_total_pemasukan = [];

    foreach ($data_pemasukan_per_kategori as $row) {
        $key = $row->nama_kategori;

        if (!isset($group_total_pemasukan[$key])) {
            $group_total_pemasukan[$key] = 0;
        }

        $group_total_pemasukan[$key] += $row->nominal;
    }

    $data['total_pemasukan_per_kategori'] = $group_total_pemasukan;

    $data_pembelian = $this->LaporanKeuangan_model->laporan_pembelian($date_start, $date_end);
    $data['total_pembelian'] = $data_pembelian ? array_sum(array_map(function($item) {
        return $item->total_hpp;
    }, $data_pembelian)) : 0;

    $data_pengeluaran_per_kategori = $this->LaporanKeuangan_model->laporan_per_kategori($date_start, $date_end, 'pengeluaran');
    $group_total_pengeluaran = [];

    foreach ($data_pengeluaran_per_kategori as $row) {
        $key = $row->nama_kategori;

        if (!isset($group_total_pengeluaran[$key])) {
            $group_total_pengeluaran[$key] = 0;
        }

        $group_total_pengeluaran[$key] += $row->nominal;
    }

    $data['total_pengeluaran_per_kategori'] = $group_total_pengeluaran;

    $this->load->view('laporan-keuangan/laba-rugi', $data);
  }
  public function aruskas(){
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();

    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');

    $date_start = $tahun . '-' . $bulan . '-01';
    $date_end = date("Y-m-t", strtotime($date_start));

    $data['date_start'] = $date_start;
    $data['date_end'] = $date_end;

    $kas_bulan_ini = $this->Mbukukas_model->getWhere($bulan, $tahun);
    $data['saldo_awal'] = $kas_bulan_ini ? $kas_bulan_ini[0]['saldo_awal'] : 0;

    $total_semua_pemasukan = 0; 
    $data_penjualan = $this->LaporanKeuangan_model->laporan_penjualan($date_start, $date_end);
    $total_penjualan = $data_penjualan ? array_sum(array_map(function($item) {
        return $item->total_penjualan - $item->total_diskon - $item->total_cashback;
    }, $data_penjualan)) : 0;
    $total_semua_pemasukan += $total_penjualan;

    $data_pemasukan_per_kategori = $this->LaporanKeuangan_model->laporan_per_kategori($date_start, $date_end, 'pendapatan');

    foreach ($data_pemasukan_per_kategori as $row) {
        $total_semua_pemasukan += $row->nominal;
    }

    $total_semua_pengeluaran = 0; 
    $data_pembelian = $this->LaporanKeuangan_model->laporan_pembelian($date_start, $date_end);
    $total_pembelian = $data_pembelian ? array_sum(array_map(function($item) {
        return $item->total_hpp;
    }, $data_pembelian)) : 0;
    $total_semua_pengeluaran += $total_pembelian;

    $data_pengeluaran_per_kategori = $this->LaporanKeuangan_model->laporan_per_kategori($date_start, $date_end, 'pengeluaran');

    foreach ($data_pengeluaran_per_kategori as $row) {
        $total_semua_pengeluaran += $row->nominal;
    }

    $data['laba_rugi_berjalan'] = $total_semua_pemasukan - $total_semua_pengeluaran;

    $this->load->view('laporan-keuangan/arus-kas', $data);
  }
  public function inventaris(){
    $cab = $this->session->userdata('id_toko');
    $data['barangcabang'] = $this->second->barangCabang($cab);
    $data['setcabang'] = $this->first->getCabang();

    $bulan = $this->input->get('bulan');
    $tahun = $this->input->get('tahun');

    $date_start = $tahun . '-' . $bulan . '-01';
    $date_end = date("Y-m-t", strtotime($date_start));

    $data['date_start'] = $date_start;
    $data['date_end'] = $date_end;

    $data['data_inventaris'] = $this->LaporanKeuangan_model->laporan_persediaan($date_end);

    $this->load->view('laporan-keuangan/inventaris', $data);
  }

}


/* End of file LaporanKeuangan.php */
/* Location: ./application/controllers/LaporanKeuangan.php */
