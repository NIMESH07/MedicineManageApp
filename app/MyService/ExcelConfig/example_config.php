<?php
// Learn More ===> https://phpspreadsheet.readthedocs.io/en/latest/

/* Start Basic Requirement */
	require 'ExcelConfig/vendor/autoload.php';
	require 'ExcelConfig/vendor/phpoffice/phpspreadsheet/src/Bootstrap.php';
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/* End Basic Requirement */

/*Start Logic (Create Sheet,Set Data,Mearge Two Cell etc.....)*/
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$spreadsheet = new Spreadsheet();
	$worksheet = $spreadsheet->getActiveSheet();

	$worksheet->getCell('B2')->setValue('John');
	$worksheet->getCell('C2')->setValue('Smith');
/*End Logic*/

/* Save Your File In Specific Location*/
	// $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
	// $writer->save('write.xls');

/* Download Direct File*/
	$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
	header('Content-type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename="file.xls"');
	$writer->save('php://output');
