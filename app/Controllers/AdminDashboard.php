<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\CarroModel;
use App\Models\LogModel;  // <-- Importa o LogModel

class AdminDashboard extends BaseController
{
    protected $loginModel;
    protected $carroModel;
    protected $logModel;    // <-- Propriedade para o LogModel
    protected $session;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->carroModel = new CarroModel();
        $this->logModel = new LogModel();  // <-- Instancia o LogModel
        $this->session = session();
    }

    public function index()
    {
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';

        // Total de carros cadastrados
        $data['totalCarros'] = $this->carroModel->countAll();

        // Carros em promoção (supondo que o campo se chama 'preco_desconto')
        $data['carrosEmPromocao'] = $this->carroModel
            ->where('preco_desconto >', 0)
            ->countAllResults();

        // Carros vendidos ou reservados (campo 'estado')
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

        // Gráfico: vendas por mês
        $vendasPorMes = $this->carroModel
            ->select("DATE_FORMAT(data_venda, '%Y-%m') as mes, COUNT(*) as total")
            ->where('estado', 'vendido')
            ->where('YEAR(data_venda)', date('Y'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->findAll();

        // Gráfico: anúncios por mês
        $anunciosPorMes = $this->carroModel
            ->select("DATE_FORMAT(data_cadastro, '%Y-%m') as mes, COUNT(*) as total")
            ->where('YEAR(data_cadastro)', date('Y'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->findAll();

        // Arrays de meses, vendas e anúncios
        $meses = [];
        $vendas = [];
        $anuncios = [];

        for ($m = 1; $m <= 12; $m++) {
            $key = date('Y-m', mktime(0, 0, 0, $m, 1));
            $meses[$key] = date('M', mktime(0, 0, 0, $m, 1));
            $vendas[$key] = 0;
            $anuncios[$key] = 0;
        }

        foreach ($vendasPorMes as $venda) {
            if (isset($vendas[$venda['mes']])) {
                $vendas[$venda['mes']] = (int)$venda['total'];
            }
        }

        foreach ($anunciosPorMes as $anuncio) {
            if (isset($anuncios[$anuncio['mes']])) {
                $anuncios[$anuncio['mes']] = (int)$anuncio['total'];
            }
        }

        $data['meses'] = json_encode(array_values($meses));
        $data['vendas'] = json_encode(array_values($vendas));
        $data['anuncios'] = json_encode(array_values($anuncios));
        
        // --- Aqui: obtém as 5 últimas logs ---
        $data['logs'] = $this->logModel
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        return view('header') .
            view('navbar_admin', $data) .
            view('admin_dashboard', $data);
    }
}