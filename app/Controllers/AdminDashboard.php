<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\CarroModel;

class AdminDashboard extends BaseController
{
    protected $loginModel;
    protected $carroModel;
    protected $session;

    public function __construct()
    {
        // Inicia os modelos e a sessão
        $this->loginModel = new LoginModel();
        $this->carroModel = new CarroModel();
        $this->session = session();
    }

    public function index()
    {
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';
        
        return view('header') .
            view('navbar_admin', $data) .
            view('admin_dashboard');
    }
}