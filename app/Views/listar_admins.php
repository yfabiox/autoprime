<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
    <h1 class="text-3xl font-bold text-red-400 mb-6 flex items-center gap-2">
        <i data-lucide="users" class="w-6 h-6 text-red-400"></i>
        Lista de Administradores
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

    <div class="mb-6">
        <a href="<?= url_to('AdminController::criarAdmin') ?>"
            class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">
            <i data-lucide="plus" class="w-5 h-5"></i>
            Criar Novo Admin
        </a>
    </div>

    <div class="overflow-x-auto bg-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg">
        <table class="w-full text-sm text-left">
            <thead class="uppercase text-xs bg-neutral-800 text-neutral-400 border-b border-neutral-700">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Nome</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                <tr class="border-b border-neutral-700 hover:bg-neutral-800">
                    <td class="p-4"><?= esc($admin['user_id']) ?></td>
                    <td class="p-4"><?= esc($admin['user_name']) ?></td>
                    <td class="p-4"><?= esc($admin['email']) ?></td>
                    <td class="p-4">
                        <form action="<?= base_url('/admin/eliminar') ?>" method="post"
                            onsubmit="return confirm('Tens a certeza que queres eliminar este admin?');">
                            <input type="hidden" name="id" value="<?= esc($admin['user_id']) ?>">
                            <button type="submit"
                                class="inline-flex items-center gap-1 text-sm text-red-400 hover:text-red-300">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                Eliminar
                            </button>
                        </form>
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