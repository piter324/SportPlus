function createTablePureES6(targetDiv,header,content){
		var table = document.createElement("TABLE");
		table.classList.add('table','table-bordered','table-striped');
		var thead = document.createElement("THEAD");
		var tbody = document.createElement("TBODY");
		header.forEach(item => {
			var th = document.createElement("TH");
			var text = document.createTextNode(item);
			th.appendChild(text);
			thead.appendChild(th);
		})
		content.forEach(row => {
			var tr = document.createElement("TR");
			row.forEach(item => {
				var td = document.createElement("TD");
				var text = document.createTextNode(item);
				td.appendChild(text);
				tr.appendChild(td);
			})
			tbody.appendChild(tr);
		})
		table.appendChild(thead)
		table.appendChild(tbody);
		targetDiv.appendChild(table);
}

function createTable(targetDiv,header,content){
	var thead = "";
	var tbody = "";
	header.forEach(item => {
			thead+="<th>"+item+"</th>";
		})
	content.forEach(row => {
		var tr = "<tr>";
		row.forEach(item => {
			tr+="<td>"+item+"</td>";
		})
		tr+="</tr>";
		tbody+=tr;
	})
	var table = "<table class='table table-striped table-bordered'><thead>"+thead+"</thead>"+"<tbody>"+tbody+"</tbody></table>";
	targetDiv.html(table);
}