<?php 
use Source\Helpers\FlashMessage;

$message = FlashMessage::get('success');
$error = FlashMessage::get('error');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }


        form {
            margin-top: 2rem;
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
        .flash-message {
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            font-size: 14px;
            border-radius: 3px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
        form div {
            margin-bottom: 1rem;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        button[type="submit"] {
            background-color: #333;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            padding: 0.5rem;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Usuários</h1>
    </header>
    <div class="container">
        <h2>Lista de Usuários</h2>
        <?php 
        if ($message) {
            echo "<div class='flash-message success'>$message</div>";
        }
        if ($error) {
            echo "<div class='flash-message error'>$error</div>";
        }
        if (!empty($users)) {
            echo "<table>";
            echo "<tr><th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Email</th>";
            echo "<th>Ação</th></tr>";
            foreach ($users as $user) {
                echo "<tr><td>" . $user['id'] . "</td>";
                echo "<td>" . $user['nome'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td>Editar | Excluir </td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum usuário encontrado.</p>";
        }

        ?>

        <h2>Cadastro de Usuários</h2>
        <form method="post" action="<?php echo URL_BASE; ?>/usuarios/store">
            <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
            <div>
                <input type="text" name="nome" placeholder="Nome">
            </div>
            <div>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>
                <input type="password" name="password" placeholder="Senha">
            </div>
            <div>
                <input type="text" name="username" placeholder="Usuário">
            </div>
            <div>
                <button type="submit">Criar Usuário</button>
            </div>
        </form>
    </div>
</body>
</html>
