<?php

include("banco/conecta.php");
include("includes/geral.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else
{$id=1;}

function trataString($entrada){
            $rtn=preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $entrada ) );

            return $rtn;
          }

		 // if(isset($_GET['id']))
		//  {
		//	$id=$_GET['id'];
			
$sql="select id,titulo,fotos from noticias where status=0 and home=0 order by id DESC limit 12;";
$TS  = mysqli_query($link,$sql) or die(mysql_error());
$caminhoFotos="Imagens/noticias/";
$principal="";
$subPrincipal="";


    $i = 0;
	while($i < $RS = mysqli_fetch_assoc($TS)) {
		$i++;
		$id   = $RS['id'];
	    $titulo   = $RS['titulo'];
	    $fotos    = $RS['fotos'];
		$vtFotos = explode(";",$fotos);
		$fotos1 = $vtFotos[0];
     
		
		if ($vtFotos[0] =="") {
			$fotos1=$vtFotos[1];
		   
		  
			  
		   }else{
			$fotos1=$vtFotos[0];
		   }
	
  		if ($i < 4 ) {
  			
  			$principal.= '<div class="col-md-4">
					<div class="row" style="padding:2%; border:1px solid #6811ba; margin:1%;">
					<a href="noticias/de.php?id='.$id.'">
					  <div class="col-md-12" style="text-overflow: ellipsis;padding:1%;"><h2>'.substr($titulo,0,40).'...</h2></div>
					  <div class="col-md-12" style="height:30em;overflow:hidden;"><img  style="style="margin-top:-85%;" src="'.$caminhoFotos.$fotos1.'" alt="'.$titulo.'" /></div>
					</div>
					</a>
  			</div>';
  		}else 
		{

  			$subPrincipal.='
  			<div class="col-xs-5 col-sm-2" style="color:darkblue;padding:2%; border:1px solid #6811ba; margin-left:2.9%;">
  				<a href="noticias/de.php?id='.$id.'">
					<div class="row">
						  <div class="col-md-12" style="text-overflow: ellipsis;padding:1%;">
						  	<h3>'.substr($titulo,0,40).'...</h3>
						  </div>
						 <div class="col-md-12" style="height:8em;overflow:hidden;">
						  	<img  style="margin-top:-25%;width:100%;" src="'.$caminhoFotos.$fotos1.'" alt="'.$titulo.'"  title="'.$titulo.'"/>
						  </div>
					</div>  
				</a>
			
  			</div>';
  		}
     


	}

   
?>

<!DOCTYPE html>
<html lang="pt-br">
	
<?php	
include("head.php");
?>

<body>


<nav id="Geral">


<header>
<nav id="topo">
		<img src="Imagens/logo.png"  />
		<h1><?php echo $nomeSite;?></h1>
		</header>

	
    <nav id="navigation">	
  <ul>
				<li><a href="index.php" title="Home">HOME		</a></li>
				<li><a href="noticias/setor.php" title="NOTICIAS">PRODUTOS		</a></li>
				<li><a href="contato/contato.php" title="Contato">CONTATO		</a></li>
				<li><a href="login/login.php" title="Login">LOGIN  </a></li>
				<li><form action="noticias/buscar.php" method="get">		
				<input  name="busca"  type="text" placeholder="digite aqui"><input type="submit" value="Buscar">
				</form></li>
				
			</ul>
	  </nav>
      </nav>
      
    
      <div id="HOME"> 
		
      	<div class="row">
  <?php echo $principal;?>
</div>
	<div class="row">
    <?php echo $subPrincipal;?>
</div>
		</div>
	

</body>

<footer>
<?php 
  	include "rodape.php";
  ?>
  </footer>
   
</html>
