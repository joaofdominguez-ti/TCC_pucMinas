<?php
      include("../banco/conecta.php");
      $sql="SELECT emailEmpresa from dadosempresa;";
      $RS  = mysqli_query($link,$sql);
      mysqli_close($link);
      $dominio="sabrafer.com.br";
      $icone="http://sabrafer.com.br/Imagens/menuIcon.png";
      $banner="http://sabrafer.com.br/Imagens/banner2.png";
      // busca a biblioteca recaptcha
      require_once "recaptchalib.php";


      // sua chave secreta
        $secret = "6LcIkhkTAAAAAJS7FN1JNQmVyTbR7dw1wDiBP0MU";
         
        // resposta vazia
        $response = null;
         
        // verifique a chave secreta
        $reCaptcha = new ReCaptcha($secret);

        // se submetido, verifique a resposta
        if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );        }


      if ($response != null && $response->success) {
       
                $data                   = date("d/m/Y - H:i");
                $nome                   = $_POST['nome'];
                $email                  = $_POST['email'];
                $info                   = $_POST['comentario'];


        $resp='Olá '.$_POST['nome'].",<br />";
        $resp.="Recebemos sua duvida sobre: ".$_POST['assunto'];
        $html='
         <html>
          <head>
          <title>HTML email</title>
        </head>
        <body style="background-color:#eee">
        <div style="border:1px solid black; width:80%;margin-left:10%;overFlow:auto">
        
        <div style="color:yellow;text-align:center;background-color:black; height:1em; padding:1%;"><img style="float:left;width:5%;height:100%;" src="'.$icone.'" alt="logo"><label style="font-size:1.5em;font-style:bold;">Formulario Site : '.$data.'</label></div>
        <table style="font-size:1.25em">
          <tr>
          <td style="color:red; border-bottom:1px dashed black; font-size:1.25em;">Dados de Contato</td><td></td>
          </tr>
          <tr>
          <td>Nome:</td><td>'.$_POST['nome'].'</td>
          <tr>
          <td>E-mail:</td><td><a href="mailto:'.strtolower($_POST['email']).'?subject=Re:'.$_POST['assunto'].'-Contato Sabrafer&body='.$resp.'">'.strtolower($_POST['email']).'</a></td>
          </tr>
          <tr>
          <td>Telefone:</td><td>'.$_POST['fone'].'</td>
          </tr>
        </table>
        <hr style="background-color:black; height:1em;" />
        <table style="font-size:1.5em;font-style:justify; border-bottom:1px solid black">
          <tr>
          <td style="border-bottom:1px dashed black">Assunto: '.$_POST['assunto'].'</td>
          </tr>
          <tr>
          <td style="border-bottom:1px dashed blue">Mensagem:</td>
          <tr>
          <td>'.nl2br($_POST['comentario']).'</td>
          </tr>
        </table>
        <span style="font-size:1.1em;color:red;float:right">Esse é um formulario enviado pelo website.<br /> para responder clique no e-mail:<a href="mailto:'.strtolower($_POST['email']).'">'.strtolower($_POST['email']).'</a>.</span>
        </div>

        </body>
        </html>';

        //echo "destinatário->".mysql_result($RS, 0,0);
/*

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: ".$_POST['nome']." ".$_POST['email']."r\n";
                $headers .= "X-Mailer: PHP/" . phpversion ();
                $headers .= "Return-Path: ".strtolower($_POST['email'])."\r\n"; // return-path
                $headers = 'From: formulario@'.$dominio;// <- O e-mail que está configurado no .htaccess
*/

                // Função HTML :)
                

              $para           = "".mysql_result($RS, 0,0);
              $assunto        = "Contato Site :: ".$_POST['assunto'];
              /*$header         = "
              <b>Nome:</b>    $nome ($empresa),<br>
              <b>Email:</b>   $email<br>
              <br><br>
              <b>Informações:</b><br>
              $info
              <br><br>
                ==============================================<br>
                $data <br>
                ==============================================<br>
                ";
*/
                  

                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html;charset=UTF-8\r\n";
                $headers .= "From: ".$_POST['nome']." <".$_POST['email'].">\r\n";

                // Envia para você
                


                if (/*mail(''.mysql_result($RS, 0,0), 'Contato Site - '.$_POST['assunto'], $html, $headers)*/mail($para, $assunto, $html, $headers)) {
                  header("Location:contato.php?enviado");
                  }else{ 
                  header("Location:contato.php?email");

                    };



              } else { 
        header("Location:contato.php?cap");
        }
    
 
    ?>