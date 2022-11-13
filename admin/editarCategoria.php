<?php include("../login/valida-sessao.php"); ?>﻿
<?php 

include("../banco/conecta.php");
//if(isset($_GET['id'])){$id=$_GET['id'];}else{$id=1;}

$sql="SELECT distinct cat1 from noticias;";
$categorias1 = array();
$sql2="SELECT distinct cat2 from noticias;";
$categorias2 = array();
$sql3="SELECT distinct cat3 from noticias;";
$categorias3 = array();

//$categoriasMater[]="*****Nivel 1*****";
$TS  = mysqli_query($link,$sql);
//for ($i=0; $i <mysql_num_rows($RS) ; $i++) { 
  //  $categorias1[]=mysql_result($RS,$i,0);
    //$categoriasMater[]=mysql_result($RS,$i,0);
   $i = 0;
   While ($i < $RS = mysqli_fetch_assoc($TS)) { 
     $i++;
     $cat1 = $RS['cat1'];
     $categorias1[] = $cat1;

}

$TS  = mysqli_query($link,$sql2);
//for ($i=0; $i <mysql_num_rows($RS) ; $i++) { 
$i = 0;
   While ($i < $RS = mysqli_fetch_assoc($TS)) { 
     $i++;
     $cat2 = $RS['cat2'];
     $categorias2[] = $cat2;

}

$TS  = mysqli_query($link,$sql3);
//for ($i=0; $i <mysql_num_rows($RS) ; $i++) { 
$i = 0;
   While ($i < $RS = mysqli_fetch_assoc($TS)) { 
     $i++;
     $cat3 = $RS['cat3'];
     $categorias3[] = $cat3;
   }
   
include("../includes/head.php");

 ?>





<body onload="Visibilidade();" style="background-color:#eee";> 

<nav id="Geral">

<header>
<nav id="topo">
<img id="banner" src="../Imagens/logo.png"  align="center" alt="banner" />
  </header>

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
        
      }elseif(isset($_GET['nca'])){
        echo '<div class="msgN" id="msgs"  >';
        echo "Iten não encontrado!";
        echo '</div>';
        
      }elseif (isset($_GET['rst'])){
        echo '<div class="msg" id="msgs"  >';
        echo "Produto Inserido Com Sucesso";
        echo '</div>';
      }

      ?>
  
      <div id="adicionarProdutos"> 
      <h1>Selecione a categoria que deseja atualizar e depois coloque o nome e clique em enviar!</h1>
        <br />
      
      <br />
   		<form name='form1' method="get" action="alterarCategoria.php" >
       <?php 
      if (isset($_GET['nova'])) {
        echo '<div class="msg" id="msgs" style="width:50%;margin-left:-18%;" >';
        echo "<p >Categoria Alterada para \"".$_GET['nova']."\" Com Sucesso<p>";
        echo '</div>';
      }elseif(isset($_GET['no'])){
        echo '<div class="msgN" id="msgs"  >';
        echo "Categoria não cadastrada\n Favor Tente novamente!";
        echo '</div>';
        
      }

      ?>
        <table class="nome"> 
        <tr>
        <td>Categorias 1</td>
        <td>Categorias 2</td>
        <td>Categorias 3</td>
        </tr>
          <tr>
           
            <td><select name="cat1" id="categori1" onChange="mostrar(this.value,'categori2','categori3')" > 
                  
                  <option>Escolher</option>
                  <?php 
                      for ($i=0; $i < count($categorias1) ; $i++) { 
                        echo '<option value="'.$categorias1[$i].'">'.$categorias1[$i].'</option>';
                      }
                   ?>
                  
                </select>  </td>
                
            <td><select name="cat2" id="categori2" onChange="mostrar(this.value,'categori3','categori1')" > 
                  
                  <option>Escolher</option>
                  <?php 
                      for ($i=0; $i < count($categorias2) ; $i++) { 
                        echo '<option value="'.$categorias2[$i].'">'.$categorias2[$i].'</option>';
                      }
                   ?>
                  
                </select>  </td>
               
            <td><select name="cat3" id="categori3" onChange="mostrar(this.value,'categori2','categori1')" > 
                  
                  <option>Escolher</option>
                  <?php 
                      for ($i=0; $i < count($categorias3) ; $i++) { 
                        echo '<option value="'.$categorias3[$i].'">'.$categorias3[$i].'</option>';
                        var_dump($categorias1,$categorias3);
                      }
                   ?>
                  
                </select>  </td>
            
          </tr>
          <tr><td></td><td>Para</td></tr>        
          <tr>
            <td>Novo Nome</td>
            <td><input type="text" name="newcat" disabled="true"></td>
          </tr>
          

        </table>
       
        
        <table class="adicionaFotos">
          
          <tr>
            <td><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
            <td><input type="reset" name="limpar" id="limpar" value="Limpar" /></td>
          </tr>
        </table>
      </form>
        
    </div>


  </nav>
	<div class="clearfix"></div>
  <script type="text/javascript">

    function mostrar(opc,nome,nome2){

      cam=document.getElementById(nome);
      cam2=document.getElementById(nome2);
      cam3=document.getElementById('newcat');


    //if(cam.style.display=='block'){
      if (opc!="Escolher" &&  opc!="") {     
      cam.style.display= "none";
      cam2.style.display= "none";
      document.form1.newcat.disabled = 0;
      }else{
        cam.style.display= "block";
        cam2.style.display= "block";
        document.form1.newcat.disabled = 1;
      }; 
    };

    function mostrarDiv(){
       cliqueAqui.style.display= "block";

    };
    function habilitar(id){
      nid=id;
      location.href='adcionarProdutos.php?id='+nid+'&idAnt=<?php if(isset($id)){echo $id;}?>';

    };

    function Visibilidade(){
          setTimeout(function() { msgs.style.visibility= "hidden";}, 2000);

    };
    function ir(){
      
      id=document.getElementById('ir').value;
      location.href='adcionarProdutos.php?id='+id;
      
    };
    
  </script>


 </body>
 </html>
