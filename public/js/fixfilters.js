document.addEventListener("DOMContentLoaded", function () {
  const filterForm = document.getElementById("filterForm");
  const filterPlaceholder = document.createElement("div");
  filterPlaceholder.style.height = `${filterForm.offsetHeight}px`;
  filterPlaceholder.style.display = "none"; // Inicialmente escondido
  filterForm.parentNode.insertBefore(filterPlaceholder, filterForm);

  function expandFilter() {
    filterForm.classList.remove("max-h-32", "overflow-hidden");
    filterForm.classList.add("max-h-screen", "p-8");
  }

  function collapseFilter() {
    if (window.scrollY > 100) {
      filterForm.classList.add("max-h-32", "overflow-hidden", "p-4");
      filterForm.classList.remove("max-h-screen", "p-8");
    }
  }

  function checkScroll() {
    if (window.scrollY > 100) {
      filterPlaceholder.style.display = "block"; // Mantém o espaço ao fixar
      filterForm.classList.add(
        "fixed", "top-[-100px]", "left-0", "right-0", "z-10",
        "bg-neutral-800", "shadow-lg", "max-h-32", "overflow-hidden",
        "p-4", "transition-all", "duration-500"
      );

      setTimeout(() => {
        filterForm.classList.remove("top-[-100px]");
        filterForm.classList.add("top-0");
      }, 10);
      filterForm.classList.remove("p-8", "rounded-3xl", "mt-10");
      
    } else {
      filterPlaceholder.style.display = "none"; // Remove o espaço extra ao voltar
      filterForm.classList.remove(
        "fixed", "top-0", "left-0", "right-0", "z-10",
        "bg-neutral-800", "shadow-lg", "max-h-32", "overflow-hidden",
        "p-4"
      );
      filterForm.classList.add("p-8", "rounded-3xl", "mt-10");
    }
  }

  filterForm.addEventListener("mouseenter", expandFilter);
  filterForm.addEventListener("mouseleave", collapseFilter);
  window.addEventListener("scroll", checkScroll);
  checkScroll();
});
