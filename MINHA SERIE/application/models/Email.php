<?php
require_once 'DAO.php';

/**
 * Created by PhpStorm.
 * User: brunocogo
 * Date: 02/05/2017
 * Time: 21:52
 */
class Email extends CI_Model


{

    function enviar($dadosemail)
    {


        $nome = $dadosemail[0];
        $email = "brunucg@gmail.com";
        $mensagem = $dadosemail[3];

        $assunto="MINHA SÉRIE - ".$dadosemail[2];
        $email_from = $dadosemail[1];
        //formato o campo da mensagem
        $mensagem = wordwrap( $mensagem, 50, "
 ", 1);

        $mensagem = "".$mensagem." - Email de ".$email_from."";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "From: \"$nome\" <$email_from>\r\n";
            //envia o email sem anexo

            mail($email,$assunto,$mensagem,$headers);

            return true;
            //echo"Email enviado com Sucesso!";
            /*echo "<script>alert('EMAIL ENVIADO COM SUCESSO!');
               location.href='emailform.php';</script>";*/




    }












}
