<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class View_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model','views');    
        $this->load->helper('tgl_indo');
        $dataNotice = array(
            'put' =>  $this->notification->push(),

        );
        $this->session->set_userdata( $dataNotice);
           
        
    }

    public function piket_view()
    {
        // Menggunakan library Notification


        
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
        if ($this->session->userdata('masuk') == TRUE && $this->session->userdata('level') == 1) {
            $data = array(
                'title' => 'Daftar User',
                'titlePage' => 'Daftar User',
                'data' => $load,
                'table' => true,
                'page' => 'page/petugas/list_petugas'
            );
    
            $this->load->view('index', $data);
        }else {
            $this->session->sess_destroy();
            redirect('login');
        }

    }

    function pimpinan_view() {
        $pimpinan = $this->session->userdata('isPimpinan');
        $load = $this->views->getAllDisposisi_byLevel($pimpinan)->result();
        $data = array(
            'title' => 'Berkas Masuk [ '. strtoupper($pimpinan) . ' ]',
            'titlePage' => 'Daftar Berkas Masuk',
            'data' => $load,
            'table' => true,
            'pimpinan' => true,
            'page' => 'page/piket/list_berkas'
        );

        $this->load->view('index', $data);
    }

    function trackingLog($idTrx) {
        $load = $this->views->getLogById($idTrx)->result();
        $data = array(
            'title' => 'Lacak Dokumen : [' . $idTrx.']',
            'titlePage' => 'Lacak Dokumen : [' . $idTrx.']',
            'data'  => $load,
            'page' => 'page/piket/track_berkas',
        );
        $this->load->view('index', $data);  
    }



}

/* End of file View_controller.php and path \application\controllers\View_controller.php */
