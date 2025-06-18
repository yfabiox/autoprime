<!-- app/Views/footer.php -->
<footer class="bg-neutral-900 text-gray-300 py-12">
    <div class="container mx-auto px-6 max-w-screen-xl">
        <div class="flex flex-col md:flex-row justify-between items-start">
            <!-- Flex com flex-col para mobile e flex-row para desktop -->

            <!-- Coluna 1: Informações de contacto (esquerda) -->
            <div class="flex flex-col items-start mb-6 md:mb-0">
                <!-- Adicionando mb-6 para espaçamento no mobile -->
                <h3 class="text-xl font-semibold mb-4 text-red-500">Contato</h3>
                <ul class="space-y-2">
                    <li><span class="font-medium">Endereço:</span> Rua Exemplo, 123, Lisboa</li>
                    <li><span class="font-medium">Telefone:</span> (365) 934-468-028</li>
                    <li><span class="font-medium">Email:</span> contato@auto-prime.com</li>
                </ul>
            </div>

            <!-- Coluna 2: Horário de Funcionamento (centro) -->
            <div class="flex flex-col items-start mb-6 md:mb-0">
                <!-- Adicionando mb-6 para espaçamento no mobile -->
                <h4 class="text-xl font-semibold mb-4 text-red-500">Horário de Funcionamento</h4>
                <ul class="space-y-2">
                    <li><span class="font-medium">Segunda a Sexta:</span> 9:00 AM - 6:00 PM</li>
                    <li><span class="font-medium">Sábado:</span> 10:00 AM - 2:00 PM</li>
                    <li><span class="font-medium">Domingo:</span> Fechado</li>
                </ul>
            </div>

            <!-- Coluna 3: Redes sociais (direita) -->
            <div class="flex flex-col items-center md:items-center">
                <!-- Alinhamento das redes sociais à direita no desktop -->
                <h3 class="text-xl font-semibold mb-4 text-red-500">Siga-nos</h3>
                <div class="flex space-x-6">
                    <a href="#" target="_blank"
                        class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-full transform hover:scale-105 transition">
                        <i class="text-black text-2xl fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" target="_blank"
                        class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-full transform hover:scale-105 transition">
                        <i class="text-black text-2xl fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/fabio_.vieira?igsh=MXQ1NWxscDNzZ2luZg%3D%3D&utm_source=qr"
                        target="_blank"
                        class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-full transform hover:scale-105 transition">
                        <i class="text-black text-2xl fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Linha de separação -->
        <div class="mt-12 border-t border-gray-600 pt-6 text-center">
            <p class="text-sm text-gray-300">&copy; 2025 Auto Prime. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>