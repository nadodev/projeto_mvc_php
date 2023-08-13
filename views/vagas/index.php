<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vagas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        header {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h2 {
            margin-bottom: 1.5rem;
        }
        p {
            margin: 0 0 1rem;
        }
        a {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 3px;
            font-weight: bold;
        }
        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Vagas</h1>
    </header>
    <div class="container">
        <h2>Vagas Disponíveis</h2>
        <?php foreach ($vagas as $vaga) : ?>
            <div class="vaga">
                <h3><?= $vaga['titulo'] ?></h3>
                <p><strong>Descrição:</strong> <?= $vaga['descricao'] ?></p>
                <p><strong>Status:</strong> <?= $vaga['status'] ?></p>
                <p><strong>Número de Vagas:</strong> <?= $vaga['numero_vagas'] ?></p>
                <a href="<?php echo URL_BASE; ?>/vagas/detalhes/<?= $vaga['id'] ?>">Ver Vaga</a>
            </div>
        <?php endforeach ?>
    </div>
</body>
</html>
