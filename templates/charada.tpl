<center>
	<h1>La Charada Cubana</h1>
</center>
<table style="text-align:justify; margin-left:25%;" width="75%">
  <tr>
  {$cont=0}
  {foreach $laCharada as $charada}
    {if ($cont % 2==0)}
    </tr>
    <tr>
    {/if}
      <td style="height: 50%;">
        {if $cont < 9}0{/if}{$cont}.- {$charada}
      </td>
      {$cont=$cont+1}
  {/foreach}
  </tr>
</table>
<center>
	{button href="BOLITA" caption="Volver a La Bolita" color="grey"}
</center>
