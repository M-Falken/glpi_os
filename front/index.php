<?php
include ('../../../inc/includes.php');
include ('../../../config/config.php');
global $DB;
Session::checkLoginUser();
Html::header('OS', "", "plugins", "os");
?>
<html>
<head>
<title>Configuration Fiche Intervention</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css">
<?php
      echo Html::css($CFG_GLPI["root_doc"]."/css/styles.css");
      if (isset($_SESSION["glpipalette"])) {
         echo Html::css($CFG_GLPI["root_doc"]."/css/palettes/".$_SESSION["glpipalette"].".css");
      }
$SelPlugin = "SELECT * FROM glpi_plugin_os_config";
$ResPlugin = $DB->query($SelPlugin);
$Plugin = $DB->fetch_assoc($ResPlugin);
$EmpresaPlugin = $Plugin['name'];
$CnpjPlugin = $Plugin['cnpj'];
$EnderecoPlugin = $Plugin['address'];
$TelefonePlugin = $Plugin['phone'];
$CidadePlugin = $Plugin['city'];
$CorPlugin = $Plugin['color'];
$CorTextoPlugin = $Plugin['textcolor'];
$SitePlugin = $Plugin['site'];
?>
</head>
<body>
<div id="container" style="background:#fff; margin:auto; width:60%; border: 1px solid #ddd; padding-bottom:25px;">
<center>
<table width="600" border="0" cellpadding="10" cellspacing="10">
<tr><td><div align="center"><a href="http://glpi-os.sourceforge.net" target="GLPI_OS"><img src="../pics/logotipo.png" alt="GLPI_OS" border="none"/></a></div></td></tr>
<tr><td><div align="center"><h1>GLPI_OS: Configuration</h1></div></td></tr>
</table> 
</center>
<center>
<tr><td><div align="center"><h3>ÉTAPE 1 </h3></div></td></tr>
<tr><td><div align="center"><h4>Informations sur l'entreprise.</h4></div></td></tr>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<form action="config.php" method="get">
<pre>
<tr><td>Nom de l'entreprise: </td><td><input type="text" size="35" maxlength="256" name="name_form" value="<?php print $EmpresaPlugin; ?>"></td></tr>
<tr><td>SIRET: </td><td><input type="text" size="35" maxlength="256" name="cnpj_form" value="<?php print $CnpjPlugin; ?>"></td></tr>
<tr><td>Adresse de l'entreprise: </td><td><input type="text" size="35" maxlength="256" name="address_form" value="<?php print $EnderecoPlugin; ?>"></td></tr>
<tr><td>Téléphone: </td><td><input type="text" size="35" maxlength="256" name="phone_form" value="<?php print $TelefonePlugin; ?>"></td></tr>
<tr><td>Ville: </td><td><input type="text" size="35" maxlength="256" name="city_form" value="<?php print $CidadePlugin; ?>"></td></tr>
<tr><td>Site: </td><td><input type="text" size="35" maxlength="256" name="site_form" value="<?php print $SitePlugin; ?>"></td></tr>
</table>
<tr><td><div align="center"><h4>Personalisations aux couleurs de l'entreprise.</h4></div></td></tr>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr><td>Couleur du texte: </td><td><input type="text" size="15" maxlength="256" name="textcolor_form" value="#FFFFFF"<?php print $CorTextoPlugin; ?>"></td></tr><td>
<tr><td>Couleur du fond: </td><td><input type="text" size="15" maxlength="256" name="color_form" value="#000000" <?php print $CorPlugin; ?>"></td></tr>
<tr><td colspan="2" style="text-align:center;"><input type="submit" class="submit" value="Sauvegarder" name="enviar"></td></tr>
<tr><td>
</pre>
</table>
</form>
</center>
<center>
<tr><td><div align="center"><h3>ÉTAPE 2 - Logo Fiche Intervention</h3></div></td></tr>
<tr><td><div align="center"><h4>UPLOAD du logo (50x50) qui sera utilisé dans le système d'exploitation.</h4></div></td></tr>
<table width="500" border="0" cellpadding="0" cellspacing="0">
<form method="post" enctype="multipart/form-data" action="recebeLogo.php">
<br>
Sélectionnez une image: <input name="arquivo" type="file" required="required" />
<br>
</td></tr>
<tr><td>
<tr><td colspan="2" style="text-align:center;"><input type="submit" class="submit" value="Envoyer" name="enviar"></td></tr>
</form>
</td></tr>
</table>
<table width="500" border="0" cellpadding="0" cellspacing="0"></table>
<br><a href="#" class="vsubmit" onclick="history.back();"> Retour </a>
</center>
</div>
</body>
</html>
<?php  
Html::footer();
