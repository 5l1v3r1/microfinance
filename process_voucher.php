<?php
include_once('conf/db_connect.php');
connect();
$acct_no = $_GET['acct_no'];
$date = date('Y-m-d');
$image_tempname = $_FILES['voucher']['name'];
$ImageDir ="dist/img/";
$ImageName = $ImageDir . $image_tempname;
echo $ImageName;
if(move_uploaded_file($_FILES['voucher']['tmp_name'],
        $ImageName)){
$new = $acct_no . time() .".jpg";
query("INSERT INTO voucher(date, acct_no, voucher_id) VALUES('$date', '$acct_no', '$new')")
query("UPDATE transaction SET voucher_id='$new' WHERE acct_no='$acct_no' AND date='$date'");
$newfilename = $ImageDir . $new;
echo $newfilename;
$animage = imagecreatefromjpeg ($ImageName);
$ox = imagesx($animage);
$oy = imagesy($animage);
//$nx = 100;
//$ny = floor($oy * (100 / $ox) );
$nm = imagecreatetruecolor( $ox, $oy);
imagecopyresized($nm, $animage, 0, 0, 0, 0, $ox, $oy, $ox, $oy );
imagejpeg($nm, $newfilename);
imagedestroy($animage);
imagedestroy($nm);
folder($priv);

 ?>
