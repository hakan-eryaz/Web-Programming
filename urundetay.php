<?php
include_once 'db.php';
if(isset($_REQUEST["UrunID"])){
	$GelenUrunID		    =	SayiliIcerikleriFiltrele(Guvenlik($_REQUEST["UrunID"]));
	$UrunIDKosulu			=	 " AND id = '" . $GelenUrunID . "' ";
	$UrunIDSayfalamaKosulu	=	"&MenuID=" . $GelenUrunID;
}else{
	$GelenUrunID		    =	"";
	$UrunIDKosulu			=	"";
	$UrunIDSayfalamaKosulu	=	"";
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


$BannerSorgusu="SELECT * FROM bannerlar WHERE BannerAlani = 'Menu Altı' ORDER BY GosterimSayisi ASC LIMIT 1";
$BannerSorgusu= mysqli_query($link,$BannerSorgusu);
$BannerKaydi = $BannerSorgusu->fetch_assoc();
$BannerSayisi=mysqli_num_rows($BannerSorgusu);


$UrunlerSorgusu="SELECT * FROM urunler WHERE Durumu = '1' $MenuAdiKosulu $UrunIDKosulu $AramaKosulu  LIMIT 1";
$UrunlerSorgusu= mysqli_query($link,$UrunlerSorgusu);
$UrunSayisi=mysqli_num_rows($UrunlerSorgusu);
$UrunKaydi = $UrunlerSorgusu->fetch_assoc();

$YorumlarSorgusu="SELECT * FROM yorumlar WHERE UrunId=$GelenUrunID";
$YorumlarSorgusu= mysqli_query($link,$YorumlarSorgusu);
$YorumlarSayisi=mysqli_num_rows($YorumlarSorgusu);
					?>
	
	
	
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
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="Makine/<?php echo $UrunKaydi["UrunResmiBir"]; ?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img style="height: 75px;  width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiIki"]; ?>" alt=""></a>
										  <a href=""><img style="height: 75px;  width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiUc"]; ?>" alt=""></a>
										  <a href=""><img style="height: 75px;  width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiDort"]; ?>" alt=""></a>
										</div>
										<div class="item">
											<a href=""><img style="height: 75px;width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiDort"]; ?>" alt=""></a>
											<a href=""><img style="height: 75px;width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiUc"]; ?>" alt=""></a>
											<a href=""><img style="height: 75px;width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiIki"]; ?>" alt=""></a>
										</div>
										<div class="item">
											<a href=""><img style="height: 75px;width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiUc"]; ?>" alt=""></a>
											<a href=""><img style="height: 75px;width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiDort"]; ?>" alt=""></a>
											<a href=""><img style="height: 75px;width:90px;" src="Makine/<?php echo $UrunKaydi["UrunResmiIki"]; ?>" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $UrunKaydi["UrunAdi"]; ?></h2>
								<p><?php echo $GelenMenuAdi; ?></p>
								
								<span>
									<span><?php echo $UrunKaydi["UrunFiyati"]; ?>₺</span>
									<label>Adet:</label>
									<input type="text" value="3" />
									
									
								</span>
								<p><b>Stok:</b> Stokta var</p>
								<p><b>Durum:</b> Sıfır Ürün</p>
								<form action="index.php?SK=91&ID=<?php echo DonusumleriGeriDondur($UrunKaydi["id"]); ?>" method="post">
									<input type="submit" value="SEPETE EKLE" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Sepete Ekle
									</input>
									
								</form>

								
								

								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								
							</div><!--/product-information-->
							
						</div>
						
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-20">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Ürün Açıklaması</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Kargo Bilgileri</a></li>
								<li><a href="#tag" data-toggle="tab">Taksit Bilgileri</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Ürün Yorumları</a></li>
							</ul>
						</div>
						<div  style="border: 4px solid black; border-radius: 30px; padding: 15px;"  class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								
								<div  style="padding: 15px; margin: 10px;">	
									<h3><?php echo $UrunKaydi["UrunAdi"]; ?> için satıcı açıklaması</h3>	
								<p><?php echo $UrunKaydi["UrunAciklamasi"]; ?>
								</p>
								</div>
                                
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								
								<div  style="padding: 15px; margin: 10px;">		
								<h3>İncelediğiniz ürünün kargo bilgileri:</h3>
									<span>Satıldığı Bölge: İstanbul </span> <br><br>
									<span>Gönderim Alanları: Tüm Türkiye'ye gönderilir. </span><br><br>
									<span>Kargo Ücreti: <?php echo $UrunKaydi["KargoUcreti"]; ?></span><br><br>
									<span>Kargo Süresi: Saat 17:00 öncesi alınan siparişler aynı gün kargoya verilir.</span><br><br>
									<span>Kargo Şirketi: Yurtiçi Kargo</span><br><br>
									
								</div>
                                
							</div>
							
							<div class="tab-pane fade " id="tag" >
								<h3>İncelediğiniz ürünün taksit bilgileri</h3>
								<div style="border: 5px solid black; ">
										<table style="border: 2px dashed black; padding: 20px; margin: 10px; float: left;">
											<caption>Halk Bank</caption>
											<tr>
												<th align="center"></th>
												<th align="center" width="40%">Taksit Tutarı  </th>
												<th align="center" width="40%">Toplam Tutar  </th>
											</tr>
																					<tr>
												<td align="center">3</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/3); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">4</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/4); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">6</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/6); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">9</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/9); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">12</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/12); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
											</table>

											<table style="border: 2px dashed black; padding: 20px; margin: 10px; float: left;">
												<caption>Ziraat Bank</caption>
												<tr>
												<th align="center"></th>
												<th align="center" width="40%">Taksit Tutarı  </th>
												<th align="center" width="40%">Toplam Tutar  </th>
											</tr>
																					<tr>
												<td align="center">3</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/3); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">4</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/4); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">6</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/6); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">9</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/9); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">12</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/12); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
												</table>

												<table style="border: 2px dashed black; padding: 20px; margin: 10px; float: left;">
													<caption>Vakıf Bank</caption>
													<tr>
												<th align="center"></th>
												<th align="center" width="40%">Taksit Tutarı  </th>
												<th align="center" width="40%">Toplam Tutar  </th>
											</tr>
																					<tr>
												<td align="center">3</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/3); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">4</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/4); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">6</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/6); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">9</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/9); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">12</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/12); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
													</table>

													<table style="border: 2px dashed black; padding: 20px; margin: 10px; float:none;">
														<caption>İş Bank</caption>
														<tr>
												<th align="center"></th>
												<th align="center" width="40%">Taksit Tutarı  </th>
												<th align="center" width="40%">Toplam Tutar  </th>
											</tr>
																					<tr>
												<td align="center">3</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/3); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">4</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/4); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">6</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/6); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">9</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/9); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
																					<tr>
												<td align="center">12</td>
												<td align="center" width="40%"><?php echo (int)(($UrunKaydi["UrunFiyati"])/12); ?> TL</td>
												<td align="center" width="40%"><?php echo $UrunKaydi["UrunFiyati"]; ?> TL</td>
											</tr>
														</table>
														
												</div>
                                
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								
								<div  style="border: 4px dotted orange; border-radius: 30px; padding: 15px; margin: 10px;">		
								<h3>İncelediğiniz ürünün aldığı yorumlar</h3>
								<?php
								while($YorumKaydi = $YorumlarSorgusu->fetch_assoc()){
								?>
									<h4>Sipariş Numarası: <?php echo $YorumKaydi["SiparisNo"]; ?></h4>
									<p><?php echo $YorumKaydi["YorumMetni"]; ?></p> <br> <br>
									
<?php

								}
								?>
								</div>
                                
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
