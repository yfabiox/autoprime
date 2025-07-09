<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Contatos extends Controller
{
    public function __construct()
    {
        
        $this->session = session();
    }
    public function index()
    {
         $user = $this->session->get('user');
            $data['user_name'] = $user['user_name'] ?? 'Utilizador';
        return view('header') .
            view('navbar', $data) .
            view('contatos') .
            view('footer');
    }
}