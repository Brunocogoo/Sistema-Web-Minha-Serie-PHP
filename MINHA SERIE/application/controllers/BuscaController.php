<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class BuscaController extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Series');
        $this->load->model('DAO');
        $this->load->helper('url');

    }
	public function index()
	{
	    $this->Usuarios->IniciaSessao();
        $dados['usuarios'] = $this->Usuarios->buscarusuarios();

        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','buscausuario',$dados);}
            else {
            $this->template->load('template2','buscausuario',$dados);}

        }
        else {
		$this->template->load('template','buscausuario',$dados);}


	}

    public function perfil()
    {
        $this->Usuarios->IniciaSessao();
        $idusuario= $this->uri->segment(3);
        $dados ['visitante'] =$_SESSION['id'];
        $dados['series'] = $this->Series->listarseries();

        $dados['desejo']= $this->Series->listardesejoperfil($idusuario);
        $dados['assistindo']=$this->Series->listarassistindperfil($idusuario);
        $dados['assistidas']=$this->Series->listarassistidasperfil($idusuario);
        $dados['usuario']=$this->Usuarios->buscarusuarioid($idusuario);
        $dados['usuarioid']=$idusuario;
        $dados['usuario']= strtoupper($dados['usuario']);
        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','perfil',$dados);}
            else {
                $this->template->load('template2','perfil',$dados);}

        }
        else {
            $this->template->load('template','perfil',$dados);}



    }
}
