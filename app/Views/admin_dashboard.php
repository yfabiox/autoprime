<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
        <!-- Total de carros -->
        <div
            class="bg-gradient-to-br from-neutral-800 to-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg p-6 transition-all hover:scale-[1.02] hover:shadow-xl hover:border-red-400/30 group">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-3 rounded-lg bg-neutral-700/50 group-hover:bg-red-400/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Total de Carros</h3>
            </div>
            <p class="text-3xl font-bold text-red-400"><?= esc($totalCarros) ?></p>
            <p class="text-sm text-neutral-400 mt-2">Todos os veículos cadastrados</p>
        </div>

        <!-- Em promoção -->
        <div
            class="bg-gradient-to-br from-neutral-800 to-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg p-6 transition-all hover:scale-[1.02] hover:shadow-xl hover:border-red-400/30 group">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-3 rounded-lg bg-neutral-700/50 group-hover:bg-red-400/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Em Promoção</h3>
            </div>
            <p class="text-3xl font-bold text-red-400"><?= esc($carrosEmPromocao) ?></p>
            <p class="text-sm text-neutral-400 mt-2">Ofertas especiais disponíveis</p>
        </div>

        <!-- Vendidos ou reservados -->
        <div
            class="bg-gradient-to-br from-neutral-800 to-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg p-6 transition-all hover:scale-[1.02] hover:shadow-xl hover:border-red-400/30 group">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-3 rounded-lg bg-neutral-700/50 group-hover:bg-red-400/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l7-7-7-7m-7 7l7-7-7-7" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Vendidos / Reservados</h3>
            </div>
            <p class="text-3xl font-bold text-red-400"><?= esc($vendidosOuReservados) ?></p>
            <p class="text-sm text-neutral-400 mt-2">Negócios concluídos</p>
        </div>

        <!-- Marca mais cadastrada -->
        <div
            class="bg-gradient-to-br from-neutral-800 to-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg p-6 transition-all hover:scale-[1.02] hover:shadow-xl hover:border-red-400/30 group">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-3 rounded-lg bg-neutral-700/50 group-hover:bg-red-400/10 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Marca Mais Inserida</h3>
            </div>
            <p class="text-3xl font-bold text-red-400"><?= esc($marcaMaisInserida) ?></p>
            <p class="text-sm text-neutral-400 mt-2">Preferência dos clientes</p>
        </div>
    </div>

    <!-- GRÁFICOS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <!-- Gráfico de Vendas por Mês -->
        <div
            class="bg-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg p-6 transition-shadow hover:shadow-xl hover:border-red-400/30 group h-[400px]">
            <h2 class="text-xl font-semibold mb-4 group-hover:text-red-400 transition-colors">Vendas por Mês</h2>
            <canvas id="vendasChart" class="w-full h-full"></canvas>
        </div>

        <!-- Gráfico de Anúncios por Mês -->
        <div
            class="bg-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg p-6 transition-shadow hover:shadow-xl hover:border-red-400/30 group h-[400px]">
            <h2 class="text-xl font-semibold mb-4 group-hover:text-red-400 transition-colors">Carros Anunciados por Mês
            </h2>
            <canvas id="anunciosChart" class="w-full h-full"></canvas>
        </div>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const meses = JSON.parse('<?= $meses ?>');
const vendas = JSON.parse('<?= $vendas ?>');
const anuncios = JSON.parse('<?= $anuncios ?>');
</script>

<script src="<?= base_url('js/charts.js'); ?>"></script>