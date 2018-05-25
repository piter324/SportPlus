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
			case "customerCountInTypes":
				customerCountInTypes();
			break;
			case "mostUsedPaymentMethods":
				mostUsedPaymentMethods();
			break;
		}
	});
});

function customerCountInTypes(){
	var head = ["Typ klienta","Liczba klientów"];
	var body = [];
	$('#customerCountInTypes').fadeIn();
	$.get('info/customers/customerCountInTypes',data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				var row = [];
				row[0] = item.typ_klienta_nazwa;
				row[1] = item.count;
				body.push(row);
			});
			createTable($('#customerCountInTypes .infoItself'),head,body);
			
		}
	});
}

function mostUsedPaymentMethods(){
	var head = ["Typ klienta","Liczba płatności kartą","Liczba płatności PayPal"];
	var body = [];
	$('#mostUsedPaymentMethods').fadeIn();
	$.get('info/customers/mostUsedPaymentMethods',data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				var row = [];
				row.push(item.typ_klienta_nazwa);

				if(item.details.K) row.push(item.details.K);
				else row.push(0);
				if(item.details.P) row.push(item.details.P);
				else row.push(0);

				body.push(row);
			});
			createTable($('#mostUsedPaymentMethods .infoItself'),head,body);
		}
	});
}