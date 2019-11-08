"use strict";

var charada = ["Caballo", "Mariposa", "Ni&ntilde;ito", "Gato", "Monja", "Tortuga", "Caracol", "Muerto", "Elefante", "Pescadote", "Gallo", "Mujer Santa", "Pavo Real", "Tigre", "Perro", "Toro", "San L&aacute;zaro", "Pescadito", "Lombriz", "Gato Fino", "Maj&aacute;", "Sapo", "Vapor", "Paloma", "Piedra Fina", "Anguila", "Avispa", "Chivo", "Rat&oacute;n", "Camar&oacute;n", "Venado", "Cochino", "Ti&ntilde;osa", "Mono", "Ara&ntilde;a", "Cachimba", "Brujer&iacute;a", "Dinero", "Conejo", "Cura", "Lagartija", "Pato", "Alacr&aacute;n", "A&ntilde;o Del Cuero", "Tibur&oacute;n", "Humo Blanco", "P&aacute;jaro", "Cucaracha", "Borracho", "Polic&iacute;a", "Soldado", "Bicicleta", "Luz El&eacute;ctrica", "Flores", "Cangrejo", "Merengue", "Cama", "Retrato", "Loco", "Huevo", "Caballote", "Matrimonio", "Asesino", "Muerto Grande", "Comida", "Par De Yeguas", "Pu&ntilde;alada", "Cementerio", "Relajo Grande", "Coco", "R&iacute;o", "Collar", "Maleta", "Papalote", "Perro Mediano", "Bailarina", "Muleta De S&aacute;n L&aacute;zaro", "Sarc&oacute;fago", "Tren de carga", "M&eacute;dicos", "Teatro", "Madre", "Tragedia", "Sangre", "Reloj", "Tijeras", "Pl&aacute;tano", "Espejuelos", "Agua", "Viejo", "Limosnero", "Globo alto", "Sortija", "Machete", "Guerra", "Reto", "Mosquito", "Piano", "Serrucho", "Motel"];

