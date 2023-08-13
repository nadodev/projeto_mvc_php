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
    <title>Document</title>
</head>
<body>
    <h2>Usuarios</h2>
    <style>
        .flash-message {
    padding: 10px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    font-size: 14px;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border-color: #c3e6cb;
}

.error {
    background-color: red;
    color: #155724;
    border-color: #c3e6cb;
}
    </style>
    <?php 
        if ($message) {
            echo "<div class='flash-message success'>$message</div>";
        }
        if ($error) {
            echo "<div class='flash-message error'>$error</div>";
        }
    foreach ($users as $user) {
        echo "<p>" . $user['nome'] . "</p>";
    }


    ?>
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
        <input type="text" name="username" placeholder="Usuario">
    </div>
    <div>
        <button type="submit">Criar Usuário</button>
    </div>
</form>

</body>
</html>