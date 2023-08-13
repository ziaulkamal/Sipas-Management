<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Insert_model extends CI_Model 
{
      
    /**
     * Method save_surat
     *
     * @param $genTrx $genTrx [dapatkan Id yang ditangkap]
     * @param $dataOne $dataOne [parsing data array pertama]
     * @param $dataTwo $dataTwo [parsing data array kedua]
     *
     * @return void
     */
    function save_surat($genTrx,$dataOne, $dataTwo) {
        $logTrx = array(
            'trxId' => $genTrx,
            'level' => 3,
            'logDate' => date('Y-m-d'),
            'statusLog' => 1,
            'keteranganLog' => 'Surat Nomor '. $dataTwo['nomorDTrx'] . ' Dengan Judul '. $dataOne['judulSurat'] .'Baru Saja Masuk dari Piket'
        );
        $this->db->insert('log_trx', $logTrx);
        $this->db->insert('tb_trx', $dataOne);
        $this->db->insert('trx_detail', $dataTwo);
        return;   
    }
    
    /**
     * Method update_surat
     *
     * @param $genTrx $genTrx [dapatkan Id yang ditangkap]
     * @param $dataOne $dataOne [parsing data array pertama]
     * @param $dataTwo $dataTwo [parsing data array kedua]
     *
     * @return void
     */
    function update_surat($idTrx,$dataOne,$dataTwo) {
        $logTrx = array(
            'trxId' => $idTrx,
            'level' => 3,
            'logDate' => date('Y-m-d'),
            'statusLog' => 1,
            'keteranganLog' => 'Surat Telah Diperbahrui dan dikirim kembali ke Persuratan'
        );
        $this->db->insert('log_trx', $logTrx);    

        $this->db->where('idTrx', $idTrx);
        $this->db->update('tb_trx', $dataOne);

        $this->db->where('trxId', $idTrx);
        $this->db->update('trx_detail', $dataTwo);
        return;  
    }
    
    /**
     * Method delete_surat
     *
     * @param $genTrx $genTrx [dapatkan Id yang ditangkap]
     *
     * @return void
     */
    function delete_surat($idTrx) {
        $file = glob('./public/lampiran/'.$idTrx.'.*');
        foreach ($file as $files) {
           unlink($files);
        }
        $this->db->where('idTrx', $idTrx);
        $this->db->delete('tb_trx');
        $this->db->where('trxId', $idTrx);
        $this->db->delete('trx_detail');
        $this->db->where('trxId', $idTrx);
        $this->db->delete('log_trx'); 
        return;
    }

    function save_disposisi($idTrx,$data,$idDisposisi) {
        $this->db->insert('tb_disposisi', $data);
        sleep(1);
        $logTrx_1 = array(
            'trxId' => $idTrx,
            'level' => 4,
            'logDate' => date('Y-m-d'),
            'statusLog' => 1,
            'keteranganLog' => 'Surat telah diterima bagian persuratan dan menunggu proses berikutnya'
        );
        $this->db->insert('log_trx', $logTrx_1);

        $logTrx_2 = array(
            'trxId' => $idTrx,
            'level' => 3,
            'logDate' => date('Y-m-d'),
            'statusLog' => 1,
            'keteranganLog' => 'Permohonan disposisi telah dikirimkan ke Pimpinan '. $data['tujuanPimpinanD']
        );
        $this->db->insert('log_trx', $logTrx_2);

        $updateTrx = array(
            'resPersuratan' => 1,
            'disposisiId' => $idDisposisi,
            'updateTrxDate' => date('Y-m-d'),
        );
        $this->db->where('idTrx', $idTrx);
        $this->db->update('tb_trx', $updateTrx);
        return;
    }

    function update_disposisi($idTrx,$data,$idDisposisi) {

        $logTrx_1 = array(
            'trxId' => $idTrx,
            'level' => 3,
            'logDate' => date('Y-m-d'),
            'statusLog' => 1,
            'keteranganLog' => 'Permohonan telah diperbaharu dan telah dikirimkan ulang ke Pimpinan '. $data['tujuanPimpinanD']
        );
        $this->db->insert('log_trx', $logTrx_1);
        $this->db->where('idDisposisi', $idDisposisi);
        $this->db->update('tb_disposisi', $data);
        $trxDatas = array(
            'resPersuratan' => 1,
            'resPimpinan' => 0,
            'updateTrxDate' => date('Y-m-d')
        );
        $this->db->where('idTrx', $idTrx);
        $this->db->update('tb_trx', $trxDatas);
        $this->db->where('trxId', $idTrx);
        $trxDetail['ulasanDTrx'] = '';
        $this->db->update('trx_detail', $trxDetail );
        return;
    }

    function save_disposisi_pimpinan($dataOne,$dataTwo) {
        $logTrx_1 = array(
            'trxId' => $dataTwo['idTrx'],
            'level' => 2,
            'logDate' => date('Y-m-d'),
            'statusLog' => 1,
            'keteranganLog' => 'Disposisi telah diproses oleh pimpinan dan telah dikirimkan ke persuratan'
        );
        $this->db->insert('log_trx', $logTrx_1);
        $this->db->insert('disposisi_detail', $dataOne);
        $updateDataTwo = array(
            'partOne' => array(
                'resPimpinan' => 1,
                'updateTrxDate' => date('Y-m-d')
            ),
            'partTwo' => array(
                'ulasanDTrx' => 'Tuntas !'
            ),   
        );
        $this->db->where('idTrx', $dataTwo['idTrx']);
        $this->db->update('tb_trx', $updateDataTwo['partOne']);
        $this->db->where('trxId', $dataTwo['idTrx']);
        $this->db->update('trx_detail', $updateDataTwo['partTwo']);
        
        
        
        
    }

    function insert_user($data)
    {
        $this->db->insert('tb_auth', $data);
    }

    function update_penolakan_byId($idTrx,$pesan,$pimpinan) {
        $logTrx_1 = array(
            'trxId' => $idTrx,
            'level' => 3,
            'logDate' => date('Y-m-d'),
            'statusLog' => 1,
            'keteranganLog' => 'Permohonan telah ditolak dengan Pesan : '. $pesan. ' Oleh '. $pimpinan
        );
        $this->db->insert('log_trx', $logTrx_1);
        $dataOne = array(
            'resPimpinan' => '1',
            'resPersuratan' => '0',
            'updateTrxDate' => date('Y-m-d')
        );
        $this->db->where('idTrx', $idTrx);
        $this->db->update('tb_trx', $dataOne);        
        $dataTwo['ulasanDTrx'] = $pesan;
        $this->db->where('trxId', $idTrx);
        $this->db->update('trx_detail', $dataTwo);
        return;
        
    }

}


/* End of file Insert_model.php and path \application\models\Insert_model.php */
