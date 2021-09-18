<?php

$BARCODE = trim($_GET['barcode']);
$fileName = "barcodes/data.txt";


$myfile = fopen($fileName , "r") ;
$information = fread($myfile,filesize($fileName));
fclose($myfile);
$information = json_decode($information,true) ?? [];

 

if($BARCODE!=''){

    $tempinfo['time'] = date("d-m-Y H:i:s");
    $tempinfo['barcode'] = $BARCODE;
    $information[] = $tempinfo;

    
    $information = json_encode($information,true);
    $fp = fopen("barcodes/data.txt", 'w');
    var_dump($fp);
    fwrite($fp,  $information);
}
?>