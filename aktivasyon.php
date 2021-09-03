<?php
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
include 'db.php';
if(isset($_GET["AktivasyonKodu"])){
	$GelenAktivasyonKodu	=	Guvenlik($_GET["AktivasyonKodu"]);
}else{
	$GelenAktivasyonKodu	=	"";
}
if(isset($_GET["Email"])){
	$GelenEmail				=	Guvenlik($_GET["Email"]);
}else{
	$GelenEmail				=	"";
}

if(($GelenAktivasyonKodu!="") and ($GelenEmail!="")){

	$res= mysqli_query($link, "SELECT * FROM uyeler WHERE EmailAdresi = '$GelenEmail' AND AktivasyonKodu = '$GelenAktivasyonKodu' AND Durumu = '0'");

	if($res){

		$updateuye=mysqli_query($link, "UPDATE uyeler SET Durumu = 1 WHERE AktivasyonKodu='$GelenAktivasyonKodu'");
		if($updateuye){
			header("Location:index.php?SK=30");
			exit();
		}else{
			header("Location:" . $SiteLinki);
			exit();
		}
	}else{
		header("Location:" . $SiteLinki);
		exit();
	}
}else{
	header("Location:" . $SiteLinki);
	exit();
}

?>