
    <section  id="form"><!--form-->
        <div class="container">
            <h2 class="title text-center">Üye <strong>Ol</strong></h2>
            <img style="display: block;margin-left: auto;margin-right: auto; width: 20%; border:3px dashed rgb(255, 192, 74)" src="images/home/logo4.png" alt=""> <br>
            <br>
            <div style="border:solid 20px; border-color:rgb(245, 245, 174);" class="row">

                <div style="display: block;margin-left: 25%;margin-right: auto; width: 50%;" class="col-sm-6">
                    <div style="margin: 25px" class="signup-form"><!--sign up form-->
                        <form action="index.php?SK=23" method="post">
                            <input type="text" placeholder="İsim*" name="Isim"/>

                            <input type="text" placeholder="Soyisim*" name="Soyisim"/>

                            <input type="email" placeholder="Email*" name="EmailAdresi"/>

                            <input type="password" placeholder="Şifre*" name="Sifre"/>

                            <input type="password" placeholder="Şifre Tekrar*" name="SifreTekrar"/>

                            <input type="tel" placeholder="Telefon Numarası*" name="TelefonNumarasi"/>

                            <select name="Cinsiyet" class="SelectAlanlari">
							<option value="">Lütfen Seçiniz</option>
							<option value="Erkek">Erkek</option>
							<option value="Kadın">Kadın</option>
						</select>
                        <br> <br>
                            
                            <div style="width:auto;float:left;">
                            <table>
                        
                            <tr height="40">
						        <td align="left" width="25"><input type="checkbox" name="SozlesmeOnay" value="1"></td>

						        <td align="left" class="UyelikFormu" width="475"><a href="index.php?SK=2" target="_blank">Üyelik Sözleşmesi</a>'ni Okudum ve Onaylıyorum.</td>
					        </tr>
					        <tr height="40">
					        	<td colspan="2" align="center"><button  type="submit" name="Submit" class="btn btn-default">Üye Ol</button></td>
					        </tr>
                            </table>
                            
                            
                            </div>
                            <br><br>
                            
                        </form>

                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
