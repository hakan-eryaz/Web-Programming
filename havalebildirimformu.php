
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php?SK=0">Anasayfa</a></li>
				  <li class="active">Ödeme</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">1.Adım</h2>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Müşteri Bilgileri</p>
							<form action="index.php?SK=10" method="post">
								<input type="text" placeholder="Isim Soyisim" name="IsimSoyisim">
								<input type="email" placeholder="Email Adresi" name="EmailAdresi">
								<input type="tel" placeholder="Telefon Numarasi" name="TelefonNumarasi">
								<select name="BankaSecimi" class="SelectAlanlari">
								
								<?php
								include_once 'db.php';
								$PR_sql = $link->query("SELECT * FROM bankahesaplarimiz ORDER BY BankaAdi asc");
							

							while($Bankalar = $PR_sql->fetch_assoc()){
							?>
							<option value="<?php echo DonusumleriGeriDondur($Bankalar["id"]); ?>"><?php echo DonusumleriGeriDondur($Bankalar["BankaAdi"]); ?></option>
							<?php
							}
							?>
							</select>
							
						<div class="order-message">
							<br>
							<textarea name="Aciklama"  placeholder="Siparişinizle ilgili notlar, Teslimat için Özel Notlar" rows="16"></textarea>	
						 
					</div>			
							
							<input class="btn btn-primary" type="submit" name="submit" value="Gönder"> 
							</form>
			
						</div>
					</div>
					
					
					<div class="col-sm-4">
						<div class="order-message">
						<table  width="545" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		
		<td width="20">&nbsp;</td>
		
		<td width="545" valign="top"><table width="545" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr height="40">
				<td colspan="2" style="color:#FF9900"><h3>İşleyiş</h3></td>
			</tr>
			<tr height="30">
				<td colspan="2" valign="top" style="border-bottom: 1px dashed #CCCCCC;">Havale / EFT İşlemlerinin Kontrolü.</td>
			</tr>
			<tr height="5">
				<td colspan="2" height="5" style="font-size: 5px;">&nbsp;</td>
			</tr>
			<tr height="30">
				<td align="left" width="30"><img src="Resimler/Banka20x20.png" border="0" style="margin-top: 3px;"></td>
				<td align="left"><b>Havale / EFT İşlemi</b></td>
			</tr>
			<tr>
				<td colspan="2" align="left">Müşteri tarafından öncelikle banka hesaplarımız sayfasında bulunan herhangi bir hesaba ödeme işlemi gerçekleştirilir.</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr height="30">
				<td align="left" width="30"><img src="Resimler/DokumanKirmiziKalemli20x20.png" border="0" style="margin-top: 3px;"></td>
				<td align="left"><b>Bildirim İşlemi</b></td>
			</tr>
			<tr>
				<td colspan="2" align="left">Ödeme işleminizi tamamladıktan sonra "Havale Bildirim Formu" sayfasından müşteri yapmış olduğu ödeme için bildirim formunu doldurarak on-line olarak gönderir.</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr height="30">
				<td align="left" width="30"><img src="Resimler/CarklarSiyah20x20.png" border="0" style="margin-top: 3px;"></td>
				<td align="left"><b>Kontroller</b></td>
			</tr>
			<tr>
				<td colspan="2" align="left">"Havale Bildirim Formu"'nuz tarafımıza ulaştığı anda ilgili departman tarafından yapmış olduğunuz havale /EFT işlemi ilgili banka üzerinden kontrol edilir.</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr height="30">
				<td align="left" width="30"><img src="Resimler/InsanlarSiyah20x20.png" border="0" style="margin-top: 3px;"></td>
				<td align="left"><b>Onay / Red</b></td>
			</tr>
			<tr>
				<td colspan="2" align="left">Havale bildirimi geçerli ise yani hesaba ödeme geçmiş ise, yönetici ilgili ödeme onayını vererek, siparişiniz teslimat birimine iletilir.</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr height="30">
				<td align="left" width="30"><img src="Resimler/SaatEsnetikGri20x20.png" border="0" style="margin-top: 3px;"></td>
				<td align="left"><b>Sipariş Hazırlama & Teslimat</b></td>
			</tr>
			<tr>
				<td colspan="2" align="left">Yönetici ödeme onayından sonra sayfamız üzerinden vermiş olduğunuz sipariş en kısa sürede hazırlanarak kargoya teslim edilir ve tarafınıza ulaştırılır..</td>
			</tr>
		</table></td>
	</tr>
</table>
						</div>	
						 
					</div>				
				</div>
			</div>


</div>
	</section> <!--/#cart_items-->
