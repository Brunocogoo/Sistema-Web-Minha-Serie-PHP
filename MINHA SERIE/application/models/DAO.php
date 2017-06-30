<?php

/**
 * Created by PhpStorm.
 * User: brunocogo
 * Date: 02/05/2017
 * Time: 21:52
 */
class DAO extends CI_Model
{

    function conecta(){
        $con = mysqli_connect('127.0.0.1','root','','minhaseriedb');
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            $con = null;
        }

        return $con;
    }

    function fechaConexao($con){
        mysqli_close($con);
    }

    function codificaSenha($senha){
        return md5($senha);
    }



}
