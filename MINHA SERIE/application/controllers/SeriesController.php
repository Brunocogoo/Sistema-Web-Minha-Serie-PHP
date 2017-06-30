<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeriesController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DAO');
        $this->load->model('Series');
        $this->load->model('Usuarios');

    }
	public function index()
	{
        $this->Usuarios->IniciaSessao();

        $dados['series'] = $this->Series->listarseries();
        $dados['nivel'] = $_SESSION['nivel'];




        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','series',$dados);}
            else {
                $this->template->load('template2', 'series', $dados);
            }
        }

        else  {$this->template->load('template','series',$dados);}
	}

	public function salvarseries()
    {
        $dados['titulo'] = $this->input->post("titulo");
        $dados['temporadas'] = $this->input->post("temporadas");
        $dados['duracao'] = $this->input->post("duracao");


        $this->template->load('template3', 'cadastroseries', $dados);

    }

    public function cadastrarseries()
    {
        $titulo=$this->input->post("titulo");
        $temporadas=$this->input->post("temporadas");
        $duracao=$this->input->post("duracao");


        $episodios=array();
        for ($i=1;$i<=$temporadas;$i++)
        {

            $episodios[$i]=$this->input->post("temp".$i."");

        }


        $verificador=$this->Series->inserirserie($titulo,$temporadas,$duracao,$episodios);
        if ($verificador==true){
            echo "<script>alert('Série inserida com sucesso');
          window.location.href='".base_url()."/SeriesController'
       </script>";
        } else{
            echo "<script>alert('Erro ao inserir séries');
          window.location.href='".base_url()."/SeriesController'
       </script>";
        }



    }
}
