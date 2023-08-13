<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class View_model extends CI_Model 
{
        
    /**
     * Method getListSurat
     * Dapatkan semua data list surat dari tb_trx
     * @return void
     */
    function getListSurat() {
        $this->db->join('trx_detail', 'trx_detail.trxId = tb_trx.idTrx');
        $this->db->order_by('tb_trx.tglSuratMasuk', 'desc');
        return $this->db->get('tb_trx');
    }
        
    /**
     * Method getSingleSurat
     *
     * @param $idTrx $idTrx [explicite description]
     * Dapatkan single data list surat dari tb_trx
     *
     * @return void
     */
    function getSingleSurat($idTrx) {
        $this->db->join('trx_detail', 'trx_detail.trxId = tb_trx.idTrx');
        $this->db->where('tb_trx.idTrx', $idTrx);
        return $this->db->get('tb_trx');
    }

    function getAllDisposisi() {
        $this->db->join('disposisi_detail', 'disposisi_detail.disposisiId = tb_disposisi.idDisposisi');
        return $this->db->get('tb_disposisi');
        
    }

    function getJoinTrxAndDisposisi_byIdTrx($idTrx) {
        $this->db->select('*');
        $this->db->from('tb_trx');
        $this->db->join('trx_detail', 'trx_detail.trxId = tb_trx.idTrx');
        $this->db->join('tb_disposisi', 'tb_disposisi.trxId = tb_trx.idTrx');
        // $this->db->join('disposisi_detail', 'disposisi_detail.disposisiId = tb_disposisi.idDisposisi');
        $this->db->where('tb_trx.idTrx', $idTrx);
        
        return $this->db->get();
    }

    function getAllUser()
    {
        $this->db->order_by('idAuth', 'desc');
        return $this->db->get('tb_auth');
    }

    function login($user,$pass)
    {
        $this->db->select('pass');
        $this->db->where('user', $user);
        $data = $this->db->get('tb_auth')->row_array();
        if (password_verify($pass, $data['pass'])) {
            $this->db->where('user', $user);
            $this->db->limit(1);
            return $this->db->get('tb_auth');
        }
    }

    function getAllDisposisi_byLevel($pimpinan) {
        $this->db->join('tb_disposisi', 'tb_disposisi.trxId = tb_trx.idTrx');
        $this->db->join('trx_detail', 'trx_detail.trxId = tb_trx.idTrx');
        $this->db->where('tb_disposisi.tujuanPimpinanD', $pimpinan);
        $this->db->order_by('tb_trx.tglSuratMasuk', 'desc');       
        return $this->db->get('tb_trx');
    }

    function getSingleDisposisi_byIdTrx($idTrx) {
        $this->db->join('tb_disposisi', 'tb_disposisi.trxId = tb_trx.idTrx');
        $this->db->join('trx_detail', 'trx_detail.trxId = tb_trx.idTrx');
        $this->db->where('tb_disposisi.trxId', $idTrx);
        // $this->db->order_by('tb_trx.tglSuratMasuk', 'desc');       
        return $this->db->get('tb_trx');
    }

    function getActiveSheet($idTrx) {
        $this->db->join('trx_detail', 'trx_detail.trxId = tb_trx.idTrx');
        $this->db->join('tb_disposisi', 'tb_disposisi.trxId = trx_detail.trxId');
        $this->db->join('disposisi_detail', 'disposisi_detail.disposisiId = tb_disposisi.idDisposisi');
        $this->db->where('tb_trx.idTrx', $idTrx);
        return $this->db->get('tb_trx')->row_array();
    }

    function getLogTrx($levelAccess) {
        $this->db->where('statusLog', 1);
        $this->db->where('level', $levelAccess);
        return $this->db->get('log_trx');
        
    }
    
    function replaceAllLogStatus($levelAccess) {
        $data['statusLog'] = 0;
        $this->db->where('level', $levelAccess);
        return $this->db->update('log_trx', $data);
        
    }

    function getLogById($idTrx) {
        $this->db->where('trxId', $idTrx);
        $this->db->order_by('idLog', 'desc');
        return $this->db->get('log_trx');
    }
}


/* End of file View_model.php and path \application\models\View_model.php */
