// items of la charada
var charada = [
	{'number':1, 'names':['Caballo','Sol','Tintero','Fidel'], 'desc':'Es posible que gane una suma importante de dinero y disfrutar una vida feliz y próspera.'},
	{'number':2, 'names':['Mariposa','Hombre','Cafetera'], 'desc':'Habla de ciertas indecisiones y humor inconstante, así como posible infidelidad afectiva o amistosa.'},
	{'number':3, 'names':['Niñito','Marinero','Luna','Taza'], 'desc':'Nuevas oportunidades o un síntoma de inocencia. Si en tu sueño aparece un niño llorando significa enfermedad.'},
	{'number':4, 'names':['Gato','Llave','dientes'], 'desc':'Si le ataca en el sueño representa sus enemigos. Si logra ganar, superará en la vida real grandes obstáculos y logrará fortuna y fama.'},
	{'number':5, 'names':['Monja','Periódico','mar'], 'desc':'Insatisfacción con las labores cotidianas, al que además se le atribuye un gran sentimiento de culpabilidad.'},
	{'number':6, 'names':['Tortuga','Carta','Botella'], 'desc':'Va a progresar de forma lenta pero segura. Es aconsejable que no vaya tan rápido, para poder lograr sus objetivos.'},
	{'number':7, 'names':['Caracol','Mierda','Sueño'], 'desc':'Anuncia celos y un ambiente hostil entre los que nos rodean en nuestro trabajo. Hay envidias y competencia.'},
	{'number':8, 'names':['Muerto','Calabaza','León','Culo'], 'desc':'Puede ser que ha sentido el fallecimiento de alguien. Si este sueño es recurrente puede ser síntoma de un trastorno.'},
	{'number':9, 'names':['Elefante','Entierro','lengua'], 'desc':'Sabiduría, memoria y el poder de la persistencia. Representa un sueño favorable que le aportará dignidad y reconocimiento.'},
	{'number':10, 'names':['Pescadote','Cazuela','Paseo'], 'desc':'Es un símbolo de fertilidad, por tanto soñar con peces para las mujeres significa un embarazo seguro.'},
	{'number':11, 'names':['Gallo','Fabrica','Lluvia'], 'desc':'Le puede estar avisando de la agresión que va a sufrir por parte de alguien, que tiene dichas características.'},
	{'number':12, 'names':['Mujer Santa','Toallas','Cometa'], 'desc':'Hay alguien desde el más allá que cuida de ti y te protege. Encontrará a alguien que le consuele o a algo que le de fuerzas renovadas'},
	{'number':13, 'names':['Pavo Real','Niño grande','Chulo'], 'desc':'Habla de confianza en una misma, de belleza y de capacidades, pero también de vanidad'},
	{'number':14, 'names':['Tigre','Chino','Sartén','Cementerio'], 'desc':'Poder, belleza salvaje y fuerza sexual. Superará dificultades y logrará lujos y placer.'},
	{'number':15, 'names':['Perro','Niña Bonita','Visita'], 'desc':'Simboliza intuición, lealtad, generosidad, protección y fidelidad. El sueño indica que sus fuertes valores y buenas intenciones le ayudarán a avanzar en la vida.'},
	{'number':16, 'names':['Toro','Vestido','Plancha'], 'desc':'Puede tener sus connotaciones sexuales y hablarle de fertilidad, virilidad, de necesidad de sexo.'},
	{'number':17, 'names':['San Lázaro','Luna','Armas'], 'desc':'Fue revivido por Jesús. A partir de esta historia su nombre es utilizado frecuentemente como sinónimo de resurrección.'},
	{'number':18, 'names':['Pescadito','Iglesia','Palma'], 'desc':'Sus creencias, sus forma de pensar, su espiritualidad y su fuerza, le llevarán al éxito en la vida.'},
	{'number':19, 'names':['Lombriz','Campesino','bandera'], 'desc':'Simboliza la preocupación por alguien muy querido para ti que esta enfermo.'},
	{'number':20, 'names':['Gato Fino','Orinal','Libro','Cañón'], 'desc':'Si le ataca en el sueño representa sus enemigos. Si logra ganar la lucha, superará en la vida real grandes obstáculos.'},
	{'number':21, 'names':['Majá','Chaleco','Cotorra','Cigarro'], 'desc':'Traición de la persona menos esperada. Si logra matarla, supone una victoria contra sus enemigos.'},
	{'number':22, 'names':['Sapo','Estrellas','Chimenea'], 'desc':'Intenta esconder su verdadera identidad y carácter. Debe tener más confianza en si mismo y dejar que su belleza interior se vea.'},
	{'number':23, 'names':['Vapor','Águila','Submarino'], 'desc':'Refleja el estado emocional en el que se encuentra. Está obcecado en la forma de actuar con un tema y su actitud testaruda es inamovible.'},
	{'number':24, 'names':['Paloma','Cocina','Música'], 'desc':'Unión feliz, alegrías con la familia, anuncia un próximo nacimiento y los negocios.'},
	{'number':25, 'names':['Piedra Fina','Rana','Casa nueva'], 'desc':'Le alabarán y le reconocerán su trabajo, pero no sobrepase los límites llevado por la sobre excitación del momento.'},
	{'number':26, 'names':['Anguila','Calle','Medico'], 'desc':'Es bueno siempre y cuando logremos mantenerla en nuestras manos, de otra manera es presagio que la fortuna venidera es pasajera.'},
	{'number':27, 'names':['Avispa','Campana','Mono','Baúl'], 'desc':'Significa traición, penas y contrariedades. Obstáculos a nivel financiero y exigencias familiares.'},
	{'number':28, 'names':['Chivo','Uvas','Políticos'], 'desc':'Es necesario liberar su energía sexual, fuertemente manifestada en usted.'},
	{'number':29, 'names':['Ratón','Nube','Venado'], 'desc':'Posibilidad de problemas domésticos. Los asuntos relacionados con el trabajo podrán deteriorarse.'},
	{'number':30, 'names':['Camarón','Almanaque'], 'desc':'Representa los placeres, objetos o productos que deseas tener en un momento determinado de tu vida o meta que desees alcanzar.'},
	{'number':31, 'names':['Venado','Zapatos','Escuela'], 'desc':'Es un buen augurio. Una amistad duradera, y buena suerte en los negocios y el amor.'},
	{'number':32, 'names':['Cerdo','Enemigo','Demonio'], 'desc':'Simbolizan sus instintos más bajos; asuntos sucios, egoísmo, reveldía, codicia.'},
	{'number':33, 'names':['Tiñosa','Jesucristo','Baraja','Bruja'], 'desc':'Sus experiencias pasadas le proporcionaron todo lo necesario, para afrontar correctamente todo lo que aparezca en su vida.'},
	{'number':34, 'names':['Mono','Familia','Negro'], 'desc':'Es una advertencia ante la existencia de amigos falsos que le halagarán para satisfacer sus propios intereses. Problemas en el amor.'},
	{'number':35, 'names':['Araña','Novia','Mosquito'], 'desc':'Gracias a sus grandes esfuerzos y a la energía que pone en su trabajo y en su vida, logrará ganar dinero y felicidad.'},
	{'number':36, 'names':['Cachimba','Opio','Bodega'], 'desc':'Se relaciona con pensamientos obsesivos o constante en el soñador.'},
	{'number':37, 'names':['Brujería','Gallina Prieta','Hormiga','Gitana'], 'desc':'Indica que algo o alguien le está manipulando, con el fin de conseguir sus fines.'},
	{'number':38, 'names':['Dinero','Goleta','Guantes','Macao'], 'desc':'Sin causa aparente representa un riesgo de caer en actitudes indebidas y hasta peligrosas.'},
	{'number':39, 'names':['Conejo','Rayo','Tintorero'], 'desc':'Fidelidad en el amor y una gran amistad. Éxito en los negocios.'},
	{'number':40, 'names':['Cura','Estatua','Cantina','Sangre'], 'desc':'Problemas con jueces, abogados... Y debe desconfiar de algún amigo que se ofrezca a ayudar.'},
	{'number':41, 'names':['Lagartija','Prisión','Clarín'], 'desc':'Te está diciendo que tengas cuidado con la gente que no conoces.'},
	{'number':42, 'names':['Pato','España','Carnero','Abismo'], 'desc':'Viajes felices. Logros económicos o buena cosecha. Matrimonio y hijos en un nuevo hogar.'},
	{'number':43, 'names':['Alacrán','Amigo','Presidiario'], 'desc':'Problemas sentimentales, ya que éstos están relacionados con sentimientos, pensamientos o palabras destructivas.'},
	{'number':44, 'names':['Año malo','Viaje','Tormenta'], 'desc':'Representa su falta de fuerza y resistencia. Se intenta proteger por los elementos, que le rodean.'},
	{'number':45, 'names':['Tiburón','Presidente','Tranvía'], 'desc':'Fuerte le amenaza, pero logrará superar las dificultades.'},
	{'number':46, 'names':['Humo Blanco','Guagua','Hambre'], 'desc':'Algo está creciendo en su subconsciente y en su sabiduría. También significa, que existe una situación que requiere su atención.'},
	{'number':47, 'names':['Pájaro','Escolta','Rosa'], 'desc':'Señal de prosperidad para el soñador. Sentido de libertad. Liberación del peso de las responsabilidades.'},
	{'number':48, 'names':['Cucaracha','Barbería','Abanico'], 'desc':'Representa su propia necesidad de renovar, limpiar y rejuvenecer su ser psicológico, emocional o espiritual.'},
	{'number':49, 'names':['Borracho','Riqueza','Fantasma'], 'desc':'Es de mal augurio, le anuncia depresión o enfermedad mental, problemas, trabas importantes ante las que se siente incapaz de reaccionar.'},
	{'number':50, 'names':['Policía','Florero','Alegría'], 'desc':'Ha cometido alguna fechoría o algo, que sabe que está mal y se siente culpable.'},
	{'number':51, 'names':['Soldado','Guardia','Antojos','Oro'], 'desc':'Su actitud incondicional e intransigente y la forma, que tiene de imponer su opinión y sus sentimientos a los demás.'},
	{'number':52, 'names':['Bicicleta','Libreta','Abogado'], 'desc':'Representa su deseo de conseguir un equilibrio en la vida real.'},
	{'number':53, 'names':['Luz Eléctrica','Diamante','Beso'], 'desc':'Representa iluminación, claridad, guía, un completo entendimiento y perspicacia.'},
	{'number':54, 'names':['Flores','Gallinas','Timbre'], 'desc':'Simboliza la amabilidad, la compasión, la sensibilidad, el placer, la belleza y las ganancias.'},
	{'number':55, 'names':['Cangrejo','Baile','murciélago'], 'desc':'Relacionado con relaciones amorosas, el cangrejo advierte sobre una relación larga y difícil. Evita los rivales.'},
	{'number':56, 'names':['Merengue','Piedra','Reina'], 'desc':'Significa que vivirá grandes desilusiones, por hacerse ideas falsas sobre algo importante. Confiará en quien no debe y le aconsejarán mal.'},
	{'number':57, 'names':['Cama','Puerta','Telegrama'], 'desc':'Representa su ser íntimo y el descubrimiento de su propia sexualidad.'},
	{'number':58, 'names':['Retrato','Adulterio','Cuchillo'], 'desc':'Fotos antiguas o retratos, es porque piensa que el pasado fue mejor y le gusta recordarlo, volver a vivir lo que vivió en el pasado.'},
	{'number':59, 'names':['Loco','Langosta','Anillo'], 'desc':'Soñar con la locura o demencia propia o la de otra persona representa su deseo de evadir la realidad.'},
	{'number':60, 'names':['Huevo','Payaso','Tempestad'], 'desc':'Un cambio muy favorable a tu vida con grandes sorpresas en todos los niveles.'},
	{'number':61, 'names':['Caballo Grande','Revolver'], 'desc':'Es posible que gane una suma importante de dinero y disfrutar una vida feliz y próspera.'},
	{'number':62, 'names':['Matrimonio','Lampara','Nieve'], 'desc':'Representa compromiso, armonía o transición. Simboliza la unificación de aspectos opuestos de su carácter.'},
	{'number':63, 'names':['Asesino','Escalera','Coronel'], 'desc':'Representa que está viviendo un momento muy deprimente, que necesita ser resuelto cuanto antes.'},
	{'number':64, 'names':['Muerto Grande','Relajo'], 'desc':'Suelen representar sentimientos que nos preparan para la aceptación de la muerte.'},
	{'number':65, 'names':['Comida','Trueno','Bruja'], 'desc':'Discusiones, así como significa felicidad y armonía entre los tuyos.'},
	{'number':66, 'names':['Par de Yeguas','Carnaval','Divorcios'], 'desc':'Suele ser indicador de que el cónyuge, novio o novia son personas buenas y agradecidas.'},
	{'number':67, 'names':['Puñalada','Fonda,','Aborto'], 'desc':'Es indicativo de muchas energías negativas reprimidas tales como ira, envidia o venganzas.'},
	{'number':68, 'names':['Cementerio','Templo','Bolos'], 'desc':'Significa enfermedad. Es una premonición que le anuncia la muerte de un familiar, del cual va a recibir una herencia.'},
	{'number':69, 'names':['Relajo Grande','Pozo','Loma','Vagos'], 'desc':'Es necesario que aprendas a vivir con cierta estabilidad y equilibrio en tu vida.'},
	{'number':70, 'names':['Coco','Arco iris','Barril','Teléfono'], 'desc':'Una premonición de un regalo sorpresa de dinero.'},
	{'number':71, 'names':['Río','Fusil','Pantera','Sombrero'], 'desc':'Los ríos en los sueños simbolizan el deslizar de la vida que se va.'},
	{'number':72, 'names':['Collar','Buey','Ferrocarril','Tren'], 'desc':'Soñar que ve o lleva un collar, representan sus deseos insatisfechos.'},
	{'number':73, 'names':['Maleta','Navaja','Parque'], 'desc':'Representa los deseos, las necesidades y las preocupaciones que siente y que le pesan en la vida real.'},
	{'number':74, 'names':['Papalote','Coronel','Serpiente'], 'desc':'Puede representar tu deseo de ser independiente o tomar tus propias decisiones.'},
	{'number':75, 'names':['Perro Mediano','Corbata','Cine','Viento','Guitarra'], 'desc':'El sueño indica que sus fuertes valores y buenas intenciones le ayudarán a avanzar en la vida y le traerán el éxito.'},
	{'number':76, 'names':['Bailarina','Violín','Caja fuerte'], 'desc':'Significa que controla perfectamente su vida. Incluso que está siendo demasiado agresiva, energica y autoritaria con los demás.'},
	{'number':77, 'names':['Muletas','Banderas','Colegio'], 'desc':'Realizar una petición por la salud propio o de algún familiar.'},
	{'number':78, 'names':['Sarcófago','Obispo','Rey','Lunares'], 'desc':'En los sueños un ataúd o feretro o sarcófago, representa el útero o seno materno.'},
	{'number':79, 'names':['Tren de carga','Lagarto','Dulces','Abogado','Coche'], 'desc':'Significa seguridad en sí mismo en todos los aspectos, conclusión positiva de sus negocios en curso.'},
	{'number':80, 'names':['Médicos','Médico Viejo','Trompo','Buena noticia'], 'desc':'Es de muy buen augurio, significa prosperidad, riquezas y buena posición.'},
	{'number':81, 'names':['Teatro','Ingeniero','Barco'], 'desc':'Estás mal contigo mismo, con mucha desconfianza en ti y haces cosas para llamar la atención.'},
	{'number':82, 'names':['Madre','Pleito','León'], 'desc':'Representa esos aspectos de tu personalidad más frágiles, como pueden ser la necesidad de protección.'},
	{'number':83, 'names':['Tragedia','Limosneo','Madera'], 'desc':'Soñarse en una tragedia de cualquier tipo es anuncio de problemas, malos entendidos, ofensas por nimiedades.'},
	{'number':84, 'names':['Sangre','Ciego','Bohío','Banquero'], 'desc':'Puede interpretarse como sensación de peligro o traición.'},
	{'number':85, 'names':['Reloj','Espejo','Avión'], 'desc':'Te está diciendo que el tiempo vuela y no dejes pasar más y aprovéchalo.'},
	{'number':86, 'names':['Tijeras','Convento','Manguera'], 'desc':'Sugiere, que necesita acabar de una vez, con un tema recurrente en su vida.'},
	{'number':87, 'names':['Plátano','Fuego'], 'desc':'Está relacionado con la sexualidad y la masculinidad, puesto que el plátano es un símbolo fálico.'},
	{'number':88, 'names':['Espejuelos','Hojas','Gusano'], 'desc':'Los espejos simbolizan la imaginación y el punto de conexión entre el consciente y el subconsciente.'},
	{'number':89, 'names':['Agua','Lotería','Tesorero','Melón'], 'desc':'Representa un símbolo de nueva vida, renovación y fuerza.'},
	{'number':90, 'names':['Viejo','Caramelo','Temporal'], 'desc':'Soñar con un anciano, significa que tiene gran simplicidad, honestidad y discreción.'},
	{'number':91, 'names':['Limosnero','Alpargata','Comunista','Tranvía'], 'desc':'Indica que en lo íntimo hay un descontento que no puede resolver.'},
	{'number':92, 'names':['Globo alto','Avión','Cuba','Suicidio'], 'desc':'Indica que sus esperanzas para lograr el amor pueden sufrir un contratiempo.'},
	{'number':93, 'names':['Sortija','Andarín','Joyas','Libertad'], 'desc':'Soñar que ve un anillo en su dedo, significa su compromiso total a una relación o al éxito de su nuevo intento.'},
	{'number':94, 'names':['Machete','Perfume','La Habana'], 'desc':'Representa una extrema hostilidad hacia alguien o hacia una situación que le molesta muchísimo.'},
	{'number':95, 'names':['Guerra','Espada','Matanzas'], 'desc':'Puede significar que está trabajando demasiado. Debería darse un respiro y descansar.'},
	{'number':96, 'names':['Reto','Zapatos Nuevos','Roca','Puta vieja'], 'desc':'Señal de que nuestra timidez en ocasiones nos hace perder importantes situaciones.'},
	{'number':97, 'names':['Mosquito','Correr','Grillo'], 'desc':'Si ha matado a un mosquito en su sueño, quiere decir que superará obstáculos y disfrutar fortuna y felicidad doméstica.'},
	{'number':98, 'names':['Piano','Traición','Entierro Grande'], 'desc':'Significa confianza en sí mismo y en su futuro. Confía mucho en sus posibilidades y así será, el futuro le depara felicidad y suerte.'},
	{'number':99, 'names':['Serrucho','Carbonero','Gallo pelea'], 'desc':'Símbolo del deseo de terminar de una manera radical y definitiva con alguna situación o conflicto.'},
	{'number':100, 'names':['Motel','Inodoro','Dios','Escoba','Automóvil'], 'desc':'Significa las posibilidades que tiene para alcanzar sus objetivos. Se encuentra en una fase de transición.'}
];

