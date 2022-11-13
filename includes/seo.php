<?php
/*
if(!file_exists('inc-yaslip/..php'))
{
	$statusSite = 'noindex';
	echo "<div><font size='18'>Não foi possível encontrar todos os arquivos deste site. Verifique com o suporte.</font></div>";
}
else
{
	include ("..php");
}*/
?>

<?php include('geral.php');?>
<!--
    desenvolvimento : <?=$siteCreditos?>
    
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- SEO meta tags -->
<meta name="googlebot" content="index,follow" />
<meta name="robots" content="index,follow" />

<meta name="description" content="<?php if (isset($titulo)) {echo substr($subtitulo , 0,155);}else{ echo  $nomeSite." - ".$slogan;} ?>" />
<meta name="keywords" content="<?php if (isset($titulo)) {echo $titulo;}else{ echo $nomeSite;} ?>" />
<link rel="canonical" href="<?php echo $urlCanonical;?>" />

<meta property="publisher" content="<?php echo $creditos;?>" />
<meta name="robots" content="<?php echo $statusSite;?>" />
<link rel="shortcut icon" href="<?php echo $url;?>Imagens/logo.png" />


<meta property="og:type" content="website" />
<meta property="og:locale" content="pt_BR" />
<meta property="og:region" content="Brasil" />
<meta property="og:title" content="<?php if (isset($titulo)) {echo $titulo;}else{ echo $nomeSite;} ?> - <?php echo $nomeSite?>" />
<meta property="og:author" content="<?php echo $nomeSite?>" />
<meta property="og:image" content="<?php echo $url?><?php echo $pasta?>teste.jpg" />
<meta property="og:url" content="<?php echo $urlCanonical;?>" />
<meta property="og:description" content="<?php if (isset($titulo)) {echo substr($noticia , 0,155);}else{ echo $nomeSite." - ".$slogan;}?>" />
<meta property="og:site_name" content="<?php echo $nomeSite?>" />
<meta property="fb:admins" content="<?php echo $idFacebook?>" />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->