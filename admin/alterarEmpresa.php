<?php include("../login/valida-sessao.php"); ?>﻿
<?php 
include("../banco/conecta.php");
//if(isset($_GET['id'])){$id=$_GET['id'];}else{$id=1;}

$sql="SELECT * from dadosempresa;";
$categorias1 = array();

$TS  = mysqli_query($link,$sql);

while($RS = mysqli_fetch_assoc($TS)) {

  $id   = $RS['idEmpresa'];
  $name = $RS['nomeEmpresa'];
  $tel  = $RS['telefoneEmpresa'];
  $email =  $RS['emailEmpresa'];
  $slogan =  $RS['slogan'];
  $rua =  $RS['rua'];
  //$bairro = $RS['bairro'];
  $cidade =  $RS['cidadeUF'];
  $dado8 =  $RS['dado8'];
  $dado9 = $RS['dado9'];
   
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
      if (isset($_GET['telefone'])) {
        
        $sql="UPDATE dadosempresa SET telefoneEmpresa = '".$_GET['telefone']."',emailEmpresa='".$_GET['email']."',nomeEmpresa='".$_GET['nome']."',rua='".$_GET['rua']."',cidadeUF='".$_GET['cidade']."',slogan='".$_GET['slogan']."',dado8='".$_GET['dado8']."',dado9='".$_GET['dado9']."' WHERE idEmpresa = 1;";
        require_once("../banco/conecta.php");
        include("../banco/conecta.php");


        mysqli_query($link,$sql)
          or die('Erro ao execultar o insert, Erro:'.mysql_error().mysql_error());
        mysqli_close($link);
        echo '<div class="msg" id="msgs"  >';
        echo "Alterado Com Sucesso!</br><a href='alterarempresa.php'>Continuar</a>";
        echo '</div>';
      }elseif(isset($_GET['rm'])){
        echo '<div class="msg" id="msgs"  >';
        echo "Foto removida!";
        echo '</div>';
        
      }

      ?>
      
      <div id="adicionarProdutos">
      <form method="post" action="recebeLogo.php" style="border:1px solid darkblue" enctype="multipart/form-data">

        <table class="nome">
          <tr>
          <td><img id="banner" src="../Imagens/logo.png"  align="center" alt="banner" /></td>
          <td>Alterar Logo</td><td><input  name="logo"  type="file"></td>
        </tr>
        <tr>
        <td></td><td><input type="submit" value="Enviar" style="padding:2% 2%;width:4em;" id="enviar"></td><td></td>
      </tr>
      </table>
      </form> 

      <form method="get">

        <table class="nome">
          
        <tr>
          <td>Telefone</td><td><input type="text" name="telefone" value="<?php echo $tel ?>"></td>
        </tr>
        <tr>
          <td>E-Mail</td><td><input type="text" name="email"  value="<?php echo $email ?>" /></td>
        </tr>
        <tr>
          <td>Nome</td><td><input type="text" name="nome"  value="<?php echo $name ?>" /></td>
        </tr>
        <tr>
          <td>Endereço</td><td><input type="text" name="rua"  value="<?php echo $rua ?>" /></td>
        </tr>
        <tr>
          <td>Cidade/UF</td><td><input type="text" name="cidade"  value="<?php echo $cidade ?>" /></td>
        </tr>
        <tr>
          <td>Slogan</td><td><input type="text" name="slogan"  value="<?php echo $slogan ?>" /></td>
        </tr>
        <tr>
          <td>Rede Social</td><td><input type="text" name="dado8"  value="<?php echo $dado8 ?>" /></td>
        </tr>
        <tr>
          <td>Rede Social 2</td><td><input type="text" name="dado9"  value="<?php echo $dado9 ?>" /></td>
        </tr>
        <tr>
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