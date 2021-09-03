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
$MenulerSorgusu="SELECT * FROM menuler ORDER BY MenuAdi ASC";
$MenulerSorgusu= mysqli_query($link,$MenulerSorgusu);
$MenuKayitSayisi=mysqli_num_rows($MenulerSorgusu);


$BannerSorgusu="SELECT * FROM bannerlar WHERE BannerAlani = 'Menu Altı' ORDER BY GosterimSayisi ASC LIMIT 1";
$BannerSorgusu= mysqli_query($link,$BannerSorgusu);
$BannerKaydi = $BannerSorgusu->fetch_assoc();
$BannerSayisi=mysqli_num_rows($BannerSorgusu);


$UrunlerSorgusu="SELECT * FROM urunler WHERE Durumu = '1' ORDER BY rand() DESC LIMIT 6";
$UrunlerSorgusu= mysqli_query($link,$UrunlerSorgusu);
$UrunSayisi=mysqli_num_rows($UrunlerSorgusu);

$UrunlerSorgusu2="SELECT * FROM urunler WHERE Durumu = '1' ORDER BY rand() DESC LIMIT 6";
$UrunlerSorgusu2= mysqli_query($link,$UrunlerSorgusu2);
$UrunSayisi2=mysqli_num_rows($UrunlerSorgusu2);
					?>




