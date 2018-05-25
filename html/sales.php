<?php echo file_get_contents('header.html'); ?>
	<!--
	Sprzedaż/rezerwacja:
	. ile jest zarezerwowanych / sprzedanych biletów na daną imprezę
	. ile rezerwacji na imprezę wygaśnie w ciągu najbliższych minut
	 ilości klientów w poszczególnych kategoriach
	-->
	<script src='js/sales.js'></script>
		<section>
		<div class="container">
			<img src="images/icons/sales.png"> <h2 style="display: inline-block; vertical-align: middle;">Sprzedaż / rezerwacja</h2>
		</div>
	<div class="container" id='chooser'>
		<h3>Wybierz interesującą cię informację: </h3>
		<div class="list-group mt-3">
		  <a href="#" class="list-group-item list-group-item-action" target='soldAndReserved'>
		    ile jest zarezerwowanych / sprzedanych biletów na daną imprezę
		  </a>
		  <a href="#" class="list-group-item list-group-item-action" target='reservationsToExpire'>ile rezerwacji na imprezę wygaśnie przed podaną datą</a>
		</div>
	</div>
	</section>
	<section>
		<div class="container info" id='soldAndReserved'>
			<h4>Liczba rezerwacji i sprzedanych biletów na imprezy</h4>
			<div class="infoItself"></div>
		</div>
	</section>
	<section>
		<div class="container info" id='reservationsToExpire'>
			<h4>Liczba rezerwacji, które wygasną przed podaną datą</h4>
			<div class='dashboard form-inline'> <div class="form-group mb-3"><label class="mr-2">Data:</label><input class='form-control' type="date" id='thresholdDate' value='2018-05-01' onchange="reservationsToExpire()"></div></div>
			<div class="infoItself">tabela z informacjami</div>
		</div>
	</section>
<?php echo file_get_contents('footer.html'); ?>