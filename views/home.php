<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap');


    a {
        display: block;
        text-decoration: none;
        font-weight: bold;
        padding: 1rem;
        color: white;
        background-color: rgb(51 65 85);
        width: 50%;
        font-size: 1.5rem;
        margin: auto;
        border-radius: 1rem;
        margin-top: 5rem;
        transition: transform .2s
    }

    a:hover {
        transform: scale(1.225);
    }

    body {
        min-height: 100vh;
        display: flex;
        background-color: rgb(100 116 139);
        color: white;
        font-family: 'Poppins', sans-serif;
    }

    div {
        margin: auto;
        text-align: center;
    }

    h1 {
        font-size: 3rem;
        font-weight: 800;
    }
</style>

<body>

    <div>
        <h1>Bienvenue sur Di Rosso Wordle</h1>
        <a href="/game">Jouer</a>
    </div>

</body>

</html>