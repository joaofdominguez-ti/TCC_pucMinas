<?php include("../login/valida-sessao.php"); ?>﻿
<?php
include("../banco/conecta.php");


$sql="SELECT distinct cat1 from noticias WHERE  cat2 is NOT NULL;";
$categorias1 = array();

$TS  = mysqli_query($link,$sql);

   
      
      While ( $RS = mysqli_fetch_assoc($TS)) { 
        
        $categorias1[] = $RS['cat1'];
         
        
    }
   
   
$filtro=0;

if (isset($_GET['filtro1']) && isset($_GET['filtro2']) == FALSE) {

  $sql2="SELECT distinct cat2 from noticias Where cat1='".$_GET['filtro1']."' AND cat2 is NOT NULL;";
 
  $categorias2 = array();
  $filtro=1;
  

    $TS  = mysqli_query($link,$sql2);


    While ( $RS = mysqli_fetch_assoc($TS)) { 
      $categorias2[] = $RS['cat2'];
     
      
  }  

    $sqlProdutos="SELECT id,titulo,fotos,status from noticias WHERE cat1='".$_GET['filtro1']."' AND cat2 is NULL order by id DESC;";
    
    $RSProduto=mysqli_query($link,$sqlProdutos);

  
    While ( $RS = mysqli_fetch_assoc($RSProduto)) { 
      
      $idPdt[]= $RS['id'];
      
      $nomePdt[] = $RS['titulo'];
      $fotosPdt[] = $RS['fotos'];
      $statusPdt[] = $RS['status'];
      
    }
    

    
}elseif(isset($_GET['filtro2']) && isset($_GET['filtro3']) == FALSE){

    $sql3="SELECT distinct cat3 from noticias where cat1='".$_GET['filtro1']."' AND cat2='".$_GET['filtro2']."' AND cat3 is NOT NULL;";
    $categorias3 = array();
    $filtro=2;
    $TS  = mysqli_query($link,$sql3);
  
    
    While ($RS = mysqli_fetch_assoc($TS)) { 
     
      $categorias3[] = $RS['cat3'];
      
    }


    $sqlProdutos="SELECT id,titulo,fotos,status from noticias WHERE cat1='".$_GET['filtro1']."' AND cat2='".$_GET['filtro2']."' order by id DESC;";

    $RSProduto=mysqli_query($link,$sqlProdutos);

   
    While ( $RS = mysqli_fetch_assoc($RSProduto)) { 
      $idPdt[] = $RS['id'];
      $nomePdt[] = $RS['titulo'];
      $fotosPdt[] = $RS['fotos'];
      $statusPdt[] = $RS['status'];

    }
    


    $filtro=2;
    
}elseif(isset($_GET['filtro3'])){

    
    
    $sqlProdutos3="SELECT id,titulo,fotos,status from noticias WHERE cat2='".$_GET['filtro2']."' AND cat3='".$_GET['filtro3']."' order by id DESC;";
  
    $RSProduto3=mysqli_query($link,$sqlProdutos3);

    
    While ( $RS = mysqli_fetch_assoc($RSProduto3)) { 
      
      $idPdt[] = $RS['id'];
      $nomePdt[] = $RS['titulo'];
      $fotosPdt[] = $RS['fotos'];
      $statusPdt[] = $RS['status'];
    }

  

    $filtro=3;
}

    mysqli_close($link);
    
include("../includes/head.php");



 ?>





<body onload="Visibilidade();" style="background-color:#eee;"> 

<nav id="Geral">

<header>
<nav id="topo">
<img id="banner" src="../Imagens/logo.png"  align="center" alt="banner" />
</header>


<?php
  include("../menuHorizontal2.php");

