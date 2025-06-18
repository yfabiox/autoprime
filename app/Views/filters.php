<div class="p-4 rounded-xl">
    <form action="<?= site_url('carros/search'); ?>" method="GET" id="filterForm"
        class="mt-10 mb-10 p-8 rounded-3xl max-w-7xl mx-auto bg-neutral-800 sm:bg-neutral-900">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Filtro de Marca -->
            <?= view('./components/dropdown', ['items' => $brands, 'title' => "Marcas", 'default_text' => "Selecionar Marca", 'name' => 'marca']) ?>
            <?= view('./components/dropdown', ['items' => $models, 'title' => "Modelos", 'default_text' => "Selecionar Modelo", 'name' => 'modelo']) ?>
            <?= view('./components/dropdown', ['items' => $years, 'title' => "Ano", 'default_text' => "Selecionar Ano", 'name' => 'ano']) ?>
            <?= view('./components/dropdown', ['items' => $prices, 'title' => "Preços", 'default_text' => "Selecionar Preço", 'name' => 'preco']) ?>
        </div>

        <!-- Botão de Filtrar -->
        <div class="mt-8 flex justify-center">
            <button
                class="bg-red-600 text-white font-medium py-2 px-6 rounded-full shadow-md hover:bg-red-700 transition duration-300 ease-in-out flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass"></i> Filtrar
            </button>
        </div>

    </form>
</div>

<script>
    const modelosPorMarca = <?= json_encode($modelos_por_marca); ?>;
</script>

<script src="<?= base_url('js/filters.js'); ?>"></script>