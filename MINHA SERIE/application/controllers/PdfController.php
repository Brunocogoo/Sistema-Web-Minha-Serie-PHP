<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class PdfController extends CI_Controller {


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
        $this->Series->gerarpdf();




        if(!(isset($_SESSION['id']) == false && empty($_SESSION['id'])))
        {
            $this->template->load('template2','inicio');

        }
        else {
		$this->template->load('template','inicio');}


	}
}