?>
      
  
      
      <div id="adicionarProdutos"> 
        
          <a class='navAlterar' href="alterar.php">Inicio</a>
          <?php if (isset($_GET['filtro1'])): echo "<a class='navAlterar' href='alterar.php?filtro1=".$_GET['filtro1']."'>".$_GET['filtro1']."</a>"; ?>
          <?php endif ?>
          <?php if (isset($_GET['filtro2'])): echo "<a class='navAlterar' href='alterar.php?filtro1=".$_GET['filtro1']."&filtro2=".$_GET['filtro2']."'>".$_GET['filtro2']."</a>"; ?>
          <?php endif ?>
          <?php if (isset($_GET['filtro3'])): echo "<a class='navAlterar' href='alterar.php?filtro1=".$_GET['filtro1']."&filtro2=".$_GET['filtro2']."&filtro3=".$_GET['filtro3']."'>".$_GET['filtro3']."</a>"; ?>
          <?php endif ?>
        
        <br /><br />
        <div class="menuNavegar" style='clear:both'>
             <?php 
                      $link = "adcionarProdutos.php";  

                      if ($filtro==0) {
                        for ($i=0; $i < count($categorias1) ; $i++) { 
                        echo '<a  class="mnuAlterar" href="alterar.php?filtro1='.$categorias1[$i].'">'.$categorias1[$i].'</a>';
                      }

                      }elseif($filtro==1){
                        if (count($categorias2) == 0) {
                          echo '<a class="mnuAlterar">Não existem Itens</a>';
                        }else{
                                for ($i=0; $i < count($categorias2) ; $i++) { 
                                echo '<a class="mnuAlterar" href="alterar.php?filtro1='.$_GET['filtro1'].'&filtro2='.$categorias2[$i].'">'.$categorias2[$i].'</a>';
                                }

                                /*for dos produtos*/
                                if(isset($idPdt)){
                                  for ($i=0; $i < count($idPdt) ; $i++) { 
                                    if ($statusPdt[$i]==1) {
                                      $class="mnuProdutoD";
                                    }else{
                                      $class="mnuProduto";
                                    }
                                    var_dump($statusPdt);
                                  echo '<a class="'.$class.'" href="adcionarProdutos.php?id='.$idPdt[$i].'">'.$nomePdt[$i].'</a>'."\n";
                                
                                  }

                      
                                }
                        }

                        $link.="?filtro1=".$_GET['filtro1']; 
                      }elseif($filtro==2){
                        if (count($categorias3) ==0 && count($idPdt) ==0) {
                          echo '<a class="mnuAlterar">Não existem Itens</a>';
                          
                        }else{
                      
                          for ($i=0; $i < count($categorias3) ; $i++) { 
                          echo '<a class="mnuAlterar" href="alterar.php?filtro1='.$_GET['filtro1'].'&filtro2='.$_GET['filtro2'].'&filtro3='.$categorias3[$i].'">'.$categorias3[$i].'</a>';
                        
                          }

                          /*for dos produtos*/
                          if(isset($idPdt)){
                              for ($i=0; $i < count($idPdt) ; $i++) { 
                                if ($statusPdt[$i]==1) {
                                  $class="mnuProdutoD";
                                }else{
                                  $class="mnuProduto";
                                }
                              echo '<a class="'.$class.'" href="adcionarProdutos.php?id='.$idPdt[$i].'">'.$nomePdt[$i].'</a>'."\n";
                            
                              }
                          }

                        }

                        $link.="?filtro1=".$_GET['filtro1'].'&filtro2='.$_GET['filtro2']; 
                      }elseif($filtro==3){
                        if (count($idPdt) == 0) {
                          echo '<a class="mnuAlterar">Não existem Itens</a>';
                        }else{
                          /*for dos produtos*/
                          for ($i=0; $i < count($idPdt) ; $i++) { 
                            if ($statusPdt[$i]==1) {
                              $class="mnuProdutoD";
                            }else{
                              $class="mnuProduto";
                            }
                          echo '<a class="'.$class.'" href="adcionarProdutos.php?id='.$idPdt[$i].'">'.$nomePdt[$i].'</a>'."\n";
                         }
                          
                        }

                        $link.="?filtro1=".$_GET['filtro1'].'&filtro2='.$_GET['filtro2'].'&filtro3='.$_GET['filtro3']; 
                      } //fim da cadeia de if

                      

                   ?>
                    <!--Adicionar o novo -->
                   <a class="mnuNovo" href="<?php echo $link; ?>">Novo</a>
                
           </div>
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
    
  </script>
</body>
</html>