var charadaDescription = ['Es posible que gane una suma importante de dinero y disfrutar una vida feliz y pr&oacute;spera.',
	'Habla de ciertas indecisiones y humor inconstante, as&iacute; como posible infidelidad afectiva o amistosa.',
	'Nuevas oportunidades o un s&iacute;ntoma de inocencia. Si en tu sue&ntilde;o aparece un ni&ntilde;o llorando significa enfermedad.',
	'Si le ataca en el sue&ntilde;o representa sus enemigos. Si logra ganar, superar&aacute; en la vida real grandes obst&aacute;culos y lograr&aacute; fortuna y fama.',
	'Insatisfacci&oacute;n con las labores cotidianas, al que adem&aacute;s se le atribuye un gran sentimiento de culpabilidad.',
	'Va a progresar de forma lenta pero segura. Es aconsejable que no vaya tan r&aacute;pido, para poder lograr sus objetivos.',
	'Anuncia celos y un ambiente hostil entre los que nos rodean en nuestro trabajo. Hay envidias y competencia.',
	'Puede ser que ha sentido el fallecimiento de alguien. Si este sue&ntilde;o es recurrente puede ser s&iacute;ntoma de un trastorno.',
	'Sabidur&iacute;a, memoria y el poder de la persistencia. Representa un sue&ntilde;o favorable que le aportar&aacute; dignidad y reconocimiento.',
	'Es un s&iacute;mbolo de fertilidad, por tanto so&ntilde;ar con peces para las mujeres significa un embarazo seguro.',
	'Le puede estar avisando de la agresi&oacute;n que va a sufrir por parte de alguien, que tiene dichas caracter&iacute;sticas.',
	'Hay alguien desde el m&aacute;s all&aacute; que cuida de ti y te protege. Encontrar&aacute; a alguien que le consuele o a algo que le de fuerzas renovadas',
	'Habla de confianza en una misma, de belleza y de capacidades, pero tambi&eacute;n de vanidad',
	'Poder, belleza salvaje y fuerza sexual. Superar&aacute; dificultades y lograr&aacute; lujos y placer.',
	'Simboliza intuici&oacute;n, lealtad, generosidad, protecci&oacute;n y fidelidad. El sue&ntilde;o indica que sus fuertes valores y buenas intenciones le ayudar&aacute;n a avanzar en la vida.',
	'Puede tener sus connotaciones sexuales y hablarle de fertilidad, virilidad, de necesidad de sexo.',
	'Fue revivido por Jes&uacute;s. A partir de esta historia su nombre es utilizado frecuentemente como sin&oacute;nimo de resurrecci&oacute;n.',
	'Sus creencias, sus forma de pensar, su espiritualidad y su fuerza, le llevar&aacute;n al &eacute;xito en la vida.',
	'Simboliza la preocupaci&oacute;n por alguien muy querido para ti que esta enfermo.',
	'Si le ataca en el sue&ntilde;o representa sus enemigos. Si logra ganar la lucha, superar&aacute; en la vida real grandes obst&aacute;culos.',
	'Traici&oacute;n de la persona menos esperada. Si logra matarla, supone una victoria contra sus enemigos.',
	'Intenta esconder su verdadera identidad y car&aacute;cter. Debe tener m&aacute;s confianza en si mismo y dejar que su belleza interior se vea.',
	'Refleja el estado emocional en el que se encuentra. Est&aacute; obcecado en la forma de actuar con un tema y su actitud testaruda es inamovible.',
	'Uni&oacute;n feliz, alegr&iacute;as con la familia, anuncia un pr&oacute;ximo nacimiento y los negocios.',
	'Le alabar&aacute;n y le reconocer&aacute;n su trabajo, pero no sobrepase los l&iacute;mites llevado por la sobre excitaci&oacute;n del momento.',
	'Es bueno siempre y cuando logremos mantenerla en nuestras manos, de otra manera es presagio que la fortuna venidera es pasajera.',
	'Significa traici&oacute;n, penas y contrariedades. Obst&aacute;culos a nivel financiero y exigencias familiares.',
	'Es necesario liberar su energ&iacute;a sexual, fuertemente manifestada en usted.',
	'Posibilidad de problemas dom&eacute;sticos. Los asuntos relacionados con el trabajo podr&aacute;n deteriorarse.',
	'Representa los placeres, objetos o productos que deseas tener en un momento determinado de tu vida o meta que desees alcanzar.',
	'Es un buen augurio. Una amistad duradera, y buena suerte en los negocios y el amor.',
	'Simbolizan sus instintos m&aacute;s bajos; asuntos sucios, ego&iacute;smo, reveld&iacute;a, codicia.',
	'Sus experiencias pasadas le proporcionaron todo lo necesario, para afrontar correctamente todo lo que aparezca en su vida.',
	'Es una advertencia ante la existencia de amigos falsos que le halagar&aacute;n para satisfacer sus propios intereses. Problemas en el amor.',
	'Gracias a sus grandes esfuerzos y a la energ&iacute;a que pone en su trabajo y en su vida, lograr&aacute; ganar dinero y felicidad.',
	'Se relaciona con pensamientos obsesivos o constante en el so&ntilde;ador.',
	'Indica que algo o alguien le est&aacute; manipulando, con el fin de conseguir sus fines.',
	'Sin causa aparente representa un riesgo de caer en actitudes indebidas y hasta peligrosas.',
	'Fidelidad en el amor y una gran amistad. &Eacutexito en los negocios.',
	'Problemas con jueces, abogados... Y debe desconfiar de alg&uacute;n amigo que se ofrezca a ayudar.',
	'Te est&aacute; diciendo que tengas cuidado con la gente que no conoces.',
	'Viajes felices. Logros econ&oacute;micos o buena cosecha. Matrimonio y hijos en un nuevo hogar.',
	'Problemas sentimentales, ya que &eacute;stos est&aacute;n relacionados con sentimientos, pensamientos o palabras destructivas.',
	'Representa su falta de fuerza y resistencia. Se intenta proteger por los elementos, que le rodean. T',
	'Fuerte le amenaza, pero lograr&aacute; superar las dificultades.',
	'Algo est&aacute; creciendo en su subconsciente y en su sabidur&iacute;a. Tambi&eacute;n significa, que existe una situaci&oacute;n que requiere su atenci&oacute;n.',
	'Se&ntilde;al de prosperidad para el so&ntilde;ador. Sentido de libertad. Liberaci&oacute;n del peso de las responsabilidades.',
	'Representa su propia necesidad de renovar, limpiar y rejuvenecer su ser psicol&oacute;gico, emocional o espiritual.',
	'Es de mal augurio, le anuncia depresi&oacute;n o enfermedad mental, problemas, trabas importantes ante las que se siente incapaz de reaccionar.',
	'Ha cometido alguna fechor&iacute;a o algo, que sabe que est&aacute; mal y se siente culpable.',
	'Su actitud incondicional e intransigente y la forma, que tiene de imponer su opini&oacute;n y sus sentimientos a los dem&aacute;s.',
	'Representa su deseo de conseguir un equilibrio en la vida real.',
	'Representa iluminaci&oacute;n, claridad, gu&iacute;a, un completo entendimiento y perspicacia.',
	'Simboliza la amabilidad, la compasi&oacute;n, la sensibilidad, el placer, la belleza y las ganancias.',
	'Relacionado con relaciones amorosas, el cangrejo advierte sobre una relaci&oacute;n larga y dif&iacute;cil. Evita los rivales.',
	'Significa que vivir&aacute; grandes desilusiones, por hacerse ideas falsas sobre algo importante. Confiar&aacute; en quien no debe y le aconsejar&aacute;n mal.',
	'Representa su ser &iacute;ntimo y el descubrimiento de su propia sexualidad.',
	'Fotos antiguas o retratos, es porque piensa que el pasado fue mejor y le gusta recordarlo, volver a vivir lo que vivi&oacute; en el pasado.',
	'So&ntilde;ar con la locura o demencia propia o la de otra persona representa su deseo de evadir la realidad.',
	'Un cambio muy favorable a tu vida con grandes sorpresas en todos los niveles.',
	'Es posible que gane una suma importante de dinero y disfrutar una vida feliz y pr&oacute;spera.',
	'Representa compromiso, armon&iacute;a o transici&oacute;n. Simboliza la unificaci&oacute;n de aspectos opuestos de su car&aacute;cter.',
	'Representa que est&aacute; viviendo un momento muy deprimente, que necesita ser resuelto cuanto antes.',
	'Suelen representar sentimientos que nos preparan para la aceptaci&oacute;n de la muerte.',
	'Discusiones, as&iacute; como significa felicidad y armon&iacute;a entre los tuyos.',
	' Suele ser indicador de que el c&oacute;nyuge, novio o novia son personas buenas y agradecidas.',
	'Es indicativo de muchas energ&iacute;as negativas reprimidas tales como ira, envidia o venganzas.',
	'Significa enfermedad. Es una premonici&oacute;n que le anuncia la muerte de un familiar, del cual va a recibir una herencia.',
	'Es necesario que aprendas a vivir con cierta estabilidad y equilibrio en tu vida.',
	'Una premonici&oacute;n de un regalo sorpresa de dinero.',
	'Los r&iacute;os en los sue&ntilde;os simbolizan el deslizar de la vida que se va.',
	'So&ntilde;ar que ve o lleva un collar, representan sus deseos insatisfechos.',
	'Representa los deseos, las necesidades y las preocupaciones que siente y que le pesan en la vida real.',
	'Puede representar tu deseo de ser independiente o tomar tus propias decisiones.',
	'El sue&ntilde;o indica que sus fuertes valores y buenas intenciones le ayudar&aacute;n a avanzar en la vida y le traer&aacute;n el &eacute;xito.',
	'Significa que controla perfectamente su vida. Incluso que est&aacute; siendo demasiado agresiva, energica y autoritaria con los dem&aacute;s.',
	'Realizar una petici&oacute;n por la salud propio o de alg&uacute;n familiar.',
	'En los sue&ntilde;os un ata&uacute;d o feretro o sarc&oacute;fago, representa el &uacute;tero o seno materno.',
	'Significa seguridad en s&iacute; mismo en todos los aspectos, conclusi&oacute;n positiva de sus negocios en curso.',
	'Es de muy buen augurio, significa prosperidad, riquezas y buena posici&oacute;n.',
	'Est&aacute;s mal contigo mismo, con mucha desconfianza en ti y haces cosas para llamar la atenci&oacute;n.',
	'Representa esos aspectos de tu personalidad m&aacute;s fr&aacute;giles, como pueden ser la necesidad de protecci&oacute;n.',
	'So&ntilde;arse en una tragedia de cualquier tipo es anuncio de problemas, malos entendidos, ofensas por nimiedades.',
	'Puede interpretarse como sensaci&oacute;n de peligro o traici&oacute;n.',
	'Te est&aacute; diciendo que el tiempo vuela y no dejes pasar m&aacute;s y aprov&eacute;chalo.',
	'Sugiere, que necesita acabar de una vez, con un tema recurrente en su vida.',
	'Est&aacute; relacionado con la sexualidad y la masculinidad, puesto que el pl&aacute;tano es un s&iacute;mbolo f&aacute;lico.',
	' Los espejos simbolizan la imaginaci&oacute;n y el punto de conexi&oacute;n entre el consciente y el subconsciente.',
	'Representa un s&iacute;mbolo de nueva vida, renovaci&oacute;n y fuerza.',
	'So&ntilde;ar con un anciano, significa que tiene gran simplicidad, honestidad y discreci&oacute;n.',
	'Indica que en lo &iacute;ntimo hay un descontento que no puede resolver.',
	'Indica que sus esperanzas para lograr el amor pueden sufrir un contratiempo.',
	'So&ntilde;ar que ve un anillo en su dedo, significa su compromiso total a una relaci&oacute;n o al &eacute;xito de su nuevo intento.',
	' Representa una extrema hostilidad hacia alguien o hacia una situaci&oacute;n que le molesta much&iacute;simo.',
	'Puede significar que est&aacute; trabajando demasiado. Deber&iacute;a darse un respiro y descansar.',
	' Se&ntilde;al de que nuestra timidez en ocasiones nos hace perder importantes situaciones.',
	'Si ha matado a un mosquito en su sue&ntilde;o, quiere decir que superar&aacute; obst&aacute;culos y disfrutar fortuna y felicidad dom&eacute;stica.',
	'Significa confianza en s&iacute; mismo y en su futuro. Conf&iacute;a mucho en sus posibilidades y as&iacute; ser&aacute;, el futuro le depara felicidad y suerte.',
	'S&iacute;mbolo del deseo de terminar de una manera radical y definitiva con alguna situaci&oacute;n o conflicto.',
	'Significa las posibilidades que tiene para alcanzar sus objetivos. Se encuentra en una fase de transici&oacute;n.']

