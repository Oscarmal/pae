<?php 
$file = htmlentities("http://localhost/doc.pdf");
$page = 'http://localhost/pae/pruebas/docview/pdfjs/viewpdf.php?archivo='.$file;

?>
<iframe src="<?php echo $page; ?>" width="100%" height="100%"></iframe>