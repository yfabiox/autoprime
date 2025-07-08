<?php if (session()->getFlashdata('login_error')): ?>
<div class="flex items-center p-4  text-sm text-red-800 rounded-xl bg-red-50 border border-red-300 shadow-sm"
    role="alert">
    <svg class="w-5 h-5 text-red-500 me-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 19a7 7 0 110-14 7 7 0 010 14z" />
    </svg>
    <div>
        <span class="font-medium">Erro ao entrar:</span> <?= esc(session()->getFlashdata('login_error')) ?>
    </div>
</div>
<?php endif; ?>


<div
    class="h-screen w-full bg-gradient-to-r from-gray-800 via-gray-900 to-black flex items-center justify-center relative">
    <!-- Botão de Voltar -->
    <a href="<?= url_to('Home') ?>"
        class="absolute top-4 left-4 bg-gray-800 text-white rounded-full p-2 flex items-center justify-center hover:bg-gray-700 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>

    <!-- Container do Formulário -->
    <div class="w-full max-w-lg bg-white rounded-3xl p-12 shadow-2xl">
        <!-- Cabeçalho -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Acesse sua Conta</h2>
        <p class="text-lg text-gray-500 text-center mb-8">Entre para descobrir o que temos a oferecer.</p>

        <!-- Formulário -->
        <form action="<?=url_to('login_check')?>" method="POST">
            <!-- Campo de E-mail -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                <input type="email" id="email" name="email"
                    class="w-full px-6 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-gray-600 text-gray-800 placeholder-gray-400"
                    placeholder="Digite o seu e-mail" required>
            </div>

            <!-- Campo de Senha -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                <input type="password" id="password" name="password"
                    class="w-full px-6 py-4 border border-gray- 300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-gray-600 text-gray-800 placeholder-gray-400"
                    placeholder="Digite a sua senha" required>
            </div>

            <!-- Botão de Submissão -->
            <button type="submit"
                class="w-full bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg shadow-md transition-all duration-300 ease-in-out transform hover:scale-105">
                Entrar
            </button>

        </form>

        <!-- Links adicionais -->
        <div class="mt-8 text-center text-sm">
            <a href="#" class="text-gray-600 hover:underline">Esqueceu a senha?</a>
            <p class="text-gray-600 mt-2">Ainda não tem uma conta? <a href="#"
                    class="text-gray-800 hover:underline">Criar uma conta</a></p>
        </div>
    </div>
</div>