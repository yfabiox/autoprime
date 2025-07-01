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

                // Gráfico: vendas por mês (status = 'vendido', agrupado por mês)
        $vendasPorMes = $this->carroModel
            ->select("DATE_FORMAT(data_venda, '%Y-%m') as mes, COUNT(*) as total")
            ->where('estado', 'vendido')
            ->where('YEAR(data_venda)', date('Y'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->findAll();

        // Gráfico: anúncios por mês (data_cadastro)
        $anunciosPorMes = $this->carroModel
            ->select("DATE_FORMAT(data_cadastro, '%Y-%m') as mes, COUNT(*) as total")
            ->where('YEAR(data_cadastro)', date('Y'))
            ->groupBy('mes')
            ->orderBy('mes')
            ->findAll();

        // Criar arrays de meses do ano atual
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

        $data['meses'] = json_encode(array_values($meses));      // ex: ["Jan", "Feb", ...]
        $data['vendas'] = json_encode(array_values($vendas));    // ex: [3, 5, 2, ...]
        $data['anuncios'] = json_encode(array_values($anuncios)); // ex: [10, 4, 7, ...]



        return view('header') .
            view('navbar_admin', $data) .
            view('admin_dashboard', $data);
    }
}