"use strict";

var charada = ["Caballo", "Mariposa", "Niñito", "Gato", "Monja", "Tortuga", "Caracol", "Muerto", "Elefante", "Pescadote", "Gallo", "Mujer Santa", "Pavo Real", "Tigre", "Perro", "Toro", "San Lázaro", "Pescadito", "Lombriz", "Gato Fino", "Majá", "Sapo", "Vapor", "Paloma", "Piedra Fina", "Anguila", "Avispa", "Chivo", "Ratón", "Camarón", "Venado", "Cochino", "Tiñosa", "Mono", "Araña", "Cachimba", "Brujería", "Dinero", "Conejo", "Cura", "Lagartija", "Pato", "Alacrán", "Año Del Cuero", "Tiburón", "Humo Blanco", "Pájaro", "Cucaracha", "Borracho", "Policía", "Soldado", "Bicicleta", "Luz Eléctrica", "Flores", "Cangrejo", "Merengue", "Cama", "Retrato", "Loco", "Huevo", "Caballote", "Matrimonio", "Asesino", "Muerto Grande", "Comida", "Par De Yeguas", "Puñalada", "Cementerio", "Relajo Grande", "Coco", "Río", "Collar", "Maleta", "Papalote", "Perro Mediano", "Bailarina", "Muleta De Sán Lázaro", "Sarcófago", "Tren de carga", "Médicos", "Teatro", "Madre", "Tragedia", "Sangre", "Reloj", "Tijeras", "Plátano", "Espejuelos", "Agua", "Viejo", "Limosnero", "Globo alto", "Sortija", "Machete", "Guerra", "Reto", "Mosquito", "Piano", "Serrucho", "Motel"];

