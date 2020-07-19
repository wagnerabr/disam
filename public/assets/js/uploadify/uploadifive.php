<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
include 'wideimage/WideImage.php';

if($_POST['modulo'] == 'categoria') {
	$folder = '../../../upload/categorias';
	$caminho_original = $folder.'/original/';	
	$recorte_w = 226;
	$recorte_h = 222;
	$resize = false; 
} elseif ($_POST['modulo'] == 'ambiente') {
	$folder = '../../../upload/ambientes';
	$caminho_original = $folder.'/original/';	
	$recorte_w = 600;
	$recorte_h = null;
	$resize = true;
} elseif ($_POST['modulo'] == 'banner') {
	$folder = '../../../upload/banners';
	$caminho_original = $folder.'/original/';	
	$recorte_w = 480;
	$recorte_h = 320;
	$resize = false; 
} elseif ($_POST['modulo'] == 'banner-mobile') {
	$folder = '../../../upload/banners-mobile';
	$caminho_original = $folder.'/original/';	
	$recorte_w = 226;
	$recorte_h = 222;
	$resize = false; 
} elseif ($_POST['modulo'] == 'post') {
	$folder = '../../../upload/blog';
	$caminho_original = $folder.'/original/';	
	$recorte_w = 800;
	$recorte_h = 800;
	$resize = false; 
} elseif ($_POST['modulo'] == 'projeto') {
	$folder = '../../../upload/projetos';
	$caminho_original = $folder.'/original/';	
	// $recorte_w = 1100;
	// $recorte_h = 300;
	$recorte_w = 600;
	$recorte_h = null;
	$resize = true;
} else {	
	exit;
}

$nome = $_FILES['Filedata']['name'];
$nome_explode = explode(".", $nome);
$novo_nome = $nome_explode[0]."-".date("d-m-Y(H-i-s).").$nome_explode[1];
//$nome = $_FILES['Filedata']['name'];
$tempFile = $_FILES['Filedata']['tmp_name'];

move_uploaded_file($tempFile,$caminho_original.$novo_nome);

$caminho_media = $folder."/media/";
$caminho_thumb = $folder."/thumb/";

$image = WideImage::load($caminho_original . $novo_nome);
//$image->resize(480, 320, 'inside','any')->saveToFile($caminho_media . $novo_nome);

if ($resize) {
	$image->resize($recorte_w, $recorte_h, 'inside','any')->saveToFile($caminho_media . $novo_nome);
} else {
	$image->crop('center', 'center', $recorte_w, $recorte_h)->saveToFile($caminho_media . $novo_nome);
}
//$image->crop('center', 'center', $recorte_w, $recorte_h)->saveToFile($caminho_media . $novo_nome);
$image->resize(100, null, 'fill')->saveToFile($caminho_thumb . $novo_nome);

echo $novo_nome;

exit;

?>