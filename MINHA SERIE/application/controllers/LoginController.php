<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DAO');
       $this->load->model('Series');
        $this->load->model('Usuarios');

    }
	public function index()
	{
        $this->template->load('template','login');
	}

    public function Cadastro()
    {
        $this->template->load('template','cadastro');
    }

    public function SalvarCadastro()
    {

        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");

        $senha=md5($senha);

        $pessoa = array($nome,$email,$senha);

        $usuario = new Usuarios();

        $verificador=$usuario->incluirPessoa($pessoa);
        if ($verificador==false){
            echo "<script>alert('Erro! Email já cadastrado!');</script>";

            $this->template->load('template','cadastro');

            
	   }
        if ($verificador==true) {

            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            $this->template->load('template', 'login');

        }
    }

    public function Logar()
    {

        $email = $this->input->post("login");
        $senha = $this->input->post("senha");
        $senha=md5($senha);

        $pessoa = array($email,$senha);

        $usuario = new Usuarios();
        $verificador=$usuario->realizarlogin($pessoa);

        if ($verificador==false)
        {

            echo "<script>alert('Erro! Senha incorreta');</script>";

            $this->template->load('template','login');

        }

        if ($verificador==true)
        {

            echo "<script>alert('Login realizado');</script>";

           redirect('/InicioController');

            $this->template->load('template2','inicio');

        }



    }

    public function Deslogar()
    {
        $this->Usuarios->IniciaSessao();
        $this->Usuarios->terminaSessao();

        redirect('InicioController');


    }

    public function cadastroadm()
    {
        $this->Usuarios->IniciaSessao();

        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){  $this->template->load('template3','cadastroadm');}
            else {
                redirect('InicioController');
            }
        }

        else  {redirect('InicioController');}


    }

    public function salvarcadastroadm()
    {
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");

        $senha=md5($senha);

        $pessoa = array($nome,$email,$senha);

        $usuario = new Usuarios();

        $verificador=$usuario->incluirAdm($pessoa);
        if ($verificador==false){
            echo "<script>alert('Erro! Email já cadastrado!');</script>";

            $this->template->load('template3','cadastroadm');


        }
        if ($verificador==true) {

            echo "<script>alert('Cadastro de administrador realizado com sucesso!');</script>";
            $this->template->load('template3', 'cadastroadm');

        }

    }


}
