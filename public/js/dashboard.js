function setActive(element) {
    // Remove active class from all links
    document.querySelectorAll('nav a').forEach((el) => el.classList.remove('bg-gray-800'));
    // Add active class to the clicked link
    element.classList.add('bg-gray-800');
}