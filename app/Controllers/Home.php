<?php

namespace App\Controllers;

use App\Models\CarroModel;

class Home extends BaseController
{
    // Definição do modelo como variável de classe
    protected $carroModel;
    protected $session;

    // Construtor
    public function __construct()
    {
        // Instanciando o modelo dentro do construtor
        $this->carroModel = new CarroModel();
        $this->session = session();
    }

    public function index()
    {
        // Define os dados e a paginação (8 por página)
        $data = [
            'cars' => $this->carroModel->paginate(8), // Exibe 8 carros por página
            'pager' => $this->carroModel->pager, // Instância do pager
            'user_name' => session()->get('user')['user_name'] ?? null,
        ];

        // === Destaques (1º com desconto, 2º os mais recentes) ===
        $carrosComDesconto = $this->carroModel
            ->where('preco_desconto IS NOT NULL')
            ->orderBy('data_cadastro', 'DESC')
            ->findAll();

        $idsComDesconto = array_column($carrosComDesconto, 'id');

        $carrosRecentes = $this->carroModel
            ->whereNotIn('id', $idsComDesconto)
            ->orderBy('data_cadastro', 'DESC')
            ->findAll();

        $carrosDestaque = array_merge($carrosComDesconto, $carrosRecentes);
        $carrosDestaque = array_slice($carrosDestaque, 0, 8); // limitar a 8

        $data['featured'] = $carrosDestaque;

        // Filtros
        $filtros = $this->carroModel->getFiltros();
        $modelosPorMarca = $this->carroModel->getModelosPorMarca();

        // Prepara os preços
        $prices = [
            '10000' => '10.000€',
            '20000' => '20.000€',
            '30000' => '30.000€',
            '40000' => '40.000€',
            '50000' => '50.000€'
        ];

        // Passa os dados para as views
        return view('header') .
            view('navbar', $data) .
            view('filters', [
                'brands' => array_combine($filtros['marcas'], $filtros['marcas']),
                'models' => array_combine($filtros['modelos'], $filtros['modelos']),
                'years' => array_combine($filtros['anos'], $filtros['anos']),
                'prices' => $prices,
                'modelos_por_marca' => $modelosPorMarca
            ]) .
            view('featured-cars', $data) . // usa $data['featured'] dentro da view
            view('quemsomos') .
            view('maps') .
            view('footer');
    }
}