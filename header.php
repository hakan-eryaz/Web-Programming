<?php
//session_start(); ob_start();
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php");

if(isset($_REQUEST["SK"])){
	$SayfaKoduDegeri	=	SayiliIcerikleriFiltrele($_REQUEST["SK"]);
}else{
	$SayfaKoduDegeri	=	0;
}

if(isset($_REQUEST["SYF"])){
	$Sayfalama			=	SayiliIcerikleriFiltrele($_REQUEST["SYF"]);
}else{
	$Sayfalama			=	1;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Haker Ticaret</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<script type="text/javascript" src="Framework/JQuery/jquery-3.6.0.min.js" language="javascript"></script>
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<meta name="revisit-after" content="7 Days">
	<script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/home/logo5.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body >
	<header  id="header"><!--header-->
		<img style="margin: auto; display: block; width: 100%; height: 50px;" src="images/shop/ab.gif" alt="">
		<div style="background-color: #e4e7ee;" class="header_top"><!--header_top-->
			<div  class="container">
				
				<div class="row">
					<div class="col-sm-6">
						
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a style="color: black;" href="https://api.whatsapp.com/send?phone=905349742882"><i class="fa fa-phone"></i> +90 534 974 28 82</a></li>
								<li><a style="color: black;" href="mailto:ticarethaker@gmail.com"><i class="fa fa-envelope"></i> ticarethaker@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a style="color: black;" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a style="color: black;" href="https://twitter.com/home"><i class="fa fa-twitter"></i></a></li>
								<li><a style="color: black;" href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
								<li><a style="color: black;" href="https://www.instagram.com/haker_ticaret/"><i class="fa fa-instagram"></i></a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div   class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php?SK=0"><img src="images/home/logo4.png" style="height: 80px;" alt="Haker Ticaret" />

						</div>
						<div style="visibility:hidden"  class="btn-group pull-left">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									TR
									<span class="caret"></span>
								</button>
								<ul  class="dropdown-menu">
									<li><a  href="#">USA</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div  class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Turkish Lira
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php
					if(isset($_SESSION["Kullanici"])){
					?>
						<li><a  href="index.php?SK=50"><i class="fa fa-user"></i> Hesabım</a></li>
						<i class="fas fa-sign-out-alt"></i>
						<li><a  href="index.php?SK=49"><i class="fa fa-sign-out"></i> Çıkış Yap</a></li>
					<?php
					}else{
					?>
						<li><a href="index.php?SK=31"><i class="fa fa-lock"></i> Giriş Yap</a></li>
						<li><a href="index.php?SK=22"><i class="fa fa-save"></i> Üye Ol</a></li>
					<?php
					}
					?>
								
								<li><a href="index.php?SK=9"><i class="fa fa-money"></i> Ödeme</a></li>
								<li><a href="index.php?SK=94"><i class="fa fa-shopping-cart"></i> Sepetim</a></li>
                               
								<li><a href="yoneticilogin.php"><i class="fa fa-lock"></i> Yönetim Paneli</a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div style="background-color: #e4e7ee;" class="header-bottom"><!--header-bottom-->
			<div  class="container">
				<div  class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">

								<li class="dropdown"><a href="#">Elektronik<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="index.php?SK=86&MenuID=1&UrunTuru=Elektronik&MenuAdi=Cep Telefonu ve Aksesuar">Cep Telefonu ve Aksesuar</a></li>
										<li><a href="index.php?SK=86&MenuID=1&UrunTuru=Elektronik&MenuAdi=Bilgisayar, Tablet">Bilgisayar, Tablet</a></li> 
										<li><a href="index.php?SK=86&MenuID=1&UrunTuru=Elektronik&MenuAdi=TV, Ses ve Görüntü Sistemleri">TV, Ses ve Görüntü Sistemleri</a></li> 
										<li><a href="index.php?SK=86&MenuID=1&UrunTuru=Elektronik&MenuAdi=Beyaz Eşya">Beyaz Eşya</a></li> 
										<li><a href="index.php?SK=86&MenuID=1&UrunTuru=Elektronik&MenuAdi=Fotoğraf, Kamera">Fotoğraf, Kamera</a></li> 
                                    </ul>
                                </li> 

								<li class="dropdown"><a href="#">Ev, Bahçe, Ofis, Yapı Market<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="index.php?SK=86&MenuID=6&UrunTuru=Ev, Bahçe, Ofis, Yapı Market&MenuAdi=Mobilya">Mobilya</a></li>
										<li><a href="index.php?SK=86&MenuID=6&UrunTuru=Ev, Bahçe, Ofis, Yapı Market&MenuAdi=Mutfak Gereçleri">Mutfak Gereçleri</a></li> 
										<li><a href="index.php?SK=86&MenuID=6&UrunTuru=Ev, Bahçe, Ofis, Yapı Market&MenuAdi=Aydınlatma">Aydınlatma</a></li> 
										<li><a href="index.php?SK=86&MenuID=6&UrunTuru=Ev, Bahçe, Ofis, Yapı Market&MenuAdi=Banyo">Banyo</a></li> 
										<li><a href="index.php?SK=86&MenuID=6&UrunTuru=Ev, Bahçe, Ofis, Yapı Market&MenuAdi=Tamir, Tadilat Gereçleri">Tamir, Tadilat Gereçleri</a></li> 
                                    </ul>
                                </li> 
                                
								<li class="dropdown"><a href="#">Moda<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="index.php?SK=86&MenuID=11&UrunTuru=Moda&MenuAdi=Erkek">Erkek</a></li>
										<li><a href="index.php?SK=86&MenuID=11&UrunTuru=Moda&MenuAdi=Kadın">Kadın</a></li> 
										<li><a href="index.php?SK=86&MenuID=11&UrunTuru=Moda&MenuAdi=Çocuk Giyim, Aksesuar">Çocuk Giyim, Aksesuar</a></li> 
										<li><a href="index.php?SK=86&MenuID=11&UrunTuru=Moda&MenuAdi=Nikah, Düğün">Nikah, Düğün</a></li> 
										<li><a href="index.php?SK=86&MenuID=11&UrunTuru=Moda&MenuAdi=Saat">Saat</a></li> 
                                    </ul>
                                </li> 

								<li class="dropdown"><a href="#">Kozmetik, Kişisel Bakım<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="index.php?SK=86&MenuID=16&UrunTuru=Kozmetik, Kişisel Bakım&MenuAdi=Medikal Ürünler">Medikal Ürünler</a></li>
										<li><a href="index.php?SK=86&MenuID=16&UrunTuru=Kozmetik, Kişisel Bakım&MenuAdi=Saç Bakımı">Saç Bakımı</a></li> 
										<li><a href="index.php?SK=86&MenuID=16&UrunTuru=Kozmetik, Kişisel Bakım&MenuAdi=Erkek Kişisel Bakım Ürünleri">Erkek Kişisel Bakım Ürünleri</a></li> 
										<li><a href="index.php?SK=86&MenuID=16&UrunTuru=Kozmetik, Kişisel Bakım&MenuAdi=Vücut Bakımı">Vücut Bakımı</a></li> 
										<li><a href="index.php?SK=86&MenuID=16&UrunTuru=Kozmetik, Kişisel Bakım&MenuAdi=Parfüm">Parfüm</a></li> 
                                    </ul>
                                </li> 

								<li class="dropdown"><a href="#">Spor, Outdoor<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="index.php?SK=86&MenuID=21&UrunTuru=Spor, Outdoor&MenuAdi=Outdoor">Outdoor</a></li>
										<li><a href="index.php?SK=86&MenuID=21&UrunTuru=Spor, Outdoor&MenuAdi=Bisiklet">Bisiklet</a></li> 
										<li><a href="index.php?SK=86&MenuID=21&UrunTuru=Spor, Outdoor&MenuAdi=Avcılık, Kamp">Avcılık, Kamp</a></li> 
										<li><a href="index.php?SK=86&MenuID=21&UrunTuru=Spor, Outdoor&MenuAdi=Futbol">Futbol</a></li> 
										<li><a href="index.php?SK=86&MenuID=21&UrunTuru=Spor, Outdoor&MenuAdi=Sporcu Besinleri">Sporcu Besinleri</a></li> 
                                    </ul>
                                </li> 
							</ul>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="sonuc.php" method="get">
								<input type="text" name="aramasorgusu" placeholder="Ara">
							   </form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		<br> <br>
		
		<section id="slider"><!--slider-->
			<div  style="
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
			text-align: center;" class="container">
				<div class="row">
									
						<div class="col-sm-16">
							<img  src="images/shop/anasayfa_ara_bant_1618918802.jpg" class="girl img-responsive" alt="" />
						</div>
		
				</div>
			</div>
		</section><!--/slider-->

	</header><!--/header-->
	