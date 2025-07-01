<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\CarroModel;

class Cars_Dashboard extends BaseController
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
    $data['cars'] = $this->carroModel->findAll();

    // Pega o usuário logado da sessão
    $user = $this->session->get('user');
    $data['user_name'] = $user['user_name'] ?? 'Utilizador';
    
        // VERIFICAÇÃO DE LOGIN
        if (!session()->get('logged_in')) {
            return redirect()->to('/form_login');
        }

    return view('header')
        . view('navbar_admin', $data)
        . view('cars_dashboard', $data);
}


    public function create() //: string
    {
         if (!session()->get('logged_in')) {
            return redirect()->to('/form_login');
        }
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';
        return view('header')
            . view('navbar_admin',$data)
            . view('criar_carro', $data);
    }
    
    public function store()
    {
        $file = $this->request->getFile('imagem');
        $nomeImagem = null; // Valor padrão caso não envie imagem

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validação do arquivo
            if (!$this->validate([
                'imagem' => [
                    'uploaded[imagem]',
                    'mime_in[imagem,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[imagem,4096]',
                ],
            ])) {
                return redirect()->back()->with('error', $this->validator->getErrors());
            }

            $nomeImagem = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/carros/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $file->move($uploadPath, $nomeImagem);
        }

        $this->carroModel->save([
            'marca'           => $this->request->getPost('marca'),
            'modelo'          => $this->request->getPost('modelo'),
            'ano'             => $this->request->getPost('ano'),
            'cor'             => $this->request->getPost('cor'),
            'preco'           => $this->request->getPost('preco'),
            'preco_desconto'  => $this->request->getPost('preco_desconto'),
            'imagem_url'      => $nomeImagem, 
            'quilometragem'   => $this->request->getPost('quilometragem'),
            'combustivel'     => $this->request->getPost('combustivel'),
            'descricao'       => $this->request->getPost('descricao'),
            'versao'          => $this->request->getPost('versao'),
            'estado'          => $this->request->getPost('estado'),
            'ndeportas'       => $this->request->getPost('ndeportas'),
            'lotacao'         => $this->request->getPost('lotacao'),
            'ndemudancas'     => $this->request->getPost('ndemudancas'),
            'tipodecaixaa'    => $this->request->getPost('tipodecaixaa'),
            'tracao'          => $this->request->getPost('tracao'),
            '2chave'          => $this->request->getPost('2chave'),
            'segmento'        => $this->request->getPost('segmento'),
            'potencia'        => $this->request->getPost('potencia'),
            'cilindrada'      => $this->request->getPost('cilindrada'),
        ]); 

        return redirect()->to('/dashboard');
    }
    
    public function edit($id)
    {
         if (!session()->get('logged_in')) {
            return redirect()->to('/form_login');
        }
        $data['carro'] = $this->carroModel->find($id);
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';
        
        return view('header')
            . view('navbar_admin',$data)
            . view('editar_carro', $data);
    }
        
    public function update($id)
    {
        $carro = $this->carroModel->find($id);

        if (!$carro) {
            return redirect()->back()->with('error', 'Veículo não encontrado.');
        }

        $file = $this->request->getFile('imagem');
        $nomeImagem = $carro['imagem_url']; // mantém a imagem atual

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validação do arquivo
            if (!$this->validate([
                'imagem' => [
                    'uploaded[imagem]',
                    'mime_in[imagem,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[imagem,4096]',
                ],
            ])) {
                return redirect()->back()->with('error', $this->validator->getErrors());
            }

            $nomeImagem = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/carros/';  // FCPATH = caminho para pasta public

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Move o arquivo
            $file->move($uploadPath, $nomeImagem);

            // Apaga a imagem antiga se existir
            $imagemAntiga = $uploadPath . $carro['imagem_url'];
            if (file_exists($imagemAntiga) && $carro['imagem_url'] != '') {
                unlink($imagemAntiga);
            }
        }
        
        $estadoAnterior = $carro['estado'];
        $novoEstado = $this->request->getPost('estado');
        
         $dados = [
            'marca'           => $this->request->getPost('marca'),
            'modelo'          => $this->request->getPost('modelo'),
            'ano'             => $this->request->getPost('ano'),
            'cor'             => $this->request->getPost('cor'),
            'preco'           => $this->request->getPost('preco'),
            'preco_desconto'  => $this->request->getPost('preco_desconto'),
            'imagem_url'      => $nomeImagem,
            'quilometragem'   => $this->request->getPost('quilometragem'),
            'combustivel'     => $this->request->getPost('combustivel'),
            'descricao'       => $this->request->getPost('descricao'),
            'versao'          => $this->request->getPost('versao'),
            'estado'          => $novoEstado,
            'ndeportas'       => $this->request->getPost('ndeportas'),
            'lotacao'         => $this->request->getPost('lotacao'),
            'ndemudancas'     => $this->request->getPost('ndemudancas'),
            'tipodecaixaa'    => $this->request->getPost('tipodecaixaa'),
            'tracao'          => $this->request->getPost('tracao'),
            '2chave'          => $this->request->getPost('2chave'),
            'segmento'        => $this->request->getPost('segmento'),
            'potencia'        => $this->request->getPost('potencia'),
            'cilindrada'      => $this->request->getPost('cilindrada'),
        ];

    
     //  Atualiza a data de venda se o estado mudou para "vendido"
    if ($estadoAnterior !== 'vendido' && $novoEstado === 'vendido') {
        $dados['data_venda'] = date('Y-m-d'); 
    }

    $this->carroModel->update($id, $dados);

        return redirect()->to('/dashboard')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function delete($id)
    {
        $this->carroModel->delete($id);
        return redirect()->to('/dashboard');
    }
}