<?php

namespace App\Models;

use CodeIgniter\Model;

// use App\Libraries\PasswordHash; 

class LoginModel extends Model{
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	
	protected $useAutoIncrement = true;
	
	protected $returnType = 'array';
	
	protected $allowedFields = ['user_name', 'email','password'];
	
	protected $phpass;
	
	public function init($ph){
		$this->phpass = $ph;
	}
	
	public function getByEmail($email){
		return $this->where('email', $email)->first();  // Buscando pelo e-mail
	}
	
	public function isLoggedIn(){
		// Obter a instacia das sessões globais-> session()
		$session = session();
		// logged_in-> está ativa ou não
		$userlogIn = $session->get('logged_in');
		$user = $session->get('user');
	
		if($userlogIn === true){
			$this->createSession($user);// renovar a sessão
			return true;
		}
		return false;
	}
	
	public function createSession($user){
		$session = session();
		$session->set([
			'logged_in' => true,
			'user' => $user
		]);
	}
	
	
	public function checkPassword($password, $hash_pass){
		if($this->phpass)
			return $this->phpass->CheckPassword($password,$hash_pass);
		return false;// Retorna falso caso a bib. não tenha sido carregada
	}
}