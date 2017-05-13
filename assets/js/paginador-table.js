
/**
 * 
 * @param {*} tableName 
 * @param {*} itemsPerPage 
 * Esta case hace un paginador en la tabla pide 2 params el primero es el id de la tabla
 * y el 2do es el limite de filas en la tabla a presentarse
 */
function Pager(tableName, itemsPerPage) {
	this.tableName = tableName
	this.itemsPerPage = itemsPerPage
	this.currentPage = 1
	this.pages = 0
	this.inited = false
	this.divisores = 0
	this.cantidadDivs = 5

	/**
	 * Este metodo inicializa el paginador
	 */
	this.init = function() {
		var rows = document.getElementById(tableName).rows
		var records = (rows.length - 1)
		this.pages = Math.ceil(records / itemsPerPage)
		this.divisores = Math.ceil( this.pages / this.cantidadDivs )
		this.inited = true;
	}
	this.showRecords = function(from, to) {
		var rows = document.getElementById(tableName).rows
		for (var i = 1; i < rows.length; i++) {
		 if (i < from || i > to)  rows[i].style.display = 'none'
		 else rows[i].style.display = ''
		}
	}

	this.showDivs = function(pageNumber){
		var divisorMostrar = Math.ceil(pageNumber / this.cantidadDivs)
		for( var i = 1 ; i <= this.divisores ; i++ ){
			if( divisorMostrar == i ) document.getElementById('dv'+i).style.display = ''
			else document.getElementById('dv'+i).style.display = 'none'
		}
	}

	this.showPage = function(pageNumber) {
		if (! this.inited) {
			alert("La tabla no se inicializo");
			return;
		}
	      
		this.showDivs(pageNumber);
		this.currentPage = pageNumber;
		var from = (pageNumber - 1) * itemsPerPage + 1;
		var to = from + itemsPerPage - 1;
		this.showRecords(from, to);
	}

	this.prev = function() {
		if (this.currentPage > 1) this.showPage(this.currentPage - 1);
	}

	this.first = function() {
		if (this.currentPage > 1) this.showPage( 1 )
	}

	this.next = function() {
		if (this.currentPage < this.pages) this.showPage(this.currentPage + 1);
	}

	this.last = function() {
		if (this.currentPage < this.pages) this.showPage(this.pages)
	}

	this.showPageNav = function(pagerName, positionId) {
		if (! this.inited) {
			alert("La tabla no esta inicializada");
			return;
		}
		var element = document.getElementById(positionId);

		var pagerHtml = '<li class="waves-effect"><a onclick="' + pagerName + '.first();">inicio</a></li>'
		pagerHtml += '<li class="waves-effect"><a onclick="' + pagerName + '.prev();">anterior</a></li>'

		var divisor = 1
		var idDivisor = 1
		
		for (var page = 1; page <= this.pages; page++) {
			if( idDivisor==1 ){
				pagerHtml += '<li id="dv'+divisor+'">'
			}

			idDivisor = idDivisor + 1
			pagerHtml += '<a class="waves-effect" id="pg' + page + '" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</a>';
			
			if(idDivisor==this.cantidadDivs+1){
				idDivisor = 1;
				divisor = divisor + 1
				pagerHtml += '</li>';
			}
			else if( page == this.pages ) pagerHtml += '';
		}
		pagerHtml += '<li class="waves-effect"><a onclick="'+pagerName+'.next();">siguiente</a></li>';
		pagerHtml += '<li class="waves-effect"><a onclick="'+pagerName+'.last();">fin</a></li>';

		element.innerHTML = pagerHtml;
	}
}