<?php
if(isset($_SESSION["Kullanici"])){
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
	if(isset($_POST["Adres"])){
		$GelenAdres				=	Guvenlik($_POST["Adres"]);
	}else{
		$GelenAdres				=	"";
	}
	if(isset($_POST["Ilce"])){
		$GelenIlce				=	Guvenlik($_POST["Ilce"]);
	}else{
		$GelenIlce				=	"";
	}
	if(isset($_POST["Sehir"])){
		$GelenSehir				=	Guvenlik($_POST["Sehir"]);
	}else{
		$GelenSehir				=	"";
	}
	if(isset($_POST["TelefonNumarasi"])){
		$GelenTelefonNumarasi	=	Guvenlik($_POST["TelefonNumarasi"]);
	}else{
		$GelenTelefonNumarasi	=	"";
	}

	if(($GelenIsim!="") and ($GelenSoyisim!="") and ($GelenAdres!="") and ($GelenIlce!="") and ($GelenSehir!="") and ($GelenTelefonNumarasi!="")){
		// $AdresEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO adresler (UyeId, Isim, Soyadi, Adres, Ilce, Sehir, TelefonNumarasi) values (?, ?, ?, ?, ?, ?)");
		// $AdresEklemeSorgusu->execute([$KullaniciID, $GelenIsimSoyisim, $GelenAdres, $GelenIlce, $GelenSehir, $GelenTelefonNumarasi]);
		// $EklemeKontrol			=	$AdresEklemeSorgusu->rowCount();
		include_once 'db.php';
		$insert=mysqli_query($link, "INSERT INTO adresler(UyeId, Isim, Soyisim, Adres, Ilce, Sehir, TelefonNumarasi) 
				VALUES ('$KullaniciID','$GelenIsim','$GelenSoyisim','$GelenAdres','$GelenIlce','$GelenSehir','$GelenTelefonNumarasi')");
		if($insert){
			header("Location:index.php?SK=72");
			exit();
		}else{
			echo $KullaniciID;
			echo $GelenIsim;
			echo $GelenSoyisim;
			echo $GelenAdres;
			echo $GelenIlce;
			echo $GelenSehir;
			echo $GelenTelefonNumarasi;


			//header("Location:index.php?SK=73");
			//exit();
		}
	}else{
		header("Location:index.php?SK=74");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>