// on start
$(document).ready(function () {
	// start components
	$('.sidenav').sidenav();
	$('.modal').modal();
	$('select').formSelect();

	if(title == 'Tiradas') {
		// translate datepicker to Spanish
		var internationalization = {
			months: ['Ene.', 'Feb.', 'Mar.', 'Abr.', 'May.', 'Jun.', 'Jul.', 'Ago.', 'Sep.', 'Oct.', 'Nov.', 'Dic.'],
			monthsShort: ['Ene.', 'Feb.', 'Mar.', 'Abr.', 'May.', 'Jun.', 'Jul.', 'Ago.', 'Sep.', 'Oct.', 'Nov.', 'Dic.'],
			weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
		};

		// create datepicker
		$('.datepicker').datepicker({
			autoClose: true,
			format: 'dd/mm/yyyy',
			defaultDate: moment(corrida).toDate(),
			setDefaultDate: true,
			maxDate: new Date(),
			firstDay: 1,
			i18n: internationalization,
			onSelect: function (value) {
				apretaste.send({
					command: 'BOLITA',
					data: {'dt': moment(value).format('YYYY-MM-DD')}
				})
			}
		});
	}
});

function toggleSuerte() {
	$('#esfera').fadeOut(2000, function () {
		$('#suerte').fadeIn(2000);
	});
}

