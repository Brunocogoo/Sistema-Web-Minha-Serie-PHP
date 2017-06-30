<?php
require_once 'DAO.php';

/**
 * Created by PhpStorm.
 * User: brunocogo
 * Date: 02/05/2017
 * Time: 21:52
 */
class Usuarios extends CI_Model


{

    function iniciaSessao(){

        session_start();
    }

    function terminaSessao(){
        session_destroy();

    }


    function incluirPessoa($dados){
        $con= $this->DAO->conecta();

        $sqlverificaemail="SELECT * FROM usuarios WHERE email='$dados[1]'" ;
        $result=mysqli_query($con,$sqlverificaemail);
        if(mysqli_num_rows($result)==0) {




            $sql="INSERT INTO usuarios(nome,email,senha,nivel) VALUES ('$dados[0]','$dados[1]','$dados[2]','0')";

            $query = mysqli_query($con,$sql);

            return true; } else return false;

    }

    function buscarusuarios()
    {

        $lista = array();
        $con=$this->DAO->conecta();
        $sql="SELECT nome,id_usuario,email FROM usuarios order by nome";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){

            $pessoa = array();
            $pessoa[0] = $dados['nome'];

            $pessoa[1] = $dados['id_usuario'];
            $pessoa[2] = $dados['email'];



            //$pessoa[4] = $dados['duração'];



            array_push($lista, $pessoa);
            // array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email'])); array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email']));
        }
        return $lista;

    }

    function buscarusuarioid($idusuario)
    {

        $lista = array();
        $con=$this->DAO->conecta();
        $sql="SELECT nome FROM usuarios WHERE id_usuario='$idusuario' order by nome";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){


            $nomeusuario = $dados['nome'];





            //$pessoa[4] = $dados['duração'];




            // array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email'])); array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email']));
        }
        return $nomeusuario;

    }


    function incluirAdm($dados){
        $con= $this->DAO->conecta();

        $sqlverificaemail="SELECT * FROM usuarios WHERE email='$dados[1]'" ;
        $result=mysqli_query($con,$sqlverificaemail);
        if(mysqli_num_rows($result)==0) {




            $sql="INSERT INTO usuarios(nome,email,senha,nivel) VALUES ('$dados[0]','$dados[1]','$dados[2]','1')";

            $query = mysqli_query($con,$sql);

            return true; } else return false;

    }


    function realizarlogin ($dadosuser)
    {

        $conexao= $this->DAO->conecta();
        if ( $conexao != null) {
            $sql = "SELECT * FROM usuarios where email = '$dadosuser[0]' AND senha = '$dadosuser[1]'";
            $result = mysqli_query($conexao, $sql);

            $this->iniciaSessao();

            while ($dados = mysqli_fetch_assoc($result)) {

                $_SESSION['id'] = $dados['id_usuario'];
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['email'] = $dados['email'];
                $_SESSION['nivel'] = $dados['nivel'];

            }




            if(mysqli_num_rows($result)==0)
             { $this->terminaSessao();

                return false;
             }

             else return true;

            $this->DAO->fechaConexao($conexao);


        }


    }









}
