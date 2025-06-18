// Função para alternar o dropdown ao clicar no botão
function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.classList.toggle('hidden');
}

// Fecha o dropdown se clicar fora do botão ou do menu
window.onclick = function (event) {
    const dropdown = document.getElementById('dropdownMenu');
    const button = document.getElementById('dropdownButton');

    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
};
