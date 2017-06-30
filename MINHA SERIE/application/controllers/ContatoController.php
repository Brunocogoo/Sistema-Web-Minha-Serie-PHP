<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class ContatoController extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Email');
        $this->load->helper('url');

    }
	public function index()
	{
	    $this->Usuarios->IniciaSessao();

        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','contato');}
            else {
            $this->template->load('template2','contato');}

        }
        else {
		$this->template->load('template','contato');}


	}

	public function enviaremail()
    {
        $nome=$this->input->post("nome");
        $email_from=$this->input->post("email_from");
        $assunto=$this->input->post("assunto");
        $mensagem=$this->input->post("mensagem");
        $dadosemail = array($nome,$email_from,$assunto,$mensagem);
        $verificador=$this->Email->enviar($dadosemail);

        if ($verificador==true)
            {  echo "<script>alert('Email enviado');

window.location.href='".base_url()."/ContatoController'

    </script>";}

            else{ echo "<script>alert('Erro ao enviar email');
 window.location.href='".base_url()."/ContatoController'
</script>";}



    }
}
