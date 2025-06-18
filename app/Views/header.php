<!-- app/Views/header.php -->
<!DOCTYPE html>
<html lang="pt" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Prime</title>
    <link rel="shortcut icon" type="imagex/png" href="<?= base_url('uploads/carros/logo_autoprime.png') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Outfit:wght@100..900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/7776adf98b.js" crossorigin="anonymous"></script>
</head>
<style>
body {
    font-family: 'Outfit', sans-serif;
}

/* Estiliza a scrollbar apenas no body e não nos selects */
body::-webkit-scrollbar {
    width: 10px;
    /* Largura da barra de rolagem */
}

body::-webkit-scrollbar-track {
    background: #121212;
    /* Cor de fundo (preto) */
}

body::-webkit-scrollbar-thumb {
    background: #222;
    /* Cor do botão de rolagem */
    border-radius: 5px;
}

body::-webkit-scrollbar-thumb:hover {
    background: #333;
}

/* Reset scrollbar dentro dos selects */
select {
    scrollbar-width: auto;
    /* Firefox */
}

select::-webkit-scrollbar {
    width: auto;
    /* Mantém a scrollbar padrão do sistema */
}
</style>

<body class="bg-neutral-900">