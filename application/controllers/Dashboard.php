<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model', 'v');
        $dataNotice = array(
            'put' =>  $this->notification->push(),

        );
        $this->session->set_userdata( $dataNotice);
        
    }

    public function index()
    {
        $data = array(
            'title' => 'Beranda',
            'titlePage' => 'Beranda',
            'page' => 'page/beranda',
        );
        $this->load->view('index', $data);
    }

    
    public function pull_notifications() {
        // Get pulled notifications using the Notification hook
        $levelAccess = $this->session->userdata('level');
        
        $pulled_notifications = $this->v->replaceAllLogStatus($levelAccess);

        
    }

    public function followNotification() {
        $levelAccess = $this->session->userdata('level');
        $this->v->replaceAllLogStatus($levelAccess);   
        switch ($levelAccess) {
            case '1':
                $this->session->set_flashdata('message', 'Selamat Datang Kajati ! Silahkan proses dokumen yang tersedia .');
                
                redirect('pimpinan/surat/listing','refresh');
                
                break;
            case '2':
                $this->session->set_flashdata('message', 'Selamat Datang Wakajati ! Silahkan proses dokumen yang tersedia .');
                
                redirect('pimpinan/surat/listing','refresh');
                
                break;
            case '3':
                $this->session->set_flashdata('message', 'Selamat Datang Petugas Persuratan ! Silahkan proses dokumen yang tersedia .');
                
                redirect('pimpinan/surat/listing','refresh');
                
                break;
            case '3':
                $this->session->set_flashdata('message', 'Selamat Datang Petugas Piket ! Silahkan lihat dokumen yang sudah diproses .');
                
                redirect('pimpinan/surat/listing','refresh');
                
                break;
            
            default:
                # code...
                break;
        }
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
