<?php
require_once 'vendor/autoload.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');
$hoten = "Đào Duy Đán";
$mangten = explode(" ", $hoten);
$ten = $mangten[count($mangten)-1];

$ngay = $ngaybatdau;
$mangngay = explode("/", $ngay);
$ngayt = $mangngay[0];
$thangt = $mangngay[1];
$namt = $mangngay[2];
echo $ngaybatdau;
$templateProcessor->setValue('loaidon', $loaitt);
$templateProcessor->setValue('xa', 'Phú Yên');
$templateProcessor->setValue('hoten', $hoten);
$templateProcessor->setValue('ngaysinh', $ps->getDate($ngaysinh));
$templateProcessor->setValue('cccd', $cccd);
$templateProcessor->setValue('captai', $cccd_noicap);
$templateProcessor->setValue('capngay', $ps->getDate($cccd_capngay));
$templateProcessor->setValue('diachithuongtru', $diachithuongtru);
$templateProcessor->setValue('choohiennay', $choohiennay);
$templateProcessor->setValue('ngaybatdau', $ngaybatdau);
$templateProcessor->setValue('lydo', $lydo);
$templateProcessor->setValue('ten', $ten);
$templateProcessor->setValue('ngay', $ngayt);
$templateProcessor->setValue('thang', $thangt);
$templateProcessor->setValue('nam', $namt);
$templateProcessor->setValue('don', $don);
$templateProcessor->saveAs('tailieu/template'.$madon.'.docx');
$link = "tailieu/template".$madon.".docx";
?>