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
    <div class="bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-700 p-6">
        <form action="<?= url_to('store_admin') ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Coluna 1 -->
                <div class="space-y-6">
                    <div>
                        <label for="marca" class="block text-sm font-medium text-gray-300 mb-1">Marca</label>
                        <input type="text" id="marca" name="marca"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Digite a marca">
                    </div>
                    <div>
                        <label for="modelo" class="block text-sm font-medium text-gray-300 mb-1">Modelo</label>
                        <input type="text" id="modelo" name="modelo"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Digite o modelo">
                    </div>
                    <div>
                        <label for="ano" class="block text-sm font-medium text-gray-300 mb-1">Ano</label>
                        <input type="number" id="ano" name="ano"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: 2020">
                    </div>
                    <div>
                        <label for="cor" class="block text-sm font-medium text-gray-300 mb-1">Cor</label>
                        <input type="text" id="cor" name="cor"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: Preto, Branco">
                    </div>
                    <div>
                        <label for="preco" class="block text-sm font-medium text-gray-300 mb-1">Preço (€)</label>
                        <input type="number" id="preco" name="preco"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            step="0.01" placeholder="Ex: 15000.00">
                    </div>
                    <div>
                        <label for="preco_desconto" class="block text-sm font-medium text-gray-300 mb-1">Preço
                            Promocional (€)</label>
                        <input type="number" id="preco_desconto" name="preco_desconto"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            step="0.01" placeholder="Deixe vazio se não houver desconto">
                    </div>
                    <div>
                        <label for="imagem_principal" class="block text-sm font-medium text-gray-300 mb-1">Imagem
                            Principal</label>
                        <input type="file" id="imagem_principal" name="imagem_principal" accept="image/*"
                            class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600">
                    </div>
                    <div>
                        <label for="carro_imagens_input" class="block text-sm font-medium text-gray-300 mb-1">Imagens do
                            Carrossel</label>

                        <!-- Botão para selecionar imagens -->
                        <input type="file" id="carro_imagens_input" accept="image/*"
                            class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600">

                        <!-- Pré-visualizações -->
                        <div id="carro_imagens_preview"
                            class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>

                        <!-- Input real que envia para o servidor -->
                        <input type="file" name="carro_imagens[]" id="carro_imagens_hidden" style="display: none;"
                            multiple>
                    </div>



                </div>

                <!-- Coluna 2 -->
                <div class="space-y-6">
                    <div>
                        <label for="quilometragem"
                            class="block text-sm font-medium text-gray-300 mb-1">Quilometragem</label>
                        <input type="number" id="quilometragem" name="quilometragem"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: 50000">
                    </div>
                    <div>
                        <label for="combustivel"
                            class="block text-sm font-medium text-gray-300 mb-1">Combustível</label>
                        <select id="combustivel" name="combustivel"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="" disabled selected>Selecione o combustível</option>
                            <option class="text-white" value="Gasolina">Gasolina</option>
                            <option class="text-white" value="Diesel">Diesel</option>
                            <option class="text-white" value="Elétrico">Elétrico</option>
                            <option class="text-white" value="Híbrido">Híbrido</option>
                        </select>
                    </div>
                    <div>
                        <label for="descricao" class="block text-sm font-medium text-gray-300 mb-1">Descrição</label>
                        <textarea id="descricao" name="descricao" rows="4"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white resize-none"
                            placeholder="Descreva o veículo"></textarea>
                    </div>
                    <div>
                        <label for="versao" class="block text-sm font-medium text-gray-300 mb-1">Versão</label>
                        <input type="text" id="versao" name="versao"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: M Sport, AMG">
                    </div>
                    <div>
                        <label for="estado" class="block text-sm font-medium text-gray-300 mb-1">Estado</label>
                        <select id="estado" name="estado"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="" disabled selected>Selecione o estado</option>
                            <option class="text-white" value="disponivel">Disponível</option>
                            <option class="text-white" value="reservado">Reservado</option>
                            <option class="text-white" value="vendido">Vendido</option>
                        </select>
                    </div>
                    <div>
                        <label for="ndeportas" class="block text-sm font-medium text-gray-300 mb-1">Número de
                            Portas</label>
                        <input type="number" id="ndeportas" name="ndeportas" min="1" max="5"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: 2, 4, 5">
                    </div>
                    <div>
                        <label for="lotacao" class="block text-sm font-medium text-gray-300 mb-1">Lotação (número de
                            lugares)</label>
                        <input type="number" id="lotacao" name="lotacao" min="1" max="10"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: 4, 5">
                    </div>
                </div>

                <!-- Coluna 3 -->
                <div class="space-y-6">
                    <div>
                        <label for="ndemudancas" class="block text-sm font-medium text-gray-300 mb-1">Número de
                            Mudanças</label>
                        <input type="number" id="ndemudancas" name="ndemudancas" min="1" max="10"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: 6, 7">
                    </div>
                    <div>
                        <label for="tipodecaixaa" class="block text-sm font-medium text-gray-300 mb-1">Tipo de
                            Caixa</label>
                        <select id="tipodecaixaa" name="tipodecaixaa"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="" disabled selected>Selecione o tipo de caixa</option>
                            <option class="text-white" value="Manual">Manual</option>
                            <option class="text-white" value="Automática">Automática</option>
                            <option class="text-white" value="Semi-Automática">Semi-Automática</option>
                        </select>
                    </div>
                    <div>
                        <label for="tracao" class="block text-sm font-medium text-gray-300 mb-1">Tração</label>
                        <select id="tracao" name="tracao"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <option value="" disabled selected>Selecione a tração</option>
                            <option class="text-white" value="Dianteira">Dianteira</option>
                            <option class="text-white" value="Traseira">Traseira</option>
                            <option class="text-white" value="Integral">Integral</option>
                        </select>
                    </div>
                    <div>
                        <label for="2chave" class="block text-sm font-medium text-gray-300 mb-1">Segunda Chave</label>
                        <select id="2chave" name="2chave"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-gray-400">
                            <option value="" disabled selected>Selecione uma opção</option>
                            <option class="text-white" value="Sim">Sim</option>
                            <option class="text-white" value="Não">Não</option>
                        </select>
                    </div>

                    <div>
                        <label for="segmento" class="block text-sm font-medium text-gray-300 mb-1">Segmento</label>
                        <input type="text" id="segmento" name="segmento"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: Sedan, SUV, Desportivo">
                    </div>
                    <div>
                        <label for="potencia" class="block text-sm font-medium text-gray-300 mb-1">Potência (cv)</label>
                        <input type="number" id="potencia" name="potencia" min="0"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: 150, 410">
                    </div>
                    <div>
                        <label for="cilindrada" class="block text-sm font-medium text-gray-300 mb-1">Cilindrada
                            (cc)</label>
                        <input type="number" id="cilindrada" name="cilindrada" min="0"
                            class="block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white"
                            placeholder="Ex: 1600, 2993">
                    </div>
                </div>
            </div>

            <!-- Botões -->
            <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
                <a href="<?= url_to('Cars_Dashboard') ?>"
                    class="px-6 py-3 border border-gray-600 text-gray-300 hover:bg-gray-700 rounded-lg text-center">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow flex items-center justify-center">
                    <iconify-icon icon="lucide:save" class="mr-2"></iconify-icon>
                    Criar Veículo
                </button>
            </div>
        </form>
    </div>
</div>


<script src="<?= base_url('js/input_imagens.js'); ?>"></script>
<script>
// Função para atualizar a cor do select conforme valor selecionado
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