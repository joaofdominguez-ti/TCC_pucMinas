<?php include("../login/valida-sessao.php"); ?>﻿
<?php 

include("../banco/conecta.php");
include("../includes/geral.php");


	
  if(isset($_GET['id'])){
      $id=$_GET['id'];
      $sql="select * from noticias WHERE id=".$id."";
  
      $RS  = mysqli_query($link,$sql);
      $dadosPdt= mysqli_fetch_array($RS,MYSQLI_ASSOC);
    

      foreach ($dadosPdt as $key => $value) {
        $$key=$value;
          
      }
  
      $caminhoFotos="../Imagens/noticias/";
      $vtFotos = explode(";",$fotos);
      $countFotos=count($vtFotos);

   

}else{
  $countFotos=0;
}

    mysqli_close($link);
    if (isset($titulo) && isset($_GET['id'])) {
     
    }else if(isset($titulo) || isset($_GET['id']) ){
       
       foreach ($_GET as $key => $value) {
      $$key=$value;
      
    }
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
      
      <br />
   		<form method="post" action="recebeFotos.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data">
        <input type="hidden" id="cout" value=0 name="cout" visibility="hiden" />
        <table class="nome"> 
          <tr>
          
            <td><?php if (isset($_GET[$id])) {echo " <h1>Fotos para: $titulo</h1>";} ?></td>
          </tr>
          
        </table>
        
       
       
        <table class="adicionaFotos" style="border:2px solid darkgreen;">

          <tr>
            <td>
            <h2>Fotos adiciondas</h2>
              <div id="adicionarFotos">
                <h4>Clique na foto para remover</h4>
                <?php 
                  $ftVotos=explode(";", $fotos);
                  
                  for ($i=0; $i < count($ftVotos); $i++) { 
                    if ($ftVotos[$i] != "") {
                      echo '<a href="rmFotos.php?id='.$_GET['id'].'&foto='.$ftVotos[$i].'"><img src="'.$caminhoFotos.$ftVotos[$i].'" alt="Apagar" tiitle="Apagar foto" class="img-resposive" style="height:5em;margin-left:1vw;margin-bottom: 1%;"></a>';
                    }
                  }

                 
                ?>
                
              </div>
                            
            </td>
          
          </tr>
          <tr>
            <td><a href="adcionarProdutos.php?id=<?php echo $_GET['id']?>" style="background-color: lightcoral;color:black;border:2px solid darkred; padding: 0.2em; ">Cancelar</a>
        <a id="botao" onClick="adicionar(document.getElementById('cout').value);" style="background-color: lightgreen;color:black;border:2px solid darkgreen; padding: 0.2em;cursor:pointer;">Adicionar</a></td>

          </tr>
        </table>
        <table class="adicionaFotos">
          <tr>
            <td><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>

          </tr>
        </table>
      </form>
        
    </div>


  </nav>
	<div class="clearfix"></div>
  <script type="text/javascript">
  

    function mostrar(opc,nome){

      cam=document.getElementById(nome);

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
      
      id=document.getElementById('ir').value;
      location.href='adcionarProdutos.php?id='+id;
      
    };
    function adicionar(cout){
      $("#adicionarFotos").append('<input  name="arquivo'+cout+'"  type="file">');

      document.getElementById('cout').value++;
    };
    
  </script>

 </body>
 </html>