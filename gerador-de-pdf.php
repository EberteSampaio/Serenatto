<?php

require "vendor/autoload.php";
require 'vendor/dompdf/dompdf/include/autoload.inc.php';

use Dompdf/Dompdf;


$dompdf = new Dompdf();

ob_start();
require "conteudo-pdf.php";

$html = ob_get_clean();

$dompdf->load_html($html);

$dompdf->set_paper("A4");

$dompdf->render();

$dompdf->stream();

?>
