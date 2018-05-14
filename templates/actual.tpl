<center>
	<h1>La Bolita</h1>
	<p>Resultados de la Bolita Cubana</p>
</center>
<table style="text-align:center" width="100%">
	<tr>
		<td colspan="3">
			<h2>Tarde: {$results['fijoMidDate']}</h2>
			{space10}
		</td>
	</tr>
	<tr>
		<td width="33%">Fijo</td>
		<td width="33%">Corrido 1</td>
		<td width="33%">Corrido 2</td>
	</tr>
	<tr>
		<td width="33%">{img src="{$images['fijoMid']}" alt="Imagen Fijo" width="100px"}</td>
		<td width="33%">{img src="{$images['Corrido1Mid']}" alt="Imagen Corrido1" width="100px"}</td>
		<td width="33%">{img src="{$images['Corrido2Mid']}" alt="Imagen Corrido2" width="100px"}</td>
	<tr>
		<td width="33%"><font size="32"><b>{$results['centenaMid']}-{$results['fijoMid']}</b></font></td>
		<td width="33%"><font size="32"><b>{$results['Corrido1Mid']}</b></font></td>
		<td width="33%"><font size="32"><b>{$results['Corrido2Mid']}</b></font></td>
	</tr>
	<!--tr>
		<td><b>{$results['fijoMidText']}</b></td>
		<td><b>{$results['Corrido1MidText']}</b></td>
		<td><b>{$results['Corrido2MidText']}</b></td>
	</tr-->
	<tr>
		<td colspan="3">{space30}</td>
	</tr>
	<tr>
		<td colspan="3">
			<h2>Noche: {$results['fijoEveDate']}</h2>
			{space10}
		</td>
	</tr>
	<tr>
		<td width="33%"><p>Fijo</p></td>
		<td width="33%"><p>Corrido 1</p></td>
		<td width="33%"><p>Corrido 2</p></td>
	</tr>
		<td width="33%">{img src="{$images['fijoEve']}" alt="Imagen Fijo" width="100px"}</td>
		<td width="33%">{img src="{$images['Corrido1Eve']}" alt="Imagen Corrido1" width="100px"}</td>
		<td width="33%">{img src="{$images['Corrido2Eve']}" alt="Imagen Corrido2" width="100px"}</td>
	<tr>
		<td width="33%"><font size="32"><b>{$results['centenaEve']}-{$results['fijoEve']}</b></font></td>
		<td width="33%"><font size="32"><b>{$results['Corrido1Eve']}</b></font></td>
		<td width="33%"><font size="32"><b>{$results['Corrido2Eve']}</b></font></td>
	</tr>
	<!--tr>
		<td><b>{$results['fijoEveText']}</b></td>
		<td><b>{$results['Corrido1EveText']}</b></td>
		<td><b>{$results['Corrido2EveText']}</b></td>
	</tr-->
</table>

{space30}

<center>
	{button href="BOLITA ANTERIORES" caption="Ver Anteriores"}
	{button href="BOLITA CHARADA" caption="La Charada" color="grey"}

	{space15}

	<p style="color:red;"><small>Las apuestas son ilegales en Cuba.<br/>Este contenido se ofrece dentro de Cuba con fines educacionales.</small><p>
</center>
