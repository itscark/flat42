<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel
{
    private $excelFile;
    private $writer;

    public function __construct()
    {
        $this->excelFile = new Spreadsheet();
        $this->writer = new Xlsx($this->excelFile);
    }

    public function generateExcel (){


    }


}