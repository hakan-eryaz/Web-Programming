
	 <form action="" method="post">
	<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr height="100" bgcolor="#FF9900">
			<td align="left"><h2 style="color: white;">&nbsp;SIK SORULAN SORULAR</h2></td>
		</tr>
		<tr height="50">
			<td align="left" style="border-bottom: 1px dashed #CCCCCC;">&nbsp;Aklınıza takılabileceğini düşündüğümüz soruların cevaplarını bu sayfada cevapladık. Fakat farklı bir sorunuz varsa lütfen iletişim alanından bizlere iletiniz.</td>
		</tr>
		<tr>
			<td><?php
        			include_once 'db.php';
        			$PR_sql = $link->query("SELECT * FROM sorular ORDER BY id asc");

				
				while($Kayitlar = $PR_sql->fetch_assoc()){
        			?>
        				<div style="border: 5px #FF9900 solid;margin:5px;">
        					<div style="color:black; font-size: 30px; margin:15px;" id="<?php echo $Kayitlar["id"]; ?>" class="SorununBaslikAlani" onClick="$.SoruIcerigiGoster(<?php echo $Kayitlar["id"]; ?>)"><?php echo $Kayitlar["soru"]; ?></div>
        					<div style="color:black; font-size: 15px; margin:15px;" class="SorununCevapAlani" style="display: none;"><?php echo $Kayitlar["cevap"]; ?></div>
        				</div>
        			<?php
        			}
        			?>
			</td>
		</tr>
	</table>
</form>