<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function clear_db()
    {

        $this->db->empty_table('tb_disposisi');
        $this->db->empty_table('disposisi_detail');
        $this->db->empty_table('tb_trx');
        $this->db->empty_table('trx_detail');
        $this->db->empty_table('log_trx');
        echo "Berhasil";    
        redirect('/');
        
    }
}


/* End of file Custom.php and path \application\controllers\Custom.php */
