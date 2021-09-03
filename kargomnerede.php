<style>{
$primary: #6743ee
$seconday: #9F9F9F}

body{
  font-family: sans-serif
  min-height: 100vh
  display: flex
  justify-content: center
  align-items: center
}
*{
  box-sizing: border-box}

.l-radio{
  padding: 6px
  border-radius: 50px
  display: inline-flex
  cursor: pointer
  transition: background .2s ease
  margin: 8px 0
  -webkit-tap-highlight-color: transparent}
  
  &:hover,
  &:focus-within{
    background: rgba($seconday,.1)}
  
  input{
    vertical-align: middle
    width: 20px
    height: 20px
    border-radius: 10px
    background: none
    border: 0
    box-shadow: inset 0 0 0 1px $seconday
    box-shadow: inset 0 0 0 1.5px $seconday
    appearance: none
    padding: 0
    margin: 0
    transition: box-shadow 150ms cubic-bezier(.95,.15,.5,1.25)
    pointer-events: none}
  
    &:focus{
      outline: none}
    
    &:checked{
      box-shadow: inset 0 0 0 6px $primary}
    
  span{
    vertical-align: middle
    display: inline-block
    line-height: 20px
    padding: 0 8px
    }
</style>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Kargo <strong>Takip</strong></h2>
					<img style="display: block;margin-left: auto;margin-right: auto; width: 30%;" src="images/home/logo4.png" alt=""> <br>   
					
                    <p>Siparişler sayfasında ilgili siparişiniz ile alakalı gönderi takip numaranızı lütfen aşağıdaki alana girerek "Kargo Durumu" butonuna tıklayınız.</p>
					<p>Lütfen Kargo Şirketinizi Seçiniz:</p>

                    <div class="login-form">
						<form action="index.php?SK=15" method="post">
						<ul style="list-style-type: none; margin: 0; padding: 0; float:left;">
					<li style="float:left;padding:12px 16px;"><input type="radio" id="Yurtiçi" name="kargoadi" value="Yurtiçi">
					<label for="Yurtiçi">Yurtiçi Kargo</label><br>
					</li>
					<li style="float:left; padding:12px 16px;">
					<input type="radio" id="PTTKargo" name="kargoadi" value="PTTKargo">
 					<label for="PTTKargo">PTT Kargo</label><br>
					</li>

					<li style="float:left;padding:12px 16px;">
					<input type="radio" id="ArasKargo" name="kargoadi" value="ArasKargo">
 					<label for="ArasKargo">ArasKargo</label>
					</li>

					<li style="float:left;padding:12px 16px;">
					<input type="radio" id="SüratKargo" name="kargoadi" value="SüratKargo">
 					<label for="SüratKargo">Sürat Kargo</label>
					</li>

					<li style="float:left;padding:12px 16px;">
					<input type="radio" id="MNGKargo" name="kargoadi" value="MNGKargo">
 					<label for="MNGKargo">MNG Kargo</label>
					</li>

					</ul>

					<input type="text" placeholder="Kargo Takip Kodu" name="KargoTakipNosu" />
					<button type="submit" class="btn btn-default">Kargo Durumu</button>
					</form>
					</div>
					
					<div id="gmap" class="contact-map"></div>
					</div>
				</div>			 		
			</div>    	
    		
    	</div>	
    </div><!--/#contact-page-->
	