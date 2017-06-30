<?php
require_once 'DAO.php';
include("pdf/mpdf.php");


/**
 * Created by PhpStorm.
 * User: brunocogo
 * Date: 02/05/2017
 * Time: 21:52
 */
class Series extends CI_Model


{



    function BuscarImg()
    {
        $lista=array();
        $con=$this->DAO->conecta();
        $sql="SELECT * FROM Imagem ORDER BY id";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $dadoimagem = array();
            $dadoimagem[0] = $dados['ref'];
            $dadoimagem[1] = $dados['id'];
            array_push($lista,$dadoimagem);

        }
        error_reporting( E_ALL ^E_NOTICE );
        // if($lista==null)  ;
        // else   ;


        return $lista;



    }

    function BuscarUpload($id)
    {

        $con=$this->DAO->conecta();
        $sql="SELECT ref FROM Imagem WHERE id = $id LIMIT 1";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){

            $lista = $dados['ref'];

        }
        error_reporting( E_ALL ^E_NOTICE );
        if($lista==null)  ;
        else   ;


        return $lista;

    }


    function listarseries(){
        $lista = array();
        $con=$this->DAO->conecta();
        $sql="SELECT id,nome,nota,temporada,duracao,notasinseridas FROM series order by nome";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $id=$dados['id'];
            $pessoa = array();
            $pessoa[0] = $dados['nome'];
            if ($dados['notasinseridas']!=0){
                $pessoa[1] = $dados['nota']/$dados['notasinseridas'];
                $pessoa[1]= number_format($pessoa[1],1);
            }
            else $pessoa[1] = $dados['nota'];

            $pessoa[2] = $dados['temporada'];
            $pessoa[4] = $dados['duracao'];
            $pessoa[5]=$dados['id'];

            //$pessoa[4] = $dados['duração'];
            $sqlepisodios="select sum(episodios) from episodio where serieref='$id' LIMIT 1";
            $resultepisodios=mysqli_query($con,$sqlepisodios);
            while($dadosepisodios = mysqli_fetch_assoc($resultepisodios)){
                $pessoa[3] = $dadosepisodios['sum(episodios)'];}


            array_push($lista, $pessoa);
            // array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email'])); array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email']));
        }
        return $lista;
    }

    function listartop10(){
        $lista = array();
        $con=$this->DAO->conecta();
        $sql="SELECT *,round(nota/notasinseridas,1) FROM `series` ORDER BY round(nota/notasinseridas,1) DESC limit 10";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $id=$dados['id'];
            $pessoa = array();
            $pessoa[0] = $dados['nome'];
            if ($dados['notasinseridas']!=0){
                $pessoa[1] = $dados['nota']/$dados['notasinseridas'];
                $pessoa[1]= number_format($pessoa[1],1);
            }
            else $pessoa[1] = $dados['nota'];

            $pessoa[2] = $dados['temporada'];
            $pessoa[4] = $dados['duracao'];
            $pessoa[5]=$dados['id'];

            //$pessoa[4] = $dados['duração'];
            $sqlepisodios="select sum(episodios) from episodio where serieref='$id' LIMIT 1";
            $resultepisodios=mysqli_query($con,$sqlepisodios);
            while($dadosepisodios = mysqli_fetch_assoc($resultepisodios)){
                $pessoa[3] = $dadosepisodios['sum(episodios)'];}


            array_push($lista, $pessoa);
            // array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email'])); array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email']));
        }
        return $lista;
    }

    function serializarseries(){
        $lista = array();
        $con=$this->DAO->conecta();
        $sql="SELECT id,nome,nota,temporada,duracao FROM series order by nome";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $id=$dados['id'];
            $pessoa = array();
            $pessoa[0] = $dados['nome'];
            $pessoa[1] = $dados['nota'];
            $pessoa[2] = $dados['temporada'];
            $pessoa[4] = $dados['duracao'];
            $pessoa[5]=$dados['id'];

            //$pessoa[4] = $dados['duração'];
            $sqlepisodios="select sum(episodios) from episodio where serieref='$id' LIMIT 1";
            $resultepisodios=mysqli_query($con,$sqlepisodios);
            while($dadosepisodios = mysqli_fetch_assoc($resultepisodios)){
                $pessoa[3] = $dadosepisodios['sum(episodios)'];}


            array_push($lista, array("Nome"=>$dados['nome'], "nota" => $dados['nota'],"temporada" => $dados['temporada'],"duracao" => $dados['duracao'],));
            // array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email'])); array_push($arrayClientes, array("Nome"=>$clientes[$i]['nome'], "Email" => $clientes[$i]['email']));
        }
        return $lista;
    }


    function listarassistidas(){
        $con=$this->DAO->conecta();


        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$_SESSION[id]' and status='1'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $serie = array();
            $id=$dados['seriems'];
            $serie[4]=$dados['nota'];

            $serie[5]=$dados['seriems'];



            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $serie[0] = $dadoserie['nome'];
                if ($dadoserie['notasinseridas']!=0)
                {
                    $serie[1]=$dadoserie['nota']/$dadoserie['notasinseridas'];
                    $serie[1]=number_format($serie[1],1);
                }else $serie[1] = $dadoserie['nota'];
                $serie[2] = $dadoserie['temporada'];
            }

            $sqlepisodio="select sum(episodios) from episodio where serieref='$id' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $serie[3] = $dadosepisodio['sum(episodios)'];

            }

            array_push($lista, $serie);
        }
        return $lista;



    }

    function listarassistindo(){
        $con=$this->DAO->conecta();


        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$_SESSION[id]' and status='0'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $user = array();
            $id=$dados['seriems'];
            $user[6]=$dados['seriems'];
            $user[2]= $dados['temporada'];
            $user[4]= $dados['episodio'];


            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $user[0] = $dadoserie['nome'];
                if ($dadoserie['notasinseridas']!=0)
                {$user[1]=$dadoserie['nota']/$dadoserie['notasinseridas'];
                $user[1]=number_format($user[1],1);

                }
                else $user[1] = $dadoserie['nota'];
                $user[3] = $dadoserie['temporada'];
            }

            $sqlepisodio="select * from episodio where serieref='$id' and temporada='$user[2]' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $user[5] = $dadosepisodio['episodios'];

            }

            array_push($lista, $user);
        }
        return $lista;



    }

    function listardesejo(){
        $con=$this->DAO->conecta();


        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$_SESSION[id]' and status='2'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $serie = array();
            $id=$dados['seriems'];
            $serie[4] = $dados['seriems'];



            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $serie[0] = $dadoserie['nome'];
                if ($dadoserie['notasinseridas']!=0)
                {
                    $serie[1]=$dadoserie['nota']/$dadoserie['notasinseridas'];
                    $serie[1]=number_format($serie[1],1);
                }else $serie[1] = $dadoserie['nota'];
                $serie[2] = $dadoserie['temporada'];
            }

            $sqlepisodio="select sum(episodios) from episodio where serieref='$id' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $serie[3] = $dadosepisodio['sum(episodios)'];

            }

            array_push($lista, $serie);
        }
        return $lista;



    }

    function listarsugeridas(){
        $con=$this->DAO->conecta();


        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$_SESSION[id]' and status='3'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $serie = array();
            $id=$dados['seriems'];
            $serie[4] = $dados['seriems'];
            $serie[5] = $dados['sugeriu'];
            $serie[6] = $dados['sugeriuid'];



            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $serie[0] = $dadoserie['nome'];
                if ($dadoserie['notasinseridas']!=0)
                {
                    $serie[1]=$dadoserie['nota']/$dadoserie['notasinseridas'];
                    $serie[1]=number_format($serie[1],1);
                }else $serie[1] = $dadoserie['nota'];
                $serie[2] = $dadoserie['temporada'];
            }

            $sqlepisodio="select sum(episodios) from episodio where serieref='$id' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $serie[3] = $dadosepisodio['sum(episodios)'];

            }

            array_push($lista, $serie);
        }
        return $lista;



    }

    function listarassistidasperfil($idusuario){
        $con=$this->DAO->conecta();


        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$idusuario' and status='1'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $serie = array();
            $id=$dados['seriems'];
            $serie[4]=$dados['nota'];

            $serie[5]=$dados['seriems'];



            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $serie[0] = $dadoserie['nome'];
                if ($dadoserie['notasinseridas']!=0)
                {
                    $serie[1]=$dadoserie['nota']/$dadoserie['notasinseridas'];
                    $serie[1]=number_format($serie[1],1);
                }else $serie[1] = $dadoserie['nota'];
                $serie[2] = $dadoserie['temporada'];
            }

            $sqlepisodio="select sum(episodios) from episodio where serieref='$id' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $serie[3] = $dadosepisodio['sum(episodios)'];

            }

            array_push($lista, $serie);
        }
        return $lista;



    }

    function listarassistindperfil($idusuario){
        $con=$this->DAO->conecta();


        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$idusuario' and status='0'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $user = array();
            $id=$dados['seriems'];
            $user[6]=$dados['seriems'];
            $user[2]= $dados['temporada'];
            $user[4]= $dados['episodio'];


            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $user[0] = $dadoserie['nome'];
                if ($dadoserie['notasinseridas']!=0)
                {$user[1]=$dadoserie['nota']/$dadoserie['notasinseridas'];
                    $user[1]=number_format($user[1],1);

                }
                else $user[1] = $dadoserie['nota'];
                $user[3] = $dadoserie['temporada'];
            }

            $sqlepisodio="select * from episodio where serieref='$id' and temporada='$user[2]' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $user[5] = $dadosepisodio['episodios'];

            }

            array_push($lista, $user);
        }
        return $lista;



    }

    function listardesejoperfil($idusuario){
        $con=$this->DAO->conecta();


        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$idusuario' and status='2'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $serie = array();
            $id=$dados['seriems'];
            $serie[4] = $dados['seriems'];



            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $serie[0] = $dadoserie['nome'];
                if ($dadoserie['notasinseridas']!=0)
                {
                    $serie[1]=$dadoserie['nota']/$dadoserie['notasinseridas'];
                    $serie[1]=number_format($serie[1],1);
                }else $serie[1] = $dadoserie['nota'];
                $serie[2] = $dadoserie['temporada'];
            }

            $sqlepisodio="select sum(episodios) from episodio where serieref='$id' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $serie[3] = $dadosepisodio['sum(episodios)'];

            }

            array_push($lista, $serie);
        }
        return $lista;



    }


    function inserirdesejo($serie,$usuario){
        $con=$this->DAO->conecta();

        $sqlverificaserie="SELECT * FROM minhaserie WHERE seriems='$serie' and usuarioms='$usuario' and status!='3'" ;
        $result=mysqli_query($con,$sqlverificaserie);
        if(mysqli_num_rows($result)>0) {return false;}

        $sqlverificasugestao="SELECT * FROM minhaserie WHERE seriems='$serie' and usuarioms='$usuario' and status='3'";

        $resultsugestao=mysqli_query($con,$sqlverificasugestao);
        if(mysqli_num_rows($resultsugestao)>0)
        {
            $sql="UPDATE minhaserie SET status='2'";
            $query = mysqli_query($con,$sql);
            return true;

        }
        else {

            $sql="INSERT INTO minhaserie(usuarioms,seriems,episodio,temporada,status,nota) VALUES ('$usuario','$serie','1','1','2','0')";
            $query = mysqli_query($con,$sql);









           return true;
        }



    }

    function inserirsugestao($serie,$usuario,$visitante,$visitanteid){
        $con=$this->DAO->conecta();

        $sqlverificaserie="SELECT * FROM minhaserie WHERE seriems='$serie' and usuarioms='$usuario'" ;
        $result=mysqli_query($con,$sqlverificaserie);
        if(mysqli_num_rows($result)>0) {return false;}

        else {




            $sql="INSERT INTO minhaserie(usuarioms,seriems,episodio,temporada,status,nota,sugeriu,sugeriuid) VALUES ('$usuario','$serie','1','1','3','0','$visitante','$visitanteid')";
            $query = mysqli_query($con,$sql);






            return true;
        }



    }

    function inserirassistindo($serie,$usuario){
        $con=$this->DAO->conecta();

        $sqlverificaserie="SELECT * FROM minhaserie WHERE seriems='$serie' and usuarioms='$usuario' limit 1" ;
        $result=mysqli_query($con,$sqlverificaserie);
        if(mysqli_num_rows($result)>0) {
            while($dados = mysqli_fetch_assoc($result)){
                if ($dados['status']==0) {return 0;}
                else if ($dados['status']==1){return 1;}
                else if ($dados['status']==2 || $dados['status']==3 )
                {$sql="UPDATE minhaserie SET status=0 WHERE seriems='$serie' and usuarioms='$usuario'";
                    $query = mysqli_query($con,$sql);
                  return 2;
                }

            }

        }

        else {

            $sql="INSERT INTO minhaserie(usuarioms,seriems,episodio,temporada,status,nota) VALUES ('$usuario','$serie','1','1','0','0')";
            $query = mysqli_query($con,$sql);
            return 3;
        }



    }

    function removerserie($id,$user)
    {
        $con=$this->DAO->conecta();

        $sqlverificaserie="delete from minhaserie WHERE usuarioms='$user' and seriems='$id'" ;
        $result=mysqli_query($con,$sqlverificaserie);



    }



    function aumentarepisodio($id,$user)
    {
        $con=$this->DAO->conecta();
        $sqlverificaserie="UPDATE minhaserie SET episodio=episodio+1 WHERE usuarioms='$user' and seriems='$id'" ;
        $result=mysqli_query($con,$sqlverificaserie);
        $this->verificarepisodio($id);
        $this->verificatemporada($id);

    }

    function verificarepisodio($serieid){
        $con=$this->DAO->conecta();
        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$_SESSION[id]' and seriems='$serieid'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $info = array();
            $info[1]= $dados['temporada'];
            $info[0]= $dados['episodio'];


            $sqlserie="select * from series where id='$serieid' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){

                $info[2] = $dadoserie['temporada'];
            }

            $sqlepisodio="select * from episodio where serieref='$serieid' and temporada='$info[1]' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $info[3] = $dadosepisodio['episodios'];

            }

            if ($info[0]>$info[3])
            {
                $sqlupdate="update minhaserie set episodio=1 , temporada=temporada+1 where usuarioms='$_SESSION[id]' and seriems='$serieid'";
                $resultupdate=mysqli_query($con,$sqlupdate);
            }

        }

    }

    function verificatemporada($serieid){
        $con=$this->DAO->conecta();
        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$_SESSION[id]' and seriems='$serieid'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $info = array();
            $info[1]= $dados['temporada'];
            $info[0]= $dados['episodio'];


            $sqlserie="select * from series where id='$serieid' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){

                $info[2] = $dadoserie['temporada'];
            }

            $sqlepisodio="select * from episodio where serieref='$serieid' and temporada='$info[1]' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $info[3] = $dadosepisodio['episodios'];

            }

            if ($info[1]>$info[2])
            {
                $sqlupdate="update minhaserie set episodio=1 , temporada=1 , status=1 where usuarioms='$_SESSION[id]' and seriems='$serieid'";
                $resultupdate=mysqli_query($con,$sqlupdate);
            }

        }

    }

    function inserirserie($titulo,$temporadas,$duracao,$episodios)
    {

        $con=$this->DAO->conecta();
        $titulo=addslashes($titulo);

        $sqlinserirserie="INSERT INTO series(nome,nota,temporada,duracao) VALUES ('$titulo','0','$temporadas','$duracao')" ;
        $result=mysqli_query($con,$sqlinserirserie);

        $sqlid ="SELECT MAX(ID) FROM series ";
        $resultid=mysqli_query($con,$sqlid);

        while ($dados = mysqli_fetch_assoc($resultid)) {

            $id=$dados["MAX(ID)"];
        }

        for ($i=1;$i<=$temporadas;$i++)
        {
            $sqlepisodio="INSERT INTO episodio (temporada,serieref,episodios) VALUES ('$i','$id','$episodios[$i]')";
            $query = mysqli_query($con,$sqlepisodio);

        }
        if ($result==true) {
            return true;
        } else return false;




    }


    public function inserenota($nota,$serie)
    {
        $con=$this->DAO->conecta();
        $usuario=$_SESSION['id'];

        $sql="UPDATE minhaserie SET nota=$nota WHERE seriems='$serie' and usuarioms='$usuario'";
        $query=mysqli_query($con,$sql);

        if ($query==false)
        {echo $nota;


        return false; }

        $sqlnota="UPDATE series SET nota=nota + '$nota' WHERE id='$serie' ";
        $querynota=mysqli_query($con,$sqlnota);
        if ($querynota==false)
        { return false; }

        $sqlninserida="UPDATE series SET notasinseridas=notasinseridas + 1 WHERE id='$serie' ";

        $queryninserida=mysqli_query($con,$sqlninserida);

        if ($queryninserida==false)
        {return false;}




        else return true;


    }



















    function gerarpdf()

    {

        $con=$this->DAO->conecta();
        $sql="SELECT * FROM minhaserie";

        $res = mysqli_query($con,$sql);


        if (!$res)
            die("query error : ".mysql_error());
        $mpdf=new mPDF('c','A4','','',32,25,27,25,16,13);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
// LOAD a stylesheet
        $stylesheet = file_get_contents('pdf/examples/mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet,1); // The parameter 1 tells that this is css/style only and no body/html/text
        $html = '

<center><b>MINHAS SÉRIES</b></center>
<center>
<table class="table" border="1">
<tr>
<th>SÉRIE</th><th>NOTA</th><th>TEMPORADA</th><th>EPISÓDIO</th>
</tr>
<tr>';

        $lista = array();
        $sql="SELECT * FROM minhaserie where usuarioms='$_SESSION[id]'";
        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){
            $user = array();
            $id=$dados['seriems'];
            $user[2]= $dados['temporada'];
            $user[4]= $dados['episodio'];


            $sqlserie="select * from series where id='$id' LIMIT 1";
            $resultserie=mysqli_query($con,$sqlserie);
            while($dadoserie = mysqli_fetch_assoc($resultserie)){
                $user[0] = $dadoserie['nome'];
                $user[1] = $dadoserie['nota'];
                $user[3] = $dadoserie['temporada'];
            }

            $sqlepisodio="select * from episodio where serieref='$id' and temporada='$user[2]' LIMIT 1";

            $resultepisodio=mysqli_query($con,$sqlepisodio);
            while($dadosepisodio = mysqli_fetch_assoc($resultepisodio)){
                $user[5] = $dadosepisodio['episodios'];

            }

            array_push($lista, $user);


            $html .= '<tr><td>'.$user[0].'</td><td>' .$user[1]. '</td><td>' . $user[2].'/'. $user[3]. '</td><td>' . $user[4].'/'. $user[5]. '</td>';
        }
        $html .= '</tr>
</table></center>
';
        $mpdf->WriteHTML($html,2);
        $mpdf->Output('mpdf.pdf','I');
        exit;

    }

    function upload($arquivo,$id)
    {

        $target_dir = "/PRJMVC/assets/uploads/";
        $target_file = $target_dir . basename($arquivo["name"]);

        $uploadOk = 1;
        $verificaerro=0;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $diretorio=basename( $arquivo["name"]);

        $extensao = pathinfo($arquivo['name']);
        $extensao = ".".$extensao['extension'];
        $imagem = time().uniqid(md5(0)).$extensao;



        $imagem_dirnovo = $_SERVER['DOCUMENT_ROOT']. $target_dir . $imagem;




// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($arquivo["tmp_name"]);
            if($check !== false) {

                $uploadOk = 1;
            } else {

                $uploadOk = 0;
                return false;
            }
        }
