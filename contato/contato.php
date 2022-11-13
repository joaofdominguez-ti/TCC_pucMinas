<?php 
include ("../includes/head.php");
include ("../banco/conecta.php");

$sql="SELECT * FROM dadosempresa;";
$result= mysqli_query($link,$sql);


?>

<body onload="Visibilidade();">

<nav id="Geral">

<header>
<nav id="topo">
<img id="banner" src="../Imagens/logo.png" />

<h1><?php echo $nomeSite;?></h1>

</header>

<?php

	include("../menuHorizontal.php");

?>
     
    
      <div id="Contato"> 
      <?php 
      if (isset($_GET['enviado'])) {
        echo '<div class="msg" id="msgs"  >';
        echo "Email Enviado, <br /> responderemos o mais breve possivel!";
        echo '</div>';
      }elseif(isset($_GET['cap'])){
        echo '<div class="msgN" id="msgs"  >';
        echo "Você não preencheu a reCaptcha";
        echo '</div>';
        
      }elseif (isset($_GET['email'])){
        echo '<div class="msg" id="msgs"  >';
        echo "Email não enviado, <br />Nossos telefones estão funcionando!";
        echo '</div>';
      }

      ?>


      <div id="CTemail">
      <p id="emailtext"> Preencha o formulário abaixo </p>
       <form id="formulario" name="formulario" method="post" action="index.php">
          <table>
            <tr>
              <td>Nome:</td>
              <td><input name="nome" type="text" id="nome" size="35" placeholder="Digite seu nome"/></td>
            </tr>
            <tr>
              <td>Email:</td> 
              <td><input name="email" type="text" id="email" size="35" placeholder="exemplo@sabrafer.com.br" /></td>
            </tr>
            <tr>
              <td>Telefone:</td>
              <td><input name="fone" type="text" id="fone" size="35" placeholder="(00) 00000-0000"/></td>
            </tr>
            <tr>
              
              <td>Assunto:</td>
              <td><input name="assunto" type="text" id="assunto" size="35" <?php if (isset($_GET['assunto'])):echo'value ="'.$_GET['assunto'].'"' ?>
             
           <?php endif ?> placeholder="Digite o Assunto" /></td>
            </tr>
            <tr>
              <td>Mensagem:<br /></td>
              <td><textarea name="comentario" cols="30" rows="5" id="comentario"   placeholder="Digite sua mensagem aqui" onblur="MM_validateForm('nome','','R');return document.MM_returnValue"><?php if (isset($_GET['assunto'])):echo'Quero saber mais sobre o produto: '.$_GET['assunto'].', (digite mais alguma coisa, isso ira nos ajudar a tirar todas suas duvidas de uma forma rápida!!!)' ?>
             
           <?php endif ?> </textarea></td>
            </tr>
            <tr>
             
            </tr>
            <tr>
           <td></td><td><input type="submit" name="enviar" id="enviar" value="Enviar" />
           <input type="reset" name="limpar" id="limpar" value="Limpar" /></td>
         </tr>
       </table>
       
       </form>
    
       <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

      </div>
      
  
      </div>
        
      </div>
 
</nav>

	<div class="clearfix"></div>
  <script type="text/javascript">



  function Visibilidade(){
          setTimeout(function() { msgs.style.visibility= "hidden";}, 2000);

    };
    </script>
  
  <footer>
  <?php 
  include("../rodape.php");
  ?>
  </footer>