<?php

namespace App\Controllers;

use App\Libraries\PasswordHash;
use App\Models\LoginModel;

class Login extends BaseController
{
	protected $model;
	protected $passwordhash;

	public function __construct()
	{
		$this->model = new LoginModel();
		$this->passwordhash = new PasswordHash();
		$this->passwordhash->init(8, false);
		$this->model->init($this->passwordhash);
	}

	public function index() 
	{

		return view("form_login");
	}
	public function checkLogin()
{
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $user = $this->model->getByEmail($email);

    if ($user && $this->model->checkPassword($password, $user['password'])) {
        $this->model->createSession($user);
        return redirect()->to('/');
    } else {
        return redirect()->back()->withInput()->with('login_error', 'E-mail ou senha incorretos.');
    }
}


	public function logout()
	{
		// inicar sessão
		$session = session();
		// destroi a sessão
		$session->destroy();
		// redirecionar para login
		return redirect()->to('/');
	}
}