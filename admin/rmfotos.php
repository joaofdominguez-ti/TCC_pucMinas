<?php  

	

  if(isset($_GET['id'])){
  	  include("../banco/conecta.php");
	  $foto= $_GET['foto'];
	  $id= $_GET['id'];
   

      $sql="select fotos from noticias WHERE id=".$id.";";
      $RS  = mysqli_query($link,$sql);
      $dadosPdt= mysqli_fetch_array($RS,MYSQLI_ASSOC);
      

      foreach ($dadosPdt as $key => $value) {
        $$key=$value;
         // echo " $key :  $value<br />";
      }

      

        $sql="SELECT fotos from noticias WHERE  id='".$_GET['id']."'";
        
        $fotosEd = array();
        $TS  = mysqli_query($link,$sql);
                //$fotosEd[]=mysqli_result($RS,0,0);
                While ( $RS = mysqli_fetch_assoc($TS)) { 
                  $fotos = $RS['fotos'];
                  $fotosEd[]= $fotos;
            }
        mysqli_close($link);
        $strFotos=explode(";", $fotosEd[0]);
       

        for ($i=0; $i < count($strFotos) ; $i++) { 
          if ($strFotos[$i]==$_GET['foto']) {
            unset($strFotos[$i]);
            break;
          }
        }

        $fotosPdt=implode(";", $strFotos);
        var_dump($fotosPdt);
        

      $caminhoFotos="../Imagens/noticias/";
      /*$vtFotos = explode(";",$fotosPdt);
      $countFotos=count($vtFotos);

      $fotosPdt=str_replace($foto.";", "", $fotosPdt);
      $fotosPdt=str_replace(";".$foto, "", $fotosPdt);
      $fotosPdt=str_replace($foto, "", $fotosPdt);
      */

      /*if ($fotosPdt == "") {
        $fotosPdt="semimg.png";
      }
*/

      include("../banco/conecta.php");
      var_dump($fotospdt);
      $sql="UPDATE noticias SET fotos = '".$fotosPdt."'  WHERE id = ".$id.";";
      unlink($caminhoFotos.$foto)
        or die('Erro ao deletar a foto!');
   	  mysqli_query($link,$sql)
			or die('Erro ao execultar o Update, Erro:'.mysqli_errno().mysqli_error());
		mysqli_close();
			
			/*$arquivo = $caminhoFotos.$foto;
      if ($foto!="semimg.png") {
          
      }*/
			
			
			header('Location:fotos.php?id='.$id.'&rm=yes');
					
					
			}else{
  header('Location:adcionarProdutos.php');
}
?>