<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
    <h1 class="text-3xl font-bold text-red-400 mb-6 flex items-center gap-2">
        <i data-lucide="calendar" class="w-6 h-6 text-red-400"></i>
        Agendamentos de Test Drive
    </h1>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="p-4 mb-4 bg-emerald-900 border border-emerald-700 text-emerald-300 rounded-lg">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="p-4 mb-4 bg-red-900 border border-red-700 text-red-300 rounded-lg">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <div class="overflow-x-auto bg-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg">
        <table class="w-full text-sm text-left">
            <thead class="uppercase text-xs bg-neutral-800 text-neutral-400 border-b border-neutral-700">
                <tr>
                    <th class="p-4">Cliente</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Telefone</th>
                    <th class="p-4">Data</th>
                    <th class="p-4">Veículo</th>
                    <th class="p-4">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($testDrives as $td): ?>
                <tr class="border-b border-neutral-700">
                    <td class="p-4 font-medium text-white"><?= esc($td['nome_cliente']) ?></td>
                    <td class="p-4 text-neutral-300"><?= esc($td['email_cliente']) ?></td>
                    <td class="p-4 text-neutral-300"><?= esc($td['telefone_cliente']) ?></td>
                    <td class="p-4 text-neutral-300"><?= esc(date('d/m/Y H:i', strtotime($td['data_agendada']))) ?></td>
                    <td class="p-4 text-neutral-300">
                        <?= esc($td['marca']) ?> <?= esc($td['modelo']) ?>
                    </td>
                    <td class="p-4">
                        <?php
                                $status = strtolower($td['status']);
                                $badgeColors = match ($status) {
                                    'pendente'   => 'bg-yellow-900 text-yellow-300 border-yellow-600',
                                    'confirmado' => 'bg-emerald-900 text-emerald-300 border-emerald-600',
                                    'cancelado'  => 'bg-red-900 text-red-300 border-red-600',
                                    default      => 'bg-neutral-800 text-neutral-300 border-neutral-600'
                                };
                            ?>
                        <span class="px-3 py-1 text-xs font-semibold border rounded-full <?= $badgeColors ?>">
                            <?= ucfirst($status) ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
window.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
});
</script>