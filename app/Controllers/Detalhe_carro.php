<?php

namespace App\Controllers;

use App\Models\CarroModel;
use App\Models\CarroImagemModel;
use CodeIgniter\Controller;

class Detalhe_carro extends Controller
{
    protected $carroModel;
    protected $carroImagemModel;
     protected $session;

    // Construtor
    public function __construct()
    {
        $this->carroModel = new CarroModel();
        $this->carroImagemModel = new CarroImagemModel();
        $this->session = session();
    }

    public function index($id)
    {
         $data = [
            'user_name' => session()->get('user')['user_name'] ?? null,
             
        ];
        $carro = $this->carroModel->find($id);
        $imagens = $this->carroImagemModel->getImagensPorCarro($id);

        if ($carro) {
            return view('header') . 
                   view('navbar',$data) . 
                   view('details-cars', ['carro' => $carro, 'imagens' => $imagens]) . 
                   view('footer');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Carro com ID $id não encontrado.");
        }
    }
}