<?php echo file_get_contents('header.html'); ?>
	<!--
	Klienci:
	. ilości klientów w poszczególnych kategoriach
	-->
	<section>
		<div class="container">
			<img src="images/icons/customer.png"> <h2 style="display: inline-block; vertical-align: middle;">Klienci</h2>
		</div>
	<div class="container" id='chooser'>
		<h3>Wybierz interesującą cię informację: </h3>
		<div class="list-group mt-3">
		  <a href="#" class="list-group-item list-group-item-action">
		    ilości klientów w poszczególnych kategoriach
		  </a>
		  <a href="#" class="list-group-item list-group-item-action">najczęściej wykorzystywane formy płatności z podziałem na typy klientów</a>
		</div>
	</div>
	</section>
	<section>
		<div class="container" id='info'>
			<h4>nazwa subkategorii informacji</h4>
			<div id='dashboard'>kontrolki</div>
			<div id="infoItself">tabela z informacjami</div>
		</div>
	</section>
<?php echo file_get_contents('footer.html'); ?>