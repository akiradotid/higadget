<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKeuangan_model extends CI_Model {
    public function laporan_penjualan($tanggal_awal = null, $tanggal_akhir = null)
    {
        $this->db->select("
            DATE(tgl_transaksi) AS tanggal,
            COUNT(kode_penjualan) AS jumlah_transaksi,
            SUM(total_penjualan) AS total_penjualan,
            SUM(diskon) AS total_diskon,
            SUM(cashback) AS total_cashback,
            SUM(jml_donasi) AS total_donasi
        ");
        $this->db->from('tb_detail_penjualan');

        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('DATE(tgl_transaksi) >=', $tanggal_awal);
            $this->db->where('DATE(tgl_transaksi) <=', $tanggal_akhir);
        }

        $this->db->group_by('DATE(tgl_transaksi)');
        $this->db->order_by('tanggal', 'asc');

        return $this->db->get()->result();
    }

    public function laporan_pembelian($tanggal_awal = null, $tanggal_akhir = null)
    {
        $this->db->select("
            DATE(tgl_masuk) AS tanggal,
            COUNT(id_masuk) AS jumlah_barang,
            SUM(hrg_hpp) AS total_hpp,
            SUM(hrg_jual) AS total_nilai_jual,
            SUM(hrg_cashback) AS total_cashback
        ");
        $this->db->from('tb_brg_masuk');

        if ($tanggal_awal && $tanggal_akhir) {
            $this->db->where('DATE(tgl_masuk) >=', $tanggal_awal);
            $this->db->where('DATE(tgl_masuk) <=', $tanggal_akhir);
        }

        $this->db->group_by('DATE(tgl_masuk)');
        $this->db->order_by('tanggal', 'asc');

        return $this->db->get()->result();
    }

    public function laporan_per_kategori($date_start, $date_end, $tipe = null)
    {
        $this->db->select("
            k.id_finance_kategori,
            t.tgl_transaksi,
            k.nama AS nama_kategori,
            k.tipe,
            t.nominal,
            t.catatan
        ");
        $this->db->from('tb_finance_trx t');
        $this->db->join(
            'tb_finance_kategori k',
            'k.id_finance_kategori = t.id_finance_kategori',
            'inner'
        );

        if (!empty($tipe)) {
            $this->db->where('k.tipe', $tipe);
        }
        if (!empty($date_start) && !empty($date_end)) {
            $this->db->where('t.tgl_transaksi >=', $date_start);
            $this->db->where('t.tgl_transaksi <=', $date_end);
        }

        $this->db->order_by('k.tipe', 'ASC');
        $this->db->order_by('t.tgl_transaksi', 'ASC');

        return $this->db->get()->result();
    }

    public function laporan_persediaan($date_end)
    {
        $this->db->select("
            bm.id_masuk,
            bm.id_supplier,
            bm.id_brg,
            b.nama_brg,
            b.jenis,
            b.tipe,
            b.merk,
            bm.tgl_masuk,
            bm.sn_brg,
            bm.no_imei,
            bm.hrg_hpp,
            bm.hrg_jual,
            bm.status
        ");
        $this->db->from('tb_brg_masuk bm');
        $this->db->join('tb_barang b', 'b.id_brg = bm.id_brg', 'inner');

        $this->db->where('bm.tgl_masuk <=', $date_end . ' 23:59:59');
        $this->db->where_in('bm.status', [1,2,4,5]);
        $this->db->where('b.status', 1);

        $this->db->order_by('bm.tgl_masuk', 'ASC');

        return $this->db->get()->result();
    }
}

/* End of file LaporanKeuangan_model.php */
/* Location: ./application/models/LaporanKeuangan_model.php */