<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top10Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DAO');
        $this->load->model('Series');
        $this->load->model('Usuarios');
        $this->Usuarios->IniciaSessao();

    }

    public function index()
    {
        $this->Usuarios->IniciaSessao();
    $dados['series']=$this->Series->listartop10();
    $dados['nivel'] = $_SESSION['nivel'];

        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','top10',$dados);}
            else {
                $this->template->load('template2', 'top10', $dados);
            }
        }

        else  {$this->template->load('template','top10',$dados);}
    }

    public function inserirassistindoget()
    {

        $serie = $this->uri->segment(3);

        $usuario = $_SESSION['id'];
        $verificador=$this->Series->inserirassistindo($serie,$usuario);

        if($verificador==0)
        {echo "<script>alert('Erro! Série já cadastrada');
          window.location.href='".base_url()."/Top10Controller'
       </script>"; }
        if($verificador==1)
        { echo "<script>alert('Erro! Série já assistida');
          window.location.href='".base_url()."/Top10Controller'
       </script>"; }

        if($verificador==2 ||$verificador==3)
        {redirect('MinhasController/assistindo');
        }



    }

    public function inserirdesejoget()
    {
        $serie = $this->uri->segment(3);
        $usuario = $_SESSION['id'];
        $verificador=$this->Series->inserirdesejo($serie,$usuario);

        if($verificador==false)
        {echo "<script>alert('Erro! Série já cadastrada');
          window.location.href='".base_url()."/Top10Controller'

        </script>";

            ;}

        else { redirect('MinhasController/desejo'); }


    }



}
