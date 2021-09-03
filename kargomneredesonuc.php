<?php
if(isset($_POST["KargoTakipNosu"])){
	$GelenKargoTakipNosu		=$_POST["KargoTakipNosu"];
}else{
	$GelenKargoTakipNosu		=	"";
}

if(isset($_POST["kargoadi"])){
	$GelenKargoAdi		=$_POST["kargoadi"];
}else{
	$GelenKargoAdi		=	"";
}


if($GelenKargoTakipNosu!=""){
	if($GelenKargoAdi=="Yurtiçi"){
		header("Location:https://www.yurticikargo.com/tr/online-servisler/gonderi-sorgula?code="." $GelenKargoTakipNosu");
		exit();
	}
	if($GelenKargoAdi=='PTTKargo'){
		header("Location:https://gonderitakip.ptt.gov.tr/Track/Verify?q="." $GelenKargoTakipNosu");
		exit();
	}

	if($GelenKargoAdi=="ArasKargo"){
		header("Location:https://social.araskargo.com.tr/");
		exit();
	}
	
	if($GelenKargoAdi=="SüratKargo"){
		header("Location:https://suratkargo.com.tr/KargoTakip/?kargotakipno="." $GelenKargoTakipNosu");
		exit();
	}

	if($GelenKargoAdi=="MNGKargo"){
		header("Location:https://www.mngkargo.com.tr/gonderitakip"." $GelenKargoTakipNosu");
		exit();
	}



}else{
	header("Location:index.php?SK=14");
	exit();
}
?>