// Check if file already exists
        /*if (file_exists($target_file)) {
            echo "<script>alert('OCORREU UM ERRO AO REALIZAR O UPLOAD');
            location.href='recomendadas.php';</script>";
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            $verificaerro=1;
        }*/
// Check file size
        if ($arquivo["size"] > 9000000) {

            return false;
            $uploadOk = 0;
            $verificaerro=1;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {

            $uploadOk = 0;
            return false;
            $verificaerro=1;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $verificaerro=1;

            return false;
// if everything is ok, try to upload file
        } else {



           if( move_uploaded_file($arquivo["tmp_name"], $imagem_dirnovo)) {

               //header('location:recomendadas.php');
               $verificaerro = 2;


               $id = $email = $_POST['id'];

               $img = array($id, $imagem);

               $this->incluirImagem($img);




           }else {


               $verificaerro = 1;
               //header('location:errodeupload2.php');

               return false;

           }



            $idretornado=$this->BuscarUpload($id);


            $path_parts = pathinfo("".base_url()."assets/uploads/".$idretornado."");



            if ($path_parts['extension'] == "png"){
                $im = imagecreatefrompng("".base_url()."assets/uploads/".$idretornado."");

            }

            if ($path_parts['extension'] == "jpg"){
                $im = imagecreatefromjpeg("".base_url()."assets/uploads/".$idretornado."");

            }


            $size = min(imagesx($im), imagesy($im));
            $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => '400', 'height' => '300']);
            if ($im2 !== FALSE) {


                imagepng($im2, ''.$_SERVER['DOCUMENT_ROOT'].'/PRJMVC/assets/img/fotos/imagem'.$idretornado.'');
                ini_set('display_errors', 0 );
                error_reporting(0);
                return true;



            }



        }




    }

    function incluirImagem($dados)
    {
        $con=$this->DAO->conecta();
        $sql="DELETE FROM Imagem WHERE id = ".$dados[0];
        $query = mysqli_query($con,$sql);

        $sql="INSERT INTO Imagem(id,ref) VALUES ($dados[0],'$dados[1]')";

        $query = mysqli_query($con,$sql);

        return true;

    }

    function removerimagem($id)
    {
    $con=$this->DAO->conecta();
    $sql="DELETE FROM Imagem WHERE id = ".$id;
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            //echo "Error deleting record: " . mysqli_error($con);exit();
            return false;
        }

    }





