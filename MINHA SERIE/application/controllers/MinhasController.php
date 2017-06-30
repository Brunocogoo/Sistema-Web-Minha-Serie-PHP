<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MinhasController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DAO');
        $this->load->model('Series');
        $this->load->model('Usuarios');
        $this->Usuarios->IniciaSessao();


    }

	public function assistidas()
	{

        $dados['seriesassistidas'] = $this->Series->listarassistidas();
        $dados['usuario']=$_SESSION['nome'];

        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','assistidas',$dados);}
            else {
        $this->template->load('template2','assistidas',$dados);}
        }
        else  {redirect('InicioController');}
	}

    public function assistindo()
    {

        $dados['seriesassistindo'] = $this->Series->listarassistindo();
        $dados['series'] = $this->Series->listarseries();

        $dados['usuario']=$_SESSION['nome'];


        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','assistindo',$dados);}
            else {
            $this->template->load('template2','assistindo',$dados);}
        }
        else  {redirect('InicioController');}
    }

    public function desejo()
    {


        $dados['seriesdesejo'] = $this->Series->listardesejo();
        $dados['series'] = $this->Series->listarseries();
        $dados['usuario']=$_SESSION['nome'];


        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','desejo',$dados);}
            else {
            $this->template->load('template2','desejo',$dados);}
        }
        else  {redirect('InicioController');}
    }

    public function sugeridas()
    {


        $dados['seriessugeridas'] = $this->Series->listarsugeridas();

        $dados['usuario']=$_SESSION['nome'];


        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','sugeridas',$dados);}
            else {
                $this->template->load('template2','sugeridas',$dados);}
        }
        else  {redirect('InicioController');}
    }

    public function inserirassistindo()
    {

        $serie = $this->input->post("id");
        $usuario = $_SESSION['id'];
        $verificador=$this->Series->inserirassistindo($serie,$usuario);

        if($verificador==0)
        {echo "<script>alert('Erro! Série já cadastrada');
          window.location.href='".base_url()."/MinhasController/assistindo'
       </script>"; }
        if($verificador==1)
        { echo "<script>alert('Erro! Série já assistida');
          window.location.href='".base_url()."/MinhasController/assistindo'
       </script>"; }

        if($verificador==2 ||$verificador==3)
        {redirect('/MinhasController/assistindo');}

        echo $verificador;

    }

    public function inserirassistindoget()
    {

        $serie = $this->uri->segment(3);

        $usuario = $_SESSION['id'];
        $verificador=$this->Series->inserirassistindo($serie,$usuario);

        if($verificador==0)
        {echo "<script>alert('Erro! Série já cadastrada');
          window.location.href='".base_url()."/SeriesController'
       </script>"; }
        if($verificador==1)
        { echo "<script>alert('Erro! Série já assistida');
          window.location.href='".base_url()."/SeriesController'
       </script>"; }

        if($verificador==2 ||$verificador==3)
        {redirect('/MinhasController/assistindo');
        }



    }

    public function inserirdesejoget()
    {
        $serie = $this->uri->segment(3);
        $usuario = $_SESSION['id'];
        $verificador=$this->Series->inserirdesejo($serie,$usuario);

        if($verificador==false)
        {echo "<script>alert('Erro! Série já cadastrada');
          window.location.href='".base_url()."/SeriesController'

        </script>";

            ;}

        else { redirect('/MinhasController/desejo'); }


    }



    public function inserirdesejo()
    {
        $serie = $this->input->post("id");
        $usuario = $_SESSION['id'];
        $verificador=$this->Series->inserirdesejo($serie,$usuario);

        if($verificador==false)
        {echo "<script>alert('Erro! Série já cadastrada');
          window.location.href='".base_url()."/MinhasController/desejo'

        </script>";

            ;}

        else { redirect('/MinhasController/desejo'); }


    }
    public function inserirsugeridas()
    {
        $serie = $this->input->post("id");
        $visitante = $_SESSION['nome'];
        $visitanteid = $_SESSION['id'];
        $usuario=$this->input->post("usuario");
        $verificador=$this->Series->inserirsugestao($serie,$usuario,$visitante,$visitanteid);

        if($verificador==false)
        {echo "<script>alert('Erro! O usuário ja conhece a série');
          window.location.href='".base_url()."/BuscaController/perfil/".$usuario."'

        </script>";

            ;}

        else { redirect('/BuscaController/Perfil/'.$usuario.''); }


    }


    public function removerserie(){
        $id = $this->uri->segment(3);
        $usuario = $_SESSION['id'];
        $this->Series->removerserie($id,$usuario);
        redirect('/MinhasController/assistindo');


    }
    public function removerdesejo(){
        $id = $this->uri->segment(3);
        $usuario = $_SESSION['id'];
        $this->Series->removerserie($id,$usuario);
        redirect('/MinhasController/desejo');
    }

    public function removersugerida(){
        $id = $this->uri->segment(3);
        $usuario = $_SESSION['id'];
        $this->Series->removerserie($id,$usuario);
        redirect('/MinhasController/sugeridas');
    }
    public function aumentarepisodio(){
        $id = $this->uri->segment(3);
        $usuario = $_SESSION['id'];
        $this->Series->aumentarepisodio($id,$usuario);
        redirect('/MinhasController/assistindo');
    }

    public function inserirnota(){

        $nota=$this->input->post("nota");
        $serie=$this->input->post("var");
        $verificador=$this->Series->inserenota($nota,$serie);

        if ($verificador==true){
            echo "<script>alert('Nota inserida com sucesso');
          window.location.href='".base_url()."MinhasController/assistidas'

        </script>";
        }
        else{
            echo "<script>alert('Erro ao inserir nota');
          window.location.href='".base_url()."MinhasController/assistidas'

        </script>";
        }


    }


}
