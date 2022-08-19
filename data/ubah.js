function add(pendidikan){ 
	var table = document.getElementById('pendidikan');
	var rowCount = table.rows.length;
	var cellCount = table.rows[0].cells.length; 
	var row = table.insertRow(rowCount);
	for(var i =0; i <= cellCount; i++){
		var cell = 'cell'+i;
		cell = row.insertCell(i);
		var copycel = document.getElementById('pendidikan'+i).innerHTML;
		cell.innerHTML=copycel;
		
	}
}
function del(pendidikan){
	var table = document.getElementById('pendidikan');
	var rowCount = table.rows.length;
	if(rowCount > '2'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('ayo dung sisain');
	}
}
function addRows(keahlian){ 
	var table = document.getElementById('keahlian');
	var rowCount = table.rows.length;
	var cellCount = table.rows[0].cells.length; 
	var row = table.insertRow(rowCount);
	for(var i =0; i <= cellCount; i++){
		var cell = 'cell'+i;
		cell = row.insertCell(i);
		var copycel = document.getElementById('keahlian'+i).innerHTML;
		cell.innerHTML=copycel;
		
	}
}
function deleteRows(keahlian){
	var table = document.getElementById('keahlian');
	var rowCount = table.rows.length;
	if(rowCount > '2'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('sisain satu baris mas');
	}
}