var charadaDescription = [
	'Es posible que gane una suma importante de dinero y disfrutar una vida feliz y próspera.',
	'Habla de ciertas indecisiones y humor inconstante, así como posible infidelidad afectiva o amistosa.',
	'Nuevas oportunidades o un síntoma de inocencia. Si en tu sueño aparece un niño llorando significa enfermedad.',
	'Si le ataca en el sueño representa sus enemigos. Si logra ganar, superará en la vida real grandes obstáculos y logrará fortuna y fama.',
	'Insatisfacción con las labores cotidianas, al que además se le atribuye un gran sentimiento de culpabilidad.',
	'Va a progresar de forma lenta pero segura. Es aconsejable que no vaya tan rápido, para poder lograr sus objetivos.',
	'Anuncia celos y un ambiente hostil entre los que nos rodean en nuestro trabajo. Hay envidias y competencia.',
	'Puede ser que ha sentido el fallecimiento de alguien. Si este sueño es recurrente puede ser síntoma de un trastorno.',
	'Sabiduría, memoria y el poder de la persistencia. Representa un sueño favorable que le aportará dignidad y reconocimiento.',
	'Es un símbolo de fertilidad, por tanto soñar con peces para las mujeres significa un embarazo seguro.',
	'Le puede estar avisando de la agresión que va a sufrir por parte de alguien, que tiene dichas características.',
	'Hay alguien desde el más allá que cuida de ti y te protege. Encontrará a alguien que le consuele o a algo que le de fuerzas renovadas',
	'Habla de confianza en una misma, de belleza y de capacidades, pero también de vanidad',
	'Poder, belleza salvaje y fuerza sexual. Superará dificultades y logrará lujos y placer.',
	'Simboliza intuición, lealtad, generosidad, protección y fidelidad. El sueño indica que sus fuertes valores y buenas intenciones le ayudarán a avanzar en la vida.',
	'Puede tener sus connotaciones sexuales y hablarle de fertilidad, virilidad, de necesidad de sexo.',
	'Fue revivido por Jesús. A partir de esta historia su nombre es utilizado frecuentemente como sinónimo de resurrección.',
	'Sus creencias, sus forma de pensar, su espiritualidad y su fuerza, le llevarán al éxito en la vida.',
	'Simboliza la preocupación por alguien muy querido para ti que esta enfermo.',
	'Si le ataca en el sueño representa sus enemigos. Si logra ganar la lucha, superará en la vida real grandes obstáculos.',
	'Traición de la persona menos esperada. Si logra matarla, supone una victoria contra sus enemigos.',
	'Intenta esconder su verdadera identidad y carácter. Debe tener más confianza en si mismo y dejar que su belleza interior se vea.',
	'Refleja el estado emocional en el que se encuentra. Está obcecado en la forma de actuar con un tema y su actitud testaruda es inamovible.',
	'Unión feliz, alegrías con la familia, anuncia un próximo nacimiento y los negocios.',
	'Le alabarán y le reconocerán su trabajo, pero no sobrepase los límites llevado por la sobre excitación del momento.',
	'Es bueno siempre y cuando logremos mantenerla en nuestras manos, de otra manera es presagio que la fortuna venidera es pasajera.',
	'Significa traición, penas y contrariedades. Obstáculos a nivel financiero y exigencias familiares.',
	'Es necesario liberar su energía sexual, fuertemente manifestada en usted.',
	'Posibilidad de problemas domésticos. Los asuntos relacionados con el trabajo podrán deteriorarse.',
	'Representa los placeres, objetos o productos que deseas tener en un momento determinado de tu vida o meta que desees alcanzar.',
	'Es un buen augurio. Una amistad duradera, y buena suerte en los negocios y el amor.',
	'Simbolizan sus instintos más bajos; asuntos sucios, egoísmo, reveldía, codicia.',
	'Sus experiencias pasadas le proporcionaron todo lo necesario, para afrontar correctamente todo lo que aparezca en su vida.',
	'Es una advertencia ante la existencia de amigos falsos que le halagarán para satisfacer sus propios intereses. Problemas en el amor.',
	'Gracias a sus grandes esfuerzos y a la energía que pone en su trabajo y en su vida, logrará ganar dinero y felicidad.',
	'Se relaciona con pensamientos obsesivos o constante en el soñador.',
	'Indica que algo o alguien le está manipulando, con el fin de conseguir sus fines.',
	'Sin causa aparente representa un riesgo de caer en actitudes indebidas y hasta peligrosas.',
	'Fidelidad en el amor y una gran amistad. Éxito en los negocios.',
	'Problemas con jueces, abogados... Y debe desconfiar de algún amigo que se ofrezca a ayudar.',
	'Te está diciendo que tengas cuidado con la gente que no conoces.',
	'Viajes felices. Logros económicos o buena cosecha. Matrimonio y hijos en un nuevo hogar.',
	'Problemas sentimentales, ya que éstos están relacionados con sentimientos, pensamientos o palabras destructivas.',
	'Representa su falta de fuerza y resistencia. Se intenta proteger por los elementos, que le rodean. T',
	'Fuerte le amenaza, pero logrará superar las dificultades.',
	'Algo está creciendo en su subconsciente y en su sabiduría. También significa, que existe una situación que requiere su atención.',
	'Señal de prosperidad para el soñador. Sentido de libertad. Liberación del peso de las responsabilidades.',
	'Representa su propia necesidad de renovar, limpiar y rejuvenecer su ser psicológico, emocional o espiritual.',
	'Es de mal augurio, le anuncia depresión o enfermedad mental, problemas, trabas importantes ante las que se siente incapaz de reaccionar.',
	'Ha cometido alguna fechoría o algo, que sabe que está mal y se siente culpable.',
	'Su actitud incondicional e intransigente y la forma, que tiene de imponer su opinión y sus sentimientos a los demás.',
	'Representa su deseo de conseguir un equilibrio en la vida real.',
	'Representa iluminación, claridad, guía, un completo entendimiento y perspicacia.',
	'Simboliza la amabilidad, la compasión, la sensibilidad, el placer, la belleza y las ganancias.',
	'Relacionado con relaciones amorosas, el cangrejo advierte sobre una relación larga y difícil. Evita los rivales.',
	'Significa que vivirá grandes desilusiones, por hacerse ideas falsas sobre algo importante. Confiará en quien no debe y le aconsejarán mal.',
	'Representa su ser íntimo y el descubrimiento de su propia sexualidad.',
	'Fotos antiguas o retratos, es porque piensa que el pasado fue mejor y le gusta recordarlo, volver a vivir lo que vivió en el pasado.',
	'Soñar con la locura o demencia propia o la de otra persona representa su deseo de evadir la realidad.',
	'Un cambio muy favorable a tu vida con grandes sorpresas en todos los niveles.',
	'Es posible que gane una suma importante de dinero y disfrutar una vida feliz y próspera.',
	'Representa compromiso, armonía o transición. Simboliza la unificación de aspectos opuestos de su carácter.',
	'Representa que está viviendo un momento muy deprimente, que necesita ser resuelto cuanto antes.',
	'Suelen representar sentimientos que nos preparan para la aceptación de la muerte.',
	'Discusiones, así como significa felicidad y armonía entre los tuyos.',
	'Suele ser indicador de que el cónyuge, novio o novia son personas buenas y agradecidas.',
	'Es indicativo de muchas energías negativas reprimidas tales como ira, envidia o venganzas.',
	'Significa enfermedad. Es una premonición que le anuncia la muerte de un familiar, del cual va a recibir una herencia.',
	'Es necesario que aprendas a vivir con cierta estabilidad y equilibrio en tu vida.',
	'Una premonición de un regalo sorpresa de dinero.',
	'Los ríos en los sueños simbolizan el deslizar de la vida que se va.',
	'Soñar que ve o lleva un collar, representan sus deseos insatisfechos.',
	'Representa los deseos, las necesidades y las preocupaciones que siente y que le pesan en la vida real.',
	'Puede representar tu deseo de ser independiente o tomar tus propias decisiones.',
	'El sueño indica que sus fuertes valores y buenas intenciones le ayudarán a avanzar en la vida y le traerán el éxito.',
	'Significa que controla perfectamente su vida. Incluso que está siendo demasiado agresiva, energica y autoritaria con los demás.',
	'Realizar una petición por la salud propio o de algún familiar.',
	'En los sueños un ataúd o feretro o sarcófago, representa el útero o seno materno.',
	'Significa seguridad en sí mismo en todos los aspectos, conclusión positiva de sus negocios en curso.',
	'Es de muy buen augurio, significa prosperidad, riquezas y buena posición.',
	'Estás mal contigo mismo, con mucha desconfianza en ti y haces cosas para llamar la atención.',
	'Representa esos aspectos de tu personalidad más frágiles, como pueden ser la necesidad de protección.',
	'Soñarse en una tragedia de cualquier tipo es anuncio de problemas, malos entendidos, ofensas por nimiedades.',
	'Puede interpretarse como sensación de peligro o traición.',
	'Te está diciendo que el tiempo vuela y no dejes pasar más y aprovéchalo.',
	'Sugiere, que necesita acabar de una vez, con un tema recurrente en su vida.',
	'Está relacionado con la sexualidad y la masculinidad, puesto que el plátano es un símbolo fálico.',
	'Los espejos simbolizan la imaginación y el punto de conexión entre el consciente y el subconsciente.',
	'Representa un símbolo de nueva vida, renovación y fuerza.',
	'Soñar con un anciano, significa que tiene gran simplicidad, honestidad y discreción.',
	'Indica que en lo íntimo hay un descontento que no puede resolver.',
	'Indica que sus esperanzas para lograr el amor pueden sufrir un contratiempo.',
	'Soñar que ve un anillo en su dedo, significa su compromiso total a una relación o al éxito de su nuevo intento.',
	'Representa una extrema hostilidad hacia alguien o hacia una situación que le molesta muchísimo.',
	'Puede significar que está trabajando demasiado. Debería darse un respiro y descansar.',
	'Señal de que nuestra timidez en ocasiones nos hace perder importantes situaciones.',
	'Si ha matado a un mosquito en su sueño, quiere decir que superará obstáculos y disfrutar fortuna y felicidad doméstica.',
	'Significa confianza en sí mismo y en su futuro. Confía mucho en sus posibilidades y así será, el futuro le depara felicidad y suerte.',
	'Símbolo del deseo de terminar de una manera radical y definitiva con alguna situación o conflicto.',
	'Significa las posibilidades que tiene para alcanzar sus objetivos. Se encuentra en una fase de transición.'];

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

	var internationalization = {
		months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
	};

	$('.datepicker').datepicker({
		autoClose: true,
		format: 'mm/dd/yyyy',
		defaultDate: initDate,
		setDefaultDate: true,
		yearRange: [1990, (new Date()).getFullYear()],
		maxDate: yesterday,
		firstDay: 1,
		i18n: internationalization,
		onSelect: function (value) {
			apretaste.send({
				command: 'BOLITA ANTERIORES',
				data: {
					'date': value.getFullYear() + '-' + (value.getMonth() + 1) + '-' + value.getDate()
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
		$('.helper-text').html('Límite excedido');
	}
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

$(document).ready(function () {
	$('.tabs').tabs();
	$('.modal').modal();
	$('select').formSelect();
	$('.sidenav').sidenav();
});

var share;

function init(data) {
	share = {
		text: "Números de la bolita el " + moment(data.pick3.Midday.date).format('M/D/Y'),
		icon: 'fan',
		send: function () {
			apretaste.send({
				command: 'PIZARRA PUBLICAR',
				redirect: false,
				callback: {
					name: 'toast',
					data: 'La Bolita fue compartida en Pizarra'
				},
				data: {
					text: $('#message').val(),
					image: '',
					link: {
						command: btoa(JSON.stringify({
							command: 'BOLITA ANTERIORES',
							data: {date: data.pick3.Midday.date}
						})),
						icon: 'fan',
						text: 'Números de la bolita el ' + moment(data.pick3.Midday.date).format('M/D/Y')
					}
				}
			})
		}
	};
}

function toast(message) {
	M.toast({html: message});
}