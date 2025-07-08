<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
    <h1 class="text-3xl font-bold text-red-400 mb-6 flex items-center gap-2">
        <i data-lucide="user-plus" class="w-6 h-6 text-red-400"></i>
        Criar Novo Administrador
    </h1>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="p-4 mb-4 bg-red-900 border border-red-700 text-red-300 rounded-lg">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('/admin/criar') ?>" method="post"
        class="space-y-6 bg-neutral-900 border border-neutral-700 p-6 rounded-xl shadow">
        <div>
            <label for="user_name" class="block text-sm font-medium text-white">Nome</label>
            <input type="text" name="user_name" id="user_name" required
                class="mt-1 block w-full rounded-md bg-neutral-800 border border-neutral-600 text-white px-3 py-2 shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-white">Email</label>
            <input type="email" name="email" id="email" required
                class="mt-1 block w-full rounded-md bg-neutral-800 border border-neutral-600 text-white px-3 py-2 shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-white">Palavra-passe</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full rounded-md bg-neutral-800 border border-neutral-600 text-white px-3 py-2 shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
            <button type="submit"
                class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                <i data-lucide="check" class="w-5 h-5"></i>
                Criar Admin
            </button>
        </div>
    </form>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
window.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
});
</script>