<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecomendadasController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DAO');
       $this->load->model('Series');
        $this->load->model('Usuarios');
        $this->load->helper(array('form', 'url'));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);

    }
	public function index()
	{
        $this->Usuarios->IniciaSessao();
        $dados['dadosimagem']=$this->Series->Buscarimg();
        $dados['nivel'] = $_SESSION['nivel'];

	    if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
    {
        if ($_SESSION['nivel']==1){ $this->template->load('template3','recomendadas',$dados);}
        else {

        $this->template->load('template2','recomendadas',$dados);}

    }
    else
        {


            $this->template->load('template','recomendadas',$dados);
        }

	}

	public function realizarupload()
    {

    $arquivo=$_FILES['fileToUpload'];
    $id= $this->input->post("id");

        $verificador=$this->Series->upload($arquivo,$id);

        if ($verificador==true){
            echo "<script>alert('Upload realizado com sucesso');
          window.location.href='".base_url()."/RecomendadasController'
       </script>";
        } else{
            echo "<script>alert('Erro ao realizar Upload');
          window.location.href='".base_url()."/RecomendadasController'
       </script>";

        }

    }

    public function removerimagem()
    {


        $id= $this->input->post("id");

        $this->Series->removerimagem($id);
        redirect(base_url()."RecomendadasController");

    }
}
