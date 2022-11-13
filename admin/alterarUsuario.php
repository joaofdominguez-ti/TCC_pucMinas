<?php include("../login/valida-sessao.php"); ?>﻿
<?php 
include("../banco/conecta.php");
//if(isset($_GET['id'])){$id=$_GET['id'];}else{$id=1;}

$sql="SELECT * from usuarios;";
$categorias1 = array();
//var_dump($categorias1);
$TS  = mysqli_query($link,$sql);

While ( $RS = mysqli_fetch_assoc($TS)) { 
  
  $id = $RS['id'];
  $Nome = $RS['Nome'];
  $login = $RS['login'];
  $senha = $RS['senha'];
  //var_dump($id,$Nome,$login,$senha);

}
mysqli_close($link);

include("../includes/head.php");

 ?>





<body style="background-color:#eee;"> 

<nav id="Geral" onload="Visibilidade();" >

<header>
<nav id="topo">
<img id="banner" src="../Imagens/logo.png"  align="center" alt="banner" />
</header>


<?php
	include("../menuHorizontal2.php");
  //include("../menuVertical.php");
?>
      
    
      <?php 
      if (isset($_GET['nome'])) {
        if (isset($_GET['senha']) == isset($_GET['cSenha'])) {
          
        $sql="UPDATE usuarios SET Nome = '".$_GET['nome']."',login='".$_GET['login']."',senha='".md5($_GET['senha'])."'";
        require_once("../banco/conecta.php");
        include("../banco/conecta.php");


        mysqli_query($link,$sql)
          or die('Erro ao execultar o insert, Erro:'.mysql_error().mysql_error());
        mysqli_close($link);
        echo '<div class="msg" id="msgs"  >';
        echo "Alterado Com Sucesso!</br><a href='alterarUsuario.php' style='padding:2%;'> Continuar </a>";
        echo '</div>';
        }
      }elseif(isset($_GET['rm'])){
        echo '<div class="msg" id="msgs"  >';
        echo "Foto removida!";
        echo '</div>';
        
      }

      ?>
      
      <div id="adicionarProdutos">
      
      <form method="get">
        <table class="nome">
        
          <tr>
          <td>Nome</td><td><input type="text" name="nome"  value= "<?php $Nome ?> "/></td>
        </tr>
        <tr>
          <td>login</td><td><input type="text" name="login" value="<?php  $login ?>"></td>
        </tr>
        <tr>
          <td>Senha</td><td><input type="password" name="senha"  value="<?php md5($senha) ?>" /></td>
        </tr>
        <tr>
          <td>Confirmar Senha</td><td><input type="password" name="cSenha"  value="<?php md5($senha) ?>" /></td>
        </tr>
        <td></td>
          <td><input type="submit"  id="enviar">
          
          <td><input type="reset" name="limpar" id="limpar" value="Limpar" /></td>
        </tr>
        
        </table>
      </form>
   		
        
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

 </body>
 </html>