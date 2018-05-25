$(document).ready(d => {
	$('.list-group-item-action').click(function(e){
		e.preventDefault();
		$('.info').hide();
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			return;
		}
		$('.list-group-item-action').removeClass('active');
		$(this).addClass('active');
		switch($(this).prop('target')){
			case "incomeByPaymentMethods":
				incomeByPaymentMethods();
			break;
			case "incomeFromEvents":
				incomeFromEvents();
			break;
			case "discountsForEventsForCustomerTypes":
				discountsForEventsForCustomerTypes();
			break;
			case "incomeFromClientsInSelectedTime":
				incomeFromClientsInSelectedTime();
			break;
		}
	});
});

function incomeByPaymentMethods(){
	var head = ["Forma płatności","Liczba płatności","Łączny przychód (PLN)"];
	var body = [];
	$('#incomeByPaymentMethods').fadeIn();
	$.get('info/income/incomeByPaymentMethods',data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				var row = [];
				if(item.typ == "P")
					row[0] = "PayPal";
				else
					row[0] = "karta płatnicza";
				row[1] = item.count;
				row[2] = parseFloat(item.income).toFixed(2);
				console.log(row[2]);
				body.push(row);
			});
			createTable($('#incomeByPaymentMethods .infoItself'),head,body);
		}
	});
}

function incomeFromEvents(){
	var head = ["Nazwa imprezy","Przychód (PLN)"];
	var body = [];
	var sum = 0;

	$('#incomeFromEvents').fadeIn();
	$.get('info/income/incomeFromEvents/'+$('#incomeFromEvents #startDate').val()+'/'+$('#incomeFromEvents #endDate').val(),data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				sum+=parseFloat(item.income);
				var row = [];
				row[0] = item.impreza_nazwa;
				row[1] = parseFloat(item.income).toFixed(2);
				body.push(row);
			});
			createTable($('#incomeFromEvents .infoItself'),head,body);
			$('#incomeFromEvents .infoItself').prepend("<p>Całkowity przychód z imprez w podanym okresie: <strong>"+sum.toFixed(2)+" PLN</strong></p>")
		}
	});
	
}

function discountsForEventsForCustomerTypes(){
	var head = ["Nazwa imprezy","Upusty udzielone klientom VIP","Upusty udzielone zwykłym klientom"];
	var body = [];
	$('#discountsForEventsForCustomerTypes').fadeIn();
	$.get('info/income/discountsForEventsForCustomerTypes/'+$('#discountsForEventsForCustomerTypes #startDate').val()+'/'+$('#discountsForEventsForCustomerTypes #endDate').val(),data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				var row = [];
				row.push(item.event_name);

				if(item.details.VIP) row.push(parseFloat(item.details.VIP).toFixed(2));
				else row.push(0);
				if(item.details.zwykly) row.push(parseFloat(item.details.zwykly).toFixed(2));
				else row.push(0);

				body.push(row);
			});
			createTable($('#discountsForEventsForCustomerTypes .infoItself'),head,body);
		}
	});
}

function incomeFromClientsInSelectedTime(){
	var head = ["Typ klienta","Liczba sprzedanych biletów","Przychód (PLN)"];
	var body = [];
	$('#incomeFromClientsInSelectedTime').fadeIn();
	$.get('info/income/incomeFromClientsInSelectedTime/'+$('#incomeFromClientsInSelectedTime #startDate').val()+'/'+$('#incomeFromClientsInSelectedTime #endDate').val(),data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				var row = [];
				row.push(item.typ_klienta_nazwa);
				row.push(item.ticket_count);
				row.push(parseFloat(item.income).toFixed(2));
				body.push(row);
			});
			createTable($('#incomeFromClientsInSelectedTime .infoItself'),head,body);
		}
	});
}