<?php echo file_get_contents('header.html'); ?>
	<!--
	Sprzedaż/rezerwacja:
	. ile jest zarezerwowanych / sprzedanych biletów na daną imprezę
	. ile rezerwacji na imprezę wygaśnie w ciągu najbliższych minut
	 ilości klientów w poszczególnych kategoriach
	-->
		<section>
		<div class="container">
			<img src="images/icons/sales.png"> <h2 style="display: inline-block; vertical-align: middle;">Sprzedaż / rezerwacja</h2>
		</div>
	<div class="container" id='chooser'>
		<h3>Wybierz interesującą cię informację: </h3>
		<div class="list-group mt-3">
		  <a href="#" class="list-group-item list-group-item-action">
		    ile jest zarezerwowanych / sprzedanych biletów na daną imprezę
		  </a>
		  <a href="#" class="list-group-item list-group-item-action">ile rezerwacji na imprezę wygaśnie w ciągu najbliższych minut</a>
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