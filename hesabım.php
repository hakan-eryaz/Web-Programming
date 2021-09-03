
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Hesap <strong>Bilgileriniz</strong></h2>
                    <div class="category-tab"><!--category-tab-->
						<div class="col-sm-20">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Üyelik Bilgilerim</a></li>
								<li><a href="#blazers" data-toggle="tab">Adreslerim</a></li>
								<li><a href="#sunglass" data-toggle="tab">Siparişlerim</a></li>
								<li><a href="#kids" data-toggle="tab">Yorumlarım</a></li>
								<li><a href="#poloshirt" data-toggle="tab">Favorilerim</a></li>
							</ul>
						</div>
						<div  style="border: 4px solid black; border-radius: 30px; padding: 15px;"  class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<?php
								include 'hesabimuyelikbilgilerim.php';

								?>
								
							</div>
							
							<div class="tab-pane fade" id="blazers" >
							<?php
								include 'hesabimadresler.php';

								?>
							</div>
							


							<div class="tab-pane fade" id="sunglass" >
							<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	
	<tr>
		<td><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	
		</table></td>
	</tr>
	
	<tr>
		<td width="1065" valign="top">
			<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr height="40">
					<td colspan="8" style="color:#FF9900"><h3>Hesabım > Siparişler</h3></td>
				</tr>
				<tr height="30">
					<td colspan="8" valign="top" style="border-bottom: 1px dashed #CCCCCC;">Tüm Siparişlerinizi Bu Alandan Görüntüleyebilirsiniz.</td>
				</tr>
				<tr height="50">
				<td width="125" style="background: #f8ffa7; color: black;" align="left">&nbsp;Sipariş Numarası</td>
					<td width="75" style="background: #f8ffa7; color: black;" align="left">Resim</td>
					<td width="70" style="background: #f8ffa7; color: black;" align="left">Yorum</td>
					<td width="415" style="background: #f8ffa7; color: black;" align="left">Adı</td>
					<td width="100" style="background: #f8ffa7; color: black;" align="left">Fiyatı</td>
					<td width="50" style="background: #f8ffa7; color: black;" align="left">Adet</td>
					<td width="100" style="background: #f8ffa7; color: black;" align="left">Toplam Fiyat</td>
					<td width="150" style="background: #f8ffa7; color: black;" align="left">Kargo Durumu / Takip</td>
				</tr>
				<?php
								include_once 'db.php';
								if(isset($_SESSION["Kullanici"])){

									$siparişsorgu="SELECT * FROM siparisler WHERE UyeId = '$KullaniciID' ORDER BY id ASC";
									$result= mysqli_query($link,$siparişsorgu);
									$resultsayisi=mysqli_num_rows($result);
									
									while($SiparisSatirlar = $result->fetch_assoc()){
										$KargoDurumu		=	DonusumleriGeriDondur($SiparisSatirlar["KargoDurumu"]);
										if($KargoDurumu == 0){
											$KargoDurumuYazdir	=	"Beklemede";
										}else{
											$KargoDurumuYazdir	=	DonusumleriGeriDondur($SiparisSatirlar["KargoGonderiKodu"]);
										}
									?>
									<table>
								<tr height="30">

								<td width="125" align="left">&nbsp;#<?php echo DonusumleriGeriDondur($SiparisSatirlar["SiparisNumarasi"]); ?></td>
								<td width="75" align="left"><img src="Makine/<?php echo DonusumleriGeriDondur($SiparisSatirlar["UrunResmiBir"]); ?>" border="0" width="60" height="80"></td>
								<td width="70" align="left"><a href="index.php?SK=75&UrunID=<?php echo DonusumleriGeriDondur($SiparisSatirlar["UrunId"]); ?>"><img src="Resimler/DokumanKirmiziKalemli20x20.png" border="0"></a></td>
								<td width="415" align="left"><?php echo DonusumleriGeriDondur($SiparisSatirlar["UrunAdi"]); ?></td>
								<td width="100" align="left"><?php echo FiyatBicimlendir(DonusumleriGeriDondur($SiparisSatirlar["UrunFiyati"])); ?> TL</td>
								<td width="50" align="left"><?php echo DonusumleriGeriDondur($SiparisSatirlar["UrunAdedi"]); ?></td>
								<td width="100" align="left"><?php echo FiyatBicimlendir(DonusumleriGeriDondur($SiparisSatirlar["ToplamUrunFiyati"])); ?> TL</td>
								<td width="150" align="left"><?php echo $KargoDurumuYazdir; ?></td>
								
								</tr>
									
									</table>
									<?php
								}
								}

								?>
								
								</table>
							</div>
							



							<div class="tab-pane fade" id="kids" >
                            </table></td>
	</tr>

	<tr>
		<td width="1065" valign="top">
			<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr height="40">
					<td colspan="2" style="color:#FF9900"><h3>Hesabım > Yorumlar</h3></td>
				</tr>
				<tr height="30">
					<td colspan="2" valign="top" style="border-bottom: 1px dashed #CCCCCC;">Tüm Yorumlarınız Bu Alandan Görüntüleyebilirsiniz.</td>
				</tr>
				<tr height="50">
					<td width="125" style="background: #f8ffa7; color: black;" align="left">&nbsp;Puan</td>
					<td width="75" style="background: #f8ffa7; color: black;" align="left">Yorum&nbsp;</td>
				</tr>
				<?php
				include_once 'db.php';
				
				$YorumlarSorgusu = $link->query("SELECT * FROM yorumlar WHERE UyeId = '$KullaniciID' ORDER BY YorumTarihi DESC LIMIT 10");
				$YorumlarSayisi=mysqli_num_rows($YorumlarSorgusu);
				if($YorumlarSorgusu){
					while($Satirlar = $YorumlarSorgusu->fetch_assoc()){
						$VerilenPuan	=	$Satirlar["Puan"];
						if($VerilenPuan==1){
							$ResimDosyasi	=	"YildizBirDolu.png";
						}elseif($VerilenPuan==2){
							$ResimDosyasi	=	"YildizIkiDolu.png";
						}elseif($VerilenPuan==3){
							$ResimDosyasi	=	"YildizUcDolu.png";
						}elseif($VerilenPuan==4){
							$ResimDosyasi	=	"YildizDortDolu.png";
						}elseif($VerilenPuan==5){
							$ResimDosyasi	=	"YildizBesDolu.png";
						}
						
				?>
						<tr>
							<td width="85" align="left" style="border-bottom: 1px dashed #CCCCCC; padding: 15px 0px;" valign="top"><img src="Resimler/<?php echo $ResimDosyasi; ?>" border="0"></td>
							<td width="980" align="left" style="border-bottom: 1px dashed #CCCCCC; padding: 15px 0px;" valign="top"><?php echo DonusumleriGeriDondur($Satirlar["YorumMetni"]); ?></td>
						</tr>
				<?php	
						}
					if($YorumlarSorgusu){
				?>
					
				<?php	
					}
				}else{
				?>
					<tr height="50">
						<td colspan="2" align="left">Sisteme Kayıtlı Yorum Bulunmamaktadır.</td>
					</tr>
				<?php
				}
				?>
			</table>
							</div>
							




							<div class="tab-pane fade" id="poloshirt" >

							<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	
	<tr>
		<td><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	
		</table></td>
	</tr>
	<tr>
		<td width="1065" valign="top">
			<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr height="40">
					<td colspan="4" style="color:#FF9900"><h3>Hesabım > Favoriler</h3></td>
				</tr>
				<tr height="30">
					<td colspan="4" valign="top" style="border-bottom: 1px dashed #CCCCCC;">Favorilerinize Eklediğiniz Tüm Ürünleri Bu Alandan Görüntüleyebilirsiniz.</td>
				</tr>
				<tr height="50">
					<td width="75" style="background: #f8ffa7; color: black;" align="left">&nbsp;Resim</td>
					<td width="25" style="background: #f8ffa7; color: black;" align="left">Sil</td>
					<td width="865" style="background: #f8ffa7; color: black;" align="left">Adı</td>
					<td width="100" style="background: #f8ffa7; color: black;" align="left">Fiyatı</td>
				</tr>
				<?php
				// $FavorilerSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM favoriler WHERE UyeId = '$KullaniciID' ORDER BY id DESC LIMIT 20");
				// $FavorilerSorgusu->execute([$KullaniciID]);
				// $FavoriSayisi			=	$FavorilerSorgusu->rowCount();
				// $FavoriKayitlari		=	$FavorilerSorgusu->fetchAll(PDO::FETCH_ASSOC);
				$FavorilerSorgusu = $link->query("SELECT * FROM favoriler WHERE UyeId = '$KullaniciID' ORDER BY id DESC LIMIT 20");
				$FavoriSayisi=mysqli_num_rows($FavorilerSorgusu);
				if($FavoriSayisi>0){
					while($FavoriSatirlar = $FavorilerSorgusu->fetch_assoc()){
						$UrunId=$FavoriSatirlar["UrunId"];
						// $UrunlerSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM urunler WHERE id = ? LIMIT 1");
						// $UrunlerSorgusu->execute([$FavoriSatirlar["UrunId"]]);
						// $UrunKaydi			=	$UrunlerSorgusu->fetch(PDO::FETCH_ASSOC);
						$UrunlerSorgusu = $link->query("SELECT * FROM urunler WHERE id = '$UrunId' LIMIT 1");
						$UrunKaydi = $UrunlerSorgusu->fetch_assoc();

						$UrununAdi			=	$UrunKaydi["UrunAdi"];
						$UrununUrunTuru		=	$UrunKaydi["UrunTuru"];
						$UrununResmi		=	$UrunKaydi["UrunResmiBir"];
						$UrununUrunFiyati	=	$UrunKaydi["UrunFiyati"];
						$UrununParaBirimi	=	$UrunKaydi["ParaBirimi"];
						
								
				?>
						<tr height="30">
							<td width="75" align="left" style="border-bottom: 1px dashed #CCCCCC;"><a href="index.php?SK=83&ID=<?php echo DonusumleriGeriDondur($UrunKaydi["id"]); ?>"><img src="Makine/<?php echo DonusumleriGeriDondur($UrununResmi); ?>" border="0" width="60" height="80"></a></td>
							<td width="50" align="left" style="border-bottom: 1px dashed #CCCCCC;"><a href="index.php?SK=81&ID=<?php echo DonusumleriGeriDondur($FavoriSatirlar["id"]); ?>"><img src="Resimler/Sil20x20.png" border="0"></a></td>
							<td width="415" align="left" style="border-bottom: 1px dashed #CCCCCC;"><a href="index.php?SK=83&ID=<?php echo DonusumleriGeriDondur($UrunKaydi["id"]); ?>" style="color: #646464; text-decoration: none;"><?php echo DonusumleriGeriDondur($UrununAdi); ?></a></td>
							<td width="100" align="left" style="border-bottom: 1px dashed #CCCCCC;"><a href="index.php?SK=83&ID=<?php echo DonusumleriGeriDondur($UrunKaydi["id"]); ?>" style="color: #646464; text-decoration: none;"><?php echo FiyatBicimlendir(DonusumleriGeriDondur($UrununUrunFiyati)); ?> <?php echo DonusumleriGeriDondur($UrununParaBirimi); ?></a></td>
						</tr>
				<?php	
					}
					if($FavoriSayisi>1){
				?>
					
				<?php	
					}
				}else{
				?>
					<tr height="50">
						<td colspan="4" align="left">Sisteme Kayıtlı Favori Ürününüz Bulunmamaktadır.</td>
					</tr>
				<?php
				}
				?>
			</table>
		</td>
	</tr>
</table>	

                                
                                </div>
							</div>
							</div>
						</div>
					</div><!--/category-tab-->
									
					
				</div>			 		
			</div>    	 
    	</div>	