<div class="pull-left">
						<img style="width:300px; height:400px"  src="images/shop/emailpembe.gif" class="girl img-responsive" alt="" />
					</div>
					
					<div class="pull-right">
						<img style="width:300px; height:400px"  src="images/shop/email.gif" class="girl img-responsive" alt="" />
					</div>
	<section id="slider"><!--slider-->
		<div  class="container">
		
			<div  class="row">
				
				<div style="display: block; width: 100%; background-image: url(images/shop/announce-advertisement-background_118124-332.jpg); background-repeat: no-repeat;;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
		text-align: center;" class="col-sm-12">
					
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div  class="carousel-inner">
							<div  class="item active">
								<div  class="col-sm-8">
									<h1><span>Hak</span>-Er</h1>
									<h2>Özel Fiyatlarla Alışveriş</h2>
									<p>İlk yılımıza özel bizde yapacağınız alışverişlerinizde 
										%10 indirim ve 20TL kupon hediye.
									</p>
								<a href="shop.html"><button type="button" class="btn btn-default get">Keşfet</button></a>
								</div>
								<div  class="col-sm-4">
									<img style="height:400px;" src="Makine/g.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-8">
									<h1><span>Hak</span>-Er</h1>
									<h2>Ücretsiz Kargo</h2>
									<p>50TL ve üzeri yapacağınız tüm alışverişlerde Kargo Ücretsiz. </p>
									<a href="shop.html"><button type="button" class="btn btn-default get">Keşfet</button></a>
								</div>
								<div class="col-sm-4">
									<img style="height:400px;" src="Makine/kablolu-kablosuz-sarjli-4-tarakli-tiras-makinesi-ipone-ip-789-sac-sakal-ense-tras-makinasi-107677-jpg_min.jpeg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-8">
									<h1><span>Hak</span>-Er</h1>
									<h2>Güvenilir Alışverişin Adresi</h2>
									<p>Tüm siparişlerinizde 15 gün içerisinde iade garantili alışveriş fırsatı.</p>
									<a href="shop.html"><button type="button" class="btn btn-default get">Keşfet</button></a>
								</div>
								<div class="col-sm-4">
									<img style="height:400px;" src="Makine/c.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<div class="pull-right">
						<img style="width:285px; height:400px"  src="images/shop/indir.gif" class="girl img-responsive" alt="" />
					</div>
					<div class="pull-left">
						<img style="width:300px; height:400px"  src="images/shop/Gmail.gif" class="girl img-responsive" alt="" />
					</div>
	<section id="slider"><!--slider-->
		<div  style="
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
		text-align: center;" class="container">
			<div class="row">
								
					<div class="col-sm-16">
						<img style="width: 1200px; height: 400px;"  src="images/shop/revvmotoranasayfa_1619380456.jpg" class="girl img-responsive" alt="" />
					</div>
	
			</div>
		</div>
	</section><!--/slider-->
	<div class="pull-left">
						<img style="margin-left:10px; width:285px; height:400px"  src="images/shop/banyo.gif" class="girl img-responsive" alt="" />
					</div>
					
					<div class="pull-right">
						<img style="margin-right:10px; width:285px; height:400px"  src="images/shop/saat.gif" class="girl img-responsive" alt="" />
					</div>
	<section id="slider"><!--slider-->
		<div  style="
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
		text-align: center;" class="container">
			<div class="row">
								
					<div class="col-sm-12">
						<div class="col-sm-12 padding-right">
							<div class="features_items"><!--features_items-->
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div  class="single-products">
												<div class="productinfo text-center">
													<img src="images/shop/revschafer_1619594546.jpeg" alt="" />
													<h2>₺80</h2>
													<p>Schafer Küçük Ev Aletleri</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
													<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>
												</div>
												<div style="background-color: rgb(105, 233, 233);" class="product-overlay">
													<div class="overlay-content">
														<h2>₺80</h2>
														<p>Schafer Küçük Ev Aletleri</p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
														<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>
													</div>
												</div>
										</div>
										
									</div>
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/shop/revtefal_1619594389.jpeg" alt="" />
												<h2>₺120</h2>
												<p>Tefal Küçük Ev Aletleri</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
												<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>
											</div>
											<div style="background-color: rgb(105, 243, 77);" class="product-overlay">
												<div class="overlay-content">
													<h2>₺120</h2>
													<p>Tefal Küçük Ev Aletleri</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
													<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/shop/tchibo_1619594472.jpeg" alt="" />
												<h2>₺170</h2>
												<p>Tchibo Küçük Ev Aletleri</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
												<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>
											</div>
											<div style="background-color: rgb(243, 61, 61);" class="product-overlay">
												<div class="overlay-content">
													<h2>₺170</h2>
													<p>Tchibo Küçük Ev Aletleri</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
													<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
							</div><!--features_items-->
							
							
							
						</div>
						
					</div>
	
			</div>
		</div>
	</section><!--/slider-->
	<section >
		<div style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
		text-align: center;" class="container">	
			<div class="row">
				<div class="col-sm-3">
				<div class="left-sidebar">
						<h2>Kategoriler</h2>
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
							<h2>Fiyat Aralığı</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">₺ 0</b> <b class="pull-right">₺ 1000</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Çok Satanlar</h2>
						<?php
						$DonguSayisi			=	1;
						$SutunAdetSayisi		=	3;
                                        while($Urun = $UrunlerSorgusu->fetch_assoc()){
                                        ?>
										<div style="max-height:550px;" class="col-sm-4">
                        		<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="height:320px;" src="Makine/<?php echo $Urun["UrunResmiBir"];?>" alt="" />
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
										<li><a href="#"><i class="fa fa-plus-square"></i>Karşılaştır</a></li>
									</ul>
								</div>
							</div>
							</div>
						<?php
                                        }
                                        ?>
						
					</div><!--features_items-->
						
						
					
					
					
					
				
					
				</div>
				<hr style="width: 70%;
    border-style: solid;
    color: orange;
    border-width: 15px;">
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Özel Ürünler</h2>
						<?php
						$DonguSayisi			=	1;
						$SutunAdetSayisi		=	3;
                                        while($Urun2 = $UrunlerSorgusu2->fetch_assoc()){
                                        ?>
										<div style="max-height:550px;" class="col-sm-4">
                        		<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="height:320px;" src="Makine/<?php echo $Urun2["UrunResmiBir"];?>" alt="" />
										<h2><?php echo $Urun2["UrunFiyati"];?> TL</h2>
										<p><?php echo $Urun2["UrunAdi"];?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
										<a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hemen Al</a>									
										</div>
										<a href="index.php?SK=83&UrunID=<?php echo $Urun2["id"]; ?>&UrunTuru=<?php echo $Urun2["UrunTuru"]; ?>&MenuAdi=<?php echo $Urun2["MenuAdi"]; ?>">
										<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $Urun2["UrunFiyati"];?><?php echo $Urun2["ParaBirimi"];?></h2>
											<p><?php echo $Urun2["UrunAdi"];?></p>
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
										<li><a href="#"><i class="fa fa-plus-square"></i>Karşılaştır</a></li>
									</ul>
								</div>
							</div>
							</div>
						<?php
                                        }
                                        ?>
						
					</div><!--features_items-->
						
						
					
					
					
					
				
					
				</div>
			</div>
		</div>
	</section>

								
					