function openMenu() {
	$('.sidenav').sidenav();
	$('.sidenav').sidenav('open');
}

function getImage(index, serviceImgPath, size=35) {
	var x = (index) * size;
	return "background-image: url(" + serviceImgPath + "/bolita-icons.png); background-size: " + size * 100 + "px " + size + "px; background-position: -" + x + "px 0;";
}

function getName(index) {
	var name = charada[index].names[0];

	if(name.length > 9) {
		name = name.substring(0, 6) + '...';
	}

	return name;
}

function share() {
	// share in Pizarra 
	apretaste.send({
		command: 'PIZARRA PUBLICAR',
		redirect: false,
		data: {
			text: $('#message').val(),
			image: '',
			link: {
				command: btoa(JSON.stringify({
					command: 'BOLITA ANTERIORES',
					data: {date: corrida}
				})),
				icon: 'fan',
				text: 'Números de la bolita el ' + moment(corrida).format('M/D/Y')
			}
		}
	});

	// display message
	M.toast({html: 'La Bolita fue compartida en Pizarra'});
}

function formatBetType(type) {
	if(type == 'FIJO') return 'Fijo';
	if(type == 'CORRIDO') return 'Corrido';
	if(type == 'PARLE') return 'Parlé';
}

function selectBetType() {
	var type = $('#type').val();
	if(type == 'PARLE') $('.parle').show();
	else $('.parle').hide();
}

function bet() {
	// get values
	var type = $('#type').val();
	var bet1 = $('#bet1').val();
	var bet2 = $('#bet2').val();
	var bet3 = $('#bet3').val();
	var amount = $('#amount').val();

	// validate first number
	if(bet1 < 1 || bet1 > 100) {
		M.toast({html: 'Debe escoger un número primario'});
		return false;
	}

	// validate amount
	if(Number(amount) != amount || amount <= 0) {
		M.toast({html: 'La cantidad a apostar es inválida'});
		return false;
	}

	// validate parlé
	if(type == 'PARLE' && (bet2 < 1 || bet2 > 100 || bet3 < 1 || bet3 > 100)) {
		M.toast({html: 'Debe escoger ambos corridos'});
		return false;
	}

	// enviar la apuesta
	apretaste.send({
		command: 'BOLITA CREAR',
		data: {
			type: type,
			bet1: bet1,
			bet2: bet2,
			bet3: bet3,
			amount: amount
		}
	});
}
