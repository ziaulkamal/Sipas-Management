<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class View_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model','views');
        
    }

    public function piket_view()
    {
        $load = $this->views->getListSurat()->result();
        $data = array(
            'title' => 'Daftar Berkas',
            'titlePage' => 'Daftar Berkas',
            'data'  => $load,
            'table' => true,
            'page' => 'page/piket/list_berkas',
        );
        $this->load->view('index', $data);
    }

    function persuratan_view() {
        $load = $this->views->getListSurat()->result();
        $data = array(
            'title' => 'Daftar Berkas',
            'titlePage' => 'Daftar Berkas Masuk',
            'data'  => $load,
            'table' => true,
            'page' => 'page/piket/list_berkas',
        );
        $this->load->view('index', $data);       
    }

    function user_view()
    {
        $load = $this->views->getAllUser()->result();
        $data = array(
            'title' => 'Daftar User',
            'titlePage' => 'Daftar User',
            'data' => $load,
            'table' => true,
            'page' => 'page/petugas/list_petugas'
        );

        $this->load->view('index', $data);
        
    }



}

/* End of file View_controller.php and path \application\controllers\View_controller.php */
