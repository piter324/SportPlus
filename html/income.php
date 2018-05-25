<?php echo file_get_contents('header.html'); ?>
	<!--	
	Przychód:
	. ile klienci z poszczególnych kategorii wydali na imprezy od do
	. wielkość upustu udzielonego klientom na imprezy, które odbyły się od do w rozbiciu na
	imprezy oraz typy klientów
	. przychód z imprez w czasie od do (z podziałem na imprezy i
	całkowity)
	-->
	<script type="text/javascript" src="js/income.js"></script>
	<section>
		<div class="container">
			<img src="images/icons/income.png"> <h2 style="display: inline-block; vertical-align: middle;">Przychód</h2>
		</div>
	<div class="container" id='chooser'>
		<h3>Wybierz interesującą cię informację: </h3>
		<div class="list-group mt-3">
		  <a href="#" class="list-group-item list-group-item-action" target="incomeFromClientsInSelectedTime">
		    ile klienci z poszczególnych kategorii wydali na imprezy w podanym czasie
		  </a>
		  <a href="#" class="list-group-item list-group-item-action" target="discountsForEventsForCustomerTypes">wielkość upustu udzielonego klientom na imprezy, które odbyły się w podanym czasie w rozbiciu na imprezy oraz typy klientów</a>
		  <a href="#" class="list-group-item list-group-item-action" target="incomeFromEvents">przychód z imprez w podanym czasie z podziałem na imprezy i całkowity</a>
		<a href="#" class="list-group-item list-group-item-action" target="incomeByPaymentMethods">przychód uzyskany za pośrednictwem różnych form płatności</a>
		</div>
	</div>
	</section>

	<section>
		<div class="container info" id='incomeFromClientsInSelectedTime'>
			<h4>Ile klienci z poszczególnych kategorii wydali na imprezy w podanym czasie</h4>
			<div class='dashboard form-inline'> 
				<div class="form-group mb-3"><label class="mr-2">Data początkowa:</label><input class='form-control' type="date" id='startDate' value='2018-05-01' onchange="incomeFromClientsInSelectedTime()"></div>
				<div class="form-group mb-3 ml-5"><label class="mr-2">Data końcowa:</label><input class='form-control' type="date" id='endDate' value='2018-08-02' onchange="incomeFromClientsInSelectedTime()"></div>
			</div>
			<div class="infoItself"></div>
		</div>
	</section>
	<section>
		<div class="container info" id='discountsForEventsForCustomerTypes'>
			<h4>Wielkość upustu udzielonego klientom na imprezy, które odbyły się w podanym czasie w rozbiciu na imprezy oraz typy klientów</h4>
			<div class='dashboard form-inline'> 
				<div class="form-group mb-3"><label class="mr-2">Data początkowa:</label><input class='form-control' type="date" id='startDate' value='2018-05-01' onchange="discountsForEventsForCustomerTypes()"></div>
				<div class="form-group mb-3 ml-5"><label class="mr-2">Data końcowa:</label><input class='form-control' type="date" id='endDate' value='2018-08-02' onchange="discountsForEventsForCustomerTypes()"></div>
			</div>
			<div class="infoItself"></div>
		</div>
	</section>
	<section>
		<div class="container info" id='incomeFromEvents'>
			<h4>Przychód z imprez w podanym czasie z podziałem na imprezy i całkowity</h4>
			<div class='dashboard form-inline'> 
				<div class="form-group mb-3"><label class="mr-2">Data początkowa:</label><input class='form-control' type="date" id='startDate' value='2018-05-01' onchange="incomeFromEvents()"></div>
				<div class="form-group mb-3 ml-5"><label class="mr-2">Data końcowa:</label><input class='form-control' type="date" id='endDate' value='2018-08-02' onchange="incomeFromEvents()"></div>
			</div>
			<div class="infoItself"></div>
		</div>
	</section>
	<section>
		<div class="container info" id='incomeByPaymentMethods'>
			<h4>Przychód uzyskany za pośrednictwem różnych form płatności</h4>
			<div class="infoItself"></div>
		</div>
	</section>
<?php echo file_get_contents('footer.html'); ?>