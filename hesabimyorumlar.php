<?php
include_once 'db.php';
if(isset($_SESSION["Kullanici"])){
	
$SayfalamaIcinSolVeSagButonSayisi		=	2;
$SayfaBasinaGosterilecekKayitSayisi		=	10;
// $ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->prepare("SELECT * FROM yorumlar WHERE UyeId = ? ORDER BY YorumTarihi DESC");
// $ToplamKayitSayisiSorgusu->execute([$KullaniciID]);
// $ToplamKayitSayisiSorgusu				=	$ToplamKayitSayisiSorgusu->rowCount();
$PR_sql = $link->query("SELECT * FROM yorumlar WHERE UyeId = '$KullaniciID' ORDER BY YorumTarihi DESC");
$ToplamKayitSayisiSorgusu = $PR_sql->fetch_assoc();
$SayfalamayaBaslanacakKayitSayisi		=	($Sayfalama*$SayfaBasinaGosterilecekKayitSayisi)-$SayfaBasinaGosterilecekKayitSayisi;
$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisiSorgusu/$SayfaBasinaGosterilecekKayitSayisi);
?>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">

	<tr>
		<td><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	
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
				// $YorumlarSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM yorumlar WHERE UyeId = ? ORDER BY YorumTarihi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SayfaBasinaGosterilecekKayitSayisi");
				// $YorumlarSorgusu->execute([$KullaniciID]);
				// $YorumlarSayisi			=	$YorumlarSorgusu->rowCount();
				// $YorumlarKayitlari		=	$YorumlarSorgusu->fetchAll(PDO::FETCH_ASSOC);
				$PR_sql1 = $link->query("SELECT * FROM yorumlar WHERE UyeId = '$KullaniciID' ORDER BY YorumTarihi DESC LIMIT 1");
				$YorumlarSayisi = $PR_sql1->fetch_assoc();

				if(TRUE){
					while($Satirlar = $PR_sql1->fetch_assoc()){
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
					if(TRUE){
				?>
					<tr height="50">
						<td colspan="2" align="center"><div class="SayfalamaAlaniKapsayicisi">
							<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
								Toplam <?php echo $BulunanSayfaSayisi; ?> sayfada, <?php echo $ToplamKayitSayisiSorgusu; ?> adet kayıt bulunmaktadır.
							</div>
							
							<div class="SayfalamaAlaniIciNumaraAlaniKapsayicisi">
								<?php
								
								
								
								
								
								?>
							</div>
						</div></td>
					</tr>
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
		</td>
	</tr>
</table>	
<?php
}else{
	header("Location:index.php");
	exit();
}
?>