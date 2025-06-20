<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header com ícone Lucide -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div class="flex items-center">
            <iconify-icon icon="lucide:car" class="text-red-500 text-4xl mr-3"></iconify-icon>
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent">
                    Gestão de Veículos</h1>
                <p class="text-gray-400 mt-1">Gerencie seu inventário de veículos</p>
            </div>
        </div>
        <a href="<?= base_url('dashboard/create') ?>"
            class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <iconify-icon icon="lucide:plus" class="text-xl mr-2"></iconify-icon>
            Adicionar Veículo
        </a>
    </div>

    <!-- Tabela com ícones Lucide -->
    <div class="bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-700">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-700">
                    <tr class="border-b border-gray-600">
                        <th class="px-6 py-4 text-gray-300 font-semibold uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-4 text-gray-300 font-semibold uppercase tracking-wider">Marca</th>
                        <th class="px-6 py-4 text-gray-300 font-semibold uppercase tracking-wider">Modelo</th>
                        <th class="px-6 py-4 text-gray-300 font-semibold uppercase tracking-wider">Ano</th>
                        <th class="px-6 py-4 text-gray-300 font-semibold uppercase tracking-wider">Preço</th>
                        <th class="px-6 py-4 text-gray-300 font-semibold uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-4 text-gray-300 font-semibold uppercase tracking-wider text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php if (!empty($cars)) : ?>
                    <?php foreach ($cars as $car) : ?>
                    <tr class="hover:bg-gray-750 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 h-16 w-24 rounded-lg overflow-hidden shadow-sm border border-gray-600 relative">
                                    <?php if (!empty($car['imagem_url'])) : ?>
                                    <img class="h-full w-full object-cover"
                                        src="<?= base_url('uploads/carros/' . $car['imagem_url']) ?>"
                                        alt="Foto do veículo">
                                    <?php else : ?>
                                    <div class="h-full w-full bg-gray-700 flex items-center justify-center">
                                        <iconify-icon icon="lucide:car" class="text-gray-500 text-3xl"></iconify-icon>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-100"><?= esc($car['marca']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-300"><?= esc($car['modelo']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                            <div class="flex items-center">
                                <iconify-icon icon="lucide:calendar" class="text-gray-400 mr-2"></iconify-icon>
                                <?= esc($car['ano']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php if (!empty($car['preco_desconto'])) : ?>
                            <div class="flex flex-col">
                                <span class="text-lg font-bold text-green-400 flex items-center">
                                    <iconify-icon icon="lucide:badge-percent" class="mr-1"></iconify-icon>
                                    €<?= number_format($car['preco_desconto'], 0, ',', '.') ?>
                                </span>
                                <span
                                    class="text-sm line-through text-gray-500">€<?= number_format($car['preco'], 0, ',', '.') ?></span>
                            </div>
                            <?php else : ?>
                            <span class="text-gray-300 flex items-center">
                                <iconify-icon icon="lucide:tag" class="mr-1"></iconify-icon>
                                €<?= number_format($car['preco'], 0, ',', '.') ?>
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-3 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full <?= $car['estado'] === 'disponivel' ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' ?>">
                                <iconify-icon
                                    icon="<?= $car['estado'] === 'disponivel' ? 'lucide:check-circle' : 'lucide:x-circle' ?>"
                                    class="mr-1"></iconify-icon>
                                <?= ucfirst($car['estado']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-4">
                                <a href="<?= base_url('dashboard/edit/' . $car['id']) ?>"
                                    class="text-blue-400 hover:text-blue-300 flex items-center group transition-colors">
                                    <iconify-icon icon="lucide:pencil"
                                        class="mr-1 group-hover:scale-110 transition-transform"></iconify-icon>
                                    Editar
                                </a>
                                <a href="<?= base_url('dashboard/delete/' . $car['id']) ?>"
                                    class="text-red-400 hover:text-red-300 flex items-center group transition-colors"
                                    onclick="return confirm('Tem a certeza que deseja apagar este veículo?')">
                                    <iconify-icon icon="lucide:trash-2"
                                        class="mr-1 group-hover:scale-110 transition-transform"></iconify-icon>
                                    Apagar
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-400">
                            <div class="flex flex-col items-center justify-center">
                                <iconify-icon icon="lucide:car" class="text-gray-500 text-5xl mb-4"></iconify-icon>
                                <p class="text-lg">Nenhum veículo encontrado</p>
                                <p class="text-sm mt-1">Adicione um novo veículo para começar</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>