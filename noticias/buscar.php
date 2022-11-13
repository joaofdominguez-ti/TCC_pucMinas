<?php
include("../banco/conecta.php");
$caminhoUrl="";


   $sql="SELECT titulo,noticia,subtitulo,fotos,id from noticias WHERE titulo LIKE '%".$_GET['busca']."%' AND status=0 order By titulo;";


 $caminhoFotos="../Imagens/noticias/";
 $htmlPdt="";
 $TS  = mysqli_query($link,$sql);



  function trataString($entrada){
    $rtn=preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $entrada ) );

    return $rtn;
  }

   
    $i = 0;
    While ($i < $RS = mysqli_fetch_assoc($TS)) { 

      $i++;
      $id   = $RS['id'];
	    $titulo   = $RS['titulo'];
      $subtitulo   = $RS['subtitulo'];
      $noticia  = $RS['noticia'];
      
	    $fotos1    = $RS['fotos'];
    

     $vtFotos = $fotos1;

     $fotos=$vtFotos[0];
       if ($vtFotos[0]=="") {
        $fotos=$vtFotos[1];

       }else{
        $fotos=$vtFotos[0];
       }

      $produto= $titulo;
      $produto=str_replace(".", "", $produto);
      $produto=str_replace("?", "", $produto);
   
      $htmlPdt.='
      <div class="col-md-6">
          <div class="row" style="padding:2%;" >
              <a href="de.php?id='.$id.'" >
              <div class="col-md-12" style="text-overflow: ellipsis;padding:1%;"><p class="text-left">'.substr($titulo,0,40).'...'.'</p></div>
              <div class="col-md-12"style="height:15em;overflow:hidden;">
              <img  src="'.$caminhoFotos.$fotos1.'" style="margin-top:-25%;width:100%;">
              </div>
              </a>
          </div>
      </div>

       

        
       ';


   
   }
   
    
    mysqli_close($link);
    
include("../includes/head.php");

 ?>


<body> 


<nav id="Geral">
<header>
    <nav id="topo">
      <img id="banner" src="../Imagens/logo.png"/>
      <h1><?php echo $nomeSite;?></h1>
      </header>


<?php
	include("../menuHorizontal.php");
?>

      <?php 
      	include("../menuVertical.php");
      ?>
    
      <div id="linhadeprodutos"> 
    
      
       <div class="row">
          <?php echo $htmlPdt; ?>
       </div>

       <div class="clearfix"></div>
      
  </div>

<div class="clearfix"></div>



  </nav>
  
 
	<div class="clearfix"></div>
  
  
  <footer>
<?php
	include("../rodape.php");
 ?>
 </footer
 
