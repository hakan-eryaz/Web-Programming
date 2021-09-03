<?php
include_once 'db.php';
if(isset($_SESSION["Kullanici"])){
	if(isset($_GET["ID"])){
		$GelenID		=	Guvenlik($_GET["ID"]);
	}else{
		$GelenID		=	"";
	}

	if($GelenID!=""){

		$siladres=mysqli_query($link, "DELETE FROM adresler WHERE id = '$GelenID' LIMIT 1");

		if($siladres){
			header("Location:index.php?SK=68");
			exit();
		}else{
			header("Location:index.php?SK=69");
			exit();
		}
	}else{
		header("Location:index.php?SK=69");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>