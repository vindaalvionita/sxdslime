<?php
// Tentukan folder file yang boleh didownload
$folder = "proof/";
// Lalu cek menggunakan fungsi file_exists
if (!file_exists($folder.$_GET['file'])) {
  echo "<h1>Access forbidden!</h1>
      <p> You are not allowed to download this file.</p>";
  exit;
}
// Apabila mendownload file di folder files
else {
    $file_url = $folder.$_GET['file'];
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
    readfile($file_url); 
}
?>