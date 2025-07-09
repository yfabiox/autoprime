<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div class="flex items-center">
            <i data-lucide="car" class="w-8 h-8 text-red-500 mr-3"></i>
            <div>
                <h1 class="text-3xl font-bold text-red-400">Gestão de Veículos</h1>
                <p class="text-sm text-neutral-400 mt-1">Gerencie seu inventário de veículos</p>
            </div>
        </div>
        <a href="<?= base_url('dashboard/create') ?>"
            class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white text-sm px-5 py-2.5 rounded-lg shadow transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Adicionar Veículo
        </a>
    </div>

    <!-- Tabela -->
    <div class="bg-neutral-900 border border-neutral-700 rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-neutral-200">
                <thead class="bg-neutral-800 text-neutral-400 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Foto</th>
                        <th class="px-6 py-4">Marca</th>
                        <th class="px-6 py-4">Modelo</th>
                        <th class="px-6 py-4">Ano</th>
                        <th class="px-6 py-4">Preço</th>
                        <th class="px-6 py-4">Estado</th>
                        <th class="px-6 py-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-800">
                    <?php if (!empty($cars)) : ?>
                    <?php foreach ($cars as $car) : ?>
                    <tr class="hover:bg-neutral-800 transition">
                        <td class="px-6 py-4">
                            <div class="h-16 w-24 rounded-md overflow-hidden border border-neutral-700">
                                <?php if (!empty($car['imagem_url'])) : ?>
                                <img src="<?= base_url('uploads/carros/' . $car['imagem_url']) ?>"
                                    class="object-cover w-full h-full" alt="Foto do veículo">
                                <?php else : ?>
                                <div class="flex items-center justify-center h-full bg-neutral-800">
                                    <i data-lucide="car" class="w-5 h-5 text-neutral-500"></i>
                                </div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium"><?= esc($car['marca']) ?></td>
                        <td class="px-6 py-4"><?= esc($car['modelo']) ?></td>
                        <td class="px-6 py-4 text-center align-middle text-neutral-300">
                            <i data-lucide="calendar" class="w-4 h-4 text-neutral-400 inline-block mr-1"></i>
                            <?= esc($car['ano']) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php if (!empty($car['preco_desconto'])) : ?>
                            <div class="flex flex-col">
                                <span class="text-green-400 font-semibold flex items-center gap-1">
                                    <i data-lucide="badge-percent" class="w-4 h-4"></i>
                                    €<?= number_format($car['preco_desconto'], 0, ',', '.') ?>
                                </span>
                                <span class="text-xs line-through text-neutral-500">
                                    €<?= number_format($car['preco'], 0, ',', '.') ?>
                                </span>
                            </div>
                            <?php else : ?>
                            <span class="flex items-center gap-1 text-neutral-300">
                                <i data-lucide="tag" class="w-4 h-4 text-neutral-400"></i>
                                €<?= number_format($car['preco'], 0, ',', '.') ?>
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium rounded-full
                                        <?= $car['estado'] === 'disponivel'
                                            ? 'bg-green-900 text-green-300'
                                            : 'bg-red-900 text-red-300' ?>">
                                <i data-lucide="<?= $car['estado'] === 'disponivel' ? 'check-circle' : 'x-circle' ?>"
                                    class="w-3.5 h-3.5"></i>
                                <?= ucfirst($car['estado']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-4">
                                <a href="<?= base_url('dashboard/edit/' . $car['id']) ?>"
                                    class="text-blue-400 hover:text-blue-300 flex items-center gap-1">
                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                    Editar
                                </a>
                                <a href="<?= base_url('dashboard/delete/' . $car['id']) ?>"
                                    onclick="return confirm('Tem a certeza que deseja apagar este veículo?')"
                                    class="text-red-400 hover:text-red-300 flex items-center gap-1">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    Apagar
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-neutral-400">
                            <div class="flex flex-col items-center gap-3">
                                <i data-lucide="car" class="w-10 h-10 text-neutral-500"></i>
                                <p class="text-base font-medium">Nenhum veículo encontrado</p>
                                <p class="text-sm text-neutral-500">Adicione um novo veículo para começar</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Lucide -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
window.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
});
</script>