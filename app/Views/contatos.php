<body class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-12 max-w-6xl">
        <!-- Header Section -->
        <header class="text-center mb-16">
            <div
                class="inline-flex items-center justify-center p-4 rounded-full bg-gradient-to-br from-red-500 to-red-700 mb-6">
                <i data-lucide="phone-call" class="w-10 h-10 text-white"></i>
            </div>
            <h1
                class="text-4xl md:text-5xl font-bold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-red-400 to-red-600">
                Contacte-nos
            </h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                Estamos aqui para ajudar. Entre em contato através dos canais abaixo ou preencha nosso formulário.
            </p>
        </header>

        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Contact Card - Phone -->
                <div
                    class="contact-card bg-gray-800 rounded-xl p-6 transition-all duration-300 hover:border-red-500 border border-gray-700">
                    <div class="flex items-start gap-4">
                        <div class="p-3 rounded-lg bg-red-900/30 text-red-400">
                            <i data-lucide="phone" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-red-400 mb-2">Telefone</h3>
                            <p class="text-gray-300 mb-1">+351 934 468 028</p>
                            <p class="text-sm text-gray-500">Segunda a sexta, 09:00 - 18:00</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Card - WhatsApp -->
                <div
                    class="contact-card bg-gray-800 rounded-xl p-6 transition-all duration-300 hover:border-green-500 border border-gray-700">
                    <div class="flex items-start gap-4">
                        <div class="p-3 rounded-lg bg-green-900/30 text-green-400">
                            <i data-lucide="message-circle" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-green-400 mb-2">WhatsApp</h3>
                            <p class="text-gray-300 mb-1">+351 934 468 028</p>
                            <a href="https://wa.me/351912345678"
                                class="inline-block mt-2 px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg text-sm font-medium transition duration-300">
                                Enviar Mensagem
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Card - Email -->
                <div
                    class="contact-card bg-gray-800 rounded-xl p-6 transition-all duration-300 hover:border-blue-500 border border-gray-700">
                    <div class="flex items-start gap-4">
                        <div class="p-3 rounded-lg bg-blue-900/30 text-blue-400">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-400 mb-2">Email</h3>
                            <a href="mailto:contato@teusite.pt"
                                class="text-gray-300 hover:text-blue-400 transition duration-300 block mb-1">
                                autoprime@gmail.com
                            </a>
                            <p class="text-sm text-gray-500">Respondemos em até 24h</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Card - Address -->
                <div
                    class="contact-card bg-gray-800 rounded-xl p-6 transition-all duration-300 hover:border-yellow-500 border border-gray-700">
                    <div class="flex items-start gap-4">
                        <div class="p-3 rounded-lg bg-yellow-900/30 text-yellow-400">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-yellow-400 mb-2">Morada</h3>
                            <p class="text-gray-300">R. dos Aranhas 100, São Martinho, 9000-044 Funchal</p>
                            <p class="text-gray-300">Madeira, Portugal</p>
                            <a href="https://www.google.com/maps/place/R.+dos+Aranhas+100,+9000-044+Funchal,+Portugal/@32.649671,-16.909123,17z"
                                target="_blank"
                                class="inline-block mt-3 px-4 py-2 bg-yellow-600 hover:bg-yellow-700 rounded-lg text-sm font-medium transition duration-300">
                                Ver no Mapa
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                <h3 class="text-xl font-semibold text-red-400 mb-4 flex items-center gap-2">
                    <i data-lucide="clock" class="w-5 h-5"></i> Horário de Funcionamento
                </h3>
                <ul class="space-y-3">
                    <li class="flex justify-between items-center border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Segunda - Sexta</span>
                        <span class="font-medium">09:00 - 18:00</span>
                    </li>
                    <li class="flex justify-between items-center border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Sábado</span>
                        <span class="font-medium">10:00 - 14:00</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-gray-400">Domingo</span>
                        <span class="font-medium text-red-400">Fechado</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
    window.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
    });
    </script>

</body>

</html>