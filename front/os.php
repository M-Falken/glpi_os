<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/styles.termo.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<?php 
include ('../../../inc/includes.php');
include ('../../../config/config.php');
include ('configOs.php');
global $DB;
Session::checkLoginUser();
Html::header('Fiche Ticket', "", "plugins", "os");
echo Html::css($CFG_GLPI["root_doc"]."/css/styles.css");
if (isset($_SESSION["glpipalette"])) {
	echo Html::css($CFG_GLPI["root_doc"]."/css/palettes/".$_SESSION["glpipalette"].".css");
}
?>
<body>
<div id="botoes" style="width:55%; background:#fff; margin:auto; padding-bottom:10px;">
	<a href="#" class="vsubmit" onclick="window.print();"> Imprimer </a>
	<a href="#" class="vsubmit" onclick="history.back();"> Retour </a>
	<a href="index.php" class="vsubmit" style="float:right;"> Configurer </a>
</div>
<table style="width:55%; background:#fff; margin:auto;" border="0" cellpadding="0" cellspacing="0"> 
<tr>
<td style="padding: 0px !important;" >
<table style="width:100%; background:#fff;" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100" colspan="3">
<table style="width:100%;" border="0" cellpadding="0" cellspacing="0">
<tr><td height="60" valign="middle" style="width:20%; text-align:center; margin:auto;"><img src="../pics/logo_os.png" width="200" height="55" align="absmiddle"></td>
<td style="text-align:center;"><font size="3"><?php echo ($EmpresaPlugin);?></font><br>
<font size="1">
<?php
	if ( $CnpjPlugin == null ) {
		echo " ";
	} else {
		echo "SIRET: $CnpjPlugin";
	}
?>
</font><br>
<font size="1"><?php echo ("$EnderecoPlugin - $CidadePlugin"); ?></font><br>
<font size="1"><?php echo ("$SitePlugin - $TelefonePlugin"); ?></font><br>
<td height="50" valign="middle" style="width:20%; text-align:center;border: 3px solid <?php echo $CorBordPlugin; ?>;border-radius: 9px;"><font size="4"> Ticket Nº &nbsp;<b></font><font size="5" color=#FF0000><?php echo $OsId;?></b></font><br><font size="1"><?php echo $DataOs;?></font></td></tr>
</table></td>
<tr><td colspan="2" style="border: 3px solid <?php echo $CorBordPlugin; ?>;border-radius: 9px;background-color:<?php echo $CorPlugin; ?> !important"><center><b><font color="<?php echo $CorTextoPlugin; ?>">INFORMATION CLIENT</font></b></center></td> </tr>
<tr><td width="50%"><b>Entreprise: </b><?php echo ($EntidadeName) ?></td><td width="50%"><b>Téléphone: </b><?php echo ($EntidadePhone)?></td></tr>
<tr><td width="50%"><b>Adresse: </b><?php echo ($EntidadeEndereco)?></td><td><b>E-Mail: </b><?php echo ($EntidadeEmail)?></td></tr>
<tr><td width="50%"><b>SIRET: </b><?php echo ($EntidadeCnpj)?></td><td ><b>CP: </b><?php echo ($EntidadeCep)?></td></tr>
<tr><td colspan="2" style="border: 3px solid <?php echo $CorBordPlugin; ?>;border-radius: 9px;background-color:<?php echo $CorPlugin; ?> !important"><center><b><font color="<?php echo $CorTextoPlugin; ?>">DÉTAILS DE L'ORDRE DE SERVICE</font></b></center></td></tr>
<tr><td width="50%"><b>Titre:</b> <?php echo $OsNome;?></td><td width="50%"><b>Responsable:</b> <?php echo $OsResponsavel;?></td></tr>
<tr><td width="50%"><b>Date de début / heure: </b><?php echo ($OsData);?></td><td><b>Date de fin / heure: </b><?php echo ($OsDataEntrega);?></td></tr>
<tr>
<td>
<?php
	if ( $Locations == null ) {
		echo "</tr></td>";
	} else {
		echo "<b>Localisation: </b>$Locations";
		echo "</tr></td>";
	}
