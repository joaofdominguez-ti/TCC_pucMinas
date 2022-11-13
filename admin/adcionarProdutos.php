<?php include("../login/valida-sessao.php"); ?>﻿
<?php 

include("../banco/conecta.php");
include("../includes/geral.php");



$sql="SELECT distinct cat1 from noticias;";
$categorias1 = array();
$sql2="SELECT distinct cat2 from noticias;";
$categorias2 = array();
$sql3="SELECT distinct cat3 from noticias;";
$categorias3 = array();

$TS  = mysqli_query($link,$sql);

$i = 0;
While ($i < $RS = mysqli_fetch_assoc($TS)) { 
  $i++;
  $cat1 = $RS['cat1'];
  $categorias1[] = $cat1;
}

        
$TS  = mysqli_query($link,$sql2);

$i = 0;
While ($i < $RS = mysqli_fetch_assoc($TS)) { 
  $i++;
  $cat2 = $RS['cat2'];
  $categorias2[] = $cat2;
}

$TS  = mysqli_query($link,$sql3);
$i = 0;
While ($i < $RS = mysqli_fetch_assoc($TS)) { 
  $i++;
  $cat3 = $RS['cat3'];
  $categorias3[] = $cat3;
}


  if(isset($_GET['id'])){
    if ($_GET['id'] !=0) {
      $id=$_GET['id'];
      $sql="select * from noticias WHERE id=".$id.";";
      $TS  = mysqli_query($link,$sql);
      
      $dadosPdt= mysqli_fetch_array($TS,MYSQLI_ASSOC);
      


foreach ($dadosPdt as $key => $value) {
  $$key=$value;

     
  }
      $caminhoFotos="../Imagens/produtos/";
      $vtFotos = explode(";",$fotos);
      $countFotos=count($vtFotos);

      
    }else{
      $sql1="SELECT * FROM `noticias` order by id desc  LIMIT 1";
      $RS  = mysqli_query($link,$sql1);
      $dadosPdt= mysqli_fetch_array($RS,MYSQLI_ASSOC);
      

      foreach ($dadosPdt as $key => $value) {
      $$key=$value;
      
      }
      $caminhoFotos="../Imagens/produtos/";
      $vtFotos = explode(";",$fotos);
      $countFotos=count($vtFotos);
      
    }

}else{
  $countFotos=0;
}

    mysqli_close($link);
    
    if (isset($titulo) && isset($_GET['id'])) {
      
    }
    else if(isset($titulo) || isset($_GET['id']) ){
      $link="Location:adcionarProdutos.php?id=".$_GET['idAnt']."&nca";
      header($link);
      
        
   

    }
    else {
    
    }

include("../includes/head.php");


 ?>





<body onload="Visibilidade();" style="background-color:#eee";> 

<nav id="Geral">