//FUNCOES ANTIGAS
/*

    function postarimagem($idimg){
        $id = $idimg;
        $idretornado=$this->Buscarimg($id);
        if ($idretornado !=null) {
            echo "<div class='col-lg-3 col-sm-4 col-xs-6' style='margin-bottom:18px' ><a title='Série TOP " . $id . "' href='#'><img class=' img-responsive' src=assets/img/fotos/imagem" . $idretornado . "></a><font color='#B3B3B3'>TOP " . $id . "</font> </div> ";


        }

    }

    function BuscarImg($id)
    {
        $con=$this->DAO->conecta();
        $sql="SELECT ref FROM Imagem WHERE id = $id LIMIT 1";

        $result=mysqli_query($con,$sql);


        while($dados = mysqli_fetch_assoc($result)){

            $lista = $dados['ref'];

        }
        error_reporting( E_ALL ^E_NOTICE );
        // if($lista==null)  ;
        // else   ;


        return $lista;



    }

function postarimagem2(){

        $dadosimagem=$this->Buscarimg();
        foreach ($dadosimagem as $dados)
        {
            echo "<div class='col-lg-3 col-sm-4 col-xs-6' style='margin-bottom:18px' ><a title='Série TOP " . $dados[1] . "' href='#'><img class=' img-responsive' src=assets/img/fotos/imagem" . $dados[0] . "></a><font color='#B3B3B3'>TOP " . $dados[1] . "</font> </div> ";
        }


    }


*/


}