?>
<tr><td colspan="2" style="border: 3px solid <?php echo $CorBordPlugin; ?>;border-radius: 9px;background-color:<?php echo $CorPlugin; ?> !important"><center><b><font color="<?php echo $CorTextoPlugin; ?>">DESCRIPTION</font></b></center></td></tr>
<tr><td height="90" colspan="2" valign="top" style="padding:10px;"><?php echo html_entity_decode($OsDescricao);?></td></tr>
<tr><td colspan="2" style="border: 3px solid <?php echo $CorBordPlugin; ?>;border-radius: 9px;background-color:<?php echo $CorPlugin; ?> !important"><center><b><font color="<?php echo $CorTextoPlugin; ?>">SOLUTION</font></b></center></td></tr>
<tr><td height="5" colspan="2" valign="top" style="padding:10px;">
<?php 
	if ( $OsSolucao == null ) {
		echo "<br><hr><br><hr><br><hr><br><hr><br><hr><br>";
	} else {
		echo html_entity_decode($OsSolucao);
	}
?>
</td></tr>
<?php 
	if ( $CustoTotalFinal == 0 ) {
		echo "</tr>";
		} else {
			echo "<tr><td colspan=2 style=border: 3px solid $CorBordPlugin;border-radius: 9px;background-color:$CorPlugin><center><b><font color=$CorTextoPlugin >DÉTAILS DES COÛTS</font></b></center></tr></td>";
			echo '<td height="80" colspan="2" valign="top" style="padding:10px;">';
			echo '<table align=center width=100% height=0 border=0 cellpadding="0" cellspacing="0">';
			echo '<tr>';
			echo '<td><b>DESCRIPTION</b></td>';
			echo '<td><b>COÛT FIXE</b></td>';
			echo '<td><b>COÛT MATERIEL</b></td>';
			echo '<td><b>COÛT TEMPS</b></td>';
			echo '<td><b>DURÉE</b></td>';
			echo '<td><b>COÛT</b></td>';
			echo '</tr>';
			while($Escrita = $DB->fetch_assoc($ResCustoLista)){
				echo '<td>'.$Escrita['name'].'</td>';
				echo '<td>'.$Escrita['cost_fixed2'].' €</td>';
				echo '<td>'.$Escrita['cost_material2'].' €</td>';
				echo '<td>'.$Escrita['cost_time2'].' €</td>';
				echo '<td>'.$Escrita['Hora'].'</td>';
				echo '<td>'; 
				echo number_format($Escrita['CustoItem'], 2, ',', '.');
				echo ' €</td>'; 
				echo '</tr>';
			}
			echo '<table align=center width=100% height=0 border=0 cellpadding="0" cellspacing="0">';
			echo '<td><p style=margin-top:0px;margin-bottom:0px align=left><b>DURÉE TOTALE:</b> '.$hours.'h '.$minutes.'m '.$seconds.'s</p></td>';
			echo '<tr>';
			echo '<td><p style=margin-top:0px;margin-bottom:0px align=left><b>COÛT TOTAL:</b> '.$CustoTotalFinal.' €</td></p>';
			echo '</table>';
			echo '</table>';
			echo '<table style=width:100% align=center border=0>';
			echo '</tr>';
		}
?>
<table style="width:100%; background:#fff;" border="0">
<tr><td colspan="2" style="border: 3px solid <?php echo $CorBordPlugin; ?>;border-radius: 9px;background-color:<?php echo $CorPlugin; ?> !important"><center><b><font color="<?php echo $CorTextoPlugin; ?>">SIGNATURES</font></b></center></tr></td>
</table>
<br>
<br>
<br>
<table width="688" border="0" align="center" cellspacing="0">
<tr align="center"><td style="text-align:center; width:50%;"><br><hr></td><td style="text-align:center; width:50%;"><br><hr></td></tr>
<tr align="center"><td style="text-align:center;" ><b><?php echo ($EntidadeName);?></b></td><td style="text-align:center;" ><b><?php echo ($EmpresaPlugin);?></b></td></tr>
</table>
</table> 
<style media="print">
</style>
</body>
</html>
<?php  
Html::footer();