<header>
<nav id="topo">
<img id="banner" src="../Imagens/logo.png"/>
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
        <div id="cliqueAqui"> Digite a ID do item desejado e Clique Aqui!!</div>
        <br />
        
       <?php 
        if (isset($_GET['id'])) {
          $id=$_GET['id'];
          $ant= $id-1;
         $prox= $id+1;
         
          echo '<div class="navegar"><input id="btnAnt" ';if($id==1){ echo "disabled";} echo ' type="button" onclick="location.href=\'adcionarProdutos.php?id='.$ant.'\'" value="<<"> 
          <input  id="ir" onclick="mostrarDiv();" onChange="habilitar(this.value)" type="text" placeholder="'.$id.'">
          
          <input id="btnIr" type="button" onclick="ir();" value="Ir">
          <input  type="button" onclick="location.href=\'adcionarProdutos.php?id='.$prox.'&idAnt='.$id.'\'" value=">>"> </div>';

        }
      ?>
      <br />
   		<form method="post" <?php if (isset($_GET['id'])) {echo 'action="alteraDados.php?id='.$id.'"';}else {echo 'action="recebeDados.php"';} ?> enctype="multipart/form-data">
        <table class="categorias"> 
          <tr>
            <td>Nivel 1 </td>
            <td><select name="cat1" onChange="mostrar(this.value,'cat1')" > 
                  <option <?php if(isset($_GET['filtro1'])){echo "value='".$_GET['filtro1']."'";} ?> ><?php if (isset($_GET['id']) && $cat1!="") {echo $cat1;}elseif(isset($_GET['filtro1'])){echo "".$_GET['filtro1'];}else{echo "Selecione";} ?></option>
                  <option>Selecione</option>
                  <?php 
                      for ($i=0; $i < count($categorias1) ; $i++) { 
                        echo '<option value="'.$categorias1[$i].'">'.$categorias1[$i].'</option>';
                      }
                   ?>
                   <option>Nova</option>
                </select>  </td>
            <td>Nivel 2 </td>
            <td><select name="cat2" onChange="mostrar(this.value,'cat2');"> 
                  <option <?php if(isset($_GET['filtro2'])){echo "value='".$_GET['filtro2']."'";;} ?> ><?php if (isset($_GET['id']) && $cat2!="") {echo $cat2;}elseif(isset($_GET['filtro2'])){echo "".$_GET['filtro2'];}else{echo "Selecione";} ?></option>
                  <option>Selecione</option>
                  <?php 
                      for ($i=0; $i < count($categorias2) ; $i++) { 
                        echo '<option value="'.$categorias2[$i].'">'.$categorias2[$i].'</option>';
                      }
                   ?>
                   <option>Nova</option>
                </select>  </td>
            <td>Nivel 3 </td>
            <td><select name="cat3" onChange="mostrar(this.value,'cat3');"> 
                  <option <?php if(isset($_GET['filtro3'])){echo "value='".$_GET['filtro3']."'";} ?> ><?php if (isset($_GET['id']) && $cat3!="") {echo $cat3;}elseif(isset($_GET['filtro3'])){echo "".$_GET['filtro3'];}else{echo "Selecione";} ?></option>
                  <option>Selecione</option>
                  <?php 
                      for ($i=0; $i < count($categorias3) ; $i++) { 
                        echo '<option value="'.$categorias3[$i].'">'.$categorias3[$i].'</option>';
                      }
                   ?>
                   <option>Nova</option>
                </select>  </td>
          </tr>
          <tr>
          <td></td>
          <td><input type="text" name="ncat1" id="cat1" ></td>
          <td></td>
          <td><input type="text" name="ncat2" id="cat2" ></td>
          <td></td>
          <td><input type="text" name="ncat3" id="cat3" ></td>
          </tr>
        </table>
        <table class="nome">
          <tr>
            <td>Nome</td>
            <td><input type="text" name="titulo" <?php if (isset($_GET['id'])) {echo " value='$titulo'";} ?>></td>
          </tr>
          <tr>
            <td>Valor</td>
            <td><input type="text" name="subtitulo"<?php if (isset($_GET['id'])) {echo " value='$subtitulo'";} ?>></td>
          </tr>
          <tr>
            <td>Descricao</td>
            <td><textarea  name="noticia" ><?php if (isset($_GET['id'])) {echo $noticia;} ?></textarea></td>
          </tr>
         
        </table>
        
       
        <table class="opcoesPdt">
          <tr>
            <td><label class="ativar"><input type="checkbox"  name="status" <?php if (isset($status) && $status==0) {
          echo "checked";
        } ?> />Ativar Produto </label></td>
            <td><label class="ativar"><input type="checkbox" hidden name="chkPreco" <?php if (isset($precoPdt) && $precoPdt!=0) {
          echo "checked";
        } ?> /> </label> </td>
        </tr>
        </table>
        <?php 
          if (isset($_GET['id'])) {
            include "divFotos.php";
          }
        ?>
        
        <table class="adicionaFotos">
          <tr>
            <td><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
            <td><input type="reset" name="limpar" id="limpar" value="Limpar" /></td>
            <!--<td><input type="delet" name="deletar" id="deletar" value="Apagar" /></td>-->
          </tr>
        </table>
      </form>
        
    </div>


  </nav>
	<div class="clearfix"></div>
  <script type="text/javascript">

    function mostrar(opc,nome){

      cam=document.getElementById(nome);

    //if(cam.style.display=='block'){
      if (opc=="Nova") {     
      cam.style.display= "block";
      }else{
        cam.style.display= "none";
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
      
      id = document.getElementById('ir').value;
      location.href='adcionarProdutos.php?id='+id;
      
    };
    
  </script>

 </body>
 </html>