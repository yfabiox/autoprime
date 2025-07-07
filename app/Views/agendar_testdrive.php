<div class="max-w-screen-2xl mx-auto px-4 lg:px-0 mt-8">
    <div class="bg-neutral-900 border border-neutral-700 text-white rounded-xl shadow-lg p-6 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-red-600 mb-6 flex items-center gap-2">
            <i data-lucide="calendar-clock" class="w-6 h-6"></i>
            Agendar Test Drive
        </h2>

        <form action="<?= base_url('testdrive/enviar') ?>" method="post" class="space-y-5">
            <div>
                <label class="block text-sm text-gray-300 mb-1">Nome completo</label>
                <input type="text" name="nome_cliente" required
                    class="w-full bg-neutral-800 border border-neutral-600 rounded-lg px-4 py-2 text-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600" />
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1">Email</label>
                <input type="email" name="email_cliente" required
                    class="w-full bg-neutral-800 border border-neutral-600 rounded-lg px-4 py-2 text-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600" />
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1">Telefone</label>
                <input type="tel" name="telefone_cliente" required
                    class="w-full bg-neutral-800 border border-neutral-600 rounded-lg px-4 py-2 text-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600" />
            </div>

            <!-- Mantém a visualização só para mostrar o carro -->
            <div>
                <label class="block text-sm text-gray-300 mb-1">Carro</label>
                <input type="text" disabled
                    class="w-full bg-neutral-800 border border-neutral-600 rounded-lg px-4 py-2 text-gray-300"
                    value="<?= esc($carro['marca']) ?> <?= esc($carro['modelo']) ?>" />
                <!-- Campo hidden para enviar o id do carro -->
                <input type="hidden" name="carro_id" value="<?= $carro['id'] ?>" />
            </div>


            <div>
                <label class="block text-sm text-gray-300 mb-1">Data e hora</label>
                <input type="datetime-local" name="data_agendada" required
                    class="w-full bg-neutral-800 border border-neutral-600 rounded-lg px-4 py-2 text-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600" />
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1">Mensagem adicional (opcional)</label>
                <textarea name="mensagem" rows="3"
                    class="w-full bg-neutral-800 border border-neutral-600 rounded-lg px-4 py-2 text-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600"></textarea>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-red-700 hover:bg-red-600 transition-colors duration-200 text-white font-semibold py-2 px-4 rounded-lg">
                    Confirmar Agendamento
                </button>
            </div>
        </form>
    </div>
</div>