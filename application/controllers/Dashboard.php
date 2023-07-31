<?php

class Dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $data['url'] = 'dashboard';
        $data['sub_title'] = 'Dashboard';
        $data['menu'] = $menu;

        // data sidebar & navbar || end

        $grafik = [];
        $jumlah_hari = cal_days_in_month(CAL_GREGORIAN, date('n'), date("Y"));
        for ($i = 1; $i <= $jumlah_hari; $i++) {

            if ($this->m_jual->getSellPerMonth($i, 7, 2023)->row_array() == []) {
                $sellPerDay = 0;
            } else {
                $sellPerDay = $this->m_jual->getSellPerMonth($i, 7, 2023)->row_array()['jumlah_penjualan'];
            }

            array_push($grafik, ["day" => $i, "num" => $sellPerDay]);
        }

        $data['sell_graph'] = $grafik;
        $data['kategori_graph'] = $this->m_jual->getBarang()->result_array();

        viewAdmin($this, 'admin/dashboard', $data);
    }

    // public function coba()
    // {
    //     print_r();
    // }


    // ========== END ==========


    // ========== DATATABLES ==========
    public function getDashboard()
    {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $query = $this->m_jual->getPenjualan();
        // var_dump($tes);
        // die;
        $data = [];

        foreach (array_slice($query->result_array(), 0, 10) as $key => $r) {
            $detailJual = $this->m_jual->getDetailPenjualan($r['id'])->result_array();
            $total = 0;
            foreach ($detailJual as $p) {
                $total += (int)$p['harga_jual'] * $p['jumlah'];
            }

            $data[] = array(
                'no' => $key + 1,
                'konsumen' => $r['nama_konsumen'],
                'alamat' => $r['alamat'],
                'tgl_jual' => $r['tanggal_penjualan'],
                'total' => rupiah($total)
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
