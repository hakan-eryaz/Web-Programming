<?php

include_once 'db.php';
if(isset($_SESSION["Kullanici"])){

	if(isset($_GET["ID"])){
		$GelenID		=	Guvenlik($_GET["ID"]);
	}else{
		$GelenID		=	"";
	}
	
	if(isset($_POST["Varyant"])){
		$GelenVaryantID	=	Guvenlik($_POST["Varyant"]);
	}else{
		$GelenVaryantID	=	"";
	}
	
	if(($GelenID!="")){
		
	
			
		$UrunEklemeSorgusu="INSERT INTO sepet (UyeId, UrunId, UrunAdedi) values ($KullaniciID, $GelenID, 1)";
		$UrunEklemeSorgusu= mysqli_query($link,$UrunEklemeSorgusu);
	
		if($UrunEklemeSorgusu){
			header("Location:index.php?SK=94");
			exit();
		}else{
			header("Location:index.php?SK=92");
			exit();
		
		}
	
	}
}


?>