var serviceImgPath;
$(function () {
	serviceImgPath = $('serviceImgPath').attr('data');
	resizeImages();
	$(window).resize(resizeImages);

	$('.modal').modal();

	$('.charada-item i').click(function (e) {
		var item = $(e.target).parent().parent().parent();
		var front = item.children('.front');
		var back = item.children('.back')

		if (front.css('display') !== 'none') {
			front.fadeToggle(function () {
				back.fadeToggle()
			});
		} else {
			back.fadeToggle(function () {
				front.fadeToggle()
			});
		}
	});

	var initDate = typeof date != "undefined" ? new Date(date) : new Date();
	var yesterday = new Date();
	yesterday.setDate(yesterday.getDate() - 1);

	$('.datepicker').datepicker({
		autoClose: true,
		format: 'mm/dd/yyyy',
		defaultDate: initDate,
		setDefaultDate: true,
		yearRange: [1990, (new Date()).getFullYear()],
		maxDate: yesterday,
		onSelect: function (value) {
			apretaste.send({
				command: 'BOLITA ANTERIORES',
				data: {
					'date': (value.getMonth() + 1) + '/' + value.getDate() + '/' + value.getFullYear()
				}
			})
		}
	});
});

function toggleSuerte() {
	$('#esfera').fadeOut(2000, function () {
		$('#suerte').fadeIn(2000);
	});
}

