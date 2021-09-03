<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Framework/PHPMailer/src/Exception.php';
require 'Framework/PHPMailer/src/PHPMailer.php';
require 'Framework/PHPMailer/src/SMTP.php';
include_once 'db.php';
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

$MD5liSifre					=	md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenSifre!="")){

	$res= mysqli_query($link, "SELECT * FROM uyeler WHERE EmailAdresi = '$GelenEmailAdresi' AND Sifre = '$MD5liSifre'");
			$res1=mysqli_num_rows($res);
            $row3 = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$Kullanici			=	$row3;
		if($res1==1){
            echo'hakan';
		if($Kullanici["Durumu"]==1){
			$_SESSION["Kullanici"]	=	$GelenEmailAdresi;
			echo'hakan1';
			if($_SESSION["Kullanici"]==$GelenEmailAdresi){
				header("Location:index.php?SK=50");
				exit();
                echo'hakan2';
			}
			else{
				header("Location:index.php?SK=33");
				exit();echo'hakan3';
			}
		}
		else{
			$MailIcerigiHazirla		=	"Merhaba Sayın " . $Kullanici["Isim"] . "<br /><br />Sitemize yapmış olduğunuz üyelik kaydını tamamlamak için lütfen <a href='" . $SiteLinki . "/aktivasyon.php?AktivasyonKodu=" . $Kullanici["AktivasyonKodu"] . "&Email=" . $Kullanici["EmailAdresi"] . "'>BURAYA TIKLAYINIZ</a>.<br /><br />Saygılarımızla, iyi çalışmalar...<br />" . $SiteAdi;

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

				header("Location:index.php?SK=36");
				exit();
                echo'hakan3';
			}catch(Exception $e){
				header("Location:index.php?SK=33");
				exit();
                echo'hakan4';
			}			
		}
	}
	else{
		header("Location:index.php?SK=34");
		exit();
       // echo'hakan5';
	}
}
else{
	header("Location:index.php?SK=35");
	exit();
    echo'hakan6';
}
?>