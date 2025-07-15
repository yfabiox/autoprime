<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div class="flex items-center">
            <iconify-icon icon="lucide:car" class="text-red-500 text-4xl mr-3"></iconify-icon>
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent">
                    Editar Veículo
                </h1>
                <p class="text-gray-400 mt-1">Atualize os dados do veículo no sistema</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 border border-gray-700 rounded-2xl shadow-xl p-8">
        <form action="<?= base_url('dashboard/update/' . $carro['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Coluna 1 -->
                <div class="space-y-6">
                    <div>
                        <label for="marca" class="block text-sm font-medium text-gray-300 mb-1">Marca</label>
                        <input type="text" id="marca" name="marca" value="<?= esc($carro['marca']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="modelo" class="block text-sm font-medium text-gray-300 mb-1">Modelo</label>
                        <input type="text" id="modelo" name="modelo" value="<?= esc($carro['modelo']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="ano" class="block text-sm font-medium text-gray-300 mb-1">Ano</label>
                        <input type="number" id="ano" name="ano" value="<?= esc($carro['ano']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="cor" class="block text-sm font-medium text-gray-300 mb-1">Cor</label>
                        <input type="text" id="cor" name="cor" value="<?= esc($carro['cor']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="preco" class="block text-sm font-medium text-gray-300 mb-1">Preço (€)</label>
                        <input type="number" id="preco" name="preco" value="<?= esc($carro['preco']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required
                            step="0.01">
                    </div>

                    <div>
                        <label for="preco_desconto" class="block text-sm font-medium text-gray-300 mb-1">Preço
                            Promocional (€)</label>
                        <input type="number" id="preco_desconto" name="preco_desconto"
                            value="<?= esc($carro['preco_desconto']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2"
                            step="0.01">
                    </div>

                    <div>
                        <label for="imagem" class="block text-sm font-medium text-gray-300 mb-1">Imagem</label>
                        <input type="file" id="imagem" name="imagem"
                            class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-700 file:text-white hover:file:bg-red-600">
                    </div>
                </div>

                <!-- Coluna 2 -->
                <div class="space-y-6">
                    <div>
                        <label for="quilometragem"
                            class="block text-sm font-medium text-gray-300 mb-1">Quilometragem</label>
                        <input type="number" id="quilometragem" name="quilometragem"
                            value="<?= esc($carro['quilometragem']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required>
                    </div>

                    <div>
                        <label for="combustivel"
                            class="block text-sm font-medium text-gray-300 mb-1">Combustível</label>
                        <select id="combustivel" name="combustivel"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
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
                        <label for="descricao" class="block text-sm font-medium text-gray-300 mb-1">Descrição</label>
                        <textarea id="descricao" name="descricao" rows="4"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2"><?= esc($carro['descricao']) ?></textarea>
                    </div>

                    <div>
                        <label for="versao" class="block text-sm font-medium text-gray-300 mb-1">Versão</label>
                        <input type="text" id="versao" name="versao" value="<?= esc($carro['versao']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label for="estado" class="block text-sm font-medium text-gray-300 mb-1">Estado</label>
                        <select id="estado" name="estado"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                            <?php
                            $estados = ['disponivel' => 'Disponível', 'reservado' => 'Reservado', 'vendido' => 'Vendido'];
                            foreach ($estados as $valor => $texto) {
                                $selected = $carro['estado'] === $valor ? 'selected' : '';
                                echo "<option value='$valor' $selected>$texto</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="ndeportas" class="block text-sm font-medium text-gray-300 mb-1">Número de
                            Portas</label>
                        <input type="number" id="ndeportas" name="ndeportas" value="<?= esc($carro['ndeportas']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label for="lotacao" class="block text-sm font-medium text-gray-300 mb-1">Lotação</label>
                        <input type="number" id="lotacao" name="lotacao" value="<?= esc($carro['lotacao']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                    </div>
                </div>

                <!-- Coluna 3 -->
                <div class="space-y-6">
                    <div>
                        <label for="ndemudancas" class="block text-sm font-medium text-gray-300 mb-1">Número de
                            Mudanças</label>
                        <input type="number" id="ndemudancas" name="ndemudancas"
                            value="<?= esc($carro['ndemudancas']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label for="tipodecaixaa" class="block text-sm font-medium text-gray-300 mb-1">Tipo de
                            Caixa</label>
                        <select id="tipodecaixaa" name="tipodecaixaa"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required>
                            <?php
                            $tiposCaixa = ['Manual', 'Automática', 'Semi-automática'];
                            foreach ($tiposCaixa as $tipo) {
                                $selected = $carro['tipodecaixaa'] === $tipo ? 'selected' : '';
                                echo "<option value='$tipo' $selected>$tipo</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="tracao" class="block text-sm font-medium text-gray-300 mb-1">Tração</label>
                        <select id="tracao" name="tracao"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2" required>
                            <?php
                            $tracoes = ['Dianteira', 'Traseira', 'Integral', '4x4'];
                            foreach ($tracoes as $tipo) {
                                $selected = $carro['tracao'] === $tipo ? 'selected' : '';
                                echo "<option value='$tipo' $selected>$tipo</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="2chave" class="block text-sm font-medium text-gray-300 mb-1">2ª Chave</label>
                        <select id="2chave" name="2chave"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                            <?php
                            $chaveOptions = ['Sim', 'Não'];
                            foreach ($chaveOptions as $option) {
                                $selected = $carro['2chave'] === $option ? 'selected' : '';
                                echo "<option value='$option' $selected>$option</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="segmento" class="block text-sm font-medium text-gray-300 mb-1">Segmento</label>
                        <input type="text" id="segmento" name="segmento" value="<?= esc($carro['segmento']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label for="potencia" class="block text-sm font-medium text-gray-300 mb-1">Potência (cv)</label>
                        <input type="number" id="potencia" name="potencia" value="<?= esc($carro['potencia']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                    </div>

                    <div>
                        <label for="cilindrada" class="block text-sm font-medium text-gray-300 mb-1">Cilindrada
                            (cc)</label>
                        <input type="number" id="cilindrada" name="cilindrada" value="<?= esc($carro['cilindrada']) ?>"
                            class="w-full bg-gray-800 text-white border border-gray-600 rounded-lg px-4 py-2">
                    </div>
                </div>
            </div>

            <div class="mt-10 flex justify-end gap-4">
                <a href="<?= url_to('Cars_Dashboard') ?>"
                    class="px-6 py-3 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 text-sm">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-6 py-3 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold text-sm flex items-center gap-2 shadow">
                    <iconify-icon icon="lucide:save"></iconify-icon>
                    Guardar Alterações
                </button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>