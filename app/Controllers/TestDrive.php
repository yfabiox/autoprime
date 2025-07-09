<?php

namespace App\Controllers;

use App\Models\CarroModel;
use App\Models\TestDriveModel;
use CodeIgniter\Controller;

class TestDrive extends BaseController
{
    protected $carroModel;
    protected $testDriveModel;
    protected $session;

    public function __construct()
    {
        // Inicializar os models que vamos usar
        $this->carroModel = new CarroModel();
        $this->testDriveModel = new TestDriveModel();
        $this->session = session();
    }

    
    public function agendar($carro_id = null)
    {
        $data = [
            'user_name' => session()->get('user')['user_name'] ?? null,
        ];

        if (!$carro_id) {
            return redirect()->to(base_url());
        }

        $data['carro'] = $this->carroModel->find($carro_id);

        if (!$data['carro']) {
            return redirect()->to(base_url());
        }

        return view('header') .
            view('navbar', $data) .
            view('agendar_testdrive', $data);
            
    }



    /**
     * Processa o envio do formulário
     */
    public function enviar()
{
    $rules = [
        'nome_cliente' => 'required|min_length[3]|max_length[100]',
        'email_cliente' => 'required|valid_email',
        'telefone_cliente' => 'required|min_length[9]|max_length[15]',
        'carro_id' => 'required|integer',
        'data_agendada' => 'required',
    ];

    if (!$this->validate($rules)) {
        $data = [
            'validation' => $this->validator,
            'carro' => $this->carroModel->find($this->request->getPost('carro_id')),
        ];
        return view('header')
            . view('navbar', $data)
            . view('agendar_testdrive', $data)
            . view('footer');
    }

    $dados = [
        'nome_cliente' => $this->request->getPost('nome_cliente'),
        'email_cliente' => $this->request->getPost('email_cliente'),
        'telefone_cliente' => $this->request->getPost('telefone_cliente'),
        'carro_id' => $this->request->getPost('carro_id'),
        'data_agendada' => $this->request->getPost('data_agendada'),
        'mensagem' => $this->request->getPost('mensagem'),
        'status' => 'pendente',
        'created_at' => date('Y-m-d H:i:s'),
    ];

    if ($this->testDriveModel->insert($dados)) {
        $this->session->setFlashdata('success', 'Test drive agendado com sucesso!');
    } else {
        $this->session->setFlashdata('error', 'Erro ao agendar test drive.');
    }

    return redirect()->to(base_url('/detalhe_carro/' . $dados['carro_id']));

}

public function adminIndex()
{
     $user = $this->session->get('user');
    $data['user_name'] = $user['user_name'] ?? 'Utilizador';
     $testDrives = $this->testDriveModel->getAllWithCarInfo();
    return view('header') .
            view('navbar_admin', $data) .
            view('test_drives', ['testDrives' => $testDrives]);
}
public function atualizarStatus()
{
    $id = $this->request->getPost('id');
    $novoStatus = $this->request->getPost('status');

    if (!in_array($novoStatus, ['pendente', 'aprovado', 'cancelado'])) {
        return redirect()->back()->with('error', 'Status inválido.');
    }

    if (!$id) {
        return redirect()->back()->with('error', 'ID do test drive inválido.');
    }

    
    $testDrive = $this->testDriveModel->find($id);

    if (!$testDrive) {
        return redirect()->back()->with('error', 'Test drive não encontrado.');
    }

    $this->testDriveModel->update($id, ['status' => $novoStatus]);

    // Se for aprovado, envia email
    if ($novoStatus === 'aprovado') {
        $email = \Config\Services::email();

        $email->setTo($testDrive['email_cliente']);
        $email->setSubject('Confirmação de Test Drive');
        $carro = $this->carroModel->find($testDrive['carro_id']);
        $modelo = $carro['marca'] . ' ' . $carro['modelo'];


        $mensagem = "
            <p>Olá <strong>{$testDrive['nome_cliente']}</strong>,</p>
            <p>O seu test drive ao veículo <strong>{$modelo}</strong> foi <strong>aprovado</strong>!</p>
            <p>Data agendada: <strong>{$testDrive['data_agendada']}</strong></p>
            <p>Entraremos em contacto para mais detalhes.</p>
            <p>Obrigado,</p>
            <p><em>Autoprime</em></p>
        ";


        $email->setMessage($mensagem);

        if (!$email->send()) {
            // Log do erro (opcional)
            log_message('error', $email->printDebugger(['headers', 'subject', 'body']));
            return redirect()->back()->with('error', 'Status atualizado, mas falha ao enviar o email.');
        }
    }
    

    return redirect()->back()->with('success', 'Status atualizado com sucesso.');

    
}
public function delete($id = null)
{
    $user = $this->session->get('user');
    $data['user_name'] = $user['user_name'] ?? 'Utilizador';

    if (!$id || !is_numeric($id)) {
        return redirect()->back()->with('error', 'ID inválido para exclusão.');
    }

    // Primeiro busca o testDrive
    $testDrive = $this->testDriveModel->find($id);

    if (!$testDrive) {
        return redirect()->back()->with('error', 'Agendamento não encontrado.');
    }

    // Agora que $testDrive está definido, podes buscar o carro
    $carro = $this->carroModel->find($testDrive['carro_id']);

    $this->logAction(
        'Excluiu Test Drive',
        "Veículo " . $carro['marca'] . " " . $carro['modelo'] . " excluído com sucesso.",
        $user['user_id'],
        $user['user_name']
    );

    if ($this->testDriveModel->delete($id)) {
        return redirect()->back()->with('success', 'Agendamento excluído com sucesso.');
    } else {
        return redirect()->back()->with('error', 'Erro ao excluir agendamento.');
    }
}





}