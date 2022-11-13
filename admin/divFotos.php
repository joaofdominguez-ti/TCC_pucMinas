 <table class="adicionaFotos">

          <tr>
            <td>
            <h2>Fotos</h2>
              <div>
                <?php 
                  $ftVotos=explode(";", $fotos);
                  $caminhoFotos="../Imagens/noticias/";
                  
                 
                  for ($i=0; $i < count($ftVotos); $i++) { 
                    if ($ftVotos[$i] != "") {
                      echo '<img  src="'.$caminhoFotos.$ftVotos[$i].'" alt="Foto1" class="img-resposive" style="height:10em;margin-left:1vw;margin-bottom: 1%;">';
                     
                      // <img  style="margin-top:-15%;width:100%;" src="'.$caminhoFotos.$fotos.'" alt="'.$fotos.'" />
                    }
                   //
                  }
                ?>
                
              </div>
              <a href="fotos.php?id=<?php if($_GET['id']!=0){echo $_GET['id'];}else{ echo $id;}?>" style="background-color: lightcoral;color:black;border:2px solid darkred; padding: 0.2em; ">Adicionar/Remover fotos</a>
            </td>
            
          </tr>
        </table>