<center>
	<h1>{$title}</h1>
	<div style = "display: table; width: 99%;margin: 0 auto;text-align:center;">
		<div style = "float: center; height: 150%; width: 99%;margin: 0 auto;border-style: outset;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;border: 1px outset #000000;">
			<h1>El Fijo:</h1>
    		<table style="margin: 0 auto;width: 99%;text-align:center;">
    				<thead>
    					<th><h2>Sorteo Pick3</h2></th>
    					<th colspan="2" style="border-left-style: dotted;border-right-style: dotted;"><h2>Fijo</h2></th>
    				</thead>
				{foreach $lastResultsP3 as $resultadoP3}
				{strip}
				   <tr bgcolor="{cycle values="#f2f2f2,white"}">
				      <td style="text-align:left;font-weight: bold;">{$resultadoP3.NumGanador}</td>
				      <td style="font-weight: bold;border-left-style: dotted;">{$resultadoP3.fijo}</td>
				      <td style="font-weight: bold;border-right-style: dotted;">{$resultadoP3.charada}</td>
				   </tr>
				{/strip}
				{/foreach}
			</table>
    	
    	</div>
		
		{space10}
		<div style = "float: center; height: 150%; width: 99%;margin: 0 auto;border-style: outset;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;border: 1px outset #000000;">
			<h1>Corridos:</h1>
			<table style="margin: 0 auto;width: 99%;text-align:center;">
			<thead>
    			<th><h2>Sorteo Pick4</h2></th>
    			<th colspan="2" style="border-left-style: dotted;border-right-style: dotted;"><h2>Corrido 1</h2></th>
    			<th colspan="2" style="border-right-style: dotted;"><h2>Corrido 2</h2></th>
    		</thead>
			{foreach $lastResultsP4 as $resultadoP4}
			{strip}
			   <tr bgcolor="{cycle values="#f2f2f2,white"}">
			      <td style="text-align:left;font-weight: bold;">{$resultadoP4.NumGanador}</td>
			      <td style="font-weight: bold;border-left-style: dotted;">{$resultadoP4.corrido1}</td>
			      <td style="font-weight: bold;border-right-style: dotted;">{$resultadoP4.charada1}</td>
			      <td style="font-weight: bold;">{$resultadoP4.corrido2}</td>
			      <td style="font-weight: bold;border-right-style: dotted;">{$resultadoP4.charada2}</td>
			   </tr>
			{/strip}
			{/foreach}
			</table>
		</div>
	</div>
</center>