function messageLengthValidate(max) {
	var message = $('#message').val().trim();

	if (message.length <= max) {
		$('.helper-text').html('Restante: ' + (max - message.length));
	} else {
		$('.helper-text').html('Limite excedido');
	}
}

function sendMessage() {
	var message = $('#message').val().trim();

	if (message.length >= 30) {
		apretaste.send({
			'command': "SOPORTE ESCRIBIR",
			'data': {
				'message': message
			},
			'redirect': false,
			'callback': {
				'name': 'sendMessageCallback',
				'data': message
			}
		});
	} else {
		showToast("Por favor describanos mejor su solicitud");
	}
}

function sendMessageCallback(message) {
	if (messages.length === 0) {
		// Jquery Bug, fixed in 1.9, insertBefore or After deletes the element and inserts nothing
		// $('#messageField').insertBefore("<div class=\"chat\"></div>");
		$('#nochats').remove();
		$('#chat-row').append("<div class=\"chat\"></div>");
	}

	$('.chat').append("<div class=\"bubble me\" id=\"last\">" + message + "<br>" + "<small>" + new Date().toLocaleString('es-ES') + "</small>" + "</div>");

	$('#message').val('');
}

function openMenu() {
	$('.sidenav').sidenav();
	$('.sidenav').sidenav('open');
}

