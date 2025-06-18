<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div class="flex items-center">
            <iconify-icon icon="lucide:car" class="text-red-500 text-4xl mr-3"></iconify-icon>
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent">
                    Editar Veículo
                </h1>
                <p class="text-gray-400 mt-1">Atualize os detalhes do veículo</p>
            </div>
        </div>
        <a href="<?= url_to('AdminDashboard') ?>"
            class="inline-flex items-center justify-center px-6 py-3 bg-gray-700 hover:bg-gray-800 text-white font-medium rounded-lg shadow transition-all">
            <iconify-icon icon="lucide:arrow-left" class="mr-2"></iconify-icon>
            Voltar
        </a>
    </div>

    <div class="bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-700 p-6">
        <form action="<?= base_url('dashboard/update/' . $carro['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Coluna 1 -->
                <div class="space-y-6">
                    <div>
                        <label for="marca" class="block text-sm font-medium text-gray-300 mb-1">Marca</label>
                        <input type="text" id="marca" name="marca" value="<?= esc($carro['marca']) ?>"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label for="modelo" class="block text-sm font-medium text-gray-300 mb-1">Modelo</label>
                        <input type="text" id="modelo" name="modelo" value="<?= esc($carro['modelo']) ?>"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label for="ano" class="block text-sm font-medium text-gray-300 mb-1">Ano</label>
                        <input type="number" id="ano" name="ano" value="<?= esc($carro['ano']) ?>"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label for="preco" class="block text-sm font-medium text-gray-300 mb-1">Preço (€)</label>
                        <input type="number" id="preco" name="preco" value="<?= esc($carro['preco']) ?>"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label for="preco_desconto" class="block text-sm font-medium text-gray-300 mb-1">Preço
                            Promocional (€)</label>
                        <input type="number" id="preco_desconto" name="preco_desconto"
                            value="<?= esc($carro['preco_desconto']) ?>"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>
                </div>

                <!-- Coluna 2 -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Imagem Atual</label>
                        <div class="mt-1">
                            <img src="<?= base_url('uploads/carros/' . $carro['imagem_url']) ?>" alt="Imagem atual"
                                class="h-40 rounded-lg object-cover border border-gray-600">
                        </div>
                    </div>

                    <div>
                        <label for="imagem" class="block text-sm font-medium text-gray-300 mb-1">Alterar Imagem</label>
                        <input type="file" id="imagem" name="imagem"
                            class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600">
                    </div>

                    <div>
                        <label for="quilometragem"
                            class="block text-sm font-medium text-gray-300 mb-1">Quilometragem</label>
                        <input type="number" id="quilometragem" name="quilometragem"
                            value="<?= esc($carro['quilometragem']) ?>"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                    </div>

                    <div>
                        <label for="combustivel"
                            class="block text-sm font-medium text-gray-300 mb-1">Combustível</label>
                        <select id="combustivel" name="combustivel"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <?php
                                $combustiveis = ['Gasolina', 'Diesel', 'Elétrico', 'Híbrido'];
                                foreach ($combustiveis as $tipo) {
                                    $selected = $carro['combustivel'] === $tipo ? 'selected' : '';
                                    echo "<option value='$tipo' $selected>$tipo</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="estado" class="block text-sm font-medium text-gray-300 mb-1">Estado</label>
                        <select id="estado" name="estado"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white">
                            <?php
                                $estados = ['disponivel' => 'Disponível', 'reservado' => 'Reservado', 'vendido' => 'Vendido'];
                                foreach ($estados as $valor => $texto) {
                                    $selected = $carro['estado'] === $valor ? 'selected' : '';
                                    echo "<option value='$valor' $selected>$texto</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
                <a href="<?= url_to('AdminDashboard') ?>"
                    class="px-6 py-3 border border-gray-600 text-gray-300 hover:bg-gray-700 rounded-lg text-center">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow flex items-center justify-center">
                    <iconify-icon icon="lucide:save" class="mr-2"></iconify-icon>
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</div>