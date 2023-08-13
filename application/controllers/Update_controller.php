<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model','get');
        $this->load->model('Insert_model','upd');
        
        $this->load->model('View_model','views');    
                $dataNotice = array(
            'put' =>  $this->notification->push(),

        );
        $this->session->set_userdata( $dataNotice);
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

    function update_penolakan($idTrx) {
        $pimpinan = $this->session->userdata('isPimpinan');
        // $pimpinan = 'wakajati';
        $pesan = $this->input->post('pesanPenolakan');
        $this->upd->update_penolakan_byId($idTrx,$pesan,$pimpinan);
        
        $this->session->set_flashdata('success', 'Berhasil mengembalikan ke persuratan !');
        
        redirect('pimpinan/surat/listing','refresh');
        
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

    function add_disposisi_pimpinan($idTrx) {
        
        $load = $this->get->getSingleDisposisi_byIdTrx($idTrx)->row_array();
   
        
        $data = array(
            'title'     => 'Proses Lembaran Disposisi ',
            'titlePage' => 'Proses Lembaran Disposisi Untuk Berkas : <b>['.$load['idTrx'].']</b>',
            'page'      => 'page/pimpinan/disposisi_pimpinan',
            'data'      => $load,
            'nomorAgenda'    => $load['nomorAgendaD'],
            'action'    => 'pimpinan/go/prog_update_disposisi_pimpinan',
        );
        $this->load->view('index', $data);

    }

    function prog_update_disposisi_pimpinan() {

        $dataOne = array();
        $dataTwo = array();
        $postData = $this->input->post();

        $checkboxesToCheck = array('A17', 'A18', 'A19', 'A20', 'A21', 'A22', 'A23', 'A24', 'A25', 'A26', 'A27', 'A28', 'A29', 'A30', 'A31', 'A32', 'A33', 'A34', 'F17', 'F19', 'F20', 'F21', 'F22', 'F23', 'F24', 'F25', 'F26', 'F28', 'F29', 'F27', 'F30', 'F31', 'F32', 'F34','L38');

        // Daftar checkbox extends_
        $extendedCheckboxes = array('extends_F25', 'extends_F26', 'extends_F28', 'extends_F29', 'extends_F32', 'extends_F34','extends_L38');

        foreach ($postData as $name => $value) {
            if (in_array($name, $checkboxesToCheck) || in_array($name, $extendedCheckboxes)) {
                $dataOne[$name] = $value;
            } else {
                $dataTwo[$name] = $value;
            }
        }

        // Konversi nilai checkbox yang bernilai "on" menjadi 1
        foreach ($dataOne as $key => $value) {
            if ($value === 'on' && (in_array($key, $checkboxesToCheck) || in_array($key, $extendedCheckboxes))) {
                $dataOne[$key] = 1;
            }
        }

        // Validasi apakah form string harus diisi jika checkbox extends_ dicentang
        foreach ($extendedCheckboxes as $checkbox) {
            // Hanya lakukan validasi jika checkbox dicentang
            if (isset($dataOne[$checkbox]) && $dataOne[$checkbox] == 1) {
                $inputKey = 'input_' . $checkbox;
                if (empty($dataOne[$inputKey])) {
                    // Checkbox dicentang tetapi input kosong
                    // Tambahkan logika atau tindakan yang sesuai di sini, misalnya munculkan pesan error
                    $this->session->set_flashdata('message', 'Harap isi di bagian checkbox yang dipilih');
                    
                    redirect('pimpinan/surat/add_document/'. $this->input->post('idTrx'),'refresh');
                    return; // Hentikan eksekusi jika ada error
                }
            }

            // Validasi tambahan: Jika checkbox induk dipilih, pastikan bagian extends juga terisi
            $parentCheckbox = str_replace('extends_', '', $checkbox);
            if (isset($dataOne[$parentCheckbox]) && $dataOne[$parentCheckbox] == 1 && empty($dataOne[$checkbox])) {
                // Checkbox induk dipilih tetapi bagian extends kosong
                // Tambahkan logika atau tindakan yang sesuai di sini, misalnya munculkan pesan error
                $this->session->set_flashdata('message', 'Harap isi di bagian checkbox yang dipilih');
                redirect('pimpinan/surat/add_document/'. $this->input->post('idTrx'),'refresh');
                return; // Hentikan eksekusi jika ada error
            }
        }

        if (!empty($dataOne)) {
        switch ($this->input->post('radioKeamanan')) {
                case 'sr':
                    $dataOne['Q6'] = 1;
                    break;

                case 'r':
                    $dataOne['Q7'] = 1;
                    break;

                case 't':
                    $dataOne['Q8'] = 1;
                    break;

                case 'b':
                    $dataOne['Q9'] = 1;
                    break;

                default:
                    # code...
                    break;
            }
            $protectOutput = ['L17', 'L19', 'L21', 'L23', 'L25', 'L27', 'L30', 'L32', 'L34', 'L36','L38'];

            if (array_reduce($protectOutput, function($carry, $input) {
                return $carry || !empty($this->input->post($input));
            }, false)) {
                $dataOne['disposisiId'] = $this->input->post('idDisposisi');
                
                // echo "<pre>";
                // print_r ($dataOne);
                // echo "</pre>";
                // die();
                $this->upd->save_disposisi_pimpinan($dataOne,$dataTwo);
                $this->session->set_flashdata('success', 'Dokumen berhasil di proses dan sudah dikirimkan ke persuratan !');
                redirect('pimpinan/surat/listing/','refresh');
            } else {
                $this->session->set_flashdata('message', 'Harap isi bagian yang diperlukan !');
                redirect('pimpinan/surat/add_document/'. $this->input->post('idTrx'),'refresh');
            }
           
            
        }else {
            $this->session->set_flashdata('message', 'Harap isi bagian yang diperlukan !');
            redirect('pimpinan/surat/add_document/'. $this->input->post('idTrx'),'refresh');
        }
        
        // var_dump($dataTwo);
        // echo "<br />";
        // var_dump($dataOne);

        // Jika semua validasi berhasil, Anda dapat melanjutkan dengan operasi lain seperti menyimpan data ke database
    }


    function final_result($idTrx) {
        
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
