<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Framework/PHPMailer/src/Exception.php';
require 'Framework/PHPMailer/src/PHPMailer.php';
require 'Framework/PHPMailer/src/SMTP.php';
include 'db.php';
if(isset($_GET["EmailAdresi"])){
	$GelenEmailAdresi		=	Guvenlik($_GET["EmailAdresi"]);
}else{
	$GelenEmailAdresi		=	"";
}
if(isset($_GET["AktivasyonKodu"])){
	$GelenAktivasyonKodu	=	Guvenlik($_GET["AktivasyonKodu"]);
}else{
	$GelenAktivasyonKodu	=	"";
}
if(isset($_POST["Sifre"])){
	$GelenSifre				=	Guvenlik($_POST["Sifre"]);
}else{
	$GelenSifre				=	"";
}
if(isset($_POST["SifreTekrar"])){
	$GelenSifreTekrar		=	Guvenlik($_POST["SifreTekrar"]);
}else{
	$GelenSifreTekrar		=	"";
}

$MD5liSifre					=	md5($GelenSifre);



if(($GelenEmailAdresi!="") and ($GelenAktivasyonKodu!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="")){
	if($GelenSifre!=$GelenSifreTekrar){
		header("Location:index.php?SK=47");
		exit();
	}else{

		$updateuye=mysqli_query($link, "UPDATE uyeler SET Sifre = '$MD5liSifre' WHERE EmailAdresi = '$GelenEmailAdresi' AND AktivasyonKodu = '$GelenAktivasyonKodu' LIMIT 1");
		if($updateuye){
			header("Location:index.php?SK=45");
			exit();
		}else{
			header("Location:index.php?SK=46");
			exit();
		}
	}
}else{
	header("Location:index.php?SK=48");
	exit();
}
?>