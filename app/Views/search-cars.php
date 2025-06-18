<!-- Seção para título e resultados -->
<div
    class="max-w-7xl mx-auto p-4 bg-neutral-900 text-red-600 rounded-lg mb-6 text-center md:text-left mt-10 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
    <h3 class="text-2xl font-semibold"><?= esc($numero_resultados) ?> viaturas disponíveis</h3>

    <!-- Seção de ordenação -->
    <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
        <label for="ordenar" class="text-gray-300">Ordenar por:</label>
        <select id="ordenar"
            class="bg-neutral-800 text-white py-2 px-4 rounded-lg border border-gray-600 hover:border-red-600 transition">
            <option value="" disabled selected>Aplicar filtro</option>
            <option value="preco_asc">Preço: Menor para Maior</option>
            <option value="preco_desc">Preço: Maior para Menor</option>
            <option value="alfabeto_asc">Alfabético: A-Z</option>
            <option value="alfabeto_desc">Alfabético: Z-A</option>
        </select>
    </div>
</div>

<!-- Exibição dos carros -->
<div id="carros-container" class="max-w-7xl mx-auto mt-4"></div>

<!-- Navegação entre páginas -->
<div class="flex justify-center items-center space-x-4 mt-6">
    <button id="prevPage"
        class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition flex items-center">
        <iconify-icon icon="lucide:chevron-left" class="mr-1"></iconify-icon>
        Anterior
    </button>
    <span id="pageInfo" class="text-gray-300"></span>
    <button id="nextPage"
        class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition flex items-center">
        Próximo
        <iconify-icon icon="lucide:chevron-right" class="ml-1"></iconify-icon>
    </button>
</div>

<script>
const carros = <?= json_encode($carros); ?>;
</script>
<script src="<?= base_url('js/pager.js') ?>"></script>
<!-- <script src="<?= base_url('js/fixfilters.js') ?>"></script> -->
<!-- Adicione este script para carregar os ícones Lucide -->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>