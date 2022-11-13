<?php 

    function lerArq ($local , $tipo){
	//$arquivo="conteudos/nomeEmpresa.txt";
				$abrir= fopen($local, "r");
				$ler = fread($abrir, filesize($local));
				fclose($abrir);
			
				if($tipo==1){
				echo "value=\"".$ler."\"";
				}else if($tipo==2){
					echo "$ler";
				}elseif($tipo==5){
					//$numero=$ler;
					return $ler;

				}else{
					echo "alt=\"$ler\"";
				}
}

?>