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
			case "soldAndReserved":
				soldAndReserved();
			break;
			case "reservationsToExpire":
				reservationsToExpire();
			break;
		}
	});
});

function soldAndReserved(){
	var head = ["Nazwa imprezy","Liczba kupionych biletów","Liczba rezerwacji"];
	var body = [];
	$('#soldAndReserved').fadeIn();
	$.get('info/sales/soldAndReserved',data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				var row = [];
				row.push(item.nazwa);

				if(item.details.BOUGHT) row.push(item.details.BOUGHT);
				else row.push(0);
				if(item.details.RESERVED) row.push(item.details.RESERVED);
				else row.push(0);

				body.push(row);
			});
			createTable($('#soldAndReserved .infoItself'),head,body);
		}
	});
}

function reservationsToExpire(){
	var head = ["Nazwa imprezy","Liczba rezerwacji, które wygasną"];
	var body = [];
	$('#reservationsToExpire').fadeIn();
	$.get('info/sales/reservationsToExpire/'+$('#reservationsToExpire #thresholdDate').val(),data=>{
		if(data.status == "Success"){
			data.returned.forEach(item=>{
				var row = [];
				row[0] = item.impreza_nazwa;
				row[1] = item.count;
				body.push(row);
			});
			createTable($('#reservationsToExpire .infoItself'),head,body);
		}
	});
}