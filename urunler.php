<?php
include_once 'db.php';
if(isset($_REQUEST["MenuID"])){
	$GelenMenuID		    =	SayiliIcerikleriFiltrele(Guvenlik($_REQUEST["MenuID"]));
	$MenuIDKosulu			=	 " AND MenuID = '" . $GelenMenuID . "' ";
	$MenuIDSayfalamaKosulu	=	"&MenuID=" . $GelenMenuID;
}else{
	$GelenMenuID		    =	"";
	$MenuIDKosulu			=	"";
	$MenuIDSayfalamaKosulu	=	"";
}

if(isset($_REQUEST["UrunTuru"])){
	$GelenUrunTuru		        =	$_REQUEST["UrunTuru"];
	$UrunTuruKosulu		        =	 " AND UrunTuru = '" . $GelenUrunTuru . "' ";
	$UrunTuruSayfalamaKosulu	=	"&UrunTuru=" . $GelenUrunTuru;
}else{
	$GelenUrunTuru		        =	"";
	$UrunTuruKosulu		        =	"";
	$UrunTuruSayfalamaKosulu	=	"";
}
if(isset($_REQUEST["MenuAdi"])){
	$GelenMenuAdi		    =	$_REQUEST["MenuAdi"];
	$MenuAdiKosulu			=	 " AND MenuAdi = '" . $GelenMenuAdi . "' ";
	$MenuAdiSayfalamaKosulu	=	"&MenuAdi=" . $GelenMenuAdi;
}else{
	$GelenMenuAdi		    =	"";
	$MenuAdiKosulu			=	"";
	$MenuAdiSayfalamaKosulu	=	"";
}
if(isset($_REQUEST["AramaIcerigi"])){
	$GelenAramaIcerigi	=	Guvenlik($_REQUEST["AramaIcerigi"]);
	$AramaKosulu		=	 " AND UrunAdi LIKE '%" . $GelenAramaIcerigi . "%' ";
	$SayfalamaKosulu	=	"&AramaIcerigi=" . $GelenAramaIcerigi;
}else{
	$GelenAramaIcerigi	=   "";
    $AramaKosulu		=   "";
    $SayfalamaKosulu	=	"";
}



$AnaMenununTumUrunSayiSorgusu="SELECT SUM(UrunSayisi) AS MenununToplamUrunu FROM menuler WHERE UrunTuru = '$GelenUrunTuru'";
$AnaMenununTumUrunSayiSorgusu= mysqli_query($link,$AnaMenununTumUrunSayiSorgusu);
$AnaMenununTumUrunSayiSorgusu = $AnaMenununTumUrunSayiSorgusu->fetch_assoc();


$ToplamKayitSayisiSorgusu="SELECT * FROM urunler WHERE UrunTuru = '$GelenUrunTuru' AND Durumu = '1' AND MenuAdi = '$GelenMenuAdi' ORDER BY id DESC";
$ToplamKayitSayisiSorgusu= mysqli_query($link,$ToplamKayitSayisiSorgusu);
$ToplamKayitSayisi=mysqli_num_rows($ToplamKayitSayisiSorgusu);

$SayfaBasinaGosterilecekKayitSayisi		=	9;
$SayfalamayaBaslanacakKayitSayisi		=	($Sayfalama*$SayfaBasinaGosterilecekKayitSayisi)-$SayfaBasinaGosterilecekKayitSayisi;
$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SayfaBasinaGosterilecekKayitSayisi);
$MenulerSorgusu="SELECT * FROM menuler WHERE UrunTuru = '$GelenUrunTuru' ORDER BY '$GelenMenuAdi' ASC";
$MenulerSorgusu= mysqli_query($link,$MenulerSorgusu);
$MenuKayitSayisi=mysqli_num_rows($MenulerSorgusu);


$BannerSorgusu="SELECT * FROM bannerlar WHERE BannerAlani = 'Menu Alt??' ORDER BY GosterimSayisi ASC LIMIT 1";
$BannerSorgusu= mysqli_query($link,$BannerSorgusu);
$BannerKaydi = $BannerSorgusu->fetch_assoc();
$BannerSayisi=mysqli_num_rows($BannerSorgusu);


