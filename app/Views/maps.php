<!-- Localização -->
<div class="w-full pt-20 pb-20">
    <div class="max-w-7xl mx-auto px-8">
        <div class="pb-2 rounded-lg mb-6 text-center">
            <h3 class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-red-600 drop-shadow-lg">
                Onde Estamos ?
            </h3>
        </div>

        <!-- Contêiner com flex para alinhar lado a lado -->
        <div class="flex flex-col md:flex-row gap-8 items-stretch">
            <!-- Mapa -->
            <div class="md:w-2/3 h-[400px] rounded-lg shadow-lg overflow-hidden">
                <div id="map" class="w-full h-full"></div>
            </div>

            <!-- Informações -->
            <div class="md:w-1/3 flex flex-col justify-between h-auto p-6 bg-neutral-800 rounded-lg">
                <div class="space-y-4 text-gray-200">
                    <h4 class="text-2xl font-bold text-white">AutoPrime</h4>

                    <div class="flex items-start">
                        <i class="fa-solid fa-location-dot mr-2 mt-1 text-red-500"></i>
                        <div>
                            <p>Rua Exemplo, 123, Madeira</p>
                            <a href="#" class="text-red-400 hover:text-red-300 text-sm inline-flex items-center mt-1">
                                <i class="fa-solid fa-route mr-1"></i> Obter direções
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <i class="fa-solid fa-phone mr-2 mt-1 text-red-500"></i>
                        <div>
                            <p>+351 934 468 028</p>
                            <a href="tel:+351912345678"
                                class="text-red-400 hover:text-red-300 text-sm inline-flex items-center mt-1">
                                <i class="fa-solid fa-phone-flip mr-1"></i> Ligar agora
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <i class="fa-solid fa-clock mr-2 mt-1 text-red-500"></i>
                        <div>
                            <p>Segunda a Sexta: 9h - 18h</p>
                            <p>Sábado: 10h - 14h</p>
                            <p class="text-sm text-yellow-400 mt-2 flex items-center">
                                <i class="fa-solid fa-circle-info mr-1"></i> Fechado aos domingos
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="#"
                        class="inline-flex items-center justify-center w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                        <i class="fa-solid fa-calendar-check mr-2"></i>
                        Agendar Teste Drive
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script do Google Maps -->
<script>
function initMap() {
    const location = {
        lat: 32.64863860392267,
        lng: -16.91331269868987
    };
    const map = new google.maps.Map(document.getElementById("map"), {
        center: location,
        zoom: 19,
        streetViewControl: false,
        mapTypeControl: false,
    });

    const marker = new google.maps.Marker({
        position: location,
        map: map,
        title: "AutoPrime"
    });
}
</script>

<!-- API do Google Maps -->
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFL8HeLR9ixEG8nuoXcTDzuLOuPfYrMD0&callback=initMap&libraries=places">
</script>