<!--Menu Vertical-->

<?php include("banco/conecta.php");
	//seleciona categorias nivel 1
	$sql="select distinct cat1 from noticias;";
	$TS = mysqli_query($link,$sql);
	
	$menu="";
	
	

//percorre o resultado das categorias nivel 1 buscando categorias nivel 2 e 3, criando o menu e assim vai rs

while ( $RS = mysqli_fetch_assoc($TS)) {
	
	$cat1 = $RS['cat1'];
  
	
	$sql="SELECT distinct cat2 from noticias WHERE cat1='".$cat1."' and cat2!='NULL';";

	$result  = mysqli_query($link,$sql);
	$resultado = mysqli_num_rows($result);
	

	if ($resultado > 0) {

		$menu.='<li><a href="setor.php?cat1='.$cat1.'">'.$cat1.'</a> '."\n<ul>\n";

					
			while (  $RS = mysqli_fetch_assoc($result)) {
				
				
				$cat2 = $RS['cat2'];
				

			$sql2= "SELECT distinct cat3 from noticias WHERE cat2='".$cat2."' and cat3!='NULL';";
			$result2  = mysqli_query($link,$sql2);
			$resultado2 = mysqli_num_rows($result2);
			
			
			if ($resultado2 > 0) {

				
				$menu.="<li> <a href='setor.php?cat1=".$cat1."&cat2=".$cat2."'> ".$cat2." </a>\n<ul>\n";

				
					
					while (  $RS = mysqli_fetch_assoc($result2)) {
						
						
						$cat3 = $RS['cat3'];
					

					
					$menu.="<li><a href='setor.php?cat1=".$cat1."&cat2=".$cat2."&cat3=".$cat3."'> ".$cat3." </a></li>";
					$menu.="";
				}
				$menu.="</ul>\n</li>";

			}else{
				$menu.="<li> <a href='setor.php?cat1=".$cat1."&cat2=".$cat2."'> ".$cat2." </a></li>\n";
			}
		}
		$menu.="</ul>\n</li>";
	
	}else{
		
		$menu.='<li><a href="../setor.php?cat1='.$value.'">'.$value.'</a> '."</li>\n";
	}
		


}

?>

<ul class="nav" id="nav">
		<?php echo $menu; ?>
		
	</ul>

      <!-- Fim menu vertical-->