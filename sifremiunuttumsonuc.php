<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Framework/PHPMailer/src/Exception.php';
require 'Framework/PHPMailer/src/PHPMailer.php';
require 'Framework/PHPMailer/src/SMTP.php';
include 'db.php';
if(isset($_POST["EmailAdresi"])){
	$GelenEmailAdresi		=	Guvenlik($_POST["EmailAdresi"]);
}else{
	$GelenEmailAdresi		=	"";
}
if(isset($_POST["TelefonNumarasi"])){
	$GelenTelefonNumarasi	=	Guvenlik($_POST["TelefonNumarasi"]);
}else{
	$GelenTelefonNumarasi	=	"";
}

if(($GelenEmailAdresi!="") or ($GelenTelefonNumarasi!="")){
	$res= mysqli_query($link, "SELECT * FROM uyeler WHERE EmailAdresi = '$GelenEmailAdresi' AND TelefonNumarasi = '$GelenTelefonNumarasi'");
			$res1=mysqli_num_rows($res);
            $row3 = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$Kullanici			=	$row3;

	if($res1==1){
		$MailIcerigiHazirla		=	"Merhaba Sayın " . $Kullanici["Isim"] . "<br /><br />Sitemiz üzerinde bulunan hesabınızın şifresini sıfırlamak için lütfen <a href='" . $SiteLinki . "/index.php?SK=43&AktivasyonKodu=" . $Kullanici["AktivasyonKodu"] . "&Email=" . $Kullanici["EmailAdresi"] . "'>BURAYA TIKLAYINIZ</a>.<br /><br />Saygılarımızla, iyi çalışmalar...<br />" . $SiteAdi;

		$MailGonder		=	new PHPMailer(true);

		try{
			$MailGonder->SMTPDebug			=	2;
			$MailGonder->isSMTP();
			$MailGonder->Host				=	DonusumleriGeriDondur($SiteEmailHostAdresi);
			$MailGonder->SMTPAuth			=	true;
			$MailGonder->CharSet			=	"UTF-8";
			$MailGonder->Username			=	DonusumleriGeriDondur($SiteEmailAdresi);
			$MailGonder->Password			=	DonusumleriGeriDondur($SiteEmailSifresi);
			$MailGonder->SMTPSecure			=	'tls';
			$MailGonder->Port				=	587;
			$MailGonder->SMTPOptions		=	array(
													'ssl' => array(
														'verify_peer' => false,
														'verify_peer_name' => false,
														'allow_self_signed' => true
													)
												);
			$MailGonder->setFrom(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
			$MailGonder->addAddress(DonusumleriGeriDondur($Kullanici["EmailAdresi"]), DonusumleriGeriDondur($Kullanici["Isim"]));					
			$MailGonder->addReplyTo(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
			$MailGonder->isHTML(true);
			$MailGonder->Subject			=	$SiteAdi . ' Şifre Sıfırlama';
			$MailGonder->MsgHTML($MailIcerigiHazirla);
			$MailGonder->send();

			header("Location:index.php?SK=39");
			exit();
		}catch(Exception $e){
			//header("Location:index.php?SK=40");
			echo $e;
			exit();
		}			
	}else{
		header("Location:index.php?SK=41");
		exit();
	}
}else{
	header("Location:index.php?SK=42");
	exit();
}
?>