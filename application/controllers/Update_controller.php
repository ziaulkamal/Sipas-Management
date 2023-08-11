<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model','get');
        $this->load->model('Insert_model','upd');
        
        
    }


    function edit_surat($idTrx){

        $load = $this->get->getSingleSurat($idTrx)->row_array();

        $data = array(
            'title'     => 'Update Berkas',
            'titlePage' => 'Update Berkas Nomor : <b>['.$load['nomorDTrx'].']</b>',
            'page'      => 'page/piket/add_berkas',
            'data'      => $load,
            'action'    => 'piket/go/prog_update_surat',
        );
        $this->load->view('index', $data);
    }

    function prog_update_surat(){

        $this->_rules('piket');
        $idTrx = $this->input->post('idTrx');
        $old_lampiran = $this->input->post('lampiran_old');
        
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit_surat($idTrx);
        } else {
            $dataOne = array(
                'idTrx' => $idTrx,	
                'judulSurat' => $this->input->post('judul_surat'), 
                'tglSuratMasuk' => $this->input->post('tanggal_surat'),	
                'tglSuratProses' => date('Y-m-d'),	
                'resPiket' => '1',		
                'updateTrxDate' => date('Y-m-d'),	
            );
            
            $dataTwo = array(
                'trxId' => $idTrx,	
                'nomorDTrx' => $this->input->post('nomor_surat'),	
                'keteranganDTrx' => 'keterangan',		
                );

            if (!empty($_FILES['lampiran']['name'])) {
                unlink('./public/lampiran/'.$old_lampiran);
                sleep(3);
                 $config = array(
                    'allowed_types' => 'pdf|docx|doc|odt',
                    'max_size'      => 10000,
                    'overwrite'     => TRUE,
                    'file_name'     => $idTrx,
                    'upload_path'   => './public/lampiran/',
                    'encrypt_name'  => FALSE,
                );

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('lampiran')) {
                    $data_file = $this->upload->data();                    
                    $dataTwo['lampiranDTrx']  = $idTrx.$data_file['file_ext'];
                }

            }
            $this->upd->update_surat($idTrx,$dataOne,$dataTwo);
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui !');
            redirect('piket/surat/listing','refresh');
            
        
        }
        
    }

    function remove_surat($idTrx) {
        $this->upd->delete_surat($idTrx);
        $this->session->set_flashdata('success', 'Berhasil menghapus data !');
        
        redirect('piket/surat/listing','refresh');
        
        
    }

    function add_disposisi($idTrx) {
        $load = $this->get->getSingleSurat($idTrx)->row_array();
        $countDisposisi = $this->get->getAllDisposisi()->num_rows();

        $data = array(
            'title'     => 'Lembaran Disposisi ',
            'titlePage' => 'Buat Lembaran Disposisi Untuk Dokumen : <b>['.$load['idTrx'].']</b>',
            'page'      => 'page/piket/lembar_disposisi',
            'data'      => $load,
            'nomorAgenda'      => $countDisposisi+1,
            'action'    => 'persuratan/go/prog_add_document',
        );
        $this->load->view('index', $data);
    }

    function update_disposisi($idTrx) {
        $load = $this->get->getJoinTrxAndDisposisi_byIdTrx($idTrx)->row_array();
        
        // echo "<pre>";
        // var_dump ($load->row_array());
        // echo "</pre>";
        
        // die();

        $data = array(
            'title'     => 'Update Lembaran Disposisi ',
            'titlePage' => 'Perbaikan Lembaran Disposisi Untuk Dokumen : <b>['.$load['idTrx'].']</b>',
            'page'      => 'page/piket/lembar_disposisi',
            'data'      => $load,
            'nomorAgenda'    => $load['nomorAgendaD'],
            'action'    => 'persuratan/go/prog_update_document',
        );
        $this->load->view('index', $data);
    }

    function prog_insert_disposisi() {

        $this->_rules('disposisiStepSatu');
        $idTrx = $this->input->post('idTrx');
        $idDisposisi = 'dp'.date('Ymdhis').$this->input->post('nomor_agenda');
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_disposisi($idTrx);
        } else {
            $data = array(
            	'idDisposisi' => $idDisposisi,	
                'trxId' => $idTrx,	
                'nomorAgendaD' => $this->input->post('nomor_agenda'),	
                'tglPenerimaanD' => $this->input->post('tanggal_penerimaan'),	
                'asalSuratD' => $this->input->post('dari'),	
                'ringkasanKet' => $this->input->post('ringkasan_surat'),	
                'lampiranD' => $this->input->post('lampiran'),	
                'tglPenyelesaianD' => $this->input->post('tanggal_penyelesaian'),	
                'tingkatKeamananD' => $this->input->post('radioKeamanan'),	
                'tujuanPimpinanD' => $this->input->post('selectPimpinan'),	
                'updateDisposisiDate' => date('Y-m-d'),	
            );

            
            $this->upd->save_disposisi($idTrx,$data,$idDisposisi);
            // die();
            $this->session->set_flashdata('success', 'Berhasil mengirimin ke pimpinan dan menunggu respon pimpinan !');            
            redirect('persuratan/surat/listing','refresh');            
        }

        
    }

    function prog_update_disposisi() {

        $this->_rules('disposisiStepSatu');
        $idTrx = $this->input->post('idTrx');
        $idDisposisi = $this->input->post('idDisposisi');
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->update_disposisi($idTrx);
        } else {
            $data = array(
            	// 'idDisposisi' => $idDisposisi,	
                'trxId' => $idTrx,	
                'nomorAgendaD' => $this->input->post('nomorAgendaD'),	
                'tglPenerimaanD' => $this->input->post('tanggal_penerimaan'),	
                'asalSuratD' => $this->input->post('dari'),	
                'ringkasanKet' => $this->input->post('ringkasan_surat'),	
                'lampiranD' => $this->input->post('lampiran'),	
                'tglPenyelesaianD' => $this->input->post('tanggal_penyelesaian'),	
                'tingkatKeamananD' => $this->input->post('radioKeamanan'),	
                'tujuanPimpinanD' => $this->input->post('selectPimpinan'),	
                'updateDisposisiDate' => date('Y-m-d'),	
            );

            
            $this->upd->update_disposisi($idTrx,$data,$idDisposisi);
            // die();
            $this->session->set_flashdata('success', 'Berhasil mengirimin ke pimpinan dan menunggu respon pimpinan !');            
            redirect('persuratan/surat/listing','refresh');            
        }

        
    }

    function add_disposisi_byId($idDisposisi,$idTrx) {


        $data = array(
            'title'     => 'Lembaran Disposisi ',
            'titlePage' => 'Lengkapi Disposisi Untuk Dokumen : <b>['.$idTrx.']</b>',
            'page'      => 'page/pimpinan/disposisi_pimpinan',
            // 'data'      => $load,
            // 'nomorAgenda'      => $countDisposisi+1,
            'action'    => 'persuratan/go/prog_add_document',
        );
        $this->load->view('index', $data);
        
    }


    function _rules($validasi) {
        switch ($validasi) {
            case 'piket':
                $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required|min_length[5]|max_length[10]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('judul_surat', 'Judul Surat', 'trim|required|min_length[5]|max_length[50]',array(
                    'required' => '%s wajib di isi !',
                    'min_length' => '%s terlalu pendek !',
                    'max_length' => '%s terlalu panjang !',
                ));
                $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required',array(
                    'required' => '%s wajib di isi !',
                ));
                
                $this->form_validation->set_rules('keterangan_surat', 'Keterangan Surat', 'trim|required',array(
                    'required' => '%s wajib ada !',
                ));
                
                break;
            
            case 'disposisiStepSatu':
                $this->form_validation->set_rules('radioKeamanan', 'Opsi Keamanan', 'trim|required', array(
                    'required' => '%s wajib ada salah satu !'
                ));
                $this->form_validation->set_rules('tanggal_penerimaan', 'Tanggal Penerimaan', 'trim|required', array(
                    'required' => '%s wajib diisi !'
                ));
                $this->form_validation->set_rules('tanggal_penyelesaian', 'Tanggal Penyelesaian', 'trim|required', array(
                    'required' => '%s wajib diisi !'
                ));
                $this->form_validation->set_rules('dari', 'Dari atau Asal Surat', 'trim|required', array(
                    'required' => '%s wajib diisi !'
                ));
                $this->form_validation->set_rules('ringkasan_surat', 'Ringkasan atau Isi Surat', 'trim|required', array(
                    'required' => '%s wajib diisi !'
                ));
                $this->form_validation->set_rules('lampiran', 'Lampiran Surat', 'trim|required', array(
                    'required' => '%s wajib diisi !'
                ));
                $this->form_validation->set_rules('selectPimpinan', 'Pimpinan', 'trim|required', array(
                    'required' => '%s wajib pilih !'
                ));
                
                # code...
                break;
            
                default:
                # code...
                break;
        }
        
    }
}

/* End of file Update_controller.php and path \application\controllers\Update_controller.php */
