<?php

namespace App\Models;

use CodeIgniter\Model;

class TestDriveModel extends Model
{
    protected $table = 'test_drives';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nome_cliente',
        'email_cliente',
        'telefone_cliente',
        'carro_id',
        'data_agendada',
        'mensagem',
        'status',
        'created_at'
    ];

    protected $useTimestamps = false; // Vamos deixar o created_at automático no MySQL

    protected $returnType = 'array';

    // Opcional: Validação básica dos campos
    protected $validationRules = [
        'nome_cliente'     => 'required|min_length[3]',
        'email_cliente'    => 'required|valid_email',
        'telefone_cliente' => 'required',
        'carro_id'         => 'required|is_natural_no_zero',
        'data_agendada'    => 'required|valid_date',
        'status'           => 'in_list[pendente,aprovado,cancelado]',
    ];
    
     public function getAllWithCarInfo()
    {
        return $this->select('test_drives.*, carros.modelo, carros.marca')
            ->join('carros', 'carros.id = test_drives.carro_id')
            ->orderBy('data_agendada', 'DESC')
            ->findAll();
    }

}