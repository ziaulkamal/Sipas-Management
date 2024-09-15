<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_export extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function index($id)
    {

        $this->db->select('lampiranDTrx');
        $this->db->where('trxId', $id);
        $data = $this->db->get('trx_detail', 1)->row();

        $this->load->view('page/pdf_viewer', $data);
        
        
    }

    
}

/* End of file Pdf_export.php.php and path \application\controllers\Pdf_export.php.php */
