<?php

namespace App\Models;

use CodeIgniter\Model;

class CarroModel extends Model
{
    protected $table = 'carros'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária

    // Campos que podem ser preenchidos
    protected $allowedFields = [
        'marca', 'modelo', 'ano', 'cor', 'estado','quilometragem', 'preco','preco_desconto', 'descricao', 'imagem_url',
        'versao', 'combustivel', 'ndeportas', 'lotacao', 'ndemudancas', 'tipodecaixaa', 'tracao',
        '2chave', 'segmento', 'potencia', 'cilindrada'
    ];

    public function getFiltros()
    {   
        $marcas = array_column($this->select('marca')->distinct()->findAll(), 'marca');
        $modelos = array_column($this->select('modelo')->distinct()->findAll(), 'modelo');
        $anos = array_column($this->select('ano')->distinct()->orderBy('ano', 'DESC')->findAll(), 'ano');
        
        return [
            'marcas' => $marcas,
            'modelos' => $modelos,
            'anos' => $anos
        ];
    }

    public function getModelosPorMarca(): array
    {
        $result = $this->select('marca, modelo')->findAll();
        $mapa = [];

        foreach ($result as $row) {
            $mapa[$row['marca']][] = $row['modelo'];
        }

        return $mapa;
    }

    public function filtrar_carros($marca = null, $modelo = null, $ano = null, $preco = null)
{
    // Começa a consulta
    $builder = $this->builder();

    // Aplica os filtros se eles forem fornecidos
    if ($marca) {
        $builder->where('marca', $marca);
    }
    if ($modelo) {
        $builder->where('modelo', $modelo);
    }
    if ($ano) {
        $builder->where('ano', $ano);
    }

    // Aplica o filtro de preço com desconto, se existir
    if ($preco) {
        $builder->groupStart()  // Inicia o grupo de condições
                ->where('preco <=', $preco)  // Filtro para preço original
                ->orWhere('preco_desconto <=', $preco)  // Filtro para preço com desconto
                ->groupEnd();  // Finaliza o grupo de condições
    }

    // Executa a consulta e retorna os resultados
    return $builder->get()->getResult();
}

}