<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
