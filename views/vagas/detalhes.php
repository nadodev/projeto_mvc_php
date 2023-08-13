<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas e Candidatura</title>
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
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        hr {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Vagas e Candidatura</h1>
    </header>
    <div class="container">
        <h2>Detalhes da Vaga</h2>
        <p><strong>Titulo:</strong> <?php echo $vagas['titulo']; ?></p>
        <p><strong>Descrição:</strong> <?php echo $vagas['descricao'] ?></p>
        <p><strong>Vaga está:</strong> <?php echo $vagas['status'] ?></p>
        <p><strong>Numero Vagas:</strong> <?php echo $vagas['numero_vagas'] ?></p>
        
        <hr>
        
        <h2>Aplicar para a vaga</h2>
        <form action="processar_candidatura.php" method="post">
            <input type="hidden" name="id_vaga" value="<?php echo $vagas['id'] ?>">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="mensagem">Mensagem de Candidatura:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
            </div>
            <div>
                <input type="submit" value="Enviar Candidatura">
            </div>
        </form>
    </div>
</body>
</html>
