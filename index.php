<?php

session_start(); ob_start();
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php");
include "header.php";

?>
<?php
					
					if((!$SayfaKoduDegeri) or ($SayfaKoduDegeri=="") or ($SayfaKoduDegeri==0)){
						include($Sayfa[0]);
					}else{
						include($Sayfa[$SayfaKoduDegeri]);
					}
					?><br />
			

	<?php
include "footer.php";
	?>