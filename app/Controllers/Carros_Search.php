<?php

namespace App\Controllers;

use App\Models\CarroModel;

class Carros_Search extends BaseController
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

    public function search()
    {
         $data = [
            'user_name' => session()->get('user')['user_name'] ?? null,
             
        ];
        // Recupera os filtros da URL
        $marca = $this->request->getGet('marca');
        $modelo = $this->request->getGet('modelo');
        $ano = $this->request->getGet('ano');
        $preco = $this->request->getGet('preco');
    
        // Busca os filtros diretamente da base de dados
        $filtros = $this->carroModel->getFiltros();
    
        // Busca os carros filtrados
        $carros = $this->carroModel->filtrar_carros($marca, $modelo, $ano, $preco);
    
        // Prepara os preços
        $prices = [
            '10000' => '10.000€',
            '20000' => '20.000€',
            '30000' => '30.000€',
            '40000' => '40.000€',
            '50000' => '50.000€'
        ];


        // Prepara os dados para a view
        $dados = [
            'numero_resultados' => count($carros),
            'carros' => $carros,
            'marca' => $marca,
            'modelo' => $modelo,
            'ano' => $ano,
            'preco' => $preco,
            'brands' => array_combine($filtros['marcas'], $filtros['marcas']),
            'models' => array_combine($filtros['modelos'], $filtros['modelos']),
            'years' => array_combine($filtros['anos'], $filtros['anos']),
            'prices' => $prices,
            'modelos_por_marca' => $this->carroModel->getModelosPorMarca()
        ];
    
        // Retorna a view com os dados
        return view('header') .
            view('navbar',$data) .
            view('filters', $dados) .
            view('search-cars', $dados) .
            view('footer');
    }
}