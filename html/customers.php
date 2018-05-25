<?php echo file_get_contents('header.html'); ?>
	<!--
	Klienci:
	. ilości klientów w poszczególnych kategoriach
	-->
	<script src='js/customers.js'></script>
	<section>
		<div class="container">
			<img src="images/icons/customer.png"> <h2 style="display: inline-block; vertical-align: middle;">Klienci</h2>
		</div>
	<div class="container" id='chooser'>
		<h3>Wybierz interesującą cię informację: </h3>
		<div class="list-group mt-3">
		  <a href="#" class="list-group-item list-group-item-action" target='customerCountInTypes'>
		    ilości klientów w poszczególnych kategoriach
		  </a>
		  <a href="#" class="list-group-item list-group-item-action" target='mostUsedPaymentMethods'>wykorzystanie form płatności z podziałem na typy klientów</a>
		</div>
	</div>
	</section>
	<section>
		<div class="container info" id='customerCountInTypes'>
			<h4>Liczba klientów poszczególnych kategoriach</h4>
			<div class="infoItself"></div>
		</div>
	</section>
	<section>
		<div class="container info" id='mostUsedPaymentMethods'>
			<h4>Wykorzystanie form płatności</h4>
			<div class="infoItself"></div>
		</div>
	</section>
<?php echo file_get_contents('footer.html'); ?>