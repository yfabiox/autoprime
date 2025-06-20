<?php


namespace App\Controllers;

use CodeIgniter\Controller;

class FormLogin extends Controller
{
    public function index()
    {
        return view('header') .
               view('form_login');
    }
}