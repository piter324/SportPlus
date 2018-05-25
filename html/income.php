<?php echo file_get_contents('header.html'); ?>
	<!--	
	Przychód:
	. ile klienci z poszczególnych kategorii wydali na imprezy od do
	. wielkość upustu udzielonego klientom na imprezy, które odbyły się od do w rozbiciu na
	imprezy oraz typy klientów
	. przychód z imprez w czasie od do (z podziałem na imprezy i
	całkowity)
	-->
	<section>
		<div class="container">
			<img src="images/icons/income.png"> <h2 style="display: inline-block; vertical-align: middle;">Przychód</h2>
		</div>
	<div class="container" id='chooser'>
		<h3>Wybierz interesującą cię informację: </h3>
		<div class="list-group mt-3">
		  <a href="#" class="list-group-item list-group-item-action">
		    ile klienci z poszczególnych kategorii wydali na imprezy w podanym czasie
		  </a>
		  <a href="#" class="list-group-item list-group-item-action">wielkość upustu udzielonego klientom na imprezy, które odbyły się w podanym czasie w rozbiciu na imprezy oraz typy klientów</a>
		  <a href="#" class="list-group-item list-group-item-action">przychód z imprez w podanym czasie z podziałem na imprezy i całkowity</a>
		<a href="#" class="list-group-item list-group-item-action">przychód uzyskany za pośrednictwem różnych form płatności</a>
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