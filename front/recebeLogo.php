<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload du Fichier</title>
</head>

<body>
<div style="width:55%; margin:auto;">
<?php
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
{

	echo "Vous avez envoyé le fichier: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
	echo "Ce fichier est du type: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
	echo "Il a été temporairement sauvegardé dans le fichier: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
	echo "Sa taille est de: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";

	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	$nome = $_FILES['arquivo']['name'];
	$extensao = strrchr($nome, '.');
	$extensao = strtolower($extensao);
	if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
	{
		$novoNome = "logo_os.png";
		$destino = '../pics/' . $novoNome; 
		if( @move_uploaded_file( $arquivo_tmp, $destino  ))
		{
			echo "Fichier enregistré avec succès sur : <strong>" . $destino . "</strong><br />";
			echo "<img src=\"" . $destino . "\" />";
			echo '<br><p> <a href="#" class="vsubmit" onclick="history.back();"> Retour </a>';
		}
		else
			echo "Erreur lors de l'enregistrement du fichier. Apparemment, vous n'êtes pas autorisé à écrire.<br />";
	}
	else
		echo "Vous ne pouvez uploader que des fichiers \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
}
else
{
	echo "Vous n'avez uploadé aucun fichier!";
	echo "<script language='javascript'>history.back()</script>";
}
?>
</div>
</body>
</html>
