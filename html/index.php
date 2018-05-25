<?php echo file_get_contents('header.html'); ?>
<head>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
</head>
	<!--
	Sprzedaż/rezerwacja:
	. ile jest zarezerwowanych / sprzedanych biletów na daną imprezę
	. ile rezerwacji na imprezę wygaśnie w ciągu najbliższych minut
	 ilości klientów w poszczególnych kategoriach
	
	Przychód:
	. ile klienci z poszczególnych kategorii wydali na imprezy od do
	. wielkość upustu udzielonego klientom na imprezy, które odbyły się od do w rozbiciu na
	imprezy oraz typy klientów
	. przychód z imprez w czasie od do (z podziałem na imprezy i
	całkowity)

	Klienci:
	. ilości klientów w poszczególnych kategoriach
	-->
	<section>
	<div class="container">
		<h3>Wybierz kategorię, aby zobaczyć statystyki:</h3>
		<div class="categoryCards">
			<div class="card category">
			  <img class="card-img-top" src="images/icons/sales.png" alt="Sprzedaż i rezerwacja">
			  <div class="card-body">
			    <h5 class="card-title">Sprzedaż / rezerwacja</h5>
			    <p class="card-text">Dostępne informacje: </p>
			    <ul>
			    	<li>ile jest zarezerwowanych / sprzedanych biletów na daną imprezę</li>
			    	<li>ile rezerwacji na imprezę wygaśnie w ciągu najbliższych minut</li>
			    </ul>
			    <a href="sales.php" class="btn btn-primary">Przejdź &rarr;</a>
			  </div>
			</div>

			<div class="card category">
			  <img class="card-img-top" src="images/icons/income.png" alt="Przychód">
			  <div class="card-body">
			    <h5 class="card-title">Przychód</h5>
			    <p class="card-text">Dostępne informacje: </p>
			    <ul>
			    	<li>ile klienci z poszczególnych kategorii wydali na imprezy w podanym czasie</li>
			    	<li>wielkość upustu udzielonego klientom na imprezy, które odbyły się w podanym czasie w rozbiciu na imprezy oraz typy klientów</li>
			    	<li>przychód z imprez w podanym czasie z podziałem na imprezy i całkowity</li>
			    	<li>przychód uzyskany za pośrednictwem różnych form płatności</li>
			    </ul>
			    <a href="income.php" class="btn btn-primary">Przejdź &rarr;</a>
			  </div>
			</div>

			<div class="card category">
			  <img class="card-img-top" src="images/icons/customer.png" alt="Klienci">
			  <div class="card-body">
			    <h5 class="card-title">Klienci</h5>
			    <p class="card-text">Dostępne informacje: </p>
			    <ul>
			    	<li>ilości klientów w poszczególnych kategoriach</li>
			    	<li>najczęściej wykorzystywane formy płatności z podziałem na typy klientów</li>
			    </ul>
			    <a href="customers.php" class="btn btn-primary">Przejdź &rarr;</a>
			  </div>
			</div>
		</div>
	</div>
	</section>
<?php echo file_get_contents('footer.html'); ?>