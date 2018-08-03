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
ÿ
