/**
 * buscarEnTabla es una funcion javscript que pide 3 parametros la tabla y el input.
 * esta funcion pide 3 parametros la tabla, el input y el index que es para reiniciar la tabla al
 * estar un campo vacio
 */

function buscarEnTabla(table, input, index) {
	var tableReg = document.getElementById(table);
	var searchText = document.getElementById(input).value.toLowerCase();

	for (var i = 1; i < tableReg.rows.length; i++) {
		var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
		var found = false;

		for (var j = 0; j < cellsOfRow.length && !found; j++) {
			var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
			if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
				found = true;
			}
		}

		if (found) tableReg.rows[i].style.display = ''
		else tableReg.rows[i].style.display = 'none'
	}

	/**
	 * Reinicio la tabla a su estado inicial al buscador estar vacio
	 */
	if(searchText == "") {
		for (var i = 1; i < tableReg.rows.length; i++) {
			if (index >= i) {
				tableReg.rows[i].style.display = ''
			}
			else tableReg.rows[i].style.display = 'none'
		}
	}

}
