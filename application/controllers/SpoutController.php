<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Type;


class YourController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require APPPATH.'vendor/autoload.php'; // โหลด autoload.php ของ Composer
    }

    public function exportExcel() {
        // สร้าง Writer สำหรับไฟล์ Excel
        $writer = WriterEntityFactory::createXLSXWriter();
        $filePath = 'path_to_your_excel_file.xlsx'; // ตั้งค่า path และชื่อไฟล์ Excel

        // เพิ่มข้อมูลลงในไฟล์ Excel
        $headerRow = WriterEntityFactory::createRowFromArray(["Header 1", "Header 2", "Header 3"]);
        $writer->addRow($headerRow);

        // เพิ่มข้อมูลอื่น ๆ ลงไปตามความต้องการ

        // บันทึกไฟล์ Excel
        $writer->save($filePath);

        // ดาวน์โหลดไฟล์ Excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
		readfile($filePath);
		
    }
}
