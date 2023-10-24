<?php
session_start();
include 'connection.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$headers = [
    "ID", "DTS NO.", "NAME", "CONTACT EMAILS", "CONTACT DETAILS",
    "TICKET REFERENCE NUMBER", "CATEGORY", "SUB CATEGORY", 
    "SOURCE", "NAME OF SCHOOL or SECTION", "DATE RECEIVED",
    "COMPLAINT DETAILS", "DATE BEFORE LAPSE", "STATUS"
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['fileInput'])) {
    $tmpName = $_FILES['fileInput']['tmp_name'];

    $spreadsheet = IOFactory::load($tmpName);
    $worksheet = $spreadsheet->getActiveSheet();
    $rows = $worksheet->toArray();

    // Check if first row matches the headers
    if ($rows[0] !== $headers) {
        die("Excel format is not correct!");
    }

    // Removing the header row
    array_shift($rows);

    foreach ($rows as $row) {
        $query = "INSERT INTO complaint (
            id, dts, name, email, contact, trn, category, subcategory,
            source, school, recieved, details, lapsed, status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("isssssssssssss",
            $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], 
            $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]
        );
        $stmt->execute();
    }

    header("Location: complaint1.php");
    exit;
}
