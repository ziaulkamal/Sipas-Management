<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Insert_model','ins');
        
    }

    
    /**
     * Method insert_surat
     * Form Insert Surat ___________piket
     * @return void
     */
    function insert_surat() {

        $data = array(
            'title' => 'Masukan Berkas Baru',
            'titlePage' => 'Masukan Berkas Baru',
            'page' => 'page/piket/add_berkas',
            'action' => 'piket/go/prog_save',
        );
        $this->load->view('index', $data); 
    }
    
    /**
     * Method prog_insert_surat
     * Progress Insert Surat _______piket
     * @return void
     */
    function prog_insert_surat() {


        $this->_rules('piket');
        
        if ($this->form_validation->run() == FALSE) {
            $this->insert_surat();
        } else {
            $genTrx = 'trx-'.time().date('Y');

            $config = array(
                'allowed_types' => 'pdf|docx|doc|odt',
                'max_size'      => 10000,
                'overwrite'     => TRUE,
                'file_name'     => $genTrx,
                'upload_path'   => './public/lampiran/',
                'encrypt_name'  => FALSE,
            );

            $this->load->library('upload', $config);

            if (!empty($_FILES['lampiran']['name'])) {
                if ($this->upload->do_upload('lampiran')) {
                    $data_file = $this->upload->data();
                    $dataOne = array(
                        'idTrx' => $genTrx,	
                        'judulSurat' => $this->input->post('judul_surat'), 
                        'tglSuratMasuk' => $this->input->post('tanggal_surat'),	
                        'tglSuratProses' => date('Y-m-d'),	
                        'resPiket' => '1',		
                        'updateTrxDate' => date('Y-m-d'),	
                    );
                    
                    $dataTwo = array(
                        'trxId' => $genTrx,	
                        'nomorDTrx' => $this->input->post('nomor_surat'),	
                        'keteranganDTrx' => 'keterangan',		
                    );
                    
                    $dataTwo['lampiranDTrx']  = $genTrx.$data_file['file_ext'];
                    $this->ins->save_surat($genTrx,$dataOne,$dataTwo);

                    
                    $this->session->set_flashdata('success', 'Sukses Mengirimkan Dokumen !');
                    redirect('piket/surat/listing','refresh');
                    
                    
                    }
                }else {
                    $this->insert_surat();
            }          
        }
        
       
        
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
            
            default:
                # code...
                break;
        }
        
    }
}

/* End of file Insert_controller.php and path \application\controllers\Insert_controller.php */