$UrunlerSorgusu="SELECT * FROM urunler WHERE Durumu = '1' $MenuAdiKosulu $AramaKosulu ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SayfaBasinaGosterilecekKayitSayisi";
$UrunlerSorgusu= mysqli_query($link,$UrunlerSorgusu);
$UrunSayisi=mysqli_num_rows($UrunlerSorgusu);
					?>


    
    <section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	<div class="pull-left">
						<img style="width:300px; height:400px"  src="images/shop/emailpembe.gif" class="girl img-responsive" alt="" />
					</div>
					
					<div class="pull-right">
						<img style="width:300px; height:400px"  src="images/shop/email.gif" class="girl img-responsive" alt="" />
					</div>
					
					
	<section>
	
		<div class="container">
			<div class="row">
			
				<div class="col-sm-3">
				
					<div class="left-sidebar">
						<h2><?php echo $GelenUrunTuru;?></h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php
                                        while($Menu = $MenulerSorgusu->fetch_assoc()){
                                        ?>
                                        <div class="panel panel-default">
								<div class="panel-heading">
                                
									<h4 class="panel-title"><<a href="index.php?SK=86&UrunID=<?php echo $Menu["id"]; ?>&UrunTuru=<?php echo $Menu["UrunTuru"]; ?>&MenuAdi=<?php echo $Menu["MenuAdi"]; ?>" style="text-decoration: none; <?php if($GelenMenuId==$Menu["id"]){ ?>color: #FF9900;<? }else{ ?>color: #646464;<?php } ?> font-weight: bold;"><?php echo DonusumleriGeriDondur($Menu["MenuAdi"]); ?></a></h4>
								</div>
							</div>
											
											<?php
                                        }
                                        ?>
							
						</div><!--/category-products-->
					
						
						<div class="price-range"><!--price-range-->
							<h2>Fiyat Aral??????</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">??? 0</b> <b class="pull-right">??? 1000</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-left">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $GelenMenuAdi;?></h2>
						
							
						<?php
						$DonguSayisi			=	1;
						$SutunAdetSayisi		=	3;
                                        while($Urun = $UrunlerSorgusu->fetch_assoc()){
                                        ?>
										<div style="max-height:550px;" class="col-sm-4">
                        		<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="height:290px;" src="Makine/<?php echo $Urun["UrunResmiBir"];?>" alt="" />
										<h2><?php echo $Urun["UrunFiyati"];?> TL</h2>
										<p><?php echo $Urun["UrunAdi"];?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
										<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>									
										</div>
										<a href="index.php?SK=83&UrunID=<?php echo $Urun["id"]; ?>&UrunTuru=<?php echo $Urun["UrunTuru"]; ?>&MenuAdi=<?php echo $Urun["MenuAdi"]; ?>">
										<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $Urun["UrunFiyati"];?><?php echo $Urun["ParaBirimi"];?></h2>
											<p><?php echo $Urun["UrunAdi"];?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
											<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>										
											</div>
									</div>
									<img src="images/home/sale.png" class="new" alt="" />
								</div>
								</a>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Istek Listesine Ekle</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Kar????la??t??r</a></li>
									</ul>
								</div>
							</div>
							</div>
						<?php
                                        }
                                        ?>
						
					</div><!--features_items-->
					<?php
					/*sayfalama buton kodlar??*/
