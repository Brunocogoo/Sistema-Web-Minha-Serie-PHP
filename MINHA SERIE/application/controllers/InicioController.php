<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class InicioController extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->helper('url');

    }
	public function index()
	{
	    $this->Usuarios->IniciaSessao();

        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            if ($_SESSION['nivel']==1){ $this->template->load('template3','inicio');}
            else {
            $this->template->load('template2','inicio');}

        }
        else {
		$this->template->load('template','inicio');}


	}
}
