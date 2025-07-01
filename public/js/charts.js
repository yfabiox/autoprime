const baseConfig = {
    type: 'bar',
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: '#fff'
                },
                grid: {
                    color: '#333'
                }
            },
            x: {
                ticks: {
                    color: '#fff'
                },
                grid: {
                    color: '#333'
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: '#fff'
                }
            }
        }
    }
};

// Gráfico de Vendas
const vendasCtx = document.getElementById('vendasChart').getContext('2d');
new Chart(vendasCtx, {
    ...baseConfig,
    data: {
        labels: meses,
        datasets: [{
            label: 'Vendas',
            data: vendas,
            backgroundColor: 'rgba(239, 68, 68, 0.7)', // vermelho
            borderColor: 'rgba(239, 68, 68, 1)',
            borderWidth: 1
        }]
    }
});

// Gráfico de Anúncios
const anunciosCtx = document.getElementById('anunciosChart').getContext('2d');
new Chart(anunciosCtx, {
    ...baseConfig,
    data: {
        labels: meses,
        datasets: [{
            label: 'Anúncios',
            data: anuncios,
            backgroundColor: 'rgba(59, 130, 246, 0.7)', // azul
            borderColor: 'rgba(59, 130, 246, 1)',
            borderWidth: 1
        }]
    }
});


console.log(typeof meses);
console.log(meses);
console.log(typeof vendas);
console.log(vendas);
console.log(typeof anuncios);
console.log(anuncios);

