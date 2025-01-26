<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la peticion y no mosrtrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*  Ejecutamos la  peticion
    y guardamos el resultado
*/
$result = curl_exec($ch);

// una alternatica seria usar file_get_contents
// $result = file_get_contents(API_URL); 
//solo si quires hacer una peticion GET de una API
$data = json_decode($result, true);

curl_close($ch);

?>

<head>
    <title>La proxima pelicula de marvel</title>
    <meta charset="UTF-8">
    <meta name="description" content="La proxima pelicula de marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
</head>

<main>
    <section>
        <img 
        src="<?= $data["poster_url"]?>" alt="Poster de <?= $data["title"]?>" width="200"
        style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);"
        />
    </section>
    <hgroup>
        <h3><?= $data["title"]?> se estrena en <?= $data["days_until"]?> dias</h3>
        <p>Fecha de estreno: <?= $data["release_date"]?></p>
        <p>La siguiente es <?= $data["following_production"]["title"] ?></p>
    </hgroup>

</main>





<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
        text-align: center;
    }
    img {
        display: block;
        margin: 0 auto;
    }
</style> 