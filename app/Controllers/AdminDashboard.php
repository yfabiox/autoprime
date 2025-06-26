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
        $this->loginModel = new LoginModel();
        $this->carroModel = new CarroModel();
        $this->session = session();
    }

    public function index()
    {
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';

        // Total de carros cadastrados
        $data['totalCarros'] = $this->carroModel->countAll();

        // Carros em promoção (supondo que o campo se chama 'sale' e é booleano)
       $data['carrosEmPromocao'] = $this->carroModel
        ->where('preco_desconto >', 0)
        ->countAllResults();


        // Carros vendidos ou reservados (campo 'status' com valor 'vendido' ou 'reservado')
        $data['vendidosOuReservados'] = $this->carroModel
            ->groupStart()
                ->where('estado', 'vendido')
                ->orWhere('estado', 'reservado')
            ->groupEnd()
            ->countAllResults();

        // Marca mais inserida
        $maisInserida = $this->carroModel
            ->select('marca, COUNT(*) as total')
            ->groupBy('marca')
            ->orderBy('total', 'DESC')
            ->limit(1)
            ->first();

        $data['marcaMaisInserida'] = $maisInserida['marca'] ?? 'N/A';

        return view('header') .
            view('navbar_admin', $data) .
            view('admin_dashboard', $data);
    }
}