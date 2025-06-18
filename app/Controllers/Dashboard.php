<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Dashboard extends BaseController{
	protected $model;
	protected $data;
	protected $session;
	
	public function __construct(){
		$this->model = new LoginModel();
		$this->session = session();
	}
	
    public function index()//:string
	{
		// verifcar a sessão e redirecionar
		if($this->model->isLoggedIn())
			$this->data['user'] = $this->session->get('user');
		else
			return redirect()->to('/login');
		
		$this->data['users'] = $this->model->getAll();
		$this->data['title'] = 'A minha dashboard';
		return view("dashboard", $this->data);
    }
}