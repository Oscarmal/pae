<?php 
// $file = "http://192.168.231.4/pae/pruebas/docview/doc.pdf";
// $page = 'http://192.168.231.4/pae/pruebas/docview/pdfjs/viewpdf.php?archivo='.$file;

$file = "http://localhost/pae/pruebas/docview/doc.pdf";
$page = 'http://localhost/pae/pruebas/docview/pdfjs/viewpdf.php?archivo='.$file;

?>
<iframe src="<?php echo $page; ?>" width="100%" height="100%"></iframe>