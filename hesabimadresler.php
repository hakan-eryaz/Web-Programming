<?php
if(isset($_SESSION["Kullanici"])){
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
					<td colspan="5" style="color:#FF9900"><h3>Hesabım > Adresler</h3></td>
				</tr>
				<tr height="30">
					<td colspan="5" valign="top" style="border-bottom: 1px dashed #CCCCCC;">Tüm Adreslerini görüntüleyebilir veya güncelleyebilirsin.</td>
				</tr>
				<tr height="50">
					<td colspan="1" style="background: #f8ffa7; color: black; font-weight: bold;" align="left">&nbsp;Adresler</td>
					<td colspan="4" style="background: #f8ffa7; color: black; font-weight: bold;" align="right"><a href="index.php?SK=70" style="text-decoration: none; color: #000000;">+ Yeni Adres Ekle</a>&nbsp;</td>
				</tr>
				<?php
				include_once 'db.php';
				// $AdreslerSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM adresler WHERE UyeId = ?");
				// $AdreslerSorgusu->execute([$KullaniciID]);
				// $AdreslerSayisi			=	$AdreslerSorgusu->rowCount();
				// $AdreslerKayitlari		=	$AdreslerSorgusu->fetchAll(PDO::FETCH_ASSOC);
				$result= mysqli_query($link, "SELECT * FROM adresler WHERE UyeId='$KullaniciID'");
			$res1=mysqli_num_rows($result);
			$PR_sql = $link->query("SELECT * FROM adresler WHERE UyeId='$KullaniciID'");
            $row3 = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
				$BirinciRenk			=	"#FFFFFF";
				$IkinciRenk				=	"#F1F1F1";
				$RenkSayisi				=	1;
				
				if($res1>0){
					while($Satirlar = $PR_sql->fetch_assoc()){
						if($RenkSayisi % 2){
							$ArkaplanRengi	=	$BirinciRenk;
						}else{
							$ArkaplanRengi	=	$IkinciRenk;
						}
				?>
					<tr height="50" bgcolor="<?php echo $ArkaplanRengi; ?>">
						<td align="left"><?php echo $Satirlar["Isim"]; ?> - <?php echo $Satirlar["Soyisim"]; ?> - <?php echo $Satirlar["Adres"]; ?> <?php echo $Satirlar["Ilce"]; ?> / <?php echo $Satirlar["Sehir"]; ?> - <?php echo $Satirlar["TelefonNumarasi"]; ?></td>
						<td width="25"><img src="Resimler/Guncelleme20x20.png" border="0" style="margin-top: 5px;"></td>
						<td width="70"><a href="index.php?SK=62&ID=<?php echo $Satirlar["id"]; ?>" style="text-decoration: none; color: #646464;">Güncelle</a></td>
						<td width="25"><img src="Resimler/Sil20x20.png" border="0" style="margin-top: 5px;"></td>
						<td width="25"><a href="index.php?SK=67&ID=<?php echo $Satirlar["id"]; ?>" style="text-decoration: none; color: #646464;">Sil</a></td>
					</tr>
				<?php	
						$RenkSayisi++;
					}
				}else{
				?>
					<tr height="50">
						<td colspan="5" align="left">Sisteme Kayıtlı Adresiniz Bulunmamaktadır. <?php echo $res1; ?></td>
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