
<?php
if(isset($_SESSION["Kullanici"])){
?>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">

	<tr>
		<td colspan="3"><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	
		</table></td>
	</tr>
	<tr>
		<td width="500" valign="top">
			<table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr height="40">
					<td style="color:#FF9900"><h3>Hesabım > Üyelik Bilgileri</h3></td>
				</tr>
				<tr height="30">
					<td valign="top" style="border-bottom: 1px dashed #CCCCCC;">Aşağıdan üyelik bilgilerini görüntüleyebilir veya güncelleyebilirsin.</td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>İsim</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $Isim; ?></td>
				</tr>
                <tr height="30">
					<td valign="bottom" align="left"><b>Soyisim</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $Soyisim; ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>Cinsiyet</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $Cinsiyet; ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>E-Mail Adresi</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $EmailAdresi; ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>Telefon Numarası</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $TelefonNumarasi; ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>Kayıt Tarihi</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo TarihBul($KayitTarihi); ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>Kayıt IP</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $KayitIpAdresi; ?></td>
				</tr>
				<tr height="30">
                
					<td align="center"><a href="index.php?SK=51" class="btn btn-default add-to-cart"><i class="fa fa-archive"></i>Bilgilerimi Güncellemek İstiyorum »</a></td>
				</tr>
			</table>
		</td>
		
		<td width="20">&nbsp;</td>
		
		<td width="545" valign="top"><table width="545" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr height="40">
				<td  style="color:#FF9900"><h3>Reklam</h3></td>
			</tr>
			<tr height="30">
				<td valign="top" style="border-bottom: 1px dashed #CCCCCC;">HakerShop.com Reklamları.</td>
			</tr>
			<tr height="5">
				<td height="5" style="font-size: 5px;">&nbsp;</td>
			</tr>
			<tr>
				<td><img style="width:545px;" src="images/shop/black-friday-sale-advertisement-background_1055-8951.jpg" border="0"></td>
			</tr>
		</table></td>
	</tr>
</table>	
<?php
}else{
	header("Location:index.php");
	exit();
}
?>