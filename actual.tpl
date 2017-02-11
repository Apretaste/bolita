<head>
     <style type="text/css">
        span.mip{
            display: block;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 0;
            margin-right: 0;
            text-align: center;
        }

        div.bordeRedondeadoContainer{
            width: 100%;
            margin: 0 auto;
            text-align:center;
            display: -webkit-flex;
            display: flex;
            flex-direction: row;
            align-items: stretch;
        }

        div.bordeRedondeado{
            margin: 0 auto;
            border-style: outset;
            border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border: 1px outset #000000;
        }

        /* MEDIA QUERIES */

    @media only screen and (min-width: 501px) {
        body {
            /*background-color: lightgreen;*/
        }

        table p {
            /*background-color:#bada55;*/
            padding:10px 0px !important;
            font-size: 1.6rem !important;
            /*text-overflow: ellipsis;

            white-space: nowrap;
            overflow: hidden;*/
        }

        img {
            width:98% !important;
            max-width:99% !important;;
            max-height:450px !important;;

        }

    }    

    @media only screen and (max-width: 500px) {
        body {
            /*background-color: lightblue;*/
        }

        table p {
            /*background-color:#bada55;*/
            padding:00px 0px !important;   
            font-size: 0.9rem !important;
            /*text-overflow: ellipsis;

            white-space: nowrap;
            overflow: hidden;*/
        }

        img {
            width:95% !important;
            max-width:98% !important;
            max-height:450px !important;

        }

        .fechaCorridos{
            width: 60% !important;
            /*para centrar*/
            padding: 0em 3em !important;
            margin: 0em 25% !important;
        }
    }
        
    </style>
</head>
<center>
	<h1>La Bolita</h1>

	<h1>{$fecha_Pick3Med}</h1><!--Tarde: d/m/yyyy-->
    <table style="width: 100%;text-align:center;">
        <tr> 
            <td style="">
                <p style = "font-weight: bold;">Fijo:</p>
            </td>
            <td>
                <p style = "font-weight: bold;">Corrido 1:</p>
            </td>
            <td>
                <p style = "font-weight: bold;">Corrido 2:</p>
            </td>
        </tr style="text-align: center;">
            <td align="center" style = "width: 30%;border-style: none;">
                {img src="{$imgElFijoMed}" alt="Imagen Fijo" width="150px" height="150px"}
            </td>
            <td align="center" style = "width: 35%;border-style: none;">
                {img src="{$imgCorrido1Med}" alt="Imagen Corrido1" width="150px" height="150px"}
            </td>
            <td align="center" style = "width: 35%;border-style: none;">
                {img src="{$imgCorrido2Med}" alt="Imagen Corrido2" width="150px" height="150px"}
            </td>
        <tr>
            <td>
                <span style = "font-weight: bold;font-size: 3.3rem;">{$elFijoMed}</span>
            </td>
            <td>
                <span style = "font-weight: bold;font-size: 3.3rem;">{$elCorrido1Med}</span>
            </td>
            <td>
                <span style = "font-weight: bold;font-size: 3.3rem;">{$elCorrido2Med}</span>
            </td>
        </tr>
        <tr>
            <td>
                <p style = "font-weight: bold;">{$charadaText_Pick3Med}</p>
            </td>
            <td>
                <p style = "font-weight: bold;">{$charadaText1_Pick4Med}</p>
            </td>
            <td>
                <p style = "font-weight: bold;">{$charadaText2_Pick4Med}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding-top: 5%;padding-bottom: 5%;">
                <small>{$sigTir_Pick3Med}</small>
            </td>
        </tr>
    </table>
    {space15}
    <h1>{$fecha_Pick3Tar}</h1><!--Noche: d/m/yyyy-->

    <table style="width: 100%;text-align:center;">
        <tr> 
            <td style="">
                <p style = "font-weight: bold;">Fijo:</p>
            </td>
            <td>
                <p style = "font-weight: bold;">Corrido 1:</p>
            </td>
            <td>
                <p style = "font-weight: bold;">Corrido 2:</p>
            </td>
        </tr style="">
            <td align="center" style = "width: 30%;border-style: none;">
                {img src="{$imgElFijoTar}" alt="Imagen Fijo" width="150px" height="150px"}
            </td>
            <td align="center" style = "width: 35%;border-style: none;">
                {img src="{$imgCorrido1Tar}" alt="Imagen Corrido1" width="150px" height="150px"}
            </td>
            <td align="center" style = "width: 35%;border-style: none;">
                {img src="{$imgCorrido2Tar}" alt="Imagen Corrido2" width="150px" height="150px"}
            </td>
        <tr>
            <td>
                <span style = "font-weight: bold;font-size: 3.3rem;">{$elFijoTar}</span>
            </td>
            <td>
                <span style = "font-weight: bold;font-size: 3.3rem;">{$elCorrido1Tar}</span>
            </td>
            <td>
                <span style = "font-weight: bold;font-size: 3.3rem;">{$elCorrido2Tar}</span>
            </td>
        </tr>
        <tr>
            <td>
                <p style = "font-weight: bold;">{$charadaText_Pick3Tar}</p>
            </td>
            <td>
                <p style = "font-weight: bold;">{$charadaText1_Pick4Tar}</p>
            </td>
            <td>
                <p style = "font-weight: bold;">{$charadaText2_Pick4Tar}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding-top: 5%;">
                <small>{$sigTir_Pick3Tar}</small>
            </td>
        </tr>
    </table>
    <p style="line-height: 1.5em;">&nbsp;</p>
    <p style="text-align: center;">
        <strong>&nbsp;
            <a style="font-size: 11pt; font-family: Arial,Helvetica,sans-serif; color: white; text-decoration: none; font-weight: bold; padding: 10px; background-color: #5dbd00;display: inline-block;margin-bottom: 10px;" href="mailto:{{APRETASTE_EMAIL}}?subject=BOLITA+anteriores&amp;body=Envie%20este%20email%20tal%20como%20esta,%20ya%20esta%20preparado%20para%20usted" target="_blank" rel="noopener noreferrer">Ver anteriores</a>
            &nbsp;
            <a style="font-size: 11pt; font-family: Arial,Helvetica,sans-serif; color: white; text-decoration: none; font-weight: bold; padding: 10px; background-color: #5dbd00;display: inline-block;" href="mailto:{{APRETASTE_EMAIL}}?subject=WEB+http://lacharada.apretaste.com/index.html&amp;body=Envie%20este%20email%20tal%20como%20esta,%20ya%20esta%20preparado%20para%20usted" target="_blank" rel="noopener noreferrer">Ver n&uacute;meros de la charada</a>
        </strong>
    </p>
{space15}

    <small style = "color: red;">Las apuestas son ilegales en Cuba. Este contenido solo se ofrece dentro de Cuba con fines educacionales.</small> 
</center>