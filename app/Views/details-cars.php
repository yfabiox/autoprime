<!-- Container principal adicionado (única modificação) -->
<div class="max-w-screen-2xl mx-auto ">

    <div class="flex flex-col lg:flex-row lg:ml-[70px] lg:mr-28">
        <!-- alterado de lg:ml-28 para lg:ml-24 -->
        <div class="relative w-full max-w-3xl mx-auto overflow-hidden">
            <!-- Slides -->
            <div id="carousel-slides" class="flex transition-transform duration-500 ease-out">
                <?php foreach ($imagens as $index => $imagem): ?>
                <div class="min-w-full  ">
                    <img src="<?= base_url('uploads/detalhes/' . $imagem['imagem_url']); ?>"
                        alt="Imagem <?= $index + 1 ?>" class="w-full h-auto" />
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Botões de Navegação -->
            <button id="prev-btn"
                class="absolute top-1/2 left-2 -translate-y-1/2 bg-black/50 text-white rounded-full p-2 hover:bg-black/70">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="next-btn"
                class="absolute top-1/2 right-2 -translate-y-1/2 bg-black/50 text-white rounded-full p-2 hover:bg-black/70">
                <i class="fas fa-chevron-right"></i>
            </button>

            <!-- Indicadores -->
            <div id="carousel-indicators" class="absolute bottom-4 flex justify-center w-full space-x-2">
                <?php foreach ($imagens as $index => $imagem): ?>
                <button class="w-3 h-3 bg-gray-400 rounded-full" data-slide="<?= $index ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Detalhes do Carro -->
        <div class="lg:ml-30 lg:mr-30 lg:w-1/3 lg:mt-0">
            <div class="p-6 rounded-lg bg-neutral-900 mr-20">
                <h1 class="text-start text-3xl font-semibold text-gray-300"><?= esc($carro['marca']) ?>
                    <?= esc($carro['modelo']) ?></h1>
                <!-- Preço -->
                <?php if (!empty($carro['preco_desconto'])): ?>
                <p class="text-start text-3xl font-bold mt-4 text-gray-300">
                    <?= esc(number_format($carro['preco_desconto'], 0, ',', ' ')) ?> €
                </p>
                <span class="text-red-600 mt-2 block">Preço Promocional</span>
                <?php else: ?>
                <p class="text-start text-3xl font-bold mt-4 text-gray-300">
                    <?= esc(number_format($carro['preco'], 0, ',', ' ')) ?> €
                </p>
                <?php endif; ?>
            </div>
            <div class="mt-6 p-6 rounded-lg bg-neutral-900">
                <div class="mt-6">
                    <p class="text-gray-300 text-base mt-2">Localização:</p>
                    <p class="text-gray-300 text-base mt-2">AutoPrime, Rua Exemplo 123, Lisboa, Portugal</p>
                    <a href="https://www.google.com/maps?q=Rua+Exemplo+123,+Lisboa,+Portugal" target="_blank"
                        class="text-red-600 mt-2 inline-block">Ver no Google Maps</a>
                    <div class="flex items-center mt-4">
                        <span class="pt-4 text-gray-300 text-sm"><i class="fas fa-user-tie"></i> Profissional</span>
                        <span class="pt-4 ml-4 text-gray-300 text-sm"><i class="fas fa-calendar-alt"></i> No
                            AutoPrime</span>
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <a href="tel:+351934468028"
                            class="flex items-center justify-center gap-2 text-white bg-red-700 hover:bg-red-600 rounded-md py-3 text-xl">
                            <i class="fas fa-phone"></i> Contactar
                        </a>

                        <a href="https://wa.me/351934468028?text=Olá,%20estou%20interessado%20no%20<?= urlencode($carro['marca'] . ' ' . $carro['modelo']) ?>"
                            target="_blank"
                            class="flex items-center justify-center gap-2 text-white bg-green-600 hover:bg-green-500 rounded-md py-3 text-xl">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Destaques -->
    <div class="max-w-screen-xl mt-8 px-4 lg:px-0 lg:ml-32 lg:mr-32 mx-auto">
        <h2 class="pl-2 text-2xl font-semibold text-white">Destaques</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
            <!-- Quilómetros (ícone de estrada) -->
            <div
                class="p-7  rounded-lg bg-neutral-800 text-center shadow-lg transform transition-transform hover:scale-105">
                <i class="fas fa-road text-3xl text-red-600"></i>
                <p class="mt-2 text-gray-300">Quilómetros</p>
                <p class="font-semibold text-gray-300"><?= esc(number_format($carro['quilometragem'], 0, ',', ' ')) ?>
                    km
                </p>
            </div>

            <!-- Combustível (ícone de bomba de gasolina) -->
            <div
                class="p-7  rounded-lg bg-neutral-800 text-center shadow-lg transform transition-transform hover:scale-105">
                <i class="fas fa-gas-pump text-3xl text-red-600"></i>
                <p class="mt-2 text-gray-300">Combustível</p>
                <p class="font-semibold text-gray-300"><?= esc($carro['combustivel']) ?></p>
            </div>

            <!-- Tipo de Caixa (ícone de engrenagem/câmbio) -->
            <div
                class="p-7  rounded-lg bg-neutral-800 text-center shadow-lg transform transition-transform hover:scale-105">
                <i class="fas fa-exchange-alt text-3xl text-red-600"></i>
                <p class="mt-2 text-gray-300">Tipo de Caixa</p>
                <p class="font-semibold text-gray-300"><?= esc($carro['tipodecaixaa']) ?></p>
            </div>

            <!-- Segmento (ícone de carro) -->
            <div
                class="p-7  rounded-lg bg-neutral-800 text-center shadow-lg transform transition-transform hover:scale-105">
                <i class="fas fa-car text-3xl text-red-600"></i>
                <p class="mt-2 text-gray-300">Segmento</p>
                <p class="font-semibold text-gray-300"><?= esc($carro['segmento']) ?></p>
            </div>

            <!-- Cilindrada (ícone de motor) -->
            <div
                class="p-7  rounded-lg bg-neutral-800 text-center shadow-lg transform transition-transform hover:scale-105">
                <i class="fas fa-cogs text-3xl text-red-600"></i>
                <p class="mt-2 text-gray-300">Cilindrada</p>
                <p class="font-semibold text-gray-300"><?= esc(number_format($carro['cilindrada'], 0, ',', ' ')) ?> cm3
                </p>
            </div>

            <!-- Potência (ícone de raio para potência) -->
            <div
                class="p-7  rounded-lg bg-neutral-800 text-center shadow-lg transform transition-transform hover:scale-105">
                <i class="fas fa-bolt text-3xl text-red-600"></i>
                <p class="mt-2 text-gray-300">Potência</p>
                <p class="font-semibold text-gray-300"><?= esc($carro['potencia']) ?> cv</p>
            </div>
        </div>
    </div>


    <!-- Garantia -->
    <div class="lg:ml-32 lg:mr-32 mt-8 bg-gradient-to-r from-gray-800 to-gray-700 text-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-gray-100">Garantia</h2>
        <p class="mt-4 text-lg text-gray-200">
            Este carro inclui uma garantia completa de 2 anos com cobertura em toda a Europa. Para mais informações,
            contacte-nos ou visite o nosso site.
        </p>
    </div>

    <!-- Ficha Técnica -->
    <div class="lg:ml-32 lg:mr-32 mt-8 bg-neutral-800 p-8 rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-300">Ficha Técnica</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <p class="text-red-600">Marca</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['marca']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Ano</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['ano']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Modelo</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['modelo']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Versão</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['versao']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Combustível</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['combustivel']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Cor</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['cor']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Nº de Portas</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['ndeportas']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Lotação</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['lotacao']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Número de Mudanças</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['ndemudancas']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Tipo de Caixa</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['tipodecaixaa']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Tração</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['tracao']) ?></p>
            </div>
            <div>
                <p class="text-red-600">2º Chave</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['2chave']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Segmento</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['segmento']) ?></p>
            </div>
            <div>
                <p class="text-red-600">Potência</p>
                <p class="text-gray-300 font-semibold"><?= esc($carro['potencia']) ?> cv</p>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url('js/carousel.js'); ?>"></script>