function resizeImages() {
	$('.card-image > .img-container > .img').each(function () {
		var element = $(this)
		var size = element.parent().width() * 0.7;
		var parentSize = element.parent().width();

		var index = parseInt(element.attr("data-index")) - 1;
		if (index === -1) index = 99;
		var x = index * size;

		element.parent().css({
			'height': parentSize + 'px',
		});

		element.css({
			'width': size + 'px',
			'height': size + 'px',
			"background-image": "url(" + serviceImgPath + "/results.png)",
			"background-size": size * 100 + "px " + size + "px",
			"background-position": "-" + x + "px 0"
		});
	});
}

function getImage(index, serviceImgPath, size) {
	var x = index * size;
	return "background-image: url(" + serviceImgPath + "/results.png);" + "background-size: " + size * 100 + "px " + size + "px;" + "background-position: -" + x + "px 0;";
}

function parseResult(number) {
	return parseInt(number == '00' ? '100' : number);
}

function luckyNumbers() {
	if (paid) toggleSuerte();
	else $('#modal').modal('open');
}

function buyLuckyNumbers() {
	if (credit < 0.05) {
		showToast("Credito insuficiente");
		return;
	}

	apretaste.send({
		command: 'BOLITA PAY',
		redirect: false,
		callback: {name: 'toggleSuerte'}
	});
}

function showToast(text) {
	M.toast({
		html: text
	});
}

function deleteNotification(id) {
	// delete from the backend
	apretaste.send({
		command: 'NOTIFICACIONES LEER',
		data: {
			id: id
		},
		redirect: false
	}); // remove from the view

	$('#' + id).fadeOut(function () {
		$(this).remove(); // show message if all notifications were deleted

		var count = $("ul.collection li").length;

		if (count <= 0) {
			var parent = $('#noti-list').parent();
			$('ul.collection').remove();
			parent.append("<div class=\"col s12 center\"><h1 class=\"white-text\">Nada por leer</h1><i class=\"material-icons large\">notifications_off</i><p>Por ahora usted no tiene ninguna notificaci\xF3n por leer.</p></div>");
		}
	});
}

/*function htmlEncode(s){
	var htmlEscapes = {
		'á': '&aacute;', 'é': '&eacute;', 'í': '&iacute;', 'ó': '&oacute;',
		'ú': '&uacute;', 'Á': '&Aacute;', 'É': '&Eacute', 'Í': '&Iacute',
		'Ó': '&Oacute', 'Ú': '&Uacute', 'ñ': '&ntilde;', 'Ñ': '&Ntilde;'
	};

	var htmlEscaper = /[áéíóúÁÉÍÓÚñÑ/]/g;
	return ('' + s).replace(htmlEscaper, function (match) {
		return htmlEscapes[match];
	});
}

function htmlEncode(s){
	if(s === null || s === "") return "";

	var a = [];
	var l = s.length;

	for (var i=0;i<l;i++){
		var c = s.charAt(i);
		if (c < " " || c > "~"){
			a.push("&#");
			a.push(c.charCodeAt()); //numeric value of code point
			a.push(";");
		}else{
			a.push(c);
		}
	}

	s = a.join("");

	// replace any malformed entities
	s = s.replace(/&#\d*([^\d;]|$)/g, "$1");
	console.log(s);
	return s;
}*/

// POLYFILL

function _typeof(obj) {
	if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
		_typeof = function _typeof(obj) {
			return typeof obj;
		};
	} else {
		_typeof = function _typeof(obj) {
			return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
		};
	}
	return _typeof(obj);
}

if (!Object.keys) {
	Object.keys = function () {
		'use strict';

		var hasOwnProperty = Object.prototype.hasOwnProperty,
			hasDontEnumBug = !{
				toString: null
			}.propertyIsEnumerable('toString'),
			dontEnums = ['toString', 'toLocaleString', 'valueOf', 'hasOwnProperty', 'isPrototypeOf', 'propertyIsEnumerable', 'constructor'],
			dontEnumsLength = dontEnums.length;
		return function (obj) {
			if (_typeof(obj) !== 'object' && (typeof obj !== 'function' || obj === null)) {
				throw new TypeError('Object.keys called on non-object');
			}

			var result = [],
				prop,
				i;

			for (prop in obj) {
				if (hasOwnProperty.call(obj, prop)) {
					result.push(prop);
				}
			}

			if (hasDontEnumBug) {
				for (i = 0; i < dontEnumsLength; i++) {
					if (hasOwnProperty.call(obj, dontEnums[i])) {
						result.push(dontEnums[i]);
					}
				}
			}

			return result;
		};
	}
}
