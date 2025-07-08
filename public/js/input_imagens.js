
const inputReal = document.getElementById('carro_imagens_input');
const inputHidden = document.getElementById('carro_imagens_hidden');
const previewContainer = document.getElementById('carro_imagens_preview');

let imagensSelecionadas = [];

inputReal.addEventListener('change', (event) => {
    const novasImagens = Array.from(event.target.files);

    novasImagens.forEach(file => {
        // Impedir duplicados
        if (!imagensSelecionadas.some(f => f.name === file.name && f.lastModified === file.lastModified)) {
            imagensSelecionadas.push(file);
        }
    });

    atualizarPreviews();
    atualizarInputHidden();

    // Limpar input visível para poder selecionar o mesmo ficheiro novamente se necessário
    inputReal.value = '';
});

function atualizarPreviews() {
    previewContainer.innerHTML = '';
    imagensSelecionadas.forEach((file, index) => {
        const url = URL.createObjectURL(file);

        const div = document.createElement('div');
        div.className = "relative group";

        div.innerHTML = `
    <img src="${url}" class="rounded-lg border border-gray-600 w-full h-32 object-cover">
        <button type="button" onclick="removerImagem(${index})"
            class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
            &times;
        </button>
        `;

        previewContainer.appendChild(div);
    });
}

function atualizarInputHidden() {
    const dataTransfer = new DataTransfer();
    imagensSelecionadas.forEach(file => dataTransfer.items.add(file));
    inputHidden.files = dataTransfer.files;
}

function removerImagem(index) {
    imagensSelecionadas.splice(index, 1);
    atualizarPreviews();
    atualizarInputHidden();
}