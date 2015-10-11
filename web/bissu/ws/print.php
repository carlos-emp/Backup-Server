<?php
$name=$_POST["mihtml"];
$name=str_replace('+', '<tr style=" width: 100%"><td style="border: 1px solid black; width: 20%">', $name);
$name=str_replace('-', '</td><td style="border: 1px solid black; width: 20%">', $name);
$name=str_replace('_', '</td></tr>', $name);


$name2=$_POST["mtotales"];
$name2=str_replace('+', '<p style=" width: 100%">', $name2);
$name2=str_replace('-', '</p><p>', $name2);
$name2=str_replace('_', '</p>', $name2);

$cabecera='
<tr style="width: 100%">
	<td style="width: 20%">Num.</td>
	<td style="width: 20%">Producto</td>
	<td style="width: 20%">Precio</td>
	<td style="width: 20%">Cantidad</td>
	<td style="width: 20%">Total</td>
</tr>';

    $content = "
<page><table style='width: 100%'>".$cabecera.$name."</table>".$name2.
"</page>";

    require_once('../lib/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('factura.pdf');
    //echo "".$content;
?>
