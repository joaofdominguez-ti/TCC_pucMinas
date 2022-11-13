<?php include("../login/valida-sessao.php"); ?>﻿
<?php
include("../banco/conecta.php");
//if(isset($_GET['id'])){$id=$_GET['id'];}else{$id=1;}

$sql="SELECT * from produtos WHERE status=0;";
$categorias1 = array();

$RS  = mysql_query($sql);

for ($i=0; $i <mysql_num_rows($RS) ; $i++) { 

    $categorias1[]=mysql_result($RS,$i,5);
    $tempString=mysql_result($RS,$i,7);
    $categorias2[]=substr($tempString, 0,80);
    $tempId[]=mysql_result($RS, $i,0);
}

$sql2="SELECT destaque from destaques;";

$destaques  = mysql_query($sql2);


   $caminhoFotos="../Imagens/produtos/";
    //$fotos="esmerilhadeira_makita_GA430.jpg;esmerilhadeira_makita_GA430_2.jpg;esmerilhadeira_makita_GA430_3.JPG;esmerilhadeira_makita_GA430_4.JPG";
 	
  
    mysql_close();
include("../includes/head.php");
$nome='Teste';
 ?>





<body onload="Visibilidade();" style="background-color:#eee;"> 

<nav id="Geral">

<nav id="topo">
<img id="banner" src="../Imagens/logo.png"  align="center" alt="banner" />
<mobile></mobile>
<?php
	include("../menuHorizontal2.php");
  //include("../menuVertical.php");
?>
      
    
      <?php 
      if (isset($_GET['alt'])) {
        echo '<div class="msg" id="msgs"  >';
        echo "Produto Alterado Com Sucesso";
        echo '</div>';
      }elseif(isset($_GET['rm'])){
        echo '<div class="msg" id="msgs"  >';
        echo "Foto removida!";
        echo '</div>';
        
      }

      ?>
   
      <div id="adicionarProdutos"> 
      <?php           $tempProdutos="";
         
                      for ($i=0; $i < count($categorias1) ; $i++) { 
                        $tempProdutos.='<option value="'.$tempId[$i].'">'.$categorias1[$i].'</option>'."\n";
                      }
                   
              for ($i=0; $i < mysql_num_rows($destaques) ; $i++) { 

               $tempDestaque = explode(";", mysql_result($destaques, $i));
               
                if ($tempDestaque[4] == 0) {
                  
               
               echo '<div class="destaquesJustar"><form method="post" action="recebeDestaque.php" enctype="multipart/form-data">
        <table class="categorias"> 
        <tr>
        <td><input type="text" hidden  name="id" value="'.($i+1).'"></td>
        </tr>
          <tr>
            <td>Destaque '.($i+1).' </td>
            <td><select name="pdtNome'.($i+1).'"> 
                  <option>'.$tempDestaque[1].'</option>
                  '.$tempProdutos.'
                  <option>Comunicado</option>
                </select>  </td>
            
        </table>
        
        <table class="nome">
          <tr>
            <td>Frase</td>
            <td><textarea placeholder="N達o ultrapassar 80 caracteres." disabled name="descricaoPdt" >'.$tempDestaque[2].'</textarea></td>
          </tr>
          
        </table>
        
        <table class="adicionaFotos">
          <tr>
            <td>Foto</td>
            
            <td> <img src="'.$caminhoFotos.$tempDestaque[3].'" align="left" width="250" heigth="250"> '.$tempDestaque[3].' </td>
          </tr>
          
        </table>
        <table class="adicionaFotos">

          <tr>
            <td><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
            <td><input type="reset" name="limpar" id="limpar" value="Cancelar" /></td>
          </tr>
        </table>
      </form></div>'."\n";
       }else{

          echo '<div class="destaquesJustar"><form method="post" action="recebeDestaque.php" enctype="multipart/form-data">
        <table class="categorias"> 
        <tr>
        <td><input type="text" hidden  name="id" value="'.($i+1).'"></td>
        </tr>
          <tr>
            <td>Destaque '.($i+1).' </td>
            <td><select name="pdtNome'.($i+1).'"> 
                  <option>Comunicado</option>
                  '.$tempProdutos.'
                  
                </select>  </td>
            
        </table>
        
        <table class="nome">
          <tr>
            <td>Frase</td>
            <td><textarea placeholder="N達o ultrapassar 80 caracteres." name="descricaoPdt" >'.$tempDestaque[1].'</textarea></td>
          </tr>
          <tr>
          <td>Comunicado</td>
            <td><textarea  placeholder="Digite aqui o texto principal" name="Comunicado" >'.$tempDestaque[2].'</textarea></td>
          </tr>        
        </table>
        <table class="adicionaFotos">
          <tr>
            <td>Foto Atual</td>
            
            <td> <img src="'.$caminhoFotos.$tempDestaque[3].'" align="left" width="100" heigth="100"> <input type="checkbox" checked name="alterarFoto">Manter Atual </td>
            </tr>
            <tr>
            <td>Selecione uma foto</td>
            
            <td> <input type="file" name="fotoComu"/> </td>
          </tr>
          
        </table>
        <table class="adicionaFotos">

          <tr>
            <td><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
            <td><input type="reset" name="limpar" id="limpar" value="Cancelar" /></td>
          </tr>
        </table>
      </form></div>'."\n";
       }
              }
              
            ?>
   		
        
    </div>


  </nav>
	<div class="clearfix"></div>
  <script type="text/javascript">
    function Visibilidade(){
          setTimeout(function() { msgs.style.visibility= "hidden";}, 2500);

    };
    function ir(){
      
      id=document.getElementById('ir').value;
      location.href='adcionarProdutos.php?id='+id;
      
    };
    function mostrar(opc,nome){
      cam=document.getElementById(nome);

    //if(cam.style.display=='block'){
      if (opc=="Nova") {     
      cam.style.display= "block";
      }else{
        cam.style.display= "none";
      }; 
    }
  </script>
<?php;
	include("../rodape.php");
 ?>
