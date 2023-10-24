<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include 'connection.php';

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set headers of the Excel file
$headers = [
    "ID", "DTS NO.", "NAME", "CONTACT EMAILS", "CONTACT DETAILS",
    "TICKET REFERENCE NUMBER", "CATEGORY", "SUB CATEGORY", 
    "SOURCE", "NAME OF SCHOOL or SECTION", "DATE RECEIVED",
    "COMPLAINT DETAILS", "DATE BEFORE LAPSE", "STATUS"
];
$columnLetter = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($columnLetter . '1', $header);
    $columnLetter++;
}

$query = "SELECT * FROM complaint";
$result = mysqli_query($conn, $query);
$rowNumber = 2;

while ($row = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $rowNumber, $row['id']);
    $sheet->setCellValue('B' . $rowNumber, $row['dts']);
    $sheet->setCellValue('C' . $rowNumber, $row['name']);
    $sheet->setCellValue('D' . $rowNumber, $row['email']);
    $sheet->setCellValue('E' . $rowNumber, $row['contact']);
    $sheet->setCellValue('F' . $rowNumber, $row['trn']);
    $sheet->setCellValue('G' . $rowNumber, $row['category']);
    $sheet->setCellValue('H' . $rowNumber, $row['subcategory']);
    $sheet->setCellValue('I' . $rowNumber, $row['source']);
    $sheet->setCellValue('J' . $rowNumber, $row['school']);
    $sheet->setCellValue('K' . $rowNumber, $row['recieved']);
    $sheet->setCellValue('L' . $rowNumber, $row['details']);
    $sheet->setCellValue('M' . $rowNumber, $row['lapsed']);
    $sheet->setCellValue('N' . $rowNumber, $row['status']);

    
    
    // ... continue for all columns
    $rowNumber++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

$dateToday = date('Y-m-d');
$filename = "Complain_" . $dateToday . ".xlsx";
header('Content-Disposition: attachment;filename="' . $filename . '"');

header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;