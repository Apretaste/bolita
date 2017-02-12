<center>
	<h1>&Uacute;ltimos 7 Resultados</h1>
</center>

<table style="text-align:center;" width="100%">
	<tr>
		<td colspan="5">
			{space5}
			<h2>El Fijo</h2>
			{space5}
		</td>
	</tr>
	<tr>
		<td colspan="2"><b>Sorteo Pick3</b></td>
		<td colspan="3"><b>Fijo</b></td>
	</tr>
	{foreach $lastResultsP3 as $resultadoP3}
		{strip}
		<tr bgcolor="{cycle values="#f2f2f2,white"}">
			<td colspan="2">{$resultadoP3.NumGanador}</td>
			<td colspan="2">{$resultadoP3.fijo}</td>
			<td colspan="2">{$resultadoP3.charada}</td>
		</tr>
		{/strip}
	{/foreach}

	<tr>
		<td colspan="5">
			{space15}
			<h2>Corridos</h2>
			{space5}
		</td>
	</tr>

	<tr>
		<td><b>Sorteo Pick4</b></td>
		<td colspan="2"><b>Corrido 1</b></td>
		<td colspan="2"><b>Corrido 2</b></td>
	</tr>
	{foreach $lastResultsP4 as $resultadoP4}
		{strip}
		<tr bgcolor="{cycle values="#f2f2f2,white"}">
			<td>{$resultadoP4.NumGanador}</td>
			<td>{$resultadoP4.corrido1}</td>
			<td align="left">{$resultadoP4.charada1}</td>
			<td>{$resultadoP4.corrido2}</td>
			<td align="left">{$resultadoP4.charada2}</td>
		</tr>
		{/strip}
	{/foreach}
</table>

{space10}
