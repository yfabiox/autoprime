document.addEventListener("DOMContentLoaded", function () {
  const carrosContainer = document.getElementById("carros-container");
  const prevButton = document.getElementById("prevPage");
  const nextButton = document.getElementById("nextPage");
  const pageInfo = document.getElementById("pageInfo");
  const ordenarSelect = document.getElementById("ordenar");

  let currentPage = 1;
  const itemsPerPage = 5; // Quantidade de carros por página

  // Função para aplicar a ordenação
  function ordenarCarros() {
    const order = ordenarSelect.value;

    if (order) {
      switch (order) {
        case "preco_asc":
          carros.sort((a, b) => (a.preco_desconto || a.preco) - (b.preco_desconto || b.preco));
          break;
        case "preco_desc":
          carros.sort((a, b) => (b.preco_desconto || b.preco) - (a.preco_desconto || a.preco));
          break;
        case "alfabeto_asc":
          carros.sort((a, b) => a.marca.localeCompare(b.marca));
          break;
        case "alfabeto_desc":
          carros.sort((a, b) => b.marca.localeCompare(a.marca));
          break;
      }
    }
  }

  // Função para renderizar os carros
  function renderCarros() {
    carrosContainer.innerHTML = ""; // Limpa os carros antigos

    // Paginando os carros
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const carrosPagina = carros.slice(start, end);

    // Exibe os carros
    carrosPagina.forEach(carro => {
      // Verifica se existe um preco_desconto
      const preco = carro.preco_desconto ? carro.preco_desconto : carro.preco;
      const precoFormatado = parseFloat(preco).toLocaleString('pt-PT', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' €';

      // Se houver preco_desconto, mostra o preço original riscado
      const precoOriginal = carro.preco_desconto ? `
        <p class="line-through text-gray-400 text-lg">${parseFloat(carro.preco).toLocaleString('pt-PT', { minimumFractionDigits: 0, maximumFractionDigits: 0 })} €</p>
      ` : '';

      const carHtml = `
        <div class="mb-8">
          <a href="/autoprime/public/index.php/detalhe_carro/${carro.id}" class="block group transform hover:-translate-y-1 transition-all duration-300 hover:shadow-xl">
            <div class="bg-neutral-800 rounded-xl overflow-hidden border-2 border-gray-700 hover:border-red-600 flex flex-col md:flex-row h-full min-h-[280px]">
              <!-- Seção da Imagem -->
              <div class="md:w-2/5 relative overflow-hidden">
                <img alt="${carro.modelo}" 
                    class="w-full h-full min-h-[200px] md:min-h-full object-cover transition-transform duration-500" 
                    src="/autoprime/public/uploads/carros/${carro.imagem_url}" />
                
                <!-- Badge de estado mais destacado -->
                <div class="absolute top-4 left-4 px-3 py-1.5 rounded-full text-xs font-bold shadow-md
                          ${carro.estado === 'disponivel' ? 'bg-green-800 text-green-100' : 'bg-red-800 text-red-100'}">
                  ${carro.estado.toUpperCase()}
                </div>
              </div>

              <!-- Seção de Conteúdo -->
              <div class="md:w-3/5 p-6 flex flex-col justify-between">
                <div>
                  <!-- Título mais destacado -->
                  <h3 class="text-2xl font-extrabold text-gray-100 mb-3 group-hover:text-red-500 transition-colors">
                    ${carro.marca} <span class="text-red-500">${carro.modelo}</span>
                  </h3>
                  
                  <!-- Especificações com ícones mais visíveis -->
                  <div class="grid grid-cols-2 gap-3 text-sm text-gray-300 mb-5">
                    <div class="flex items-center">
                      <iconify-icon icon="lucide:calendar" class="text-red-500 mr-2 text-lg"></iconify-icon>
                      <span>${carro.ano}</span>
                    </div>
                    <div class="flex items-center">
                      <iconify-icon icon="lucide:gauge" class="text-red-500 mr-2 text-lg"></iconify-icon>
                      <span>${carro.quilometragem} km</span>
                    </div>
                    <div class="flex items-center">
                      <iconify-icon icon="lucide:zap" class="text-red-500 mr-2 text-lg"></iconify-icon>
                      <span>${carro.potencia} cv</span>
                    </div>
                    <div class="flex items-center">
                      <iconify-icon icon="lucide:fuel" class="text-red-500 mr-2 text-lg"></iconify-icon>
                      <span>${carro.combustivel}</span>
                    </div>
                    <!-- Adicionado Tipo de Caixa -->
                    <div class="flex items-center">
                      <iconify-icon icon="lucide:settings" class="text-red-500 mr-2 text-lg"></iconify-icon>
                      <span>${carro.tipodecaixaa}</span>
                    </div>
                    <!-- Adicionado Lotação -->
                    <div class="flex items-center">
                      <iconify-icon icon="lucide:users" class="text-red-500 mr-2 text-lg"></iconify-icon>
                      <span>${carro.lotacao} lugares</span>
                    </div>
                  </div>
                </div>

                <!-- Seção de Preço mais robusta -->
                <div class="border-t border-gray-700 pt-4">
                  ${carro.preco_desconto ? `
                    <div class="flex flex-col items-start">
                      <div class="flex items-baseline gap-2">
                        <span class="text-green-400 font-bold text-2xl">${precoFormatado}</span>
                        <span class="bg-red-600 text-white text-xs px-2 py-1 rounded-full">PROMOÇÃO</span>
                      </div>
                      <div class="flex items-center mt-1">
                        <span class="line-through text-gray-400 text-base mr-2">${parseFloat(carro.preco).toLocaleString('pt-PT', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      })} €</span>
                        <span class="text-xs bg-gray-700 text-red-400 px-2 py-0.5 rounded">Economize ${Math.round((carro.preco - carro.preco_desconto) / 1000)}k €</span>
                      </div>
                    </div>
                  ` : `
                    <div class="flex justify-between items-center">
                      <span class="text-gray-100 font-bold text-2xl">${precoFormatado}</span>
                      <span class="text-xs bg-gray-700 text-green-400 px-2 py-1 rounded-full">PREÇO NORMAL</span>
                    </div>
                  `}
                </div>
              </div>
            </div>
          </a>
        </div>
      `;
      carrosContainer.innerHTML += carHtml;
    });

    pageInfo.innerText = `Página ${currentPage} de ${Math.ceil(carros.length / itemsPerPage)}`;

    prevButton.disabled = currentPage === 1;
    nextButton.disabled = end >= carros.length;
  }

  // Função de navegação
  prevButton.addEventListener("click", function () {
    if (currentPage > 1) {
      currentPage--;
      renderCarros();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  });

  nextButton.addEventListener("click", function () {
    if (currentPage * itemsPerPage < carros.length) {
      currentPage++;
      renderCarros();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  });

  // Quando a seleção de ordenação mudar
  ordenarSelect.addEventListener("change", function () {
    ordenarCarros();
    currentPage = 1; // Voltar para a primeira página sempre que ordenar
    renderCarros();
  });

  // Inicializar a renderização
  renderCarros();
});