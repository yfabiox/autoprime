<?php


namespace App\Controllers;

use CodeIgniter\Controller;

class FormLogin extends Controller
{
    public function index()
    {
        // A ordem de carregamento agora garante que o header seja o primeiro
        return view('header') .
               view('form_login');
    }
}