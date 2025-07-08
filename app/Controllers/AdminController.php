<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class AdminController extends BaseController
{
    protected $loginModel;
    protected $session;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->session = session();
    }

    // Página: lista de admins
    public function listarAdmins()
    {
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';
        $data['admins'] = $this->loginModel->findAll();

        return view('header')
            . view('navbar_admin', $data)
            . view('listar_admins', $data);
    }

    // Página: formulário para criar admin
    public function criarAdmin()
    {
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';
        return view('header')
            . view('navbar_admin', $data)
            . view('criar_admin');
    }

    // POST: guardar novo admin
    public function storeAdmin()
    {
        $user = $this->session->get('user');
        $data['user_name'] = $user['user_name'] ?? 'Utilizador';
        
        $data = [
            'user_name' => $this->request->getPost('user_name'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($this->loginModel->insert($data)) {
            return redirect()->to('/admin/utilizadores')->with('success', 'Novo administrador criado com sucesso!');
        }

        return redirect()->back()->with('error', 'Erro ao criar administrador.');
    }
    public function eliminarAdmin()
{
    $id = $this->request->getPost('id');

    if (!$id) {
        return redirect()->back()->with('error', 'ID inválido.');
    }

    if ($this->loginModel->delete($id)) {
        return redirect()->to('/admin/utilizadores')->with('success', 'Administrador eliminado com sucesso!');
    }

    return redirect()->back()->with('error', 'Erro ao eliminar o administrador.');
}

}