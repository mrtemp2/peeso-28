<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require('spreadsheet/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Excel{
	
	public function __construct()
	{
		
	}
	public function loadFile($filname){

			return PhpOffice\PhpSpreadsheet\IOFactory::load($filname);

	}
	public function getWriter($spreadsheet){
		return new Xlsx($spreadsheet);
	}



}


?>