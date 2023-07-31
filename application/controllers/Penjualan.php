<?php

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('c_helper');
        $this->load->model('M_Sidebar', 'm_sidebar');
        // $this->load->model('M_Auth', 'm_auth');
        $this->load->model('M_Jual', 'm_jual');
    }

    // ========== HALAMAN ==========
    public function index()
    {

        //data sidebar & navbar || start
        $menu = $this->m_sidebar->getSidebarMenu();
        $data['title'] = 'Penjualan';
        $data['url'] = 'penjualan';
        $data['sub_title'] = 'Daftar Penjualan';
        $data['menu'] = $menu;

        // data sidebar & navbar || end
        viewAdmin($this, 'admin/jual', $data);
    }

    public function detail($id_penjualan)
    {
        $queryDetail = $this->m_jual->getDetailPenjualan($id_penjualan);
        if ($id_penjualan === null) {
            redirect('penjualan');
        } elseif ($queryDetail->num_rows() == 0) {
            redirect('penjualan');
        } else {
            $detailJual = $queryDetail->result_array();
            $total = 0;
            foreach ($detailJual as $key => $r) {
                $total += (int)$r['harga_jual'] * $r['jumlah'];
            }
            //data sidebar & navbar || start
            $menu = $this->m_sidebar->getSidebarMenu();
            $data['title'] = 'Detail Penjualan';
            $data['url'] = 'penjualan';
            $data['sub_title'] = rupiah($total);
            $data['menu'] = $menu;

            // data sidebar & navbar || end
            $data['id_penjualan'] = $id_penjualan;
            viewAdmin($this, 'admin/jual_detail', $data);
        }
    }

    // ========== END ==========


    // ========== DATATABLES ==========
    public function getJual()
    {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $query = $this->m_jual->getPenjualan();
        // var_dump($tes);
        // die;
        $data = [];

        foreach ($query->result_array() as $key => $r) {

            $data[] = array(
                'no' => $key + 1,
                'konsumen' => $r['nama_konsumen'],
                'alamat' => $r['alamat'],
                'tgl_jual' => $r['tanggal_penjualan'],
                'action' => '
                <a target="_blank" href="' . base_url() . 'penjualan/detail/' . $r['id'] . '" class="btn btn-info btn-sm detailPaket"><i class="fa-solid fa-circle-info"></i></a>'
            );
        }
        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordFiltered" => $query->num_rows(),
            "data" => $data
        );
        echo json_encode($result);
    }

    public function getDetail()
    {

        $id_penjualan = $this->input->post('id');
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $query = $this->m_jual->getDetailPenjualan($id_penjualan);
        // var_dump($tes);
        // die;
        $data = [];

        foreach ($query->result_array() as $key => $r) {

            $data[] = array(
                'kb' => $r['kb'],
                'kat' => $r['nama_kategori'],
                'name' => $r['nama_barang'],
                'num' => $r['jumlah'],
                'satuan' => rupiah($r['harga_jual']),
                'total' => rupiah($r['harga_jual'] * $r['jumlah']),
            );
        }
        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordFiltered" => $query->num_rows(),
            "data" => $data
        );
        echo json_encode($result);
    }
    // // ========== END ==========


}
