<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Jual extends CI_Model
{
    private $t_barang = 'barang';
    private $t_kategori = 'kategori';
    private $t_penjualan = 'penjualan';
    private $t_penjualan_detail = 'penjualan_detail';


    public function getPenjualan()
    {
        $this->db->select('*')
            ->from($this->t_penjualan)
            ->order_by("tanggal_penjualan", "desc");
        return $this->db->get();
    }

    public function getDetailPenjualan($id_penjualan)
    {
        $this->db->select('*, barang.kode_barang as kb')
            ->join($this->t_barang, 'barang.kode_barang = penjualan_detail.kode_barang')
            ->join($this->t_penjualan, 'penjualan.id = penjualan_detail.id_penjualan')
            ->join($this->t_kategori, 'kategori.id = barang.id_kategori')
            ->from($this->t_penjualan_detail)
            ->where(['penjualan.id' => $id_penjualan]);
        return $this->db->get();
    }

    public function getSellPerMonth($hari, $bulan, $tahun)
    {
        $this->db->select('DATE(tanggal_penjualan) AS tanggal,
        COUNT(*) AS jumlah_penjualan')
            ->from('penjualan')
            ->where(['day(tanggal_penjualan)' => $hari, 'month(tanggal_penjualan)' => $bulan, "YEAR(tanggal_penjualan)" => $tahun])
            ->group_by("date(tanggal_penjualan)");
        return $this->db->get();
    }

    public function getBarang()
    {
        $this->db->select(' GROUP_CONCAT(background) AS bg, kategori.nama_kategori, COUNT(barang.kode_barang) AS jumlah_barang')
            ->from($this->t_kategori)
            ->join($this->t_barang, 'kategori.id = barang.id_kategori', "left")
            ->group_by("kategori.nama_kategori");
        return $this->db->get();
    }
}
