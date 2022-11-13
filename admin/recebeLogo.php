<?php 
if (isset($_FILES['logo'])){
            
	var_dump($_FILES);
			$dir = "../Imagens";
			$arq =$_FILES['logo'] ['name'];
			$strFotos[]=$arq;
			var_dump($strFotos);
			$arq_temp = $_FILES['logo']['tmp_name'];
			var_dump($_FILES);
			
			
			move_uploaded_file($arq_temp, "$dir/logo.png");
         	header('Location:alterarEmpresa.php?yes');
			 var_dump($_FILES);
        }else{
        	header('Location:alterarEmpresa.php?no');


        }

        ?>

		