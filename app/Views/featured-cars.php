<!-- Anúncios em Destaque -->
<div class="max-w-7xl mx-auto p-8">
    <div class="max-w-7xl mx-auto pb-2 rounded-lg mb-6">
        <!-- Título da seção "Anúncios em Destaque" -->
        <h3 class="text-4xl font-extrabold text-transparent bg-clip-text bg-red-600 drop-shadow-lg">
            Anúncios em Destaque
        </h3>
    </div>
    <div class="max-w-7xl mx-auto">
        <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Loop para exibir todos os carros -->
            <?php foreach ($featured as $car): ?>
            <a href="<?= url_to('Detalhe_carro::index', $car['id']); ?>"
                class="bg-neutral-800 rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105 flex flex-col w-full">
                <!-- Imagem do carro -->
                <div class="relative">
                    <img src="<?= base_url('uploads/carros/' . $car['imagem_url']); ?>"
                        alt="<?= esc($car['modelo']); ?>" class="w-full h-56 object-cover rounded-t-lg">
                </div>

                <div class="p-6 flex flex-col flex-grow space-y-4">
                    <!-- Nome do carro com a marca e modelo -->
                    <h2 class="text-2xl font-semibold text-gray-300">
                        <?= esc($car['marca']); ?> <?= esc($car['modelo']); ?>
                    </h2>

                    <!-- Ano do carro -->
                    <div class="flex items-center text-gray-300">
                        <iconify-icon icon="lucide:calendar" class="text-red-500 mr-2"></iconify-icon>
                        <span>Ano: <span class="font-medium"><?= esc($car['ano']); ?></span></span>
                    </div>

                    <!-- Quilometragem do carro -->
                    <div class="flex items-center text-gray-300">
                        <iconify-icon icon="lucide:gauge" class="text-red-500 mr-2"></iconify-icon>
                        <span>Km: <span class="font-medium"><?= number_format($car['quilometragem']); ?></span></span>
                    </div>

                    <!-- Exibição do preço -->
                    <?php if (!empty($car['preco_desconto'])): ?>
                    <!-- Preço com desconto -->
                    <p class="text-gray-300 flex items-center">
                        <iconify-icon icon="lucide:tag" class="text-red-500 mr-2"></iconify-icon>
                        <span>
                            <span class="font-medium text-red-500 text-xl sm:text-lg">
                                <?= number_format($car['preco_desconto'], 0); ?>€
                            </span>
                            <!-- Preço original riscado -->
                            <span class="line-through text-gray-400 text-sm ml-2">
                                <?= number_format($car['preco'], 0); ?>€
                            </span>
                        </span>
                    </p>
                    <?php else: ?>
                    <!-- Preço sem desconto -->
                    <p class="text-gray-300 flex items-center">
                        <iconify-icon icon="lucide:tag" class="text-red-500 mr-2"></iconify-icon>
                        <span class="font-medium text-red-500 text-xl sm:text-lg">
                            <?= number_format($car['preco'], 0); ?>€
                        </span>
                    </p>
                    <?php endif; ?>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Botão para ver todas as viaturas -->
    <div class="mt-8 flex justify-center">
        <a href="<?= url_to('carros/search'); ?>"
            class="px-6 py-3 text-lg font-semibold text-red-600 border-2 border-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 ease-in-out flex items-center">
            <iconify-icon icon="lucide:car" class="mr-2"></iconify-icon>
            Ver todas as viaturas
        </a>
    </div>
</div>

<!-- Adicione este script para carregar os ícones Lucide -->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>