if($ToplamKayitSayisi > $SayfaBasinaGosterilecekKayitSayisi){	//i??erik say??s??, her sayfada g??sterilecek i??erik say??s??ndan b??y??k ise sayfalama butonlar?? aktif edilsin	 
	echo '<br><br>';
	/*
		$x = 2 oldu??u durumda, aktif sayfan??n ??nceki ve sonraki 2 sayfa g??sterilir, sonras??na ... ifadesi konularak k??saltma yap??l??r. 
		b??ylelikle b??t??n sayfalar?? yazmam??za gerek kalmaz.
		??rnekler:
		?? ??nceki 1...4 5 [6] 7 8...11 Sonraki ??	  ||  [1] 2 3...11 Sonraki ??	  ||   ?? ??nceki 1...9 10 [11] 
	*/
	$x = 2; //k??saltma limiti 
	if($Sayfalama > 1){	//sayfa 1 den k??????k ise [??nceki] butonu olu??turulmaya uygundur	
		$onceki = $Sayfalama-1;	//aktif sayfan??n bir ??nceki sayfa bulunur		
		echo "<span class='SayfalamaPasif'><a href='index.php?SK=86" . $MenuIDSayfalamaKosulu . "&SYF=" . $onceki . "&UrunTuru=".$GelenUrunTuru. "&MenuAdi=".$GelenMenuAdi. "&MenuID=".$GelenMenuID."'>?? ??nceki</a></span>";
	}		 
	if($Sayfalama==1){ //sayfalamada 1. sayfada bulunuyorsak
		echo '<a>[1]</a>'; //1. sayfay?? men??de aktif olarak g??steriyoruz
	}
	else{ // bulunmuyorsak
		echo '<a href="?SYF=1">1</a>'; //normal olarak g??z??ks??n, aktif olmas??n	
	}
	//men?? k??saltma i??lemi
		//bulundu??umuz sayfa yani $sayfa = 6 oldu??u durumda
	if($Sayfalama-$x > 2){ //6-2 > 2 de??eri true d??nd??recek
		echo '...'; //k??saltma etiketi yazd??r??lacak	
		$i = $Sayfalama-$x; //$i de??i??kenine 4 de??eri atanacak	 
	}else { 			
		$i = 2; 		  
	}
	//$sayfa = 6 oldu??u durumda = sonuc ????kt??s?? -> 1 ...
	
	for($i; $i<=$Sayfalama+$x; $i++) { //$i yani 4 de??eri 8 de??erine ula??as??ya kadar d??ng?? ??al????s??n	> 4  5  6  7  8	
		if($i==$Sayfalama){ //$i de??eri bulundu??umuz sayfa ile e??itse
			echo '&nbsp;<a>['.$i.']</a>&nbsp;'; // aktif olarak i??aretlensin ve yazd??r??ls??n > 4  5  [6]  7  8	
		}
		else{//de??il ise
			echo '<a href="?SYF='.$i.'">'.$i.'</a>'; //normal olarak yazd??r??ls??n
		}
		if($i==$BulunanSayfaSayisi) break;  
	}
	//$sayfa = 6 oldu??u durumda = sonuc ????kt??s?? -> 1 ... 4  5  [6]  7  8	
	//<a href='index.php?SK=86" . $MenuIDSayfalamaKosulu . "&SYF=" . $SayfalamaIcinSayfaDegeriniBirIleriAl . "&UrunTuru=".$GelenUrunTuru. "&MenuAdi=".$GelenMenuAdi. "&MenuID=".$GelenMenuID."'>Sonraki ??</a>
	if($Sayfalama+$x < $BulunanSayfaSayisi-1) { //6+2<11-1 ise	
		echo '...'; //k??saltma etiketi yazd??r??lacak				
		echo '<a href="?SYF='.$BulunanSayfaSayisi.'">'.$BulunanSayfaSayisi.'</a>'; //	son sayfa yazd??r??lacak	  
	}elseif($Sayfalama+$x == $BulunanSayfaSayisi-1) { 			
		echo '<a href="?SYF='.$BulunanSayfaSayisi.'">'.$BulunanSayfaSayisi.'</a>'; 		 
	}
	//$sayfa = 6 oldu??u durumda = sonuc ????kt??s?? -> 1 ... 4  5  [6]  7  8 ... 11	
	//men?? k??saltma i??lemi
	
	if($Sayfalama < $BulunanSayfaSayisi){	//bulundu??umuz sayfa hala son sayfa de??il ise	  
		$sonraki = $Sayfalama+1; //bulund??umuz sayfa de??eri 1 artt??r??l??yor		  
		echo "<span class='SayfalamaPasif'><a href='index.php?SK=86" . $MenuIDSayfalamaKosulu . "&SYF=" . $sonraki . "&UrunTuru=".$GelenUrunTuru. "&MenuAdi=".$GelenMenuAdi. "&MenuID=".$GelenMenuID."'>Sonraki ??</a></span>";
		//ve Sonraki butonu olu??turulup yazd??r??l??yor 		  
	}	
}
/*sayfalama buton kodlar??*/
?>
				</div>
			</div>
		</div>
		
		
	</section>
	
	