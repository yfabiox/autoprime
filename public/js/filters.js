document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".custom-dropdown").forEach(dropdown => {
        const btn = dropdown.querySelector(".dropdown-btn");
        const menu = dropdown.querySelector(".dropdown-menu");
        const options = menu.querySelectorAll(".dropdown-item");
        const hiddenInput = dropdown.querySelector(".dropdown-input");

        btn.addEventListener("click", function () {
            if (menu.classList.contains("hidden")) {
                menu.classList.remove("hidden");
            } else {
                menu.scrollTop = 0;
                menu.classList.add("hidden");
            }
        });

        options.forEach(option => {
            option.addEventListener("click", function () {
                btn.textContent = this.textContent;
                hiddenInput.value = this.getAttribute("data-value");
                menu.scrollTop = 0;
                menu.classList.add("hidden");

                // 🔽 ATUALIZA OS MODELOS QUANDO UMA MARCA É SELECIONADA
                if (hiddenInput.name === "marca") {
                    atualizarDropdownModelos(this.getAttribute("data-value"));
                }
            });
        });

        menu.addEventListener("wheel", function (event) {
            event.stopPropagation();
        });

        document.addEventListener("click", function (e) {
            if (!dropdown.contains(e.target)) {
                menu.scrollTop = 0;
                menu.classList.add("hidden");
            }
        });
    });

    // 🔧 Função que atualiza o dropdown de modelos
    function atualizarDropdownModelos(marcaSelecionada) {
        const dropdownModelos = document.querySelector('[name="modelo"]').closest('.custom-dropdown');
        const menuModelos = dropdownModelos.querySelector(".dropdown-menu");
        const btnModelos = dropdownModelos.querySelector(".dropdown-btn");
        const inputModelos = dropdownModelos.querySelector(".dropdown-input");

        // Limpa modelos atuais
        menuModelos.innerHTML = "";

        // Adiciona "Selecionar Modelo"
        const defaultOption = document.createElement("div");
        defaultOption.className = "dropdown-item py-2 px-4 hover:bg-gray-200 cursor-pointer";
        defaultOption.setAttribute("data-value", "");
        defaultOption.textContent = "Selecionar Modelo";
        menuModelos.appendChild(defaultOption);

        // Se marca válida, adiciona modelos dela
        if (marcaSelecionada && modelosPorMarca[marcaSelecionada]) {
            modelosPorMarca[marcaSelecionada].forEach(modelo => {
                const div = document.createElement("div");
                div.className = "dropdown-item py-2 px-4 hover:bg-gray-200 cursor-pointer";
                div.setAttribute("data-value", modelo);
                div.textContent = modelo;
                menuModelos.appendChild(div);
            });
        }

        // Reseta botão e input
        btnModelos.textContent = "Selecionar Modelo";
        inputModelos.value = "";

        // Reaplica eventos de clique aos novos itens
        menuModelos.querySelectorAll(".dropdown-item").forEach(option => {
            option.addEventListener("click", function () {
                btnModelos.textContent = this.textContent;
                inputModelos.value = this.getAttribute("data-value");
                menuModelos.scrollTop = 0;
                menuModelos.classList.add("hidden");
            });
        });
    }
});
