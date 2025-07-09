<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Cabeçalho -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div class="flex items-center">
            <iconify-icon icon="lucide:car" class="text-red-500 text-4xl mr-3"></iconify-icon>
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent">
                    Criar Veículo
                </h1>
                <p class="text-gray-400 mt-1">Crie os detalhes do veículo</p>
            </div>
        </div>
    </div>

    <!-- Formulário -->
    <div class="bg-gray-900 border border-gray-700 rounded-2xl shadow-2xl p-6">
        <form action="<?= url_to('store_admin') ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Coluna 1 -->
                <div class="space-y-6">
                    <div>
                        <label for="marca" class="text-sm text-gray-300 mb-1 block">Marca</label>
                        <input type="text" id="marca" name="marca" placeholder="Digite a marca"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="modelo" class="text-sm text-gray-300 mb-1 block">Modelo</label>
                        <input type="text" id="modelo" name="modelo" placeholder="Digite o modelo"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="ano" class="text-sm text-gray-300 mb-1 block">Ano</label>
                        <input type="number" id="ano" name="ano" placeholder="Ex: 2020"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="cor" class="text-sm text-gray-300 mb-1 block">Cor</label>
                        <input type="text" id="cor" name="cor" placeholder="Ex: Preto, Branco"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="preco" class="text-sm text-gray-300 mb-1 block">Preço (€)</label>
                        <input type="number" id="preco" name="preco" step="0.01" placeholder="Ex: 15000.00"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="preco_desconto" class="text-sm text-gray-300 mb-1 block">Preço Promocional
                            (€)</label>
                        <input type="number" id="preco_desconto" name="preco_desconto" step="0.01"
                            placeholder="Deixe vazio se não houver desconto"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="imagem_principal" class="text-sm text-gray-300 mb-1 block">Imagem Principal</label>
                        <input type="file" id="imagem_principal" name="imagem_principal" accept="image/*"
                            class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-gray-800 file:text-white hover:file:bg-gray-700 transition">
                    </div>
                    <div>
                        <label for="carro_imagens_input" class="text-sm text-gray-300 mb-1 block">Imagens do
                            Carrossel</label>
                        <input type="file" id="carro_imagens_input" accept="image/*"
                            class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-gray-800 file:text-white hover:file:bg-gray-700 transition">
                        <div id="carro_imagens_preview"
                            class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>
                        <input type="file" name="carro_imagens[]" id="carro_imagens_hidden" style="display: none;"
                            multiple>
                    </div>
                </div>

                <!-- Coluna 2 -->
                <div class="space-y-6">
                    <div>
                        <label for="quilometragem" class="text-sm text-gray-300 mb-1 block">Quilometragem</label>
                        <input type="number" id="quilometragem" name="quilometragem" placeholder="Ex: 50000"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="combustivel" class="text-sm text-gray-300 mb-1 block">Combustível</label>
                        <select id="combustivel" name="combustivel"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white">
                            <option value="" disabled selected>Selecione o combustível</option>
                            <option class="text-white" value="Gasolina">Gasolina</option>
                            <option class="text-white" value="Diesel">Diesel</option>
                            <option class="text-white" value="Elétrico">Elétrico</option>
                            <option class="text-white" value="Híbrido">Híbrido</option>
                        </select>
                    </div>
                    <div>
                        <label for="descricao" class="text-sm text-gray-300 mb-1 block">Descrição</label>
                        <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva o veículo"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white resize-none focus:ring-2 focus:ring-red-500 focus:outline-none transition"></textarea>
                    </div>
                    <div>
                        <label for="versao" class="text-sm text-gray-300 mb-1 block">Versão</label>
                        <input type="text" id="versao" name="versao" placeholder="Ex: M Sport, AMG"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="estado" class="text-sm text-gray-300 mb-1 block">Estado</label>
                        <select id="estado" name="estado"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white">
                            <option value="" disabled selected>Selecione o estado</option>
                            <option class="text-white" value="disponivel">Disponível</option>
                            <option class="text-white" value="reservado">Reservado</option>
                            <option class="text-white" value="vendido">Vendido</option>
                        </select>
                    </div>
                    <div>
                        <label for="ndeportas" class="text-sm text-gray-300 mb-1 block">Número de Portas</label>
                        <input type="number" id="ndeportas" name="ndeportas" min="1" max="5" placeholder="Ex: 2, 4, 5"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="lotacao" class="text-sm text-gray-300 mb-1 block">Lotação</label>
                        <input type="number" id="lotacao" name="lotacao" min="1" max="10" placeholder="Ex: 4, 5"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                </div>

                <!-- Coluna 3 -->
                <div class="space-y-6">
                    <div>
                        <label for="ndemudancas" class="text-sm text-gray-300 mb-1 block">Número de Mudanças</label>
                        <input type="number" id="ndemudancas" name="ndemudancas" min="1" max="10" placeholder="Ex: 6, 7"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="tipodecaixaa" class="text-sm text-gray-300 mb-1 block">Tipo de Caixa</label>
                        <select id="tipodecaixaa" name="tipodecaixaa"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white">
                            <option value="" disabled selected>Selecione o tipo de caixa</option>
                            <option class="text-white" value="Manual">Manual</option>
                            <option class="text-white" value="Automática">Automática</option>
                            <option class="text-white" value="Semi-Automática">Semi-Automática</option>
                        </select>
                    </div>
                    <div>
                        <label for="tracao" class="text-sm text-gray-300 mb-1 block">Tração</label>
                        <select id="tracao" name="tracao"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white">
                            <option value="" disabled selected>Selecione a tração</option>
                            <option class="text-white" value="Dianteira">Dianteira</option>
                            <option class="text-white" value="Traseira">Traseira</option>
                            <option class="text-white" value="Integral">Integral</option>
                        </select>
                    </div>
                    <div>
                        <label for="2chave" class="text-sm text-gray-300 mb-1 block">Segunda Chave</label>
                        <select id="2chave" name="2chave"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-gray-400">
                            <option value="" disabled selected>Selecione uma opção</option>
                            <option class="text-white" value="Sim">Sim</option>
                            <option class="text-white" value="Não">Não</option>
                        </select>
                    </div>
                    <div>
                        <label for="segmento" class="text-sm text-gray-300 mb-1 block">Segmento</label>
                        <input type="text" id="segmento" name="segmento" placeholder="Ex: Sedan, SUV, Desportivo"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="potencia" class="text-sm text-gray-300 mb-1 block">Potência (cv)</label>
                        <input type="number" id="potencia" name="potencia" min="0" placeholder="Ex: 150, 410"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="cilindrada" class="text-sm text-gray-300 mb-1 block">Cilindrada (cc)</label>
                        <input type="number" id="cilindrada" name="cilindrada" min="0" placeholder="Ex: 1600, 2993"
                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-600 text-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                    </div>
                </div>
            </div>

            <!-- Botões -->
            <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
                <a href="<?= url_to('Cars_Dashboard') ?>"
                    class="px-6 py-3 border border-gray-600 text-gray-300 hover:bg-gray-700 rounded-xl text-center transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-xl shadow flex items-center justify-center transition">
                    <iconify-icon icon="lucide:save" class="mr-2"></iconify-icon>
                    Criar Veículo
                </button>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('js/input_imagens.js'); ?>"></script>
<script>
// Atualiza cor do texto dos selects
function updateSelectColor(select) {
    if (select.value) {
        select.classList.remove('text-gray-400');
        select.classList.add('text-white');
    } else {
        select.classList.remove('text-white');
        select.classList.add('text-gray-400');
    }
}

// Aplica ao carregar a página
document.querySelectorAll('select').forEach(select => {
    updateSelectColor(select);
    select.addEventListener('change', () => updateSelectColor(select));
});
</script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>