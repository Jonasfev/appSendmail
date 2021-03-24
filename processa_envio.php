<?php

require "./bibliotecas/phpMailer/Exception.php";
require "./bibliotecas/phpMailer/OAuth.php";
require "./bibliotecas/phpMailer/PHPMailer.php";
require "./bibliotecas/phpMailer/POP3.php";
require "./bibliotecas/phpMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

    class Mensagem{
        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atrib){
            return $this->$atrib;
        }

        public function __set($atrib, $valor){
            $this->$atrib = $valor;
            
        }

        public function mesagemValida(){
            if(empty($_POST["para"]) || empty($_POST["assunto"]) || empty($_POST["mensagem"])){
                return false;
            } else{
                return true;
            }
        }
    }

    $mensagem = new Mensagem();
    $mensagem ->para = $_POST["para"];
    $mensagem ->assunto = $_POST["assunto"];
    $mensagem ->mensagem = $_POST["mensagem"];
    echo '<pre>';
    print_r($mensagem);
    echo '</pre>';
    $mail = new PHPMailer(true);

    if(!$mensagem->mesagemValida()){
        echo "Falta Preenchimento";
        header('Location: index.php');
    } 

    try{
        //configuração do servidor
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username ="senaicodetest@gmail.com";
        $mail->Password= "senai302";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->setFrom("senaicodetest@gmail.com", "web Completo");
        $mail->addAddress($mensagem->para);
        /* $mail->addReplyTo();
        $mail->addCC();
        $mail->addBCC(); */

        $mail->isHTML(true);
        $mail->Subject= $mensagem->assunto;
        $mail->Body = $mensagem->mensagem;
        $mail->AltBody="é necessario bla bla bla";
        $mail->send();

        $mensagem->status['codigo_status'] = 1;
        $mensagem->status['descricao_status'] = "Email Enviado Com Sucesso";

    }catch(Exception $e){
        $mensagem->status['codigo_status'] = 2;
        $mensagem->status['descricao_status'] = "Email não Enviado Com Sucesso" . $mail->ErrorInfo;
        echo $e;
    }
?>