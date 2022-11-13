<?php
include("../banco/conecta.php");
include("../includes/geral.php");
if(isset($_GET['id'])){$id=$_GET['id'];}else{$id=1;}

 $h1 = "";

$sql="select * from noticias WHERE id=".$id.";";
//var_dump($sql);
$RS  = mysqli_query($link,$sql);
$dadosPdt= mysqli_fetch_array($RS);
//var_dump($dadosPdt);
foreach ($dadosPdt as $key => $value) {
  $$key=$value;
		//echo " $key :  $value<br />";
}

$sql2="select titulo,fotos,id from noticias ORDER BY RAND() limit 4;";

$relacionados = mysqli_query($link,$sql2);


$caminhoFotos="../Imagens/noticias/";

$vtFotos = explode(";",$fotos);
$countFotos=count($vtFotos);
if (count($dadosPdt)<=0) {
  header("Location:setor.php");
}
mysqli_close($link);
include("../includes/head.php");
?>


<body onload="MM_preloadImages('<?php for ($i=0;$i<$countFotos;$i++){ echo"$caminhoFotos"."$vtFotos[$i]"; if($i<$countFotos-1){echo "','";}} ?>')"> 

  <nav id="Geral">

  <header>
    <nav id="topo">
      <img id="banner" src="../Imagens/logo.png" title="banner noticia" alt="banner" />
      <h1><?php echo $nomeSite;?></h1>
</header>
      <?php
      include("../menuHorizontal.php");
      ?>
      <?php 
      include("../menuVertical.php");
      ?>

      
      <div id="linhadeprodutos"> 
       
        <h1><strong><?php echo $titulo;?></strong> </h1>
         <h5><em><?php echo $subtitulo?></em></h5>
         
        <div  class="teste" id="fotos_produtos" >
        	
    <div id="TBPG">
      <?php   
      $galeria2="";
      for ($i=0; $i < $countFotos; $i++) { 
        if ($vtFotos[$i]!="") {
        $galeria2.='<a href="javascript:;" onclick="MM_swapImage'."('fotoPrincipal','','".$caminhoFotos.$vtFotos[$i]."',2)".'"><img src="'.$caminhoFotos.$vtFotos[$i].'" alt="'.str_replace(" ", " - ", $titulo)."-".$i.'" id="'.str_replace(" ", " - ", $titulo)."-".$i.'"  title="'.str_replace(" ", " - ", $titulo)."-".$i.'" width="100" height="90" border="0" /> </a>'."\n";
        }

      }

      ?>
      <div id="fotos1"><?php if ($countFotos>1) {echo $galeria2; }?></div>
      <div id="fotos2"><img src='<?php if($vtFotos[0] !="") {echo $caminhoFotos.$vtFotos[0];}else{echo $caminhoFotos.$vtFotos[1];}?>' title ="<?php echo $titulo; ?>" alt="<?php echo $titulo; ?>" id="fotoPrincipal" class="fotoTeste" onload="MM_effectAppearFade(this, 1500, 0, 100, false);MM_effectAppearFade(this, 1500, 0, 100, false)" /></div>
    </div>

    <?php 
    echo '<ul class="slider">';
    $html="";
    for ($i=0; $i < $countFotos; $i++) { 
      if ($vtFotos[$i]!="") {
         $html.='<li><img src="'.$caminhoFotos.$vtFotos[$i].'" title="'.$titulo." ".$i.'" alt="'.$titulo." ".$i.'"/></li>'."\n";

      }
   }
   echo $html;				
   echo'</ul>';
   

   ?>
   
    <p><?php echo $noticia ;?></p>
    
  
 </div>
 

 
  

  <div class="clearfix"></div>
  
 


  </nav>    

</nav>

<div class="clearfix"></div>


  </div>



</body>


</html>

  
<footer>
<?php 
  	include "../rodape.php";
  ?>
  </footer>


