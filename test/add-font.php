<?php
require_once('../config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');

TCPDF_FONTS::addTTFfont('D:/temp/tahoma.ttf', 'TrueTypeUnicode', '', 32);
TCPDF_FONTS::addTTFfont('D:/temp/tahomabd.ttf', 'TrueTypeUnicode', '', 32);
?>
