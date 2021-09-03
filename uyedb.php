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
if(isset($_POST["Isim"])){
	$GelenIsim		=	Guvenlik($_POST["Isim"]);
}else{
	$GelenIsim		=	"";
}
if(isset($_POST["Soyisim"])){
	$GelenSoyisim		=	Guvenlik($_POST["Soyisim"]);
}else{
	$GelenSoyisim		=	"";
}
if(isset($_POST["TelefonNumarasi"])){
	$GelenTelefonNumarasi	=	Guvenlik($_POST["TelefonNumarasi"]);
}else{
	$GelenTelefonNumarasi	=	"";
}
if(isset($_POST["Cinsiyet"])){
	$GelenCinsiyet			=	Guvenlik($_POST["Cinsiyet"]);
}else{
	$GelenCinsiyet			=	"";
}
if(isset($_POST["SozlesmeOnay"])){
	$GelenSozlesmeOnay		=	Guvenlik($_POST["SozlesmeOnay"]);
}else{
	$GelenSozlesmeOnay		=	"";
}

$AktivasyonKodu				=	AktivasyonKoduUret();
$MD5liSifre					=	md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="") and ($GelenIsim!="") and ($GelenSoyisim!="") and ($GelenTelefonNumarasi!="") and ($GelenCinsiyet!="")){
	if(isset($_POST["SozlesmeOnay"])==FALSE){
		header("Location:index.php?SK=29");
		exit();
	}else{
		if($GelenSifre!=$GelenSifreTekrar){
			header("Location:index.php?SK=28");
			exit();
		}
		
		else{
			$res= mysqli_query($link, "SELECT * FROM uyeler WHERE EmailAdresi= '$GelenEmailAdresi'");
			$res1=mysqli_num_rows($res);
			if($res1==1){
				header("Location:index.php?SK=27");
				exit();
			}else{

				$insert=mysqli_query($link, "INSERT INTO uyeler(EmailAdresi,Sifre,Isim,Soyisim,TelefonNumarasi,Cinsiyet,Durumu,AktivasyonKodu,KayitTarihi,KayitIpAdresi) 
				VALUES ('$GelenEmailAdresi', '$MD5liSifre','$GelenIsim','$GelenSoyisim','$GelenTelefonNumarasi','$GelenCinsiyet', '0','$AktivasyonKodu','$ZamanDamgasi','$IPAdresi')");
				
				 if($insert){
				 	echo'Hakan';
				 	$MailIcerigiHazirla		=	"Merhaba Sayın " . $GelenIsim. " ".$GelenSoyisim."<br /><br />Sitemize yapmış olduğunuz üyelik kaydını tamamlamak için lütfen <a href='" . $SiteLinki . "/aktivasyon.php?AktivasyonKodu=" . $AktivasyonKodu . "&Email=" . $GelenEmailAdresi . "'>BURAYA TIKLAYINIZ</a>.<br /><br />Saygılarımızla, iyi çalışmalar...<br />" . $SiteAdi;
			
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
				 		$MailGonder->addAddress(DonusumleriGeriDondur($GelenEmailAdresi), DonusumleriGeriDondur($GelenIsimSoyisim));					
				 		$MailGonder->addReplyTo(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
				 		$MailGonder->isHTML(true);
				 		$MailGonder->Subject			=	$SiteAdi . ' Yeni Üyelik Aktivasyonu';
				 		$MailGonder->MsgHTML($MailIcerigiHazirla);
				 		$MailGonder->send();
				
				 		header("Location:index.php?SK=24");
				 		exit();
					}catch(Exception $e){
						echo $e;
						header("Location:index.php?SK=25");
						exit();
					}
				}else{
					header("Location:index.php?SK=25");
					exit();
				}
			}
		}
	}
}
else{
echo'hakan';
	header("Location:index.php?SK=26");
	exit();
}
?>