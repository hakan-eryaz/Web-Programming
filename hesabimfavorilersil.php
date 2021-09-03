<?php
include_once 'db.php';
if(isset($_SESSION["Kullanici"])){
	if(isset($_GET["ID"])){
		$GelenID		=	Guvenlik($_GET["ID"]);
	}else{
		$GelenID		=	"";
	}

	if($GelenID!=""){
		// $FavoriSilmeSorgusu		=	$VeritabaniBaglantisi->prepare("DELETE FROM favoriler WHERE id = ? AND UyeId = ? LIMIT 1");
		// $FavoriSilmeSorgusu->execute([$GelenID, $KullaniciID]);
		// $FavoriSilmeSayisi		=	$FavoriSilmeSorgusu->rowCount();
		$UrunlerSorgusu=mysqli_query($link,"DELETE FROM favoriler WHERE id = '$GelenID' AND UyeId = '$KullaniciID' LIMIT 1");
		//$FavoriSilmeSayisi=mysqli_num_rows($UrunlerSorgusu);
		if($UrunlerSorgusu){
			header("Location:index.php?SK=50");
			exit();
		}else{
			header("Location:index.php?SK=82");
			exit();
		}
	}else{
		header("Location:index.php?SK=82");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>