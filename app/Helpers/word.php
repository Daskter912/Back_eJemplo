<?php
require_once 'bootstrap.php';
include_once 'Sample_Header.php';

$phpWord = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');



$templateProcessor->saveAs('MyWordFile.docx');

