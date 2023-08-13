<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\templateSpreadsheet; 
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Generate_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('View_model','views');
        
    }

    public function excel_process($idTrx)
    {
        $load = $this->views->getActiveSheet($idTrx);
        
        $template_path = './public/template/excel/template_form_disposisi.xlsx';
        $spreadsheet = IOFactory::load($template_path);
        $sheet = $spreadsheet->getActiveSheet();

        
        $sheet->setCellValue('E5', ucfirst($load['nomorAgendaD']));
        $sheet->setCellValue('E6', $load['tglPenerimaanD']);
        $sheet->setCellValue('E7', $load['tglSuratMasuk']);
        $sheet->setCellValue('E8', ucfirst($load['asalSuratD']));
        $sheet->setCellValue('E9', ucfirst($load['ringkasanKet']));
        $sheet->setCellValue('E13', ucfirst($load['lampiranD']));
        $sheet->setCellValue('P5', $load['tglPenyelesaianD']);

        if ($load['A17'] != 0) {
            $sheet->setCellValue('A17', '✓');
        }
        if ($load['A18'] != 0) {
            $sheet->setCellValue('A18', '✓');
        }
        if ($load['A19'] != 0) {
            $sheet->setCellValue('A19', '✓');
        }
        if ($load['A20'] != 0) {
            $sheet->setCellValue('A20', '✓');
        }
        if ($load['A21'] != 0) {
            $sheet->setCellValue('A21', '✓');
        }
        if ($load['A22'] != 0) {
            $sheet->setCellValue('A22', '✓');
        }
        if ($load['A23'] != 0) {
            $sheet->setCellValue('A23', '✓');
        }
        if ($load['A24'] != 0) {
            $sheet->setCellValue('A24', '✓');
        }
        if ($load['A25'] != 0) {
            $sheet->setCellValue('A25', '✓');
        }
        if ($load['A26'] != 0) {
            $sheet->setCellValue('A26', '✓');
        }
        if ($load['A27'] != 0) {
            $sheet->setCellValue('A27', '✓');
        }
        if ($load['A28'] != 0) {
            $sheet->setCellValue('A28', '✓');
        }
        if ($load['A29'] != 0) {
            $sheet->setCellValue('A29', '✓');
        }
        if ($load['A30'] != 0) {
            $sheet->setCellValue('A30', '✓');
        }
        if ($load['A31'] != 0) {
            $sheet->setCellValue('A31', '✓');
        }
        if ($load['A32'] != 0) {
            $sheet->setCellValue('A32', '✓');
        }
        if ($load['A33'] != 0) {
            $sheet->setCellValue('A33', '✓');
        }
        if ($load['A34'] != 0) {
            $sheet->setCellValue('A34', '✓');
        }
        if ($load['F17'] != 0) {
            $sheet->setCellValue('F17', '✓');
        }
        if ($load['F19'] != 0) {
            $sheet->setCellValue('F19', '✓');
        }
        if ($load['F20'] != 0) {
            $sheet->setCellValue('F20', '✓');
        }
        if ($load['F21'] != 0) {
            $sheet->setCellValue('F21', '✓');
        }
        if ($load['F22'] != 0) {
            $sheet->setCellValue('F22', '✓');
        }
        if ($load['F23'] != 0) {
            $sheet->setCellValue('F23', '✓');
        }
        if ($load['F24'] != 0) {
            $sheet->setCellValue('F24', '✓');
        }
        if ($load['F25'] != 0) {
            $sheet->setCellValue('F25', '✓');
            $sheet->setCellValue('G25', 'Terbitkan Surat Perintah ' . ucwords($load['extends_F25']));
        }
        if ($load['F26'] != 0) {
            $sheet->setCellValue('F26', '✓');
            $sheet->setCellValue('G26', 'Koordinasikan dengan '. ucwords($load['extends_F26']));
        }
        if ($load['F27'] != 0) {
            $sheet->setCellValue('F27', '✓');
        }
        if ($load['F28'] != 0) {
            $sheet->setCellValue('F28', '✓');
            $sheet->setCellValue('G28','Ingat Batas Waktu '. ucwords($load['extends_F28']));
        }
        if ($load['F29'] != 0) {
            $sheet->setCellValue('F29', '✓');
            $sheet->setCellValue('G29', 'Serahkan Kepada Ybs '. ucwords($load['extends_F29']));
        }
        if ($load['F30'] != 0) {
            $sheet->setCellValue('F30', '✓');
        }
        if ($load['F31'] != 0) {
            $sheet->setCellValue('F31', '✓');
        }
        if ($load['F32'] != 0) {
            $sheet->setCellValue('F32', '✓');
            $sheet->setCellValue('G32','Wakili Kajari ' . ucwords($load['extends_F32']));
        }
        if ($load['F34'] != 0) {
            $sheet->setCellValue('F34', '✓');
            $sheet->setCellValue('G34',ucwords($load['extends_F34']));
        }
        // Tujuan
        if ($load['L17'] != 0) {
            $sheet->setCellValue('L17', '✓');
        }
        if ($load['L19'] != 0) {
            $sheet->setCellValue('L19', '✓');
        }
        if ($load['L21'] != 0) {
            $sheet->setCellValue('L21', '✓');
        }
        if ($load['L23'] != 0) {
            $sheet->setCellValue('L23', '✓');
        }
        if ($load['L25'] != 0) {
            $sheet->setCellValue('L25', '✓');
        }
        if ($load['L27'] != 0) {
            $sheet->setCellValue('L27', '✓');
        }
        if ($load['L30'] != 0) {
            $sheet->setCellValue('L30', '✓');
        }
        if ($load['L32'] != 0) {
            $sheet->setCellValue('L32', '✓');
        }
        if ($load['L34'] != 0) {
            $sheet->setCellValue('L34', '✓');
        }
        if ($load['L36'] != 0) {
            $sheet->setCellValue('L36', '✓');
        }
        if ($load['L38'] != 0) {
            $sheet->setCellValue('L38', '✓');
            $sheet->setCellValue('N38', ucwords($load['extends_L38']));
        }
        // Tingkat Keamanan
        if ($load['Q6'] != 0) {
            $sheet->setCellValue('Q6', '✓');
        }
        if ($load['Q7'] != 0) {
            $sheet->setCellValue('Q7', '✓');
        }
        if ($load['Q8'] != 0) {
            $sheet->setCellValue('Q8', '✓');
        }
        if ($load['Q9'] != 0) {
            $sheet->setCellValue('Q9', '✓');
        }

       


                /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        $filename = 'Lembaran Disposisi [asal surat : '.ucfirst($load['asalSuratD']).']'.$load['tglPenyelesaianD'];
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}

/* End of file Generate_controller.php and path \application\controllers\Generate_controller.php */
