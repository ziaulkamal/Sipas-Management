<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('View_model', 'v');
    }

    public function push() {
        $levelAccess = $this->CI->session->userdata('level');
        return $this->CI->v->getLogTrx($levelAccess);
    }
    
    // public function pullAll() {
    //     $levelAccess = $this->CI->session->userdata('level');
    //     return $this->CI->v->replaceAllLogStatus($levelAccess);
        
    // }
}
