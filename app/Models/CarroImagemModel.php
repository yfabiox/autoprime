<?php

namespace App\Models;

use CodeIgniter\Model;

class CarroImagemModel extends Model
{
    protected $table = 'carro_imagens';  // Nome da tabela de imagens
    protected $primaryKey = 'id';        // Chave primária (se necessário)

    protected $allowedFields = ['carro_id', 'imagem_url']; // Campos permitidos

    // Método para buscar imagens de um carro específico
    public function getImagensPorCarro($carroId)
    {
        return $this->where('carro_id', $carroId)->findAll();
    }
    
}