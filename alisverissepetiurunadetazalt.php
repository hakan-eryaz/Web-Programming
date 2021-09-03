<?php
include_once 'db.php';
if(isset($_SESSION["Kullanici"])){
	if(isset($_GET["ID"])){
		$GelenID		=	Guvenlik($_GET["ID"]);
	}else{
		$GelenID		=	"";
	}

	if($GelenID!=""){	
		// $SepetGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE sepet SET UrunAdedi=UrunAdedi-1 WHERE id = ? AND UyeId = ? LIMIT 1");
		// $SepetGuncellemeSorgusu->execute([$GelenID, $KullaniciID]);
		// $SepetGuncellemeSayisi		=	$SepetGuncellemeSorgusu->rowCount();
		$SepetGuncellemeSorgusu="UPDATE sepet SET UrunAdedi=UrunAdedi-1 WHERE id = '$GelenID' AND UyeId = '$KullaniciID' LIMIT 1";
		$SepetGuncellemeSorgusu= mysqli_query($link,$SepetGuncellemeSorgusu);
		if($SepetGuncellemeSorgusu){
			header("Location:index.php?SK=94");
			exit();
		}else{
			header("Location:index.php?SK=94");
			exit();
		}
	}else{
		header("Location:index.php?SK=94");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>