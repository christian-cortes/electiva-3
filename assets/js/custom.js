
function inArray(valorComparar, arrayValores) {
	for (var i = 0; i < arrayValores.length; i++) {
		if (arrayValores[i] == valorComparar) return true;
	}
	return false;
}

function autoFormato(input) {
	var num = input.value.replace(/\,/g, '');
	if (!isNaN(num)) {
		num = num.toString().split('').reverse().join('').replace(/(?=\d*\,?)(\d{3})/g, '$1,');
		num = num.split('').reverse().join('').replace(/^[\,]/, '');
		input.value = num;
	} else {
		swal('Error', 'Solo se permiten números', 'info');
		input.value = input.value.replace(/[^\d\.]*/g, '');
	}
}

function autoFormatoRegex(input, pattern) {
	if (pattern == 1) {
		var regex = new RegExp(/[^\d]/g);
	} else if (pattern == 2) {
		var regex = new RegExp(/[^0-9a-zA-ZáéíóúÁÉÍÓÚ, ]+/g);
	} else if (pattern == 3) {
		var regex = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g);
	}
	if (regex.test(input.value)) {
		swal('Error', 'Los valores ingresados no son permitidos', 'info');
		$(input).val(input.value.replace(regex, ""));
	}
}

function sweetAlertConfirm( title, text, icon, color = "success", btnText = "OK", wrapper = null ) {
	swal({
		title  : title,
		text   : text ?? null,
		icon   : icon ? base_url( icon ) : color,
		content: wrapper ?? null,
		buttons: {
			confirm: {
				text      : btnText,
				value     : true,
				visible   : true,
				className : `btn-${color}`,
				closeModal:  true
			},
		},
	});
}

function sweetAlertWrapper( title, text, icon, wrapper, timer = 3000, btnText = null, btnClass = null ) {
	var buttons   = false;
	var typeAlert = (btnText && btnClass);
	if ( typeAlert ) {
		buttons = {
			confirm: {
				text      : btnText,
				value     : true,
				visible   : true,
				className : `btn-${btnClass}`,
				closeModal:  true
			}
		}
	}
	swal({
		title              : title,
		text               : text,
		icon               : base_url( icon ),
		content            : wrapper,
		timer              : timer ?? false,
		buttons            : buttons,
		closeOnEsc         : typeAlert,
		closeOnClickOutside: typeAlert
	});
}

function btnAjaxRedirect(url, data, redirect_url, fail_url = '') {
	$.ajax({
		type    : "POST",
		url     : base_url(url),
		data    : data,
		success : function() {
			window.location.href = base_url(redirect_url);
		},
		fail: function() {
			window.location.href = base_url(fail_url);
		}
	});
}

function validarValor(valor, tipo = null) {
	if (typeof valor === 'undefined' || typeof valor == undefined) {
		return false;
	}
	if (valor == '') {
		return false;
	}
	if (isNaN(valor) && tipo == 'numero') {
		return false;
	}
	if (tipo == 'fecha') {
		var valorFecha = moment(valor);
		if (!valorFecha.isValid()) {
			return false;
		}
	}
	if (valor == null || valor == 'null') {
		return false;
	}
	if (valor.length == 0) {
		return false;
	}
	return true;
}

function primeraLetra( letter ) {
	return letter[0].toUpperCase() + letter.slice(1);
}

function capitalizarPalabras(string) {
	var string = string.toLowerCase().split(' ');
	var newString = '';
	for (var i = 0; i < string.length; i++) {
		var firstChar = string[i].charAt(0);
		if (firstChar == 'y') {
			var stringOld = string[i].slice(1);
		} else if (string[i] == 'ssgg') {
			firstChar = firstChar.toUpperCase();
			var stringOld = string[i].slice(1).toUpperCase();
		} else {
			firstChar = firstChar.toUpperCase();
			var stringOld = string[i].slice(1);
		}
		newString += firstChar + stringOld + ' ';
	}
	return newString;
}

Number.prototype.between = function(a, b) {
	var min = Math.min.apply(Math, [a, b]), max = Math.max.apply(Math, [a, b]);
	return this >= min && this <= max;
};