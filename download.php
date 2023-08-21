<?php
// Get filename and filepath from GET parameter
$file = $_GET['file'];
$filepath = $_GET['filepath'];

// Set headers for file download
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . $file . "\"");

// Read the file and output it to the browser for download
readfile($filepath);
exit();
?>
