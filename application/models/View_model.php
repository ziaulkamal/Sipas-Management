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

}


/* End of file View_model.php and path \application\models